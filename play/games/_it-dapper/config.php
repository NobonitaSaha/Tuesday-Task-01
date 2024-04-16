<?php
/************************************
 * Site-specific configuration
 ***********************************/
define('DEV_MODE', 0);
define('CURRENT_DOMAIN', 'kidlygames.com');
define('TITLE', "Top 10 i migliori casinò online del 2023");
define('COUNTRY_ISO', 'IT');
define('BASE_URL', '/games/it-dapper');
define('OFFER_POS_PARAM', 'offerPos');

define('ENABLE_REDTRACK', 1);
define('REDTRACK_CAMPAIGN_ID', '65eff4bab2e18b0001584737');

define('ENABLE_GOOGLE_AW', 1);
define('GOOGLE_AW_ID', '');
define('GOOGLE_AW_CLICK_EVENT_ID', '');

define('ENABLE_CLICKCEASE', 1);

/**
 * @return array
 */
function configureOffers()
{
    /*********************
     * Parse offers/offers.csv file to get offers
     ********************/
    $offers = getOffersFromCsv();

    /*********************
     * Offer row options
     ********************/
    $rowOpts = [
        [
            'badge' => 'Selezione n. 1',
            'stars' => 5,
            'rating' => 9.9,
            'votes' => 9304,
        ],
        [
            'badge' => 'popolare in Italia',
            'stars' => 5,
            'rating' => 9.8,
            'votes' => 8288,
        ],
        [
            'badge' => 'Pagamenti veloci',
            'stars' => 5,
            'rating' => 9.7,
            'votes' => 7582,
        ],
        [
            'badge' => 'Selezione del giocatore',
            'stars' => 5,
            'rating' => 9.6,
            'votes' => 7214,
        ],
        [
            'badge' => '',
            'stars' => 4.5,
            'rating' => 9.5,
            'votes' => 6256,
        ],
        [
            'badge' => '',
            'stars' => 4.5,
            'rating' => 9.4,
            'votes' => 5101,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 9.2,
            'votes' => 4965,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 9.0,
            'votes' => 3860,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.9,
            'votes' => 2954,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.7,
            'votes' => 1689,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.6,
            'votes' => 1445,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.5,
            'votes' => 1249,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.4,
            'votes' => 986,
        ],
        [
            'badge' => '',
            'stars' => 4,
            'rating' => 8.3,
            'votes' => 857,
        ],
        [
            'badge' => '',
            'stars' => 3.5,
            'rating' => 8.3,
            'votes' => 757,
        ],
    ];

    return [$offers, $rowOpts];
}