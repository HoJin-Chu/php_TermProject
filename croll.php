<?php
include_once("Snoopy/Snoopy.class.php");
$snoopy = new Snoopy;
$snoopy->fetch('http://www.koreadognews.co.kr/news/index.php?code=20160717091348_4596&d_code=20160717091445_1315');

preg_match('/<li class=\"main_menu02\" id=\"main_menu_1\">(.*?)<\/li>/is', iconv("EUC-KR", "UTF-8//ignore",$snoopy->results), $product_list);
print_r($product_list);  
?>