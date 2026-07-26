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

                <!-- Small Page Header -->
                <div style="text-align: center; margin-bottom: 3em;">
                    <h1 style="font-size: 2.2rem; font-weight: 700; margin: 0 0 0.3em 0; background: linear-gradient(to right, #f8fafc, #94a3b8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"><?php echo $sizeLabel; ?></h1>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 650px; margin: 0 auto;">
                        Browse all available graph papers formatted specifically for this paper size.
                    </p>
                </div>
                <div class="paper-grid">
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
                    <a href="/details/<?php echo $tKey; ?>/<?php echo $size; ?>" class="paper-card">
                        <div class="paper-card-header">
                            <img class="paper-thumb" src="/thumbnail.php?type=<?php echo $tKey; ?>" alt="<?php echo $tName; ?>">
                        </div>
                        <div class="paper-info">
                            <h3 class="paper-title"><?php echo $tName; ?></h3>
                            <p class="paper-desc">
                                Printable <?php echo $tName; ?> sized for <?php echo strtoupper($size); ?>.
                            </p>
                            <span class="paper-action">View details</span>
                        </div>
                    </a>
                    <?php endforeach; ?>
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
