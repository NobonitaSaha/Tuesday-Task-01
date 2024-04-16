<?php
/************************************
 * Site-specific configuration
 ***********************************/
define('CURRENT_DOMAIN', 'kidlygames.com');
define('TITLE', 'Top 10 Casinos Online');
define('COUNTRY_ISO', 'IT');
define('BASE_URL', '/play/games/it-dan2_b');
define('OFFER_POS_PARAM', 'offerPos');

define('ENABLE_REDTRACK', 1);
define('REDTRACK_CAMPAIGN_ID', '65eff4bab2e18b0001584737');

define('ENABLE_GOOGLE_AW', 0);
define('GOOGLE_AW_ID', '');
define('GOOGLE_AW_CLICK_EVENT_ID', '');

define('ENABLE_CLICKCEASE', 1);

/**
 * @return array
 */
function configureOffers()
{
    $offers = getOffersFromCsv();

    /*********************
     * Offer row options
     ********************/
    $rowOpts = [
        [
            'badge' => 'LE MIGLIORI SELEZIONI',
            'stars' => 5,
            'rating' => 9.9,
            'votes' => 5304,
        ],
        [
            'badge' => 'ENTUSIASMANTE E DI TENDENZA',
            'stars' => 5,
            'rating' => 9.8,
            'votes' => 4288,
        ],
        [
            'badge' => 'PAGAMENTI RAPIDI',
            'stars' => 5,
            'rating' => 9.7,
            'votes' => 3582,
        ],
        [
            'badge' => 'LA SCELTA DEI GIOCATORI',
            'stars' => 5,
            'rating' => 9.6,
            'votes' => 2214,
        ],
        [
            'badge' => '',
            'stars' => 4.5,
            'rating' => 9.5,
            'votes' => 1256,
        ],
        [
            'badge' => '',
            'stars' => 4.5,
            'rating' => 9.4,
            'votes' => 1101,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 9.2,
            'votes' => 965,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 9.0,
            'votes' => 860,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.9,
            'votes' => 754,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.7,
            'votes' => 689,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.6,
            'votes' => 645,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.5,
            'votes' => 549,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.4,
            'votes' => 486,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.3,
            'votes' => 457,
        ],
        [
            'badge' => '',
            'stars' => 3.5,
            'rating' => 8.3,
            'votes' => 357,
        ],
    ];

    return [$offers, $rowOpts];
}