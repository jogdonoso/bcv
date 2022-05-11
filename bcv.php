<?php
header('Content-type: application/json; charset=utf-8');
$url = "http://www.bcv.org.ve";
$content = file_get_contents($url);
$posible_usd = substr($content, strpos($content, 'USD'));
$pos_usd = strpos($posible_usd,' </strong> </div>');
$posible_usd = substr($posible_usd,0,$pos_usd);
$posible_usd= substr($posible_usd,34,1000);

$posible_eur = substr($content, strpos($content, 'EUR'));
$pos_eur = strpos($posible_eur,' </strong> </div>');
$posible_eur = substr($posible_eur,0,$pos_eur);
$posible_eur= substr($posible_eur,34,1000);

$posible_cny = substr($content, strpos($content, 'CNY'));
$pos_cny = strpos($posible_cny,' </strong> </div>');
$posible_cny = substr($posible_cny,0,$pos_cny);
$posible_cny= substr($posible_cny,34,1000);

$posible_try = substr($content, strpos($content, 'TRY'));
$pos_try = strpos($posible_try,' </strong> </div>');
$posible_try = substr($posible_try,0,$pos_try);
$posible_try= substr($posible_try,34,1000);

$posible_rub = substr($content, strpos($content, 'RUB'));
$pos_rub = strpos($posible_rub,' </strong> </div>');
$posible_rub = substr($posible_rub,0,$pos_rub);
$posible_rub= substr($posible_rub,34,1000);

$posible_cny = substr($content, strpos($content, 'CNY'));
$pos_cny = strpos($posible_cny,' </strong> </div>');
$posible_cny = substr($posible_cny,0,$pos_cny);
$posible_cny= substr($posible_cny,34,1000);
$cotizaciones = array('message_ok' =>
   array('data' =>
                        array('dollar' => array('value' => str_replace(',','.',substr($posible_usd, -10)),
                                    'iso' => 'USD',
                                    'symbol' => '$' ),
                              'euro' => array('value' => str_replace(',','.',substr($posible_eur, -10)),
                                    'iso' => 'EUR',
                                    'symbol' => '€' ),
                              'yuan' => array('value' => str_replace(',','.',substr($posible_cny, -10)),
                                    'iso' => 'CNY',
                                    'symbol' => '¥' ),
                               'lira' => array('value' => str_replace(',','.',substr($posible_try, -10)),
                                    'iso' => 'TRY',
                                    'symbol' => '₺' ),
                                'ruble' => array('value' => str_replace(',','.',substr($posible_rub, -10)),
                                    'iso' => 'RUB',
                                    'symbol' => '₽' )
                            )));
      
        echo json_encode($cotizaciones);
        
        /*array('dollar' => str_replace(',','.',substr($posible_usd, -10)),
        'uuro' => str_replace(',','.',substr($posible_eur, -10)),
        'yuan' => str_replace(',','.',substr($posible_cny, -10))
      )));*/
