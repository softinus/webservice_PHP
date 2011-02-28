<?
$sql = "select * from wiz_shopinfo";
$result = mysql_query($sql) or error(mysql_error());
$shop_info = mysql_fetch_object($result);

if(!strcmp($shop_info->ssl_use, "Y")) {
	$ssl = "https://".$HTTP_HOST;
	if(!empty($shop_info->ssl_port)) $ssl .= ":".$shop_info->ssl_port;
} else {
	$hide_ssl_start = "<!--"; $hide_ssl_end = "-->";
}
?>