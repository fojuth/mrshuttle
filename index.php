<?php

use MrShuttle\Input\Parser;

require 'vendor/autoload.php';

$source_file = 'confCons.xml';

$parser = new Parser($source_file);

$parser->getParsed();

var_dump('yay');
die;

//$pwd = '28kQ15DF4kdW34Mx2+fh+NWZODNSoSPek7ug+ILvyPE=';
//$key = '\xc8\xa3\x9d\xe2\xa5\x47\x66\xa0\xda\x87\x5f\x79\xaa\xf1\xaa\x8c';
//
//$pwdDecoded = base64_decode($pwd);
////$bytes = unpack('H*', $pwdDecoded);
//
////var_dump($key);
////var_dump($bytes);
//
//$iv = array();
//$encrypted = array();
//$index = 0;
//
//foreach (str_split($pwdDecoded) as $chr) {
//    if (16 > $index) {
//        $iv[] = chr(sprintf('%02X', ord($chr)));
//        var_dump($chr);
////        $iv[] = $chr;
//    }
//    else {
//        $encrypted[] = chr(sprintf('%02X', ord($chr)));
////        $encrypted[] = $chr;
//    }
//
//    $index++;
//}
//
//var_dump(join('', $iv));
//
////var_dump($iv);
////die;
//$decrypted = openssl_decrypt($pwd, 'aes-128-cbc', join('', $encrypted), false, join('', $iv));
//
//var_dump($decrypted);
