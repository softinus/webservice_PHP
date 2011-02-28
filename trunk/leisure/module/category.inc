<?

if($design_info->cate_img != ""){
	$cate_img = "<a href=/><img src='/data/mainimg/$design_info->cate_img' border='0'></a>";
}

$category = "<table width=100% border=0 cellpadding=0 cellspacing=0 align=center>\n";
$category .= "<tr><td>".$cate_img."</td></tr>\n";

$no = 1;
$sql = "select catcode, catname, catimg, catimg_over from wiz_category where depthno=1 and catuse != 'N' order by priorno01 asc";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
	
	if($row->catimg == ""){
		$category .= "<tr><td onmouseover=displayLay('".($no-1)."')  onmouseout=disableLay('".($no-1)."')><a href='/shop/prd_list.php?catcode=".$row->catcode."'>".$row->catname."</a></td></tr>\n";
	}else{
		if($row->catimg_over == "") $row->catimg_over = $row->catimg;
		$category .= "<tr><td onMouseOver=displayLay('".($no-1)."');MM_swapImage('c_".$no."','','/data/catimg/".$row->catimg_over."',1) onMouseOut=MM_swapImgRestore();disableLay('".($no-1)."')><a href='/shop/prd_list.php?catcode=".$row->catcode."'><img src='/data/catimg/".$row->catimg."' name='c_".$no."' border=0 id='c_".$no."'></a></td></tr>\n";
	}
	$no++;
	
}	

$category .= "</table>\n";




////////////////////////////////////////////////////////////////////////////////////////////////////
// 하위분류 출력
////////////////////////////////////////////////////////////////////////////////////////////////////

if($design_info->cate_sub == "Y"){

	$no = 0;
	$layer_y = $design_info->cate_suby;					// 레이어 시작Y
	$layer_x = $design_info->cate_subx;					// 레이어 시작X
	$menu_height = $design_info->cate_menuh;		// 각 메뉴높이

	if($design_info->site_align == "CENTER"){
		$site_width = ceil($design_info->site_width/2)-$layer_x;
		$layer_x = "expression(document.body.clientWidth/2-".$site_width.")";
	}
	
	$sql = "select depthno, catcode, catname, catimg from wiz_category where depthno != 3 and catuse != 'N' order by priorno01 asc,priorno02 asc;";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);

	while($row = mysql_fetch_object($result)){
	
		if($row->depthno == 1){
		
		if($i!=0 and $i%2==1)  $category .= "<td bgcolor='#ffffff'> </td>";
		if($no != 0) $category .= "</table></div>\n";

			$category .= "<div id='displayer' style='display:none;position:absolute;left:".$layer_x."; top:".($no*$menu_height + $layer_y)."; width:100; z-index:7; filter:alpha(opacity=90);'>
										<table width='150' cellpadding=3 cellspacing=0 style='border: 2 solid #dddddd' onmouseover=displayLay('".$no."'); onmouseout=disableLay('".$no."')>\n";
			$no++;
			$i=0;

		}else if($row->depthno == 2){
			$category .= "<tr><td bgcolor='#ffffff'>&nbsp; <a href=/shop/prd_list.php?catcode=".$row->catcode." onfocus='blur()'>".$row->catname."</a></td></tr>\n";
			$i++;
		}
	
	}
	if($total > 0) $category .= "</tr></table></div>\n";

}

?>
