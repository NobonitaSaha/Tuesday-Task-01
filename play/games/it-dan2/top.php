<?php
require_once __DIR__ . '/config.php';

/**
 * Check current domain matches CURRENT_DOMAIN constant
 * @throws Exception
 */
function checkDomainOrThrow()
{
    $alwaysAllow = ['127.0.0.1:7777'];
    $actualDomain = $_SERVER['HTTP_HOST'];

    // skip if always allow
    if (in_array($actualDomain, $alwaysAllow)) {
        return;
    }

    $currentDomain = CURRENT_DOMAIN ?? null;
    if (!$currentDomain) {
        echo "Missing CURRENT_DOMAIN config option";
        throw new Exception("Missing CURRENT_DOMAIN config option");
    }

    if ($currentDomain !== $actualDomain) {
        echo "CURRENT_DOMAIN does not match the actual domain";
        throw new Exception("CURRENT_DOMAIN {$currentDomain} does not match the actual domain {$actualDomain}");
    }
}

/**
 * Protect page from direct URL access.
 * @param $currentFile
 * @param null|string $password
 * @throws Exception
 */
function zeroRedirectPageProtector($currentFile, $password = null)
{
    $currentFileReal = realpath($currentFile);
    if (!$currentFileReal) {
        throw new Exception("Could not get realpath for currentFile");
    }

    $scriptFileReal = realpath($_SERVER['SCRIPT_FILENAME']);
    if (!$currentFileReal) {
        throw new Exception("Could not get realpath for SCRIPT_FILENAME");
    }

    $isDirectUrl = $currentFileReal === $scriptFileReal;
    $isPwdAccess = $password && !empty($_GET[$password]);

    if (!$isDirectUrl || $isPwdAccess) {
        return;
    }

    header("HTTP/1.0 404 Not Found");
    die('Page Not Found');
}

/**
 * @return array
 */

function getOffersFromCsv()                                                                                     
{                                                                                                               
                                                                                                                
    $file = __DIR__ . '/offers/offers.csv';                                                                     
    $rows = array_map('str_getcsv', file($file));                                                               
    array_shift($rows);                                                                                         
    $offers = [];                                                                                               
    $pos = 0;                                                                                                   
    foreach ($rows as $row) {                                                                                   
        list($enabled, $name, $url, $image, $bonus, $forwardParams, $flag, $alt_url) = $row;                    
                                                                                                                
        if (!$enabled) {                                                                                        
            continue;                                                                                           
        }                                                                                                       
                                                                                                                
        $pos++;                                                                                                 
        $image = str_replace('{baseUrl}', BASE_URL, $image);                                                    
        $forwardParams = explode(',', $forwardParams);                                                          
        $offers[] = compact('pos', 'name', 'url', 'image', 'bonus', 'forwardParams', 'flag', 'alt_url');        
    }                                                                                                           
                                                                                                                
    return $offers;                                                                                             
}


/**
 * @return array
 */
function getOfferRows()
{
    list($offers, $rowOpts) = configureOffers();

    // check positions are ok
    checkOrThrowOfferPositions($offers);

    // sort offers
    usort($offers, function ($a, $b) {
        $aPos = $a['pos'];
        $bPos = $b['pos'];
        if ($aPos === $bPos) {
            return 0;
        }
        return ($aPos < $bPos) ? -1 : 1;
    });

    $offerRows = [];
    for ($num = 0, $length = count($offers); $num < $length; $num++) {
        $offer = $offers[$num];
        $offerRow = $rowOpts[$num];
        $offerRows[] = array_merge($offer, $offerRow);
    }

    return $offerRows;
}

/**
 * Handle offer pos redirect
 */
function handleOfferRedirect()
{
    list($offers) = configureOffers();

    // check for offer in get param, if none then continue loading page
    $pos = $_GET[OFFER_POS_PARAM] ?? null;
    if (!$pos) {
        return;
    }

    // check if offer exists, if not then ignore
    $offer = null;
    foreach ($offers as $offerCheck) {
        if ($offerCheck['pos'] == $pos) {
            $offer = $offerCheck;
            break;
        }
    }
    if (!$offer) {
        die("Offer for position <b>'{$pos}'</b> missing from offers array");
    }

    $url = createRedirectUrl($offer);
    // redirect to offer url
    //    echo '<script>document.location="' . $offer['url'] . '"</script>';
    header("Location: {$url}");
    exit;
}

/**
 * Checks offer positions are unique
 * @param $offers
 */
function checkOrThrowOfferPositions($offers)
{
    $expectKeys = ['pos', 'name', 'url'];

    $cnt = count($offers);
    for ($i = 0; $i < $cnt; $i++) {
        $offer = $offers[$i] ?? null;
        if (!$offer) {
            continue;
        }

        // check expected keys exist
        foreach ($expectKeys as $idx => $key) {
            if (!isset($offer[$key])) {
                die("Offer at array index {$idx} missing <b>'{$key}'</b>");
            }
        }

        // check offer position doesn't already exist
        for ($ii = ($i + 1); $ii < $cnt; $ii++) {
            $offerCheck = $offers[$ii] ?? null;
            if (!$offerCheck || $offerCheck['pos'] !== $offer['pos']) {
                continue;
            }
            die("Offer <b>'{$offer['name']}'</b> position conflicts with offer <b>'{$offerCheck['name']}'</b>. Cant have multiple offers with the same position.");
        }
    }
}

/**
 * compose url
 * @param $offer
 * @return string
 */
function createRedirectUrl($offer)
{
    $base = $offer['url'];
    $getParamsInclude = $offer['forwardParams'] ?? [];

    $parts = explode('?', $base, 2);
    if (empty($parts[0])) {
        return '';
    }

    // url host and path (before the '?' part)
    $url = $parts[0];

    // add querystring params from url
    $params = [];
    if (!empty($parts[1])) {
        parse_str($parts[1], $qsParams);
        $params = array_merge($params, $qsParams);
    }

    // extract $_GET params to add to final querystring
    if (count($getParamsInclude)) {
        foreach ($getParamsInclude as $paramInclude) {
            $key = $getParam = $paramInclude;

            // can pass params in as <param>=<getParam> eg. cid=gclid which will
            // grab the $_GET['gclid'] and use it with `cid` as the key
            if (strpos($paramInclude, '=') !== false) {
                list($key, $getParam) = explode('=', $paramInclude, 2);
            }

            // if param exists in URL then add to array of params
            if (isset($_GET[$getParam])) {
                $params[$key] = $_GET[$getParam];
            }
        }
    }

    // add querystring params to url base
    if (count($params)) {
        $url .= '?' . http_build_query($params);
    }

    return $url;
}

/**
 * Create offer URL
 * @param $offer
 * @return string
 */
function createOfferUrl($offer)
{
//    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '';
    $path = BASE_URL;
    $qs = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY) ?? '';
    parse_str($qs, $qs);
    $qs[OFFER_POS_PARAM] = $offer['pos'];
    $buildQs = http_build_query($qs);

    // for redtrack clickid
    if (ENABLE_REDTRACK) {
        $buildQs = 'clickid={clickid}' . ($buildQs ? "&{$buildQs}" : '');
    }

    return implode('?', [$path, $buildQs]);
}
