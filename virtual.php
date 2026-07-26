<?php
$title = "Virtual Online Graph Paper - Premium Workspace";
$description = "Free easy to use virtual graph paper. Draw lines, write notes, undo if you need to, and print. Simple, easy, interactive online graph paper.";
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
                    <h1 class="text-[2.2rem] max-[900px]:text-[2.4rem] font-bold m-0 mb-1 bg-gradient-to-r from-slate-50 to-slate-400 bg-clip-text text-transparent">Virtual Workspace</h1>
                    <p class="text-[1.1rem] text-slate-400 max-w-[650px] mx-auto">
                        Draw lines, write text notes, and print your virtual graph paper.
                    </p>
                </div>

                <!-- Virtual Workspace UI -->
                <div class="bg-surface backdrop-blur-md rounded-[24px] border border-borderColor p-10 flex flex-col items-center shadow-[0_20px_50px_rgba(0,0,0,0.3)] max-[900px]:p-5">
                    <div class="flex justify-between w-full max-w-[700px] mb-8 items-center max-[900px]:flex-col max-[900px]:gap-4">
                        <div class="flex gap-2.5">
                            <button id="draw-write-tool" class="inline-flex items-center justify-center px-5 py-2.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-transparent bg-gradient-to-br from-sky-500 to-sky-600 text-white shadow-[0_8px_20px_rgba(14,165,233,0.3)] hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(14,165,233,0.5)]">Draw / Write</button>
                            <button id="erase-tool" class="inline-flex items-center justify-center px-5 py-2.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-borderColor bg-white/5 text-slate-50 hover:bg-white/10 hover:border-white/30 hover:-translate-y-1">Erase</button>
                        </div>
                        <div class="flex gap-2.5 flex-wrap justify-center">
                            <button id="undo" class="inline-flex items-center justify-center px-4 py-2.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-borderColor bg-white/5 text-slate-50 hover:bg-white/10 hover:border-white/30 hover:-translate-y-1">↩️ Undo</button>
                            <button id="print" class="inline-flex items-center justify-center px-4 py-2.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-transparent bg-gradient-to-br from-sky-500 to-sky-600 text-white shadow-[0_8px_20px_rgba(14,165,233,0.3)] hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(14,165,233,0.5)]">🖨️ Print</button>
                            <button id="downloadImage" class="inline-flex items-center justify-center px-4 py-2.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-borderColor bg-white/5 text-slate-50 hover:bg-white/10 hover:border-white/30 hover:-translate-y-1">📥 Download</button>
                            <button id="eraseAll" class="inline-flex items-center justify-center px-4 py-2.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-transparent bg-red-500/10 text-red-500 hover:-translate-y-1">🗑️ Clear All</button>
                        </div>
                    </div>

                    <div class="mb-6 text-slate-400 text-[1.05rem] text-center">
                        <span id="tool-description">Click and drag to draw lines. Click to write text.</span>
                    </div>

                    <!-- Canvas Component -->
                    <div class="relative w-full max-w-[700px] flex flex-col items-center">
                        <canvas id="paper" width="700" height="900" class="border-none rounded-lg bg-white shadow-[0_0_0_4px_rgba(255,255,255,0.05),0_20px_50px_rgba(0,0,0,0.6)] cursor-crosshair max-w-full h-auto"></canvas>
                        <div id="current_coordinates_container" class="w-full mt-5 text-center text-slate-400 font-mono text-[1rem]">
                            Current coordinates: <span id="current_coordinates" class="text-sky-500 font-semibold">(0, 0)</span>
                            <span id="line_length" class="ml-4"></span>
                        </div>
                        <input id="textInput" class="fixed hidden bg-[#0f172a]/90 border border-sky-500 px-4 py-2 rounded-lg outline-none text-slate-50 font-sans text-[1rem] z-[1000] shadow-[0_10px_30px_rgba(0,0,0,0.6)]" placeholder="Type text & hit Enter">
                    </div>
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

    <script src="/js/virtual-paper.js"></script>
</body>
</html>
