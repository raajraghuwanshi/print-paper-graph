<?php
$title = "Free Printable Graph Paper - Premium Tools";
$description = "Free online graph paper - any size or orientation. Cartesian, polar, log, isometric, dot paper, etc.";
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
                    <h1 class="text-[2.2rem] max-[900px]:text-[2.4rem] font-bold m-0 mb-1 bg-gradient-to-r from-slate-50 to-slate-400 bg-clip-text text-transparent">Design with Precision.</h1>
                    <p class="text-[1.1rem] text-slate-400 max-w-[650px] mx-auto">
                        Download premium, precise, and fully customizable graph paper in PDF or SVG formats. Choose from standard cartesian, isometric, polar, and more for your next big project.
                    </p>
                </div>
                
                <!-- Graph Paper Items Catalog -->
                <div class="grid grid-cols-[repeat(auto-fill,minmax(320px,1fr))] gap-[30px] max-[900px]:grid-cols-1">

                    <!-- Paper Cards -->
                    <?php 
                    $papers = [
                        ['type' => '5mm', 'name' => '5mm Graph Paper', 'desc' => 'Standard Cartesian system graphing paper with 5mm spacing. Ideal for engineering and precision drafting.'],
                        ['type' => '1-4-inch', 'name' => '1/4" Inch Graph Paper', 'desc' => 'Also known as Quad or quadrille paper. Four boxes make up an inch. Standard for math and graphing.'],
                        ['type' => 'virtual', 'name' => 'Virtual Online Graph Paper', 'desc' => 'Draw lines and write text directly in your browser. Fully undoable and printable right from your screen.', 'url' => '/virtual-graph-paper', 'promo' => true],
                        ['type' => '10-squares-per-inch', 'name' => '10 Squares / Inch', 'desc' => 'Provides a nice even number to work with that is both manageable and precise for inch-based tasks.'],
                        ['type' => 'dot-paper', 'name' => 'Dot Paper', 'desc' => 'Features dots instead of lines. A perfect, subtle alternative for designers and UI/UX wireframing.'],
                        ['type' => '10mm', 'name' => 'Centimeter Graph Paper', 'desc' => 'Standard graph paper with lines exactly 1 centimeter apart. Great for metric drafting.'],
                        ['type' => '1-2-inch', 'name' => '1/2" Half Inch Graph Paper', 'desc' => 'The half inch grid easily functions as a two-dimensional ruler for basic scaling and plotting.'],
                        ['type' => '1-inch', 'name' => '1" One-Inch Graph Paper', 'desc' => 'Large grid size useful for measuring, educational purposes, or presentations viewed from afar.'],
                        ['type' => 'isometric', 'name' => 'Isometric Graph Paper', 'desc' => 'Features lines representing three dimensions (length, width, height) for 3D drafting and sketches.'],
                        ['type' => 'log', 'name' => 'Logarithmic Graph Paper', 'desc' => 'Used to plot exponentially changing data. Compresses large ranges for clear visualization.'],
                        ['type' => 'polar', 'name' => 'Polar Graph Paper', 'desc' => 'Plot points using angles and distances from a fixed point rather than a standard Cartesian grid.']
                    ];
                    
                    foreach ($papers as $paper) {
                        $url = isset($paper['url']) ? $paper['url'] : "/details/" . $paper['type'];
                        $isPromo = isset($paper['promo']) && $paper['promo'];
                        
                        $cardClass = "bg-surface hover:bg-surfaceHover border border-borderColor hover:border-borderHighlight rounded-2xl p-[30px] flex flex-col no-underline relative overflow-hidden transition-all duration-400 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.5),0_0_20px_rgba(14,165,233,0.15)] group";
                        
                        if ($isPromo) {
                            $cardClass .= " bg-gradient-to-br from-sky-500/10 to-violet-500/10 border-sky-500/30";
                        }
                        
                        echo '<a href="' . $url . '" class="' . $cardClass . '">';
                        echo '<div class="flex justify-center mb-6 relative z-10">';
                        
                        if ($isPromo) {
                            echo '<div class="w-[150px] h-[190px] rounded-lg bg-gradient-to-br from-sky-500 to-blue-500 flex items-center justify-center text-white font-bold text-center text-xl shadow-[0_10px_20px_rgba(14,165,233,0.4)] transition-transform duration-400 group-hover:scale-105 group-hover:rotate-3 group-hover:shadow-[0_15px_30px_rgba(0,0,0,0.5)]">Virtual<br>Canvas</div>';
                        } else {
                            echo '<img class="w-[150px] h-[190px] object-cover border border-white/20 rounded-lg bg-white shadow-[0_10px_20px_rgba(0,0,0,0.4)] transition-transform duration-400 group-hover:scale-105 group-hover:rotate-3 group-hover:shadow-[0_15px_30px_rgba(0,0,0,0.5)]" src="/thumbnail.php?type=' . $paper['type'] . '" alt="' . $paper['name'] . ' Thumbnail">';
                        }
                        
                        echo '</div>';
                        
                        echo '<div class="flex-grow flex flex-col relative z-10">';
                        
                        $titleColor = $isPromo ? 'text-sky-400' : 'text-slate-50';
                        echo '<h3 class="m-0 mb-3 text-[1.5rem] font-semibold ' . $titleColor . '">' . $paper['name'] . '</h3>';
                        echo '<p class="m-0 mb-6 text-slate-400 text-[1rem] leading-relaxed flex-grow">' . $paper['desc'] . '</p>';
                        
                        $actionColor = $isPromo ? 'text-sky-400' : 'text-sky-500';
                        $actionText = $isPromo ? 'Launch Workspace' : 'View details';
                        echo '<span class="inline-flex items-center gap-2 font-semibold ' . $actionColor . ' mt-auto group-hover:text-sky-400 transition-colors">' . $actionText . '<span class="transition-transform group-hover:translate-x-1.5">→</span></span>';
                        
                        echo '</div>';
                        echo '</a>';
                    }
                    ?>

                </div> <!-- End Paper Grid -->

                <!-- Educational & Size Filter Footer Section -->
                <div class="mt-16 border-t border-white/10 pt-12">
                    <section id="byPaperSize" class="mb-8">
                        <h3 class="text-[1.8rem] mb-4">Looking for a particular paper size?</h3>
                        <p class="text-slate-400 max-w-[800px] text-[1.1rem]">
                            Every type of graph paper we offer comes in different paper sizes and orientations. Explore our dedicated size pages:
                        </p>
                        <div class="flex flex-wrap gap-3 mt-6 max-[900px]:justify-center">
                            <?php
                            $sizes = ['A4', '11x17', 'Legal', 'A3', 'A2', 'Poster', 'Movie Poster'];
                            foreach($sizes as $s) {
                                $slug = strtolower(str_replace(' ', '-', $s));
                                echo '<a href="/paper-size/' . $slug . '" class="px-5 py-2.5 rounded-full text-[0.95rem] font-medium no-underline border border-borderColor bg-white/5 text-slate-400 transition-colors hover:border-sky-500 hover:text-white hover:bg-sky-500/10">' . $s . ' Size</a>';
                            }
                            ?>
                        </div>
                    </section>
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
