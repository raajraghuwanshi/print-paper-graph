<?php
$paperTypes = [
    '5mm' => [
        'name' => '5mm Graph Paper',
        'desc' => 'This is a standard Cartesian system graphing paper. There are horizontal and vertical lines 5mm apart. Graph paper is often used in engineering, it\'s common to see engineering graph paper printed on light green paper.'
    ],
    '1-4-inch' => [
        'name' => '1/4" Inch Graph Paper',
        'desc' => 'Also known as Quad paper four boxes make up an inch. Sometimes it\'s also been referred to quadrille paper. The only difference between this and the other graph paper listed here is the size of the boxes.'
    ],
    '10-squares-per-inch' => [
        'name' => '10 Squares Per Inch Graph Paper',
        'desc' => 'Working with inches? Having 10 squares per inch gives you a nice even number to work with that is both manageable and precise.'
    ],
    'dot-paper' => [
        'name' => 'Dot Paper',
        'desc' => 'Dot paper, or dotted paper is like graph paper. Only instead of lines there are dots. It\'s a good alternative to the more typical graph paper. Having dots instead of lines can be useful for designers.'
    ],
    '10mm' => [
        'name' => 'Centimeter Graph Paper',
        'desc' => 'This is standard graph paper similar to the graph paper above except of course the lines are 1 centimeter apart instead.'
    ],
    '1-2-inch' => [
        'name' => '1/2" Half Inch Graph Paper',
        'desc' => 'The half inch graph paper can handily function as a two dimensional ruler.'
    ],
    '1-inch' => [
        'name' => '1" One-Inch Graph Paper',
        'desc' => 'The larger size graph paper can be useful when using the graph paper for measuring. Also when using it with underdeveloped motor skills.'
    ],
    'isometric' => [
        'name' => 'Isometric Graph Paper',
        'desc' => 'This graph paper is used to draw three-dimensional figures. It has lines representing all three dimensions: length, width, and height. Perfect for isometric art and architectural drafting.'
    ],
    'log' => [
        'name' => 'Log Graph Paper',
        'desc' => 'Log is short for logarithmic, this graph paper is used to plot data where the values change exponentially.'
    ],
    'polar' => [
        'name' => 'Polar Graph Paper',
        'desc' => 'Polar coordinates represent a coordinate system where a location is specified by the angle and distance from a fixed point. This graph paper allows you to plot those points.'
    ]
];

$type = isset($_GET['type']) ? $_GET['type'] : '5mm';
if (!isset($paperTypes[$type])) {
    $type = '5mm';
}

$paperSize = isset($_GET['paperSize']) ? strtolower($_GET['paperSize']) : 'letter';
$orientation = isset($_GET['orientation']) ? strtolower($_GET['orientation']) : 'portrait';
$color = isset($_GET['color']) ? strtolower($_GET['color']) : 'gray';

$item = $paperTypes[$type];

$sizes = ['letter' => 'Letter', 'a4' => 'A4', '11x17' => '11x17', 'legal' => 'Legal', 'a3' => 'A3', 'a2' => 'A2', 'poster' => 'Poster', 'movie-poster' => 'Movie Poster'];
$colors = ['faint' => 'Faint', 'light' => 'Light', 'gray' => 'Gray', 'dark' => 'Dark', 'black' => 'Black', 'blue' => 'Blue'];

$altOrientation = ($orientation === 'portrait') ? 'landscape' : 'portrait';

