<?
$sql = "select * from wiz_member where id = '$wiz_session[id]'";
$result = mysql_query($sql) or error(mysql_error());
$mem_info = mysql_fetch_object($result);

$mem_tphone = explode("-", $mem_info->tphone);
$mem_hphone = explode("-", $mem_info->hphone);
$mem_fax = explode("-", $mem_info->fax);
$mem_post = explode("-", $mem_info->post);

$mem_com_post = explode("-", $mem_info->com_post);

$mem_birthday = explode("-", $mem_info->birthday);
$mem_memorial = explode("-", $mem_info->memorial);
?>