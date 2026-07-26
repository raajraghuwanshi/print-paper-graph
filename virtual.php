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
                    <h1 style="font-size: 2.2rem; font-weight: 700; margin: 0 0 0.3em 0; background: linear-gradient(to right, #f8fafc, #94a3b8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Virtual Workspace</h1>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 650px; margin: 0 auto;">
                        Draw lines, write text notes, and print your virtual graph paper.
                    </p>
                </div>

                <!-- Virtual Workspace UI -->
                <div class="virtual-workspace">
                    <div class="virtual-controls-row">
                        <div class="btn-group" style="display:flex; gap:10px;">
                            <button id="draw-write-tool" class="btn btn-primary" style="padding: 10px 20px;">Draw / Write</button>
                            <button id="erase-tool" class="btn btn-default" style="padding: 10px 20px;">Erase</button>
                        </div>
                        <div style="display:flex; gap:10px; flex-wrap:wrap; justify-content:center;">
                            <button id="undo" class="btn btn-default" style="padding: 10px 15px;">↩️ Undo</button>
                            <button id="print" class="btn btn-primary" style="padding: 10px 15px;">🖨️ Print</button>
                            <button id="downloadImage" class="btn btn-default" style="padding: 10px 15px;">📥 Download</button>
                            <button id="eraseAll" class="btn btn-danger" style="background: rgba(239, 68, 68, 0.1); border-color: transparent; color: #ef4444; padding: 10px 15px;">🗑️ Clear All</button>
                        </div>
                    </div>

                    <div style="margin-bottom: 25px; color: var(--text-secondary); font-size: 1.05rem; text-align: center;">
                        <span id="tool-description">Click and drag to draw lines. Click to write text.</span>
                    </div>

                    <!-- Canvas Component -->
                    <div class="canvas-wrapper">
                        <canvas id="paper" width="700" height="900"></canvas>
                        <div id="current_coordinates_container">
                            Current coordinates: <span id="current_coordinates" style="color: var(--accent-primary); font-weight:600;">(0, 0)</span>
                            <span id="line_length" style="margin-left: 15px;"></span>
                        </div>
                        <input id="textInput" style="position:fixed; display:none; background:rgba(15,23,42,0.9); border:1px solid #0ea5e9; padding:8px 16px; border-radius:8px; outline:none; color:#f8fafc; font-family:var(--font-family); font-size:1rem; z-index:1000; box-shadow:0 10px 30px rgba(0,0,0,0.6);" placeholder="Type text & hit Enter">
                    </div>
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

    <script src="/js/virtual-paper.js"></script>
</body>
</html>
