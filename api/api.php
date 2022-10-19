<?php
include_once('./simple_html_dom.php');
$html = file_get_html("https://livescore.football365.com/spain-laliga-sevilla-vs-valencia/18-10-2022/2144356/overview");

// echo $html;
// ftb_details_header_status


$teamOne = $html->find('div.ftb_details_header_name_pic h3', 0)->plaintext;
$teamTwo = $html->find('div.ftb_details_header_name_pic h3', 1)->plaintext;
$time = $html->find('div.ftb_details_header_status label', 0)->plaintext;
$score = $html->find('div.ftb_details_header_status h3 a', 0)->plaintext;

$data = ['teamOne'=>$teamOne,'teamTwo'=>$teamTwo,'time'=>$time,'score'=>$score];
echo json_encode($data);

file_put_contents('./footballApi/footballData.json', json_encode($data));
?>