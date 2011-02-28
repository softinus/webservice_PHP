<table width=100% border=0 cellpadding=0 cellspacing=0>
	<tr><td align=center>
	<?
	
	if($cat_info->depthno == 1) $tmp_catcode = substr($catcode,0,2);
	else if($cat_info->depthno == 2) $tmp_catcode = substr($catcode,0,4);
	else if($cat_info->depthno == 3) $tmp_catcode = substr($catcode,0,4);
	
	if($cat_info->depthno < 3) $cat_info->depthno++;
	
	/*
	2단계까지만 보여줄경우
	$tmp_catcode = substr($catcode,0,2);
	if($cat_info->depthno < 2) $cat_info->depthno++;
	*/
	
	$sql = "select catcode, catname, depthno from wiz_category where catuse != 'N' and catcode like '$tmp_catcode%' and depthno = $cat_info->depthno order by priorno02, priorno03 asc";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);
	        
	if($catcode != ""){
	?>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			  <tr>
			    <td><img src="/images/prdline_left_top.gif" width="3" /></td>
			    <td background="/images/prdline_top_bg.gif" width="100%"></td>
			    <td><img src="/images/prdline_right_top.gif" width="3" /></td>
			  </tr>
			  <tr>
			  	<td background="/images/prdline_left_bg.gif" width="3"></td>
			  	<td bgcolor="#e7e7e7" style="padding: 5 5 5 5"><img src="/images/product_title_icon.gif" align="absmiddle"><b><?=$catname?></b></td>
			  	<td background="/images/prdline_right_bg.gif" width="3"></td>
			  </tr>
			  <tr>
			  	<td background="/images/prdline_left_bg.gif" width="3"></td>
			  	<td>
			  	
						<table border=0 cellpadding=0 cellspacing=5 width=100%>
						<?
            $no = 0;
						while($row = mysql_fetch_object($result)){
							
							// 현재카테고리에 몇개의 상품이 있는지
							$t_catcode = $row->catcode;
							if($row->depthno == 2) $t_catcode = substr($row->catcode,0,4);

							$t_sql = "select count(idx) as prd_count from wiz_cprelation where catcode like '$t_catcode%'";
							$t_result = mysql_query($t_sql) or error(mysql_error());
							$t_row = mysql_fetch_object($t_result);
							$prd_count = $t_row->prd_count;
							
							if(!strcmp($row->catcode, $catcode)) $total = $prd_count;
							
							if($catcode == $row->catcode) $row->catname = "<font color=red>".$row->catname." (".$prd_count.")</font>";
							else $row->catname = $row->catname." (".$prd_count.")";
							if($no%4 == 0) echo "<tr>";
              echo "<td width=150 height=20>ㆍ<a href='/shop/prd_list.php?catcode=".$row->catcode."'>".$row->catname."</a></td>";
							$no++;
							
						}
						?>
						</table>
				  </td>
	        <td background="/images/prdline_right_bg.gif" width="3"></td>
	      </tr>
	      <tr>
	        <td><img src="/images/prdline_left_bottom.gif" width="3" /></td>
	        <td background="/images/prdline_bottom_bg.gif" width="100%"></td>
	        <td><img src="/images/prdline_right_bottom.gif" width="3" /></td>
	      </tr>
	    </table>
	<?
	}
	?>
		</td>
  </tr>
  <tr><td height="15"></td></tr>
</table>