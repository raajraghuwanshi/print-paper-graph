/**
 * Virtual Online Graph Paper Client JavaScript
 */

(function () {
    const canvas = document.getElementById('paper');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const undoBtn = document.getElementById('undo');
    const printBtn = document.getElementById('print');
    const eraseAllBtn = document.getElementById('eraseAll');
    const downloadBtn = document.getElementById('downloadImage');
    const drawWriteTool = document.getElementById('draw-write-tool');
    const eraseTool = document.getElementById('erase-tool');
    const toolDesc = document.getElementById('tool-description');
    const coordsDisplay = document.getElementById('current_coordinates');
    const lineLenDisplay = document.getElementById('line_length');
    const textInput = document.getElementById('textInput');

    let currentTool = 'draw'; // 'draw' or 'erase'
    let isDrawing = false;
    let startX = 0;
    let startY = 0;
    let history = [];
    let currentPath = null;
    let userElements = []; // Store drawn lines and texts

    const GRID_SIZE = 20;

    function init() {
        render();
        saveState();
        bindEvents();
        updateToolUI();
    }

    function saveState() {
        history.push(JSON.stringify(userElements));
        if (history.length > 50) history.shift();
    }

    function render() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Draw Graph Paper Background Grid
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.strokeStyle = '#d4e4eb';
        ctx.lineWidth = 0.8;

        for (let x = 0; x <= canvas.width; x += GRID_SIZE) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, canvas.height);
            ctx.stroke();
        }

        for (let y = 0; y <= canvas.height; y += GRID_SIZE) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(canvas.width, y);
            ctx.stroke();
        }

        // Draw User Elements (Lines & Text)
        userElements.forEach(el => {
            if (el.type === 'line') {
                ctx.strokeStyle = el.color || '#222222';
                ctx.lineWidth = el.width || 2;
                ctx.beginPath();
                ctx.moveTo(el.x1, el.y1);
                ctx.lineTo(el.x2, el.y2);
                ctx.stroke();
            } else if (el.type === 'free') {
                ctx.strokeStyle = el.color || '#222222';
                ctx.lineWidth = el.width || 2;
                ctx.beginPath();
                el.points.forEach((pt, idx) => {
                    if (idx === 0) ctx.moveTo(pt.x, pt.y);
                    else ctx.lineTo(pt.x, pt.y);
                });
                ctx.stroke();
            } else if (el.type === 'text') {
                ctx.fillStyle = el.color || '#111111';
                ctx.font = '16px sans-serif';
                ctx.fillText(el.text, el.x, el.y);
            }
        });

        // Draw active in-progress preview line
        if (isDrawing && currentTool === 'draw' && currentPath && currentPath.type === 'line') {
            ctx.strokeStyle = '#0088cc';
            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.moveTo(currentPath.x1, currentPath.y1);
            ctx.lineTo(currentPath.x2, currentPath.y2);
            ctx.stroke();
        }
    }

    function getCanvasCoords(e) {
        const rect = canvas.getBoundingClientRect();
        return {
            x: Math.round(e.clientX - rect.left),
            y: Math.round(e.clientY - rect.top)
        };
    }

    function bindEvents() {
        canvas.addEventListener('mousedown', onMouseDown);
        canvas.addEventListener('mousemove', onMouseMove);
        window.addEventListener('mouseup', onMouseUp);

        canvas.addEventListener('click', onCanvasClick);

        drawWriteTool.addEventListener('click', () => {
            currentTool = 'draw';
            updateToolUI();
        });

        eraseTool.addEventListener('click', () => {
            currentTool = 'erase';
            updateToolUI();
        });

        undoBtn.addEventListener('click', () => {
            if (history.length > 1) {
                history.pop();
                userElements = JSON.parse(history[history.length - 1]);
                render();
            } else if (history.length === 1) {
                userElements = [];
                render();
            }
        });

        eraseAllBtn.addEventListener('click', () => {
            if (confirm('Are you sure you want to erase everything on the graph paper?')) {
                userElements = [];
                saveState();
                render();
            }
        });

        downloadBtn.addEventListener('click', () => {
            const link = document.createElement('a');
            link.download = 'virtual-graph-paper.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });

        printBtn.addEventListener('click', () => {
            commitText();
            setTimeout(() => {
                window.print();
            }, 100);
        });

        textInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                commitText();
            }
        });

        textInput.addEventListener('blur', commitText);
    }

    let isMouseMoved = false;

    function onMouseDown(e) {
        if (textInput.style.display === 'block') {
            commitText();
            return;
        }

        const pos = getCanvasCoords(e);
        startX = pos.x;
        startY = pos.y;
        isDrawing = true;
        isMouseMoved = false;

        if (currentTool === 'draw') {
            currentPath = {
                type: 'line',
                x1: startX,
                y1: startY,
                x2: startX,
                y2: startY,
                color: '#222222',
                width: 2
            };
        } else if (currentTool === 'erase') {
            eraseAt(pos.x, pos.y);
        }
    }

    function onMouseMove(e) {
        const pos = getCanvasCoords(e);

        coordsDisplay.innerText = `(${pos.x}, ${pos.y})`;
        coordsDisplay.parentElement.style.visibility = 'visible';

        if (isDrawing) {
            isMouseMoved = true;
            if (currentTool === 'draw' && currentPath) {
                currentPath.x2 = pos.x;
                currentPath.y2 = pos.y;

                const dx = pos.x - startX;
                const dy = pos.y - startY;
                const dist = Math.round(Math.sqrt(dx * dx + dy * dy));
                lineLenDisplay.innerText = ` Length: ${dist}px`;

                render();
            } else if (currentTool === 'erase') {
                eraseAt(pos.x, pos.y);
            }
        }
    }

    function onMouseUp(e) {
        if (!isDrawing) return;
        isDrawing = false;
        lineLenDisplay.innerText = '';

        if (currentTool === 'draw' && currentPath && isMouseMoved) {
            userElements.push(currentPath);
            currentPath = null;
            saveState();
            render();
        }
    }

    function onCanvasClick(e) {
        if (isMouseMoved) return;
        const pos = getCanvasCoords(e);

        if (currentTool === 'draw') {
            // Focus text input at click position
            const rect = canvas.getBoundingClientRect();
            textInput.style.left = (rect.left + pos.x) + 'px';
            textInput.style.top = (rect.top + pos.y - 12) + 'px';
            textInput.style.display = 'block';
            textInput.style.width = '200px';
            textInput.style.fontSize = '16px';
            textInput.style.fontFamily = 'sans-serif';
            textInput.dataset.x = pos.x;
            textInput.dataset.y = pos.y;
            textInput.value = '';
            setTimeout(() => textInput.focus(), 50);
        }
    }

    function commitText() {
        if (textInput.style.display === 'none') return;
        const val = textInput.value.trim();
        const x = parseInt(textInput.dataset.x, 10);
        const y = parseInt(textInput.dataset.y, 10);

        textInput.style.display = 'none';

        if (val && !isNaN(x) && !isNaN(y)) {
            userElements.push({
                type: 'text',
                text: val,
                x: x,
                y: y,
                color: '#111111'
            });
            saveState();
            render();
        }
    }

    function eraseAt(x, y) {
        const radius = 15;
        const initialCount = userElements.length;

        userElements = userElements.filter(el => {
            if (el.type === 'line') {
                const dist1 = Math.hypot(el.x1 - x, el.y1 - y);
                const dist2 = Math.hypot(el.x2 - x, el.y2 - y);
                return dist1 > radius && dist2 > radius;
            } else if (el.type === 'text') {
                const dist = Math.hypot(el.x - x, el.y - y);
                return dist > radius * 1.5;
            }
            return true;
        });

        if (userElements.length !== initialCount) {
            saveState();
            render();
        }
    }

    function updateToolUI() {
        if (currentTool === 'draw') {
            drawWriteTool.className = 'btn btn-primary';
            eraseTool.className = 'btn btn-default';
            toolDesc.innerText = 'Drag mouse to draw straight lines. Click anywhere to type text.';
        } else {
            drawWriteTool.className = 'btn btn-default';
            eraseTool.className = 'btn btn-primary';
            toolDesc.innerText = 'Click or drag across lines or text to erase them.';
        }
    }

    init();
})();
