<?

$sql = "select name,types,types_num from wiz_bannerinfo where isuse != 'N' and place = '6' order by prior asc";
$result = mysql_query($sql) or error(mysql_error());

$ban_info = mysql_fetch_object($result);

$down_banner = "\n<!-- 하단배너 시작-->\n<table width=100% border=0 cellpadding=0 cellspacing=0 align=center>\n<tr>\n";


$sql = "select * from wiz_banner where name = '$ban_info->name' and isuse != 'N' order by prior asc";
$result = mysql_query($sql) or error(mysql_error());

$total = 1;

while($row = mysql_fetch_object($result)){
		
	if($row->de_type == "IMG")
	  $ban_content = "<img src=/images/banner/".$row->de_img." border=0>";
	else
	  $ban_content = "<table cellpadding=0 cellspacing=0 border=0>\n<tr>\n<td>".$row->de_html."</td>\n</tr>\n</table>\n";

  if($row->types == "W") {

    if($row->link_url == "")
      $left_banner .= "<tr>\n<td>".$ban_content."</td>\n</tr>\n";
    else
      $left_banner .= "<tr>\n<td><a href=".$row->link_url." target=".$row->link_target.">".$ban_content."</a></td>\n</tr>\n";

  } else {	
    
    $mod = ($total%$ban_info->types_num);
      
    if($mod != 0) {
      
      if($row->link_url == "")
	      $down_banner .= "<td align='left'>".$ban_content."</td>\n";

      else
        $down_banner .= "<td align='left'><a href=".$row->link_url." target=".$row->link_target.">".$ban_content."</a></td>\n";
        
    } else {
      
  	  if($row->link_url == "")
	      $down_banner .= "<td align='left'>".$ban_content."</td>\n</tr>\n<tr>\n";

      else
        $down_banner .= "<td align='left'><a href=".$row->link_url." target=".$row->link_target.">".$ban_content."</a></td>\n</tr>\n<tr>\n";

    }
  }

  $total++;
  
}

$down_banner .= "</tr>\n</table>\n<!-- 하단배너 종료 ".$total."-".$ban_info->types_num."-".$mode."-->\n";

?>