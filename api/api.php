<?php
include_once('./simple_html_dom.php');
$gameUrl = "https://livescore.football365.com/spain-laliga-atletico-madrid-vs-rayo-vallecano/19-10-2022/2144353/overview";
$html = file_get_html($gameUrl);


$league = $html->find('h2.overview_main_title a', 0)->plaintext;
$gameStatus = $html->find('#SEOH1 span', 0)->plaintext;

$teamOne = $html->find('div.ftb_details_header_name_pic h3', 0)->plaintext;
$teamTwo = $html->find('div.ftb_details_header_name_pic h3', 1)->plaintext;
$time = $html->find('div.ftb_details_header_status label', 0)->plaintext;
$score = $html->find('div.ftb_details_header_status h3 a', 0)->plaintext;
$dateOfPlay = $html->find('div.ftb_details_header_foot ul li span samp.mdate', 0)->plaintext;
$timeOfPlay = $html->find('div.ftb_details_header_foot ul li span samp.mtime', 0)->plaintext;
if($gameStatus == 'NSY'){
  $score = '0 - 0';
}
$data = ['gameStatus'=>$gameStatus,
'league'=>$league,
'teamOne'=>$teamOne,
'teamTwo'=>$teamTwo,
'time'=>$time,
'score'=>$score];
echo json_encode($data);

file_put_contents('./data.json', json_encode($data));
?>