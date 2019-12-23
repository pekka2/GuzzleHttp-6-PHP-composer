<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mkdir = array("vendor",
               "vendor/composer",
               "vendor/guzzlehttp",
               "vendor/psr",
               "vendor/ralouphie",
               "vendor/guzzlehttp/guzzle",
               "vendor/guzzlehttp/promises",
               "vendor/guzzlehttp/psr7",
               "vendor/guzzlehttp/guzzle/src",
               "vendor/guzzlehttp/guzzle/src/Cookie",
               "vendor/guzzlehttp/guzzle/src/Exception",
               "vendor/guzzlehttp/guzzle/src/Handler",
               "vendor/guzzlehttp/promises/src",
               "vendor/guzzlehttp/psr7/src",
               "vendor/psr/http-message",
               "vendor/psr/http-message/src",
               "vendor/ralouphie/getallheaders",
               "vendor/ralouphie/getallheaders/src"
          );

$copy = array(
                 array(
                       "guzzle/GuzzleHttp/Promise/",
                       "vendor/guzzlehttp/promises/src/"
                  ),
                 array(
                       "guzzle/GuzzleHttp/",
                       "vendor/guzzlehttp/guzzle/src/"
                  ),
                 array(
                       "guzzle/GuzzleHttp/Cookie/",
                       "vendor/guzzlehttp/guzzle/src/Cookie/"
                  ),
                 array(
                       "guzzle/GuzzleHttp/Exception/",
                       "vendor/guzzlehttp/guzzle/src/Exception/"
                  ),
                 array(
                       "guzzle/GuzzleHttp/Handler/",
                       "vendor/guzzlehttp/guzzle/src/Handler/"
                  ),
                 array(
                       "guzzle/GuzzleHttp/Psr7/",
                       "vendor/guzzlehttp/psr7/src/"
                  ),
                 array(
                       "guzzle/Psr/Http/Message/",
                       "vendor/psr/http-message/src/"
                  ),
                 array(
                       "getallheaders-develop/src/",
                       "vendor/ralouphie/getallheaders/src/"
                  )
          );

$path = dirname(__FILE__);

foreach($mkdir as $dir){
    mkdir($path . '/' . $dir);
}

$i = 0;
foreach ($copy as $fp){
	 $hakemisto{$i} = $path . '/'. $fp[0]; 
	 $avaa = opendir($hakemisto{$i}); 
	 while( ($file = readdir($avaa) ) != false ) {
	 	if(is_file($hakemisto{$i} . $file)){
	 	   copy($hakemisto{$i} . $file, $path . '/'. $fp[1]. $file);
	    }
	 }
	 $i++;
}
?>