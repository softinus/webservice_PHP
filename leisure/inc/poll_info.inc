<?
if(!empty($poll_code)) $code = $poll_code;
else if(!empty($_REQUEST["code"])) $code = $_REQUEST["code"];

$sql = "select * from wiz_pollinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$poll_info = mysql_fetch_array($result);
if($total <= 0 || $poll_info[usetype] != "Y") error("�ش� �������簡 �������� �ʽ��ϴ�.","");

if($poll_info[titleimg] != "") $subimg = "<img src=/data/poll/$code/$poll_info[titleimg]>";

// �������� ���ٱ���
$level_info = level_info();
$mem_level = $level_info[$wiz_session[level]][level];

$lpermi = $level_info[$poll_info[lpermi]][level];
$rpermi = $level_info[$poll_info[rpermi]][level];
$apermi = $level_info[$poll_info[apermi]][level];
$cpermi = $level_info[$poll_info[cpermi]][level];

// ��Ų��ġ
$skin_dir = "/poll/skin/".$poll_info[skin];
?>