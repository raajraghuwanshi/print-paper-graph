<?php
$title = "Privacy Policy - print-graph-paper.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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
            <div class="flex-1 min-w-0 max-w-[800px] mx-auto">
                <div class="bg-surface backdrop-blur-md border border-borderColor rounded-3xl p-12 flex flex-col mb-12 shadow-[0_20px_50px_rgba(0,0,0,0.3)] max-[900px]:p-8">
                    <h2 class="text-[2.5rem] mt-0 bg-gradient-to-br from-white to-slate-400 bg-clip-text text-transparent mb-6 font-bold leading-tight">Privacy Policy</h2>
                    
                    <p class="text-slate-400 text-[1.1rem] leading-relaxed mb-6">At print-graph-paper.com, the privacy of our visitors is of extreme importance to us. This privacy policy document outlines the types of personal information received and collected by print-graph-paper.com and how it is used.</p>
                    
                    <h3 class="text-slate-50 mt-8 mb-4 text-[1.5rem] font-semibold">Log Files</h3>
                    <p class="text-slate-400 text-[1.1rem] leading-relaxed mb-6">Like many other Web sites, print-graph-paper.com makes use of log files. The information inside the log files includes internet protocol (IP) addresses, type of browser, Internet Service Provider (ISP), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information.</p>
                    
                    <h3 class="text-slate-50 mt-8 mb-4 text-[1.5rem] font-semibold">Cookies and Web Beacons</h3>
                    <p class="text-slate-400 text-[1.1rem] leading-relaxed mb-6">print-graph-paper.com does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.</p>

                    <p class="mt-12 text-center">
                        <a href="/" class="inline-flex items-center justify-center px-7 py-3.5 font-sans text-[1.05rem] font-semibold rounded-xl cursor-pointer no-underline transition-all duration-300 border border-transparent bg-gradient-to-br from-sky-500 to-sky-600 text-white shadow-[0_8px_20px_rgba(14,165,233,0.3)] hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(14,165,233,0.5)]">Return to Home</a>
                    </p>
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
