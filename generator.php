<?php
/**
 * Vector SVG / Printable Graph Paper Generator Engine
 */

$type = isset($_GET['type']) ? $_GET['type'] : (isset($_GET['units']) ? $_GET['units'] : '5mm');
$paperSize = isset($_GET['paperSize']) ? strtolower($_GET['paperSize']) : 'letter';
$orientation = isset($_GET['orientation']) ? strtolower($_GET['orientation']) : 'portrait';
$color = isset($_GET['color']) ? strtolower($_GET['color']) : 'gray';
$act = isset($_GET['act']) ? strtolower($_GET['act']) : 'open';

// Color map
$colorMap = [
    'faint' => '#e8e8e8',
    'light' => '#cccccc',
    'gray'  => '#999999',
    'dark'  => '#555555',
    'black' => '#000000',
    'blue'  => '#4183c4'
];
$strokeColor = isset($colorMap[$color]) ? $colorMap[$color] : '#999999';

// Dimensions in millimeters
$sizesMM = [
    'letter'       => [215.9, 279.4],
    'a4'           => [210.0, 297.0],
    '11x17'        => [279.4, 431.8],
    'legal'        => [215.9, 355.6],
    'a3'           => [297.0, 420.0],
    'a2'           => [420.0, 594.0],
    'poster'       => [609.6, 914.4],
    'movie-poster' => [685.8, 1041.4]
];

$dim = isset($sizesMM[$paperSize]) ? $sizesMM[$paperSize] : $sizesMM['letter'];
$widthMM = $dim[0];
$heightMM = $dim[1];

if ($orientation === 'landscape') {
    $temp = $widthMM;
    $widthMM = $heightMM;
    $heightMM = $temp;
}

// Convert MM to points (1 inch = 25.4mm = 72 pt, 1mm = 2.83464567 pt)
$ptPerMM = 2.83464567;
$widthPt = $widthMM * $ptPerMM;
$heightPt = $heightMM * $ptPerMM;

// Margin in mm
$marginMM = 10;
$marginPt = $marginMM * $ptPerMM;
$printableWidth = $widthPt - (2 * $marginPt);
$printableHeight = $heightPt - (2 * $marginPt);

if ($act === 'download') {
    header('Content-Type: image/svg+xml');
    header('Content-Disposition: attachment; filename="' . $type . '-' . $paperSize . '-' . $orientation . '.svg"');
} else if ($act === 'svg') {
    header('Content-Type: image/svg+xml');
} else if ($act === 'print') {
    header('Content-Type: text/html; charset=utf-8');
} else {
    // Open in browser
    header('Content-Type: image/svg+xml');
}

