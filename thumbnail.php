<?php
/**
 * Graph Paper Thumbnail Generator
 */

$type = isset($_GET['type']) ? $_GET['type'] : '5mm';
if (isset($_GET['units'])) {
    $units = $_GET['units'];
    if ($units == '.25') $type = '1-4-inch';
    else if ($units == '.1') $type = '10-squares-per-inch';
    else if ($units == '10') $type = '10mm';
    else if ($units == '.5') $type = '1-2-inch';
    else if ($units == '1') $type = '1-inch';
}

if (strpos($_SERVER['REQUEST_URI'], 'ThumbnailDot') !== false) {
    $type = 'dot-paper';
} else if (strpos($_SERVER['REQUEST_URI'], 'ThumbnailIso') !== false) {
    $type = 'isometric';
} else if (strpos($_SERVER['REQUEST_URI'], 'LogThumbnail') !== false) {
    $type = 'log';
} else if (strpos($_SERVER['REQUEST_URI'], 'ThumbnailPolar') !== false) {
    $type = 'polar';
}

header('Content-Type: image/svg+xml');

$w = 110;
$h = 140;
$strokeColor = '#b5c8d0';

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . "\n";
?>
<svg xmlns="http://www.w3.org/2000/svg" width="<?php echo $w; ?>" height="<?php echo $h; ?>" viewBox="0 0 <?php echo $w; ?> <?php echo $h; ?>">
    <style>
        svg { background: #ffffff; }
        .thumb-line { stroke: <?php echo $strokeColor; ?>; stroke-width: 0.8; fill: none; }
        .thumb-dot { fill: <?php echo $strokeColor; ?>; }
    </style>
    <rect width="<?php echo $w; ?>" height="<?php echo $h; ?>" fill="#ffffff" />
    <g transform="translate(6, 6)">
<?php
$pw = $w - 12;
$ph = $h - 12;

switch ($type) {
    case '1-4-inch':
        $step = 10;
        break;
    case '10-squares-per-inch':
        $step = 5;
        break;
    case '10mm':
        $step = 15;
        break;
    case '1-2-inch':
        $step = 18;
        break;
    case '1-inch':
        $step = 25;
        break;
    case 'dot-paper':
        $step = 8;
        break;
    case 'isometric':
        $step = 12;
        break;
    case 'log':
        $step = 0; // special
        break;
    case 'polar':
        $step = 0; // special
        break;
    case '5mm':
    default:
        $step = 7;
        break;
}

if ($type === 'dot-paper') {
    for ($x = 0; $x <= $pw; $x += $step) {
        for ($y = 0; $y <= $ph; $y += $step) {
            echo "<circle cx=\"$x\" cy=\"$y\" r=\"1\" class=\"thumb-dot\" />\n";
        }
    }
} else if ($type === 'isometric') {
    for ($y = 0; $y <= $ph; $y += $step) {
        echo "<line x1=\"0\" y1=\"$y\" x2=\"$pw\" y2=\"$y\" class=\"thumb-line\" />\n";
    }
    for ($x = -$ph; $x <= $pw + $ph; $x += $step) {
        echo "<line x1=\"$x\" y1=\"0\" x2=\"" . ($x + $ph) . "\" y2=\"$ph\" class=\"thumb-line\" />\n";
        echo "<line x1=\"$x\" y1=\"0\" x2=\"" . ($x - $ph) . "\" y2=\"$ph\" class=\"thumb-line\" />\n";
    }
} else if ($type === 'log') {
    for ($i = 0; $i <= $pw; $i += 8) {
        echo "<line x1=\"$i\" y1=\"0\" x2=\"$i\" y2=\"$ph\" class=\"thumb-line\" />\n";
    }
    for ($j = 0; $j <= $ph; $j += 12) {
        echo "<line x1=\"0\" y1=\"$j\" x2=\"$pw\" y2=\"$j\" class=\"thumb-line\" />\n";
    }
} else if ($type === 'polar') {
    $cx = $pw / 2;
    $cy = $ph / 2;
    for ($r = 8; $r <= min($cx, $cy); $r += 8) {
        echo "<circle cx=\"$cx\" cy=\"$cy\" r=\"$r\" class=\"thumb-line\" />\n";
    }
    for ($deg = 0; $deg < 360; $deg += 30) {
        $rad = deg2rad($deg);
        $x2 = $cx + (min($cx, $cy) * cos($rad));
        $y2 = $cy + (min($cx, $cy) * sin($rad));
        echo "<line x1=\"$cx\" y1=\"$cy\" x2=\"$x2\" y2=\"$y2\" class=\"thumb-line\" />\n";
    }
} else {
    for ($x = 0; $x <= $pw; $x += $step) {
        echo "<line x1=\"$x\" y1=\"0\" x2=\"$x\" y2=\"$ph\" class=\"thumb-line\" />\n";
    }
    for ($y = 0; $y <= $ph; $y += $step) {
        echo "<line x1=\"0\" y1=\"$y\" x2=\"$pw\" y2=\"$y\" class=\"thumb-line\" />\n";
    }
}
?>
    </g>
</svg>
