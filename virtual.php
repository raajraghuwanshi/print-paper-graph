<?php
$title = "Virtual Online Graph Paper";
$description = "Free easy to use virtual graph paper. Draw lines, write notes, undo if you need to, and print. Simple, easy, interactive online graph paper.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="main-container">
        <!-- Header -->
        <div class="layout-row" style="margin-bottom:1em;">
            <div class="main-content-col" style="background:none;padding:0;box-shadow:none;">
                <h1 class="header-title">Virtual Online Graph Paper</h1>
                <a href="/" class="header-link">print-graph-paper.com</a>
            </div>
        </div>

        <div class="layout-row">
            <!-- Left Ad Skyscraper -->
            <div class="sidebar-ad">
                <div class="ad-box">
                    <span>Advertisement<br>Left Skyscraper</span>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="main-content-col">
                <div class="lead-box" style="margin-bottom:1.5em;">
                    <p class="lead-text">
                        <strong>Welcome to the virtual online graph paper!</strong><br>
                        Here you can easily draw lines, write text notes, and print your graph paper.
                    </p>
                    <ul style="margin-top:10px;margin-bottom:10px;color:#444;">
                        <li><strong>To draw lines:</strong> Click anywhere on the grid below and drag while holding the mouse button.</li>
                        <li><strong>To write text:</strong> Click anywhere on the grid and start typing.</li>
                    </ul>
                    <p style="margin:0;font-size:0.95rem;">
                        Looking for printable PDF graph papers instead? <a href="/" style="color:#0088cc;">Click here to return to homepage</a>.
                    </p>
                </div>

                <!-- Virtual Controls Toolbar -->
                <div class="virtual-controls">
                    <div class="virtual-controls-row">
                        <div></div>
                        <div style="display:flex;gap:8px;">
                            <button id="undo" class="btn btn-primary">↩️ Undo</button>
                            <button id="print" class="btn btn-primary">🖨️ Print</button>
                            <button id="eraseAll" class="btn btn-danger">🗑️ Erase Everything</button>
                            <button id="downloadImage" class="btn btn-default">📥 Download Image</button>
                        </div>
                    </div>

                    <div style="height:1px;background:#ccc;margin:10px 0;"></div>

                    <div class="virtual-controls-row" style="margin-bottom:4px;">
                        <span style="font-weight:600;">Mode:</span>
                        <div class="btn-group">
                            <button id="draw-write-tool" class="btn btn-primary">Drag Draw / Click Write</button>
                            <button id="erase-tool" class="btn btn-default">Erase</button>
                        </div>
                    </div>

                    <div>
                        <span id="tool-description" style="font-style:italic;color:#666;font-size:0.9rem;">
                            tool description
                        </span>
                    </div>
                </div>

                <!-- Canvas Component -->
                <div class="canvas-wrapper">
                    <canvas id="paper" width="700" height="900"></canvas>
                    <div id="current_coordinates_container">
                        Current coordinates: <span id="current_coordinates">(0, 0)</span>
                        <span id="line_length"></span>
                    </div>
                    <input id="textInput" style="position:fixed; display:none; background:rgba(255,255,255,0.9); border:1px solid #0088cc; padding:2px 4px; border-radius:3px; outline:none; z-index:1000;" placeholder="Type text & hit Enter">
                </div>

                <div style="margin-top:2em;border-top:1px solid #eee;padding-top:1.5em;">
                    <p>
                        At print-graph-paper.com in addition to this printable virtual graph paper
                        we offer all kinds of free downloadable graph paper. That includes graph paper
                        for different size papers in both landscape and portrait.
                    </p>
                    <p>
                        If you are interested you can head on over to our <a href="/" style="color:#0088cc;">homepage</a>.
                    </p>
                </div>
            </div>

            <!-- Right Ad Skyscraper -->
            <div class="sidebar-ad">
                <div class="ad-box">
                    <span>Advertisement<br>Right Skyscraper</span>
                </div>
            </div>
        </div>

        <div class="footer">
            &copy; <?php echo date('Y'); ?> print-graph-paper.com. All rights reserved.
            <a href="/privacy">Privacy Policy</a>
        </div>
    </div>

    <script src="/js/virtual-paper.js"></script>
</body>
</html>