if ($act === 'print') {
    echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Print Graph Paper</title><style>';
    echo '@page { size: ' . $widthMM . 'mm ' . $heightMM . 'mm; margin: 0; }';
    echo 'html, body { margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden; background: #ffffff; }';
    echo 'svg { width: 100vw; height: 100vh; display: block; }';
    echo '</style></head><body>';
} else {
    echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . "\n";
}
?>
<svg xmlns="http://www.w3.org/2000/svg" 
     width="<?php echo $widthMM; ?>mm" 
     height="<?php echo $heightMM; ?>mm" 
     viewBox="0 0 <?php echo $widthPt; ?> <?php echo $heightPt; ?>">
    <style>
        svg { background-color: #ffffff; display: block; width: 100%; height: 100%; }
        .grid-line { stroke: <?php echo $strokeColor; ?>; stroke-width: 0.5; fill: none; }
        .grid-line-major { stroke: <?php echo $strokeColor; ?>; stroke-width: 1.0; fill: none; }
        .dot { fill: <?php echo $strokeColor; ?>; }
    </style>
    
    <rect width="<?php echo $widthPt; ?>" height="<?php echo $heightPt; ?>" fill="#ffffff" />
    
    <g transform="translate(<?php echo $marginPt; ?>, <?php echo $marginPt; ?>)">
<?php
// Compute grid spacing in pt
switch ($type) {
    case '1-4-inch':
    case '.25':
        $stepPt = 0.25 * 72; // 18pt
        renderCartesianGrid($printableWidth, $printableHeight, $stepPt, 4);
        break;

    case '10-squares-per-inch':
    case '.1':
        $stepPt = 0.10 * 72; // 7.2pt
        renderCartesianGrid($printableWidth, $printableHeight, $stepPt, 10);
        break;

    case '10mm':
    case '10':
        $stepPt = 10 * $ptPerMM; // ~28.35pt
        renderCartesianGrid($printableWidth, $printableHeight, $stepPt, 5);
        break;

    case '1-2-inch':
    case '.5':
        $stepPt = 0.50 * 72; // 36pt
        renderCartesianGrid($printableWidth, $printableHeight, $stepPt, 2);
        break;

    case '1-inch':
    case '1':
        $stepPt = 1.00 * 72; // 72pt
        renderCartesianGrid($printableWidth, $printableHeight, $stepPt, 1);
        break;

    case 'dot-paper':
    case 'dot':
        $stepPt = 5 * $ptPerMM;
        renderDotGrid($printableWidth, $printableHeight, $stepPt);
        break;

    case 'isometric':
    case 'iso':
        $stepPt = 8 * $ptPerMM;
        renderIsometricGrid($printableWidth, $printableHeight, $stepPt);
        break;

    case 'log':
        renderLogGrid($printableWidth, $printableHeight);
        break;

    case 'polar':
        renderPolarGrid($printableWidth, $printableHeight);
        break;

    case '5mm':
    default:
        $stepPt = 5 * $ptPerMM; // ~14.17pt
        renderCartesianGrid($printableWidth, $printableHeight, $stepPt, 5);
        break;
}

function renderCartesianGrid($w, $h, $step, $majorEvery = 5) {
    $countX = floor($w / $step);
    $countY = floor($h / $step);

    // Vertical lines
    for ($i = 0; $i <= $countX; $i++) {
        $x = $i * $step;
        $class = ($majorEvery > 1 && $i % $majorEvery === 0) ? 'grid-line-major' : 'grid-line';
        echo "        <line x1=\"$x\" y1=\"0\" x2=\"$x\" y2=\"$h\" class=\"$class\" />\n";
    }

    // Horizontal lines
    for ($j = 0; $j <= $countY; $j++) {
        $y = $j * $step;
        $class = ($majorEvery > 1 && $j % $majorEvery === 0) ? 'grid-line-major' : 'grid-line';
        echo "        <line x1=\"0\" y1=\"$y\" x2=\"$w\" y2=\"$y\" class=\"$class\" />\n";
    }
}

function renderDotGrid($w, $h, $step) {
    $countX = floor($w / $step);
    $countY = floor($h / $step);

    for ($i = 0; $i <= $countX; $i++) {
        $x = $i * $step;
        for ($j = 0; $j <= $countY; $j++) {
            $y = $j * $step;
            echo "        <circle cx=\"$x\" cy=\"$y\" r=\"1.2\" class=\"dot\" />\n";
        }
    }
}

function renderIsometricGrid($w, $h, $step) {
    // 60-degree equilateral triangular grid
    $hStep = $step * sin(deg2rad(60));
    $countY = floor($h / $hStep);

    // Horizontal lines
    for ($j = 0; $j <= $countY; $j++) {
        $y = $j * $hStep;
        echo "        <line x1=\"0\" y1=\"$y\" x2=\"$w\" y2=\"$y\" class=\"grid-line\" />\n";
    }

    // Slanted lines +60 deg
    $dx = $h / tan(deg2rad(60));
    for ($x = -$h; $x <= $w + $h; $x += $step) {
        $x1 = $x;
        $y1 = 0;
        $x2 = $x + $dx;
        $y2 = $h;
        echo "        <line x1=\"$x1\" y1=\"$y1\" x2=\"$x2\" y2=\"$y2\" class=\"grid-line\" />\n";
    }

    // Slanted lines -60 deg
    for ($x = -$h; $x <= $w + $h; $x += $step) {
        $x1 = $x;
        $y1 = 0;
        $x2 = $x - $dx;
        $y2 = $h;
        echo "        <line x1=\"$x1\" y1=\"$y1\" x2=\"$x2\" y2=\"$y2\" class=\"grid-line\" />\n";
    }
}

function renderLogGrid($w, $h) {
    // 3 cycles horizontal log, linear vertical
    $cycles = 3;
    $cycleWidth = $w / $cycles;

    for ($c = 0; $c < $cycles; $c++) {
        $off = $c * $cycleWidth;
        for ($val = 1; $val <= 10; $val += 0.2) {
            $x = $off + (log10($val) * $cycleWidth);
            $class = (fmod($val, 1.0) == 0) ? 'grid-line-major' : 'grid-line';
            echo "        <line x1=\"$x\" y1=\"0\" x2=\"$x\" y2=\"$h\" class=\"$class\" />\n";
        }
    }

    $countY = floor($h / 15);
    for ($j = 0; $j <= $countY; $j++) {
        $y = $j * 15;
        $class = ($j % 5 === 0) ? 'grid-line-major' : 'grid-line';
        echo "        <line x1=\"0\" y1=\"$y\" x2=\"$w\" y2=\"$y\" class=\"$class\" />\n";
    }
}

function renderPolarGrid($w, $h) {
    $cx = $w / 2;
    $cy = $h / 2;
    $maxR = min($cx, $cy);
    $ringStep = $maxR / 12;

    // Concentric rings
    for ($r = $ringStep; $r <= $maxR; $r += $ringStep) {
        echo "        <circle cx=\"$cx\" cy=\"$cy\" r=\"$r\" class=\"grid-line\" />\n";
    }

    // Radial spokes (every 15 degrees)
    for ($deg = 0; $deg < 360; $deg += 15) {
        $rad = deg2rad($deg);
        $x2 = $cx + ($maxR * cos($rad));
        $y2 = $cy + ($maxR * sin($rad));
        $class = ($deg % 90 === 0) ? 'grid-line-major' : 'grid-line';
        echo "        <line x1=\"$cx\" y1=\"$cy\" x2=\"$x2\" y2=\"$y2\" class=\"$class\" />\n";
    }
}
?>
    </g>
</svg>
<?php if ($act === 'print'): ?>
<script type="text/javascript">
    window.onload = function() {
        setTimeout(function() {
            window.print();
        }, 200);
    };
</script>
</body>
</html>
<?php endif; ?>

