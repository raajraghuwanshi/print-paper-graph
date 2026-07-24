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
        <div class="layout-row" style="margin-bottom:1em;">
            <div class="main-content-col" style="background:none;padding:0;box-shadow:none;">
                <h1 class="header-title">Print-Graph-Paper.com</h1>
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
                <div class="details-flex">
                    <div class="details-thumb-col">
                        <img class="details-thumb-large" src="/thumbnail.php?type=<?php echo $type; ?>" alt="<?php echo $item['name']; ?> Preview">
                    </div>
                    <div style="flex:1;">
                        <h2 style="margin-top:0;font-size:1.6rem;"><?php echo $item['name']; ?></h2>
                        <p style="margin-top:10px;line-height:1.6;color:#444;"><?php echo $item['desc']; ?></p>
                        <p style="color:#666;">
                            This graph paper was designed for <strong><?php echo ucfirst($paperSize); ?></strong> size paper in the <strong><?php echo $orientation; ?></strong> orientation.
                        </p>
                        <p style="color:#666;">
                            Below you have several options. You can print the graph paper, open it directly in your browser, or download it for later use.
                        </p>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a class="btn btn-large btn-primary" href="<?php echo $genBaseUrl; ?>&act=print" target="_blank">🖨️ Print</a>
                            <a class="btn btn-large btn-default" href="<?php echo $genBaseUrl; ?>&act=download">📥 Download</a>
                            <a class="btn btn-large btn-default" href="<?php echo $genBaseUrl; ?>&act=open" target="_blank">🔗 Open</a>
                        </div>

                        <!-- Choose Paper Size -->
                        <h4 style="margin-top:24px;margin-bottom:8px;">Choose a different paper size:</h4>
                        <div class="option-chips">
                            <?php foreach ($sizes as $sKey => $sLabel): ?>
                                <?php 
                                    $btnClass = ($sKey === $paperSize) ? 'btn-primary' : 'btn-default';
                                    $url = "/details/$type/$sKey/$orientation/$color";
                                ?>
                                <a href="<?php echo $url; ?>" class="btn <?php echo $btnClass; ?>"><?php echo $sLabel; ?></a>
                            <?php endforeach; ?>
                        </div>

                        <!-- Choose Line Color -->
                        <h4 style="margin-top:16px;margin-bottom:8px;">Choose a different line color:</h4>
                        <div class="option-chips">
                            <?php foreach ($colors as $cKey => $cLabel): ?>
                                <?php 
                                    $btnClass = ($cKey === $color) ? 'btn-primary' : 'btn-default';
                                    $url = "/details/$type/$paperSize/$orientation/$cKey";
                                ?>
                                <a href="<?php echo $url; ?>" class="btn <?php echo $btnClass; ?>"><?php echo $cLabel; ?></a>
                            <?php endforeach; ?>
                        </div>

                        <p style="margin-top:15px;">
                            <a href="/details/<?php echo $type; ?>/<?php echo $paperSize; ?>/<?php echo $altOrientation; ?>/<?php echo $color; ?>" style="color:#0088cc;font-weight:500;">
                                🔄 Switch to <?php echo $altOrientation; ?> paper orientation
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Reference Table -->
                <div style="margin-top:2em;border-top:1px solid #eee;padding-top:1.5em;">
                    <h4>For reference here is a list and description of all the sizes:</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Letter</th>
                                <td>The 'letter' paper size is the most common size paper used in the U.S. It's 8.5 inches wide by 11 inches tall.</td>
                            </tr>
                            <tr>
                                <th>A4</th>
                                <td>A4 paper is the most common international paper size. It's 210 mm by 297 mm.</td>
                            </tr>
                            <tr>
                                <th>11x17</th>
                                <td>Tabloid paper is the size of two standard 'letter' size papers side by side (11x17 inches).</td>
                            </tr>
                            <tr>
                                <th>Legal</th>
                                <td>Legal size paper is 8.5 inches by 14 inches (3 inches longer than Letter).</td>
                            </tr>
                            <tr>
                                <th>A3</th>
                                <td>A3 paper is like putting two A4 papers side by side. It's 420 mm by 297 mm.</td>
                            </tr>
                            <tr>
                                <th>A2</th>
                                <td>A2 paper is the size of 2 A3 papers put together. It's 420 mm by 594 mm.</td>
                            </tr>
                            <tr>
                                <th>Poster</th>
                                <td>Poster size paper is 24 inches wide by 36 inches tall.</td>
                            </tr>
                            <tr>
                                <th>Movie Poster</th>
                                <td>Movie poster size is 27x41 inches.</td>
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
