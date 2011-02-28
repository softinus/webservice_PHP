<?

$top_menu = "<table border=0 cellpadding=0 cellspacing=0>";




if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu01_over.gif")) $topmenu01_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu02_over.gif")) $topmenu02_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu03_over.gif")) $topmenu03_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu04_over.gif")) $topmenu04_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu05_over.gif")) $topmenu05_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu06_over.gif")) $topmenu06_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu07_over.gif")) $topmenu07_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu08_over.gif")) $topmenu08_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu09_over.gif")) $topmenu09_over = "_over";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu10_over.gif")) $topmenu00_over = "_over";



if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu01.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu01_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu01','','/data/menuimg/topmenu01".$topmenu01_over.".gif',1)><img src=/data/menuimg/topmenu01.gif border=0 name=topmenu01></a></td>";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu02.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu02_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu02','','/data/menuimg/topmenu02".$topmenu02_over.".gif',1)><img src=/data/menuimg/topmenu02.gif border=0 name=topmenu02></a></td>";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu03.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu03_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu03','','/data/menuimg/topmenu03".$topmenu03_over.".gif',1)><img src=/data/menuimg/topmenu03.gif border=0 name=topmenu03></a></td>";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu04.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu04_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu04','','/data/menuimg/topmenu04".$topmenu04_over.".gif',1)><img src=/data/menuimg/topmenu04.gif border=0 name=topmenu04></a></td>";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu05.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu05_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu05','','/data/menuimg/topmenu05".$topmenu05_over.".gif',1)><img src=/data/menuimg/topmenu05.gif border=0 name=topmenu05></a></td>";
	$top_menu .= '<td width="264" background="/image/t_menu_bg.gif"></td>';
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu06.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu06_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu06','','/data/menuimg/topmenu06".$topmenu06_over.".gif',1)><img src=/data/menuimg/topmenu06.gif border=0 name=topmenu06></a></td>";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu07.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu07_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu07','','/data/menuimg/topmenu07".$topmenu07_over.".gif',1)><img src=/data/menuimg/topmenu07.gif border=0 name=topmenu07></a></td>";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu08.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu08_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu08','','/data/menuimg/topmenu08".$topmenu08_over.".gif',1)><img src=/data/menuimg/topmenu08.gif border=0 name=topmenu08></a></td>";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu09.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu09_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu09','','/data/menuimg/topmenu09".$topmenu09_over.".gif',1)><img src=/data/menuimg/topmenu09.gif border=0 name=topmenu09></a></td>";
if(is_file("$DOCUMENT_ROOT/data/menuimg/topmenu10.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu10_url onMouseOut=MM_swapImgRestore() onMouseOver=MM_swapImage('topmenu10','','/data/menuimg/topmenu10".$topmenu10_over.".gif',1)><img src=/data/menuimg/topmenu10.gif border=0 name=topmenu10></a></td>";

$top_menu .= "</table>";

?>