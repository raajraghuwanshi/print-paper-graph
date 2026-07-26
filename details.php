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

                <div class="bg-surface backdrop-blur-md border border-borderColor rounded-3xl p-12 flex gap-12 mb-12 shadow-[0_20px_50px_rgba(0,0,0,0.3)] max-[900px]:flex-col max-[900px]:items-center max-[900px]:text-center max-[900px]:p-8">
                    <div class="shrink-0">
                        <img class="w-[260px] h-[330px] border border-white/20 rounded-xl shadow-[0_20px_40px_rgba(0,0,0,0.5)] bg-white object-cover" src="/thumbnail.php?type=<?php echo $type; ?>" alt="<?php echo $item['name']; ?> Preview">
                    </div>
                    <div class="flex-1">
                        <h2 class="mt-0 text-[2.8rem] bg-gradient-to-br from-white to-slate-400 bg-clip-text text-transparent mb-5 leading-tight font-bold"><?php echo $item['name']; ?></h2>
                        <p class="text-slate-400 text-[1.15rem] leading-relaxed mb-5"><?php echo $item['desc']; ?></p>
                        <p class="text-slate-400 text-[1.15rem] leading-relaxed mb-5">
                            Designed for <strong class="text-slate-50"><?php echo ucfirst($paperSize); ?></strong> size paper in the <strong class="text-slate-50"><?php echo $orientation; ?></strong> orientation.
                        </p>
                        <p class="text-slate-400 text-[1.15rem] leading-relaxed mb-5">
                            Select from the options below, print it directly, open it in a new tab, or download it as a high-quality PDF.
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap gap-4 my-8 max-[900px]:justify-center">
                            <a class="inline-flex items-center justify-center px-7 py-3.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-transparent bg-gradient-to-br from-sky-500 to-sky-600 text-white shadow-[0_8px_20px_rgba(14,165,233,0.3)] hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(14,165,233,0.5)]" href="<?php echo $genBaseUrl; ?>&act=print" target="_blank">Print Document</a>
                            <a class="inline-flex items-center justify-center px-7 py-3.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-borderColor bg-white/5 text-slate-50 hover:bg-white/10 hover:border-white/30 hover:-translate-y-1" href="<?php echo $genBaseUrl; ?>&act=download">Download PDF</a>
                            <a class="inline-flex items-center justify-center px-7 py-3.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-borderColor bg-white/5 text-slate-50 hover:bg-white/10 hover:border-white/30 hover:-translate-y-1" href="<?php echo $genBaseUrl; ?>&act=open" target="_blank">Open in Browser</a>
                        </div>

                        <!-- Choose Paper Size -->
                        <div class="mt-8">
                            <h4 class="m-0 mb-4 text-[1.1rem] text-slate-50 font-semibold">Paper Size</h4>
                            <div class="flex flex-wrap gap-3 max-[900px]:justify-center">
                                <?php foreach ($sizes as $sKey => $sLabel): ?>
                                    <?php 
                                        $btnClass = ($sKey === $paperSize) ? 'bg-sky-500 text-white border-sky-500 shadow-[0_0_20px_rgba(14,165,233,0.4)]' : 'bg-white/5 text-slate-400 border-borderColor hover:border-sky-500 hover:text-slate-50 hover:bg-sky-500/10';
                                        $url = "/details/$type/$sKey/$orientation/$color";
                                    ?>
                                    <a href="<?php echo $url; ?>" class="px-5 py-2.5 rounded-full text-[0.95rem] font-medium no-underline border transition-all duration-200 <?php echo $btnClass; ?>"><?php echo $sLabel; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Choose Line Color -->
                        <div class="mt-8">
                            <h4 class="m-0 mb-4 text-[1.1rem] text-slate-50 font-semibold">Line Color</h4>
                            <div class="flex flex-wrap gap-3 max-[900px]:justify-center">
                                <?php foreach ($colors as $cKey => $cLabel): ?>
                                    <?php 
                                        $btnClass = ($cKey === $color) ? 'bg-sky-500 text-white border-sky-500 shadow-[0_0_20px_rgba(14,165,233,0.4)]' : 'bg-white/5 text-slate-400 border-borderColor hover:border-sky-500 hover:text-slate-50 hover:bg-sky-500/10';
                                        $url = "/details/$type/$paperSize/$orientation/$cKey";
                                    ?>
                                    <a href="<?php echo $url; ?>" class="px-5 py-2.5 rounded-full text-[0.95rem] font-medium no-underline border transition-all duration-200 <?php echo $btnClass; ?>"><?php echo $cLabel; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <a href="/details/<?php echo $type; ?>/<?php echo $paperSize; ?>/<?php echo $altOrientation; ?>/<?php echo $color; ?>" class="inline-flex items-center gap-2 text-sky-500 font-medium mt-5 text-[1.05rem] no-underline hover:underline">
                            🔄 Switch to <?php echo $altOrientation; ?> orientation
                        </a>
                    </div>
                </div>

                <!-- Reference Table -->
                <div class="bg-surface backdrop-blur-md rounded-2xl border border-borderColor overflow-hidden mt-8 shadow-[0_10px_30px_rgba(0,0,0,0.2)]">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="p-5 px-6 border-b border-borderColor text-left bg-white/5 font-semibold text-slate-50">Size Name</th>
                                <th class="p-5 px-6 border-b border-borderColor text-left bg-white/5 font-semibold text-slate-50">Description / Dimensions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="p-5 px-6 border-b border-borderColor text-left font-semibold text-slate-50">Letter</th>
                                <td class="p-5 px-6 border-b border-borderColor text-left text-slate-400 leading-relaxed">The most common U.S. paper size (8.5" × 11").</td>
                            </tr>
                            <tr>
                                <th class="p-5 px-6 border-b border-borderColor text-left font-semibold text-slate-50">A4</th>
                                <td class="p-5 px-6 border-b border-borderColor text-left text-slate-400 leading-relaxed">The most common international paper size (210mm × 297mm).</td>
                            </tr>
                            <tr>
                                <th class="p-5 px-6 border-b border-borderColor text-left font-semibold text-slate-50">11x17</th>
                                <td class="p-5 px-6 border-b border-borderColor text-left text-slate-400 leading-relaxed">Tabloid paper size (11" × 17").</td>
                            </tr>
                            <tr>
                                <th class="p-5 px-6 border-b border-borderColor text-left font-semibold text-slate-50">Legal</th>
                                <td class="p-5 px-6 border-b border-borderColor text-left text-slate-400 leading-relaxed">Legal size paper (8.5" × 14").</td>
                            </tr>
                            <tr>
                                <th class="p-5 px-6 border-b border-borderColor text-left font-semibold text-slate-50">A3</th>
                                <td class="p-5 px-6 border-b border-borderColor text-left text-slate-400 leading-relaxed">Twice the size of A4 (420mm × 297mm).</td>
                            </tr>
                            <tr>
                                <th class="p-5 px-6 border-b border-borderColor text-left font-semibold text-slate-50">A2</th>
                                <td class="p-5 px-6 border-b border-borderColor text-left text-slate-400 leading-relaxed">Twice the size of A3 (420mm × 594mm).</td>
                            </tr>
                            <tr>
                                <th class="p-5 px-6 border-b border-borderColor text-left font-semibold text-slate-50">Poster</th>
                                <td class="p-5 px-6 border-b border-borderColor text-left text-slate-400 leading-relaxed">Standard poster size (24" × 36").</td>
                            </tr>
                            <tr>
                                <th class="p-5 px-6 text-left font-semibold text-slate-50">Movie Poster</th>
                                <td class="p-5 px-6 text-left text-slate-400 leading-relaxed">Standard movie poster size (27" × 41").</td>
                            </tr>
                        </tbody>
                    </table>
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
