<?

  for($i = 1; $i < 6; $i++) {

    $sql = "select name,types,types_num from wiz_bannerinfo where idx = '$i' and isuse != 'N'";
    $result = mysql_query($sql) or error(mysql_error());

    $ban_info = mysql_fetch_object($result);

    $banner = "\n<!-- Banner : Start -->\n<table width=100% border=0 cellpadding=0 cellspacing=0 align=center>";

    $sql = "select * from wiz_banner where name = '$ban_info->name' and isuse != 'N' order by prior asc, idx asc";
    $result2 = mysql_query($sql) or error(mysql_error());

    while($row = mysql_fetch_object($result2)){
	
      if($row->de_type == "IMG")
        $ban_content = "<img src=/data/banner/".$row->de_img." border=0>";

      else
        $ban_content = "<table cellpadding=0 cellspacing=0 border=0><tr><td>".$row->de_html."</td></tr></table>";
	
      if($ban_info->types == "H") {
        if($row->link_url == "")
          $banner .= "<tr>\n<td>".$ban_content."</td>\n</tr>\n";
        else
          $banner .= "<tr>\n<td><a href=".$row->link_url." target=".$row->link_target.">".$ban_content."</a></td>\n</tr>\n";
      } else {	
        $mod = ($total%$ban_info->types_num);

        if($mod != 0) {
          if($row->link_url == "")
            $banner .= "<td align='left'>".$ban_content."</td>\n";
          else
            $banner .= "<td align='left'><a href=".$row->link_url." target=".$row->link_target.">".$ban_content."</a></td>\n";
        } else {
          if($row->link_url == "")
            $banner .= "<td align='left'>".$ban_content."</td>\n</tr>\n<tr>\n";
          else
            $banner .= "<td align='left'><a href=".$row->link_url." target=".$row->link_target.">".$ban_content."</a></td>\n</tr>\n<tr>\n";
        }
      }

      $total++;
    }

    $banner .= "</table>\n<!-- Banner : End -->\n";
  
    switch($i) {
      case 1:
        $banner_01 .= $banner;
        break;
      
      case 2:
        $banner_02 .= $banner;
        break;

      case 3:
        $banner_03 .= $banner;
        break;

      case 4:
        $banner_04 .= $banner;
        break;

      case 5:
        $banner_05 .= $banner;
        break;
    }
  }  
  
?>