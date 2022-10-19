<?php
include_once('./simple_html_dom.php');
$gameUrl = "https://livescore.football365.com/england-premier-league-brentford-vs-chelsea/20-10-2022/2130017/overview";
$html = file_get_html($gameUrl);

// echo $html;
// ftb_details_header_status
// ftb_details_header_foot

$teamOne = $html->find('div.ftb_details_header_name_pic h3', 0)->plaintext;
$teamTwo = $html->find('div.ftb_details_header_name_pic h3', 1)->plaintext;
$time = $html->find('div.ftb_details_header_status label', 0)->plaintext;
$score = $html->find('div.ftb_details_header_status h3 a', 0)->plaintext;
$dateOfPlay = $html->find('div.ftb_details_header_foot ul li span samp.mdate', 0)->plaintext;
$timeOfPlay = $html->find('div.ftb_details_header_foot ul li span samp.mtime', 0)->plaintext;

$data = ['teamOne'=>$teamOne,'teamTwo'=>$teamTwo,'time'=>$time,'score'=>$score,'dateOfPlay'=>$dateOfPlay,'timeOfPlay'=>$timeOfPlay];
echo json_encode($data);

file_put_contents('../api/data.json', json_encode($data));
?>