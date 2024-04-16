<?php
error_reporting(0);
ini_set('display_errors', 0);

/** setup all global variables **/

/**
 * - event_type: signup, click or conversion 
 */

global $timezone, $conversionName, $event_type, $fullReport, $campaignId, $redtrackToken, $dateFrom, $dateTo;

$timezone = 'America/New_York';
$campaignId = '65eff4bab2e18b0001584737'; 
$redtrackToken = 'lbOXNPezy1vnHzDxHf9o';
$conversionName = 'kidly';
$event_type = 'conversion';

                                                                                                                                                                                                                 
$fullReport = $_GET['fullReport'] ?? '';

if (!$fullReport) {                                                                                                     
                $dateFrom = (new DateTime('now', new DateTimeZone($GLOBALS['timezone'])))->modify('-2 day')->format('Y-m-d');   
                $dateTo = (new DateTime('now', new DateTimeZone($GLOBALS['timezone'])))->modify('today')->format('Y-m-d');      
} else {                                                                                                                
                $dateFrom = (new DateTime('now', new DateTimeZone($GLOBALS['timezone'])))->setDate(2020, 1, 1)->format('Y-m-d');
                $dateTo = (new DateTime('now', new DateTimeZone($GLOBALS['timezone'])))->modify('-1 day')->format('Y-m-d');
} 

/**
 * - Function to get conversions
 * - Set the row template and the logic to filter within the function
 * - make call to redtrack to request data
 *
 */

function get_conversions_from_retrack(){
	$gaParameters = "TimeZone={$GLOBALS['timezone']}"; 
        $rows = [                                                                                            
                ['### TEMPLATE ###'],                                                                                
                ["Parameters:{$gaParameters}"],                                                                      
                [                                                                                                    
                        'Google Click ID',                                                                           
                        'Conversion Name',                                                                           
                        'Conversion Time',                                                                      
                        'Conversion Value',                                                         
                        'Conversion Currency',                                                           
                ],                                                                                       
                ];

	$page = 1;
	$loop = 1;

	while($loop == 1)
	{
		$data = make_request_redtrack($rows, $page);

		if(count($data->items) == 0){
			break;
		}

		if(count($data->items)%1000 != 0){                                                                           
                	$loop = 0;                                                                                           
        	}
	
		foreach ($data->items as $item) {                                                                            
                                                      

			if ( $GLOBALS['event_type'] == 'conversion' && $item->payout <= 1) {                           
        			continue;                                       
    			} 

			if ( $GLOBALS['event_type'] == 'signup' && $item->payout > 1) {
                                continue;
                        }                                                                                                   
                                                                                                                     
                	if ($item->campaign_id !== $GLOBALS['campaignId']) {                                                            
                        	continue;                                                                                    
                	}                                                                                                    
                                                                                                                     
                	$rows[] = [                                                                                          
                        	$item->ref_id,                                                                               
                        	$GLOBALS['conversionName'],                                                                             
                        	date('Y-m-d H:i:s', strtotime($item->track_time)),                                           
                        	'',                                                                                          
                        	'',                                                                                          
                	];                                                                                                   
        	}
		$page++;	
	}

	return $rows;	
}

/**
 * - Function to get clicks from redtrack
 *
 */

function get_clicks_from_retrack(){                                                                                        
        $gaParameters = "TimeZone={$GLOBALS['timezone']}";                                                                      
        $rows = [                                                                                                               
                ['### TEMPLATE ###'],                                                                                           
                ["Parameters:{$gaParameters}"],                                                                                 
                [                                                                                                               
                        'Google Click ID',                                                                                      
                        'Conversion Name',                                                                                      
                        'Conversion Time',                                                                                      
                        'Conversion Value',                                                                                     
                        'Conversion Currency',                                                                                  
                ],                                                                                                              
                ];                                                                                                              
                                                                                                                                
        $page = 1;                                                                                                              
        $loop = 1;                                                                                                              
                                                                                                                                
        while($loop == 1)                                                                                                       
        {                                                                                                                       
                $data = make_request_redtrack($rows, $page, 'tracks');                                                                    
                                                                                                                                
                if(count($data->items) == 0){                                                                                   
                        break;                                                                                                  
                }                                                                                                               
                                                                                                                                
                if(count($data->items)%1000 != 0){                                                                              
                        $loop = 0;                                                                                              
                }                                                                                                               

                foreach ($data->items as $item) {                                                                               
                                                                                                                                
                        if( $item->is_lp_track !== 1 ){                                                            
                                continue;                                                                                       
                        }                                                                                                  
                                                                                  
                        if ($item->campaign_id !== $GLOBALS['campaignId']) {      
                                continue;                                         
                        }                                                         
                                                                                  
                        $rows[] = [                                               
                                $item->ref_id,                                    
                                $GLOBALS['conversionName'],                       
                                date('Y-m-d H:i:s', strtotime($item->track_time)),
                                '',                                               
                                '',                                               
                        ];                                                        
                }                                                                 
                $page++;                                                          
        }                                                                         
                                                                                  
        return $rows;                                                             
}

/** call redtrack **/

function make_request_redtrack($rows, $page, $call='conversions'){
	$params = [                                                                                                  
        'api_key' => $GLOBALS['redtrackToken'],                                                                                 
        'campaign_id' => $GLOBALS['campaignId'],                                                                                
        'per' => 1000,                                                                                               
        'page' => $page,                                                                                             
        'date_from' => $GLOBALS['dateFrom'],                                                                                    
        'date_to' => $GLOBALS['dateTo'],                                                                                        
        ];                                                                                                           
                                                                                                                     
        // fetch data                                                                                         
        $url = "https://api.redtrack.io/{$call}?" . http_build_query($params);                                   
        $ch = curl_init($url);                                                                                       
        curl_setopt_array($ch, [                                                                                     
        CURLOPT_RETURNTRANSFER => 1,                                                                                 
        ]);                                                                                                          
                                                                                                                     
        $res = curl_exec($ch);                                                                                       
        $data = json_decode($res, false);                                                                            
	return $data;                                                                                                                                                                                                                                   
}

if( $event_type == 'click' ){
	$rows = get_clicks_from_retrack();
	$label = "clicks";
} else {
	$rows = get_conversions_from_retrack();
	$label = "conversions";
}


// csv file headers
$filename = "{$label}-{$dateFrom}-{$dateTo}.csv";
$filename = !$fullReport ? "{$label}-{$dateFrom}-{$dateTo}.csv" : "{$label}.csv";

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename={$filename}");
header("Pragma: no-cache");
header("Expires: 0");

// convert to csv
$csv = fopen('php://output', 'w');
foreach ($rows as $row) {
    		fputcsv($csv, $row);
}

fclose($csv);
