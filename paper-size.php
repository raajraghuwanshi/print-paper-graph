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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        main: '#0f172a',
                        surface: 'rgba(30, 41, 59, 0.7)',
                        surfaceHover: 'rgba(30, 41, 59, 0.9)',
                        accent: '#0ea5e9',
                        accentHover: '#0284c7',
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderHighlight: 'rgba(14, 165, 233, 0.5)'
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-main text-slate-50 font-sans min-h-screen bg-fixed leading-relaxed m-0 p-0">
    <div class="max-w-[1700px] mx-auto px-[40px] pb-[40px] max-[900px]:px-[15px] max-[900px]:pb-[30px]">
        <!-- Header -->
        <header class="bg-[#0f172a]/60 backdrop-blur-md border-b border-borderColor py-6 mb-16 text-center sticky top-0 z-50">
            <a href="/" class="text-[2.2rem] font-bold tracking-tight bg-gradient-to-br from-sky-400 to-indigo-400 bg-clip-text text-transparent hover:opacity-80 transition-opacity">Print-Graph-Paper.com</a>
        </header>

        <div class="flex flex-nowrap gap-10 max-[900px]:gap-5">
            <!-- Left Ad Skyscraper -->
            <div class="w-[250px] shrink-0 sticky top-[120px] h-max max-[1250px]:hidden">
                <div class="bg-white/5 border border-dashed border-white/10 rounded-2xl h-[600px] flex items-center justify-center text-slate-400 text-sm text-center p-5">
                    <span>Advertisement<br>Left Skyscraper</span>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 min-w-0">
                <!-- Top Advertisement -->
                <div class="mb-10 text-center">
                    <div class="h-[90px] w-full max-w-[970px] mx-auto bg-white/5 border border-dashed border-white/10 rounded-xl flex items-center justify-center text-slate-400 text-sm">
                        <span>Advertisement<br>Top Banner</span>
                    </div>
                </div>

                <!-- Small Page Header -->
                <div class="text-center mb-12">
                    <h1 class="text-[2.2rem] max-[900px]:text-[2.4rem] font-bold m-0 mb-1 bg-gradient-to-r from-slate-50 to-slate-400 bg-clip-text text-transparent"><?php echo $sizeLabel; ?></h1>
                    <p class="text-[1.1rem] text-slate-400 max-w-[650px] mx-auto">
                        Browse all available graph papers formatted specifically for this paper size.
                    </p>
                </div>
                
                <div class="grid grid-cols-[repeat(auto-fill,minmax(320px,1fr))] gap-[30px] max-[900px]:grid-cols-1">
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
                    <a href="/details/<?php echo $tKey; ?>/<?php echo $size; ?>" class="bg-surface hover:bg-surfaceHover border border-borderColor hover:border-borderHighlight rounded-2xl p-[30px] flex flex-col no-underline relative overflow-hidden transition-all duration-400 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.5),0_0_20px_rgba(14,165,233,0.15)] group">
                        <div class="flex justify-center mb-6 relative z-10">
                            <img class="w-[150px] h-[190px] object-cover border border-white/20 rounded-lg bg-white shadow-[0_10px_20px_rgba(0,0,0,0.4)] transition-transform duration-400 group-hover:scale-105 group-hover:rotate-3 group-hover:shadow-[0_15px_30px_rgba(0,0,0,0.5)]" src="/thumbnail.php?type=<?php echo $tKey; ?>" alt="<?php echo $tName; ?>">
                        </div>
                        <div class="flex-grow flex flex-col relative z-10">
                            <h3 class="m-0 mb-3 text-[1.5rem] font-semibold text-slate-50"><?php echo $tName; ?></h3>
                            <p class="m-0 mb-6 text-slate-400 text-[1rem] leading-relaxed flex-grow">
                                Printable <?php echo $tName; ?> sized for <?php echo strtoupper($size); ?>.
                            </p>
                            <span class="inline-flex items-center gap-2 font-semibold text-sky-500 mt-auto group-hover:text-sky-400 transition-colors">View details<span class="transition-transform group-hover:translate-x-1.5">→</span></span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right Ad Skyscraper -->
            <div class="w-[250px] shrink-0 sticky top-[120px] h-max max-[1250px]:hidden">
                <div class="bg-white/5 border border-dashed border-white/10 rounded-2xl h-[600px] flex items-center justify-center text-slate-400 text-sm text-center p-5">
                    <span>Advertisement<br>Right Skyscraper</span>
                </div>
            </div>
        </div>

        <div class="text-center mt-20 pt-10 border-t border-white/10 text-slate-400 text-[0.95rem]">
            &copy; <?php echo date('Y'); ?> print-graph-paper.com. All rights reserved.
            <a href="/privacy" class="text-sky-500 no-underline ml-4 hover:underline">Privacy Policy</a>
        </div>
    </div>
</body>
</html>
