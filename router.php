<?php
/**
 * PHP Built-in Server Router for print-graph-paper clone
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Serve static assets directly if file exists
$filePath = __DIR__ . $uri;
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    return false;
}

// Route mapping
if ($uri === '/' || $uri === '/index.php') {
    require __DIR__ . '/index.php';
    exit;
}

if ($uri === '/virtual-graph-paper') {
    require __DIR__ . '/virtual.php';
    exit;
}

if ($uri === '/privacy' || $uri === '/Default/PrivacyPolicy') {
    require __DIR__ . '/privacy.php';
    exit;
}

if (strpos($uri, '/paper-size/') === 0) {
    $parts = explode('/', trim($uri, '/'));
    if (isset($parts[1])) {
        $_GET['size'] = $parts[1];
    }
    require __DIR__ . '/paper-size.php';
    exit;
}

if (strpos($uri, '/details') === 0) {
    $parts = explode('/', trim($uri, '/')); // ['details', '5mm', 'a4', 'portrait', 'blue']
    if (isset($parts[1])) $_GET['type'] = $parts[1];
    if (isset($parts[2])) $_GET['paperSize'] = $parts[2];
    if (isset($parts[3])) $_GET['orientation'] = $parts[3];
    if (isset($parts[4])) $_GET['color'] = $parts[4];
    require __DIR__ . '/details.php';
    exit;
}

if (strpos($uri, '/Default/DownloadGraph') === 0) {
    require __DIR__ . '/generator.php';
    exit;
}

if (strpos($uri, '/Default/Thumbnail') === 0 || strpos($uri, '/Default/LogThumbnail') === 0 || $uri === '/thumbnail.php') {
    require __DIR__ . '/thumbnail.php';
    exit;
}

if ($uri === '/generator.php') {
    require __DIR__ . '/generator.php';
    exit;
}

// Fallback to index
require __DIR__ . '/index.php';
