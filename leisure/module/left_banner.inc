<?

$left_banner = "\n<!-- ���ʹ�� ����-->\n<table width=100% border=0 cellpadding=0 cellspacing=0 align=center>";

$sql = "select * from wiz_bannerinfo where isuse != 'N' and place = '1' order by prior asc";
$result = mysql_query($sql) or error(mysql_error());

$ban_info = mysql_fetch_object($result);

$sql = "select * from wiz_banner where name = '$ban_info->name' and isuse != 'N' order by prior asc";
$result = mysql_query($sql) or error(mysql_error());

while($row = mysql_fetch_object($result)){
	
	if($row->de_type == "IMG") $ban_content = "<img src=/images/banner/".$row->de_img." border=0>";
	else $ban_content = "<table cellpadding=0 cellspacing=0 border=0><tr><td>".$row->de_html."</td></tr></table>";
	
	if($row->link_url == "") $left_banner .= "<tr><td>".$ban_content."</td></tr>";
   else $left_banner .= "<tr><td><a href=".$row->link_url." target=".$row->link_target.">".$ban_content."</a></td></tr>";
}

$left_banner .= "</table>\n<!-- ���ʹ�� ����-->\n";

?>