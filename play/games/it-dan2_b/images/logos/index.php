<?php
require_once __DIR__ . '/../../top.php';

$scDomain = getenv('SCADMIN_DOMAIN') ;
if (strpos($scDomain, 'sc1') === 0) {
    $baseDir = "/app/domains/{$scDomain}/storage/logos";
} else {
    $baseDir = "/app/domains/{$scDomain}/storage/logos";
}

$allowedReferrerHosts = ['127.0.0.1', getenv('SCADMIN_DOMAIN')];
$referrerHost = parse_url($_SERVER['HTTP_REFERER'] ?? '', PHP_URL_HOST);
$isScAdmin = in_array($referrerHost, $allowedReferrerHosts);

$logo = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if (!$logo) {
    header("Pragma: no-cache");
    header("HTTP/1.0 404 Not Found");
    die();
}

//preg_match('/(^[\w+-]+\.\w+)(\?.*)?$/i', $logo, $match);
preg_match('/^([\w-]+)\.(png|jpe?g|gif|webp|svg|tiff?|ico)$/i', $logo, $match);
$logo = $match[0] ?? '';
if (!$logo) {
    header("Pragma: no-cache");
    header("HTTP/1.0 404 Not Found");
    die();
}

// check if logo is enabled in offers
if (!$isScAdmin) {
    $offers = getOfferRows();
    $offerFound = false;
    foreach ($offers as $offer) {
        if (preg_match("/{$logo}$/", $offer['image'])) {
            $offerFound = true;
            break;
        }
    }

    // offer not found
    if (!$offerFound) {
        header("Pragma: no-cache");
        header("HTTP/1.0 404 Not Found");
        die();
    }
}

$file = "{$baseDir}/{$logo}";
if (!file_exists($file)) {
    header("Pragma: no-cache");
    header("HTTP/1.0 404 Not Found");
    die();
}

$mimes = [
    'png' => 'image/png',
    'jpe' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'gif' => 'image/gif',
    'bmp' => 'image/bmp',
    'ico' => 'image/vnd.microsoft.icon',
    'tiff' => 'image/tiff',
    'tif' => 'image/tiff',
    'svg' => 'image/svg+xml',
    'svgz' => 'image/svg+xml',
];

$ext = strtolower(pathinfo($logo, PATHINFO_EXTENSION));
$mime = $mimes[$ext] ?? 'image/png';

$lastModified = date(DATE_RFC2822, filemtime($file));
$data = file_get_contents($file);
$len = strlen($data);

// write file to dir so it doesn't have to run readfile next time
file_put_contents(__DIR__ . "/{$logo}", $data);

//print_r(compact('lastModified','data','len'));exit;
header("Content-type: {$mime}");
header("Content-Length: {$len}");
header("Last-Modified: {$lastModified}");
echo file_get_contents($file);