$genBaseUrl = "/generator.php?type=$type&paperSize=$paperSize&orientation=$orientation&color=$color";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $item['name']; ?> - Free Online Graph Paper</title>
    <meta name="description" content="<?php echo $item['desc']; ?>">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="main-container">
        <!-- Header -->
        <header class="site-header">
            <a href="/" class="brand-logo">Print-Graph-Paper.com</a>
        </header>

        <div class="layout-row">
            <!-- Left Ad Skyscraper -->
            <div class="sidebar-ad">
                <div class="ad-box">
                    <span>Advertisement<br>Left Skyscraper</span>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="main-content-col">
                <!-- Top Advertisement -->
                <div class="top-ad" style="margin-bottom: 2.5em; text-align: center;">
                    <div class="ad-box" style="height: 90px; width: 100%; max-width: 970px; margin: 0 auto; background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--text-secondary); font-size: 0.85rem;">
                        <span>Advertisement<br>Top Banner</span>
                    </div>
                </div>

                <div class="details-panel">
                    <div class="details-thumb-col">
                        <img class="details-thumb-large" src="/thumbnail.php?type=<?php echo $type; ?>" alt="<?php echo $item['name']; ?> Preview">
                    </div>
                    <div class="details-content">
                        <h2><?php echo $item['name']; ?></h2>
                        <p><?php echo $item['desc']; ?></p>
                        <p>
                            Designed for <strong><?php echo ucfirst($paperSize); ?></strong> size paper in the <strong><?php echo $orientation; ?></strong> orientation.
                        </p>
                        <p>
                            Select from the options below, print it directly, open it in a new tab, or download it as a high-quality PDF.
                        </p>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a class="btn btn-primary" href="<?php echo $genBaseUrl; ?>&act=print" target="_blank">Print Document</a>
                            <a class="btn btn-default" href="<?php echo $genBaseUrl; ?>&act=download">Download PDF</a>
                            <a class="btn btn-default" href="<?php echo $genBaseUrl; ?>&act=open" target="_blank">Open in Browser</a>
                        </div>

                        <!-- Choose Paper Size -->
                        <div class="option-section">
                            <h4>Paper Size</h4>
                            <div class="option-chips">
                                <?php foreach ($sizes as $sKey => $sLabel): ?>
                                    <?php 
                                        $btnClass = ($sKey === $paperSize) ? 'chip active' : 'chip';
                                        $url = "/details/$type/$sKey/$orientation/$color";
                                    ?>
                                    <a href="<?php echo $url; ?>" class="<?php echo $btnClass; ?>"><?php echo $sLabel; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Choose Line Color -->
                        <div class="option-section">
                            <h4>Line Color</h4>
                            <div class="option-chips">
                                <?php foreach ($colors as $cKey => $cLabel): ?>
                                    <?php 
                                        $btnClass = ($cKey === $color) ? 'chip active' : 'chip';
                                        $url = "/details/$type/$paperSize/$orientation/$cKey";
                                    ?>
                                    <a href="<?php echo $url; ?>" class="<?php echo $btnClass; ?>"><?php echo $cLabel; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <a href="/details/<?php echo $type; ?>/<?php echo $paperSize; ?>/<?php echo $altOrientation; ?>/<?php echo $color; ?>" class="switch-orientation">
                            🔄 Switch to <?php echo $altOrientation; ?> orientation
                        </a>
                    </div>
                </div>

                <!-- Reference Table -->
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Size Name</th>
                                <th>Description / Dimensions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Letter</th>
                                <td>The most common U.S. paper size (8.5" × 11").</td>
                            </tr>
                            <tr>
                                <th>A4</th>
                                <td>The most common international paper size (210mm × 297mm).</td>
                            </tr>
                            <tr>
                                <th>11x17</th>
                                <td>Tabloid paper size (11" × 17").</td>
                            </tr>
                            <tr>
                                <th>Legal</th>
                                <td>Legal size paper (8.5" × 14").</td>
                            </tr>
                            <tr>
                                <th>A3</th>
                                <td>Twice the size of A4 (420mm × 297mm).</td>
                            </tr>
                            <tr>
                                <th>A2</th>
                                <td>Twice the size of A3 (420mm × 594mm).</td>
                            </tr>
                            <tr>
                                <th>Poster</th>
                                <td>Standard poster size (24" × 36").</td>
                            </tr>
                            <tr>
                                <th>Movie Poster</th>
                                <td>Standard movie poster size (27" × 41").</td>
                            </tr>
                        </tbody>
                    </table>
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
</body>
</html>
