<?php
$size = isset($_GET['size']) ? strtolower($_GET['size']) : 'a4';

$sizeNames = [
    'letter'       => 'Letter Size (8.5" x 11")',
    'a4'           => 'A4 Size (210mm x 297mm)',
    '11x17'        => '11x17 Tabloid Size (11" x 17")',
    'legal'        => 'Legal Size (8.5" x 14")',
    'a3'           => 'A3 Size (297mm x 420mm)',
    'a2'           => 'A2 Size (420mm x 594mm)',
    'poster'       => 'Poster Size (24" x 36")',
    'movie-poster' => 'Movie Poster Size (27" x 41")'
];

$sizeLabel = isset($sizeNames[$size]) ? $sizeNames[$size] : strtoupper($size) . ' Size';

$title = "$sizeLabel Graph Paper - Free Printable Online Graph Paper";
$description = "Download and print $sizeLabel graph paper in portrait or landscape orientations.";
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
                <h1 class="header-title"><?php echo $sizeLabel; ?> Graph Paper</h1>
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
                <div class="lead-box">
                    <p class="lead-text">
                        Browse all available graph papers formatted specifically for <strong><?php echo $sizeLabel; ?></strong>.
                        Choose any grid style below to print or download.
                    </p>
                </div>

                <?php 
                $types = [
                    '5mm' => '5mm Graph Paper',
                    '1-4-inch' => '1/4" Inch Graph Paper',
                    '10-squares-per-inch' => '10 Squares Per Inch Graph Paper',
                    'dot-paper' => 'Dot Paper',
                    '10mm' => 'Centimeter Graph Paper',
                    '1-2-inch' => '1/2" Half Inch Graph Paper',
                    '1-inch' => '1" One-Inch Graph Paper',
                    'isometric' => 'Isometric Graph Paper',
                    'log' => 'Log Graph Paper',
                    'polar' => 'Polar Graph Paper'
                ];
                foreach ($types as $tKey => $tName):
                ?>
                <div class="paper-item">
                    <a href="/details/<?php echo $tKey; ?>/<?php echo $size; ?>" class="paper-thumb-link">
                        <img class="paper-thumb" src="/thumbnail.php?type=<?php echo $tKey; ?>" alt="<?php echo $tName; ?>">
                    </a>
                    <div class="paper-info">
                        <h3 class="paper-title"><a href="/details/<?php echo $tKey; ?>/<?php echo $size; ?>"><?php echo $tName; ?> (<?php echo strtoupper($size); ?>)</a></h3>
                        <p class="paper-desc">
                            Printable <?php echo $tName; ?> sized for <?php echo $sizeLabel; ?> paper. Available in portrait and landscape orientations.
                            <a href="/details/<?php echo $tKey; ?>/<?php echo $size; ?>">View details & print</a>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
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
