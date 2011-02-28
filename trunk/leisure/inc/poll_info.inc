<?
if(!empty($poll_code)) $code = $poll_code;
else if(!empty($_REQUEST["code"])) $code = $_REQUEST["code"];

$sql = "select * from wiz_pollinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$poll_info = mysql_fetch_array($result);
if($total <= 0 || $poll_info[usetype] != "Y") error("해당 설문조사가 존재하지 않습니다.","");

if($poll_info[titleimg] != "") $subimg = "<img src=/data/poll/$code/$poll_info[titleimg]>";

// 설문조사 접근권한
$level_info = level_info();
$mem_level = $level_info[$wiz_session[level]][level];

$lpermi = $level_info[$poll_info[lpermi]][level];
$rpermi = $level_info[$poll_info[rpermi]][level];
$apermi = $level_info[$poll_info[apermi]][level];
$cpermi = $level_info[$poll_info[cpermi]][level];

// 스킨위치
$skin_dir = "/poll/skin/".$poll_info[skin];
?>