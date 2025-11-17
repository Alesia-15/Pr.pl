<?php 
	$url = 'https://ws.vat.gov.by:443/InvoicesWS/services/InvoicesPort';
  $headers   = array();
  $headers[] = 'Cookie: butb=';
  $headers[] = 'Origin: https://ws.vat.gov.by';
  // $headers[] = 'Accept-Encoding: gzip, deflate, br';
  $headers[] = 'Accept-Language: en-US,en;q=0.9,ru;q=0.8';
  // $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36';
  $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
  $headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
  // $headers[] = 'Referer: https://ts.butb.by/ppt/ru/catalog/demand';
  $headers[] = 'X-Requested-With: XMLHttpRequest';
  $headers[] = 'Connection: keep-alive';

  $options = array(
      CURLOPT_RETURNTRANSFER => true,     // return web page
      CURLOPT_HEADER         => false,    // don't return headers
      CURLOPT_FOLLOWLOCATION => true,     // follow redirects
      CURLOPT_ENCODING       => 'gzip, deflate, br',       // handle all encodings
      CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', // who am i
      CURLOPT_AUTOREFERER    => true,     // set referer on redirect
      CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
      CURLOPT_TIMEOUT        => 120,      // timeout on response
      CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
      CURLOPT_SSL_VERIFYPEER => false,     // Disabled SSL Cert checks
      CURLOPT_POSTFIELDS     => http_build_query(['UNP'=>'591120699']),// ключ и пароль
      CURLOPT_POST           => true,
      CURLOPT_ENCODING			 => 'gzip, deflate',
      CURLOPT_HTTPHEADER		 => $headers
  );

  $ch      = curl_init( $url );
  curl_setopt_array( $ch, $options );
  $content = curl_exec( $ch );
  $err     = curl_errno( $ch );
  $errmsg  = curl_error( $ch );
  $header  = curl_getinfo( $ch );
  curl_close( $ch );

  $header['errno']   = $err;
  $header['errmsg']  = $errmsg;
  $header['content'] = $content;
  echo "<pre>";print_r($header);echo "</pre>"; 