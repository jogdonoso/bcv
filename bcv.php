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

  
  $cotizaciones = array('cotizacion_bcv' =>
                        array('USD' => round(str_replace(',','.',substr($posible_usd, -10)),2),
                              'EUR' => round(str_replace(',','.',substr($posible_eur, -10)),2),
                              'CNY' => round(str_replace(',','.',substr($posible_cny, -10)),2)
                            ));
      
        echo json_encode($cotizaciones);
        
?>
