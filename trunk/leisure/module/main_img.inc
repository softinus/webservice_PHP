<?

$main_ext = substr($design_info->main_img,-3);
if($main_ext == "gif" || $main_ext == "jpg" || $main_ext == "bmp"){
	$main_img = "<img src='/data/mainimg/$design_info->main_img' width='$design_info->main_width' height='$design_info->main_height' border='0'>";
	if($design_info->main_link != "")
		$main_img = "<a href='$design_info->main_link'>".$main_img."</a>";
}else if($main_ext == "swf"){
	$main_img = "
     <script language=javascript>
       msemb = new MS_Embed();
       msemb.init('/data/mainimg/$design_info->main_img','$design_info->main_width','$design_info->main_height');
       msemb.show();
     </script>
	";
}

?>