<?php
header('Content-type: application/json; charset=utf-8');


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://www.bcv.org.ve',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$content = curl_exec($curl);

function cotizaciones($iso, $content){
      $inicio = substr($content, strpos($content, $iso));
      $fin = strpos($inicio,' </strong> </div>');
      $inicio = substr($inicio,0,$fin);
      $inicio= substr($inicio,34,1000);
      return str_replace(',','.',substr($inicio, -10));
}


$cotizaciones = array('message_ok' =>
      array('data' =>
            array('dolar' => array('value' => cotizaciones('USD', $content),
                  'iso' => 'USD',
                  'symbol' => '$' ),
                  'euro' => array('value' => cotizaciones('EUR', $content),
                  'iso' => 'EUR',
                  'symbol' => '€' ),
                  'yuan' => array('value' => cotizaciones('CNY', $content),
                  'iso' => 'CNY',
                  'symbol' => '¥' ),
                  'lira' => array('value' => cotizaciones('TRY', $content),
                  'iso' => 'TRY',
                  'symbol' => '₺' ),
                  'rublo' => array('value' => cotizaciones('RUB', $content),
                  'iso' => 'RUB',
                  'symbol' => '₽' )
                                                             )));                                                                        
echo json_encode($cotizaciones);                              

      curl_close($curl);
