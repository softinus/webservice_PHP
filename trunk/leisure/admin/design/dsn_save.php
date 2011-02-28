<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

$upfile_path = "../../data/mainimg";
$menuimg_path = "../../data/menuimg";
$design_path = "../../data/design";
$mainimg_path = "../../data/mainimg";
$banner_path = "../../data/banner";


// 페이지 추가
if($mode == "insert"){

	$sdate = $sdate_year."-".$sdate_month."-".$sdate_day;
	$edate = $edate_year."-".$edate_month."-".$sdate_day;

	$sql = "insert into wiz_content(idx,type,isuse,scroll,posi_x,posi_y,size_x,size_y,sdate,edate,linkurl,popup_type,title,content,wdate)
									values('','$type', '$isuse', '$scroll', '$posi_x', '$posi_y', '$size_x', '$size_y', '$sdate', '$edate', '$linkurl', '$popup_type', '$title', '$content',now())";

	$result = mysql_query($sql) or error(mysql_error());

	if($type == "popup") complete("추가되었습니다.","dsn_popup.php");
	else complete("추가되었습니다.","dsn_content.php");




// 페이지 수정
}else if($mode == "update"){

	$sdate = $sdate_year."-".$sdate_month."-".$sdate_day;
	$edate = $edate_year."-".$edate_month."-".$edate_day;

	if(!empty($type)) $where_sql = " where type = '$type' and idx = '$idx'";
	else $where_sql = " where idx = '$idx'";

	$sql = "update wiz_content set isuse='$isuse', scroll='$scroll', posi_x='$posi_x', posi_y='$posi_y', size_x='$size_x', size_y='$size_y',
							sdate='$sdate', edate='$edate', linkurl='$linkurl', popup_type='$popup_type', title='$title', content='$content' $where_sql";
	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","");


// 페이지 삭제
}else if($mode == "delete"){

	$sql = "delete from wiz_content where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","");


// 디자인기본설정
}else if($mode == "basic"){

	if($site_background[size] > 0){

		file_check($site_background[name]);

		$ext = substr($site_background[name],-3);
		foreach (glob($upfile_path."/site_background*") as $filename) {
			@unlink($filename);
		}
		copy($site_background[tmp_name], $upfile_path."/site_background.".$ext);
		chmod($upfile_path."/site_background.".$ext, 0606);
		$site_background_sql = ", site_background='site_background.$ext'";
	}

	if($topmenu01_img[size] > 0){

		file_check($topmenu01_img[name]);

		copy($topmenu01_img[tmp_name], $menuimg_path."/topmenu01_img.gif");
		chmod($menuimg_path."/topmenu01_img.gif", 0606);
		$topmenu01_sql = ", topmenu01_img='$topmenu01_img_name'";
	}

   $fp = fopen("../../wiz_style.css","w");
   $dsn_css = str_replace("\\","",$dsn_css);
   fputs($fp,$dsn_css);
   fclose($fp);

  // site_title='$site_title', site_intro='$site_intro', site_keyword='$site_keyword',
	$sql = "update wiz_design set site_align='$site_align', site_bgcolor='$site_bgcolor',
					site_font='$site_font', site_link='$site_link', site_active='$site_active', site_hover='$site_hover', site_visited='$site_visited'
					$site_background_sql $cate_sql";

	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","dsn_basic.php");



// 배경이미지 삭제
}else if($mode == "back_delete"){

	foreach (glob($upfile_path."/site_background*") as $filename) {
		@unlink($filename);
	}

	$sql = "update wiz_design set site_background=''";
	$result = mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","");



// 레이아웃 구성
}else if($mode == "layout"){

	$fp = fopen("../../data/design/$dsn_file","w");
   $dsn_content = str_replace("\\","",$dsn_content);
   fputs($fp,$dsn_content);
   fclose($fp);

   complete("수정되었습니다.","dsn_layout.php?dsn_file=$dsn_file");


// 디폴트로 레이아웃 복원
}else if($mode == "default_layout"){

   $dsn_file_default = str_replace(".inc",".default",$dsn_file);

   unlink($design_path."/".$dsn_file);
   copy($design_path."/".$dsn_file_default, $design_path."/".$dsn_file);
   chmod($design_path."/".$dsn_file, 0606);
   complete("복원되었습니다.","dsn_layout.php?dsn_file=$dsn_file");


// 로고수정
}else if($mode == "logo"){

	if($logo_img[size] > 0){

		file_check($logo_img[name]);

		 $logo_img_name = "logo.".substr($logo_img[name],-3);
		 copy($logo_img[tmp_name], $mainimg_path."/".$logo_img_name);
		 @chmod($mainimg_path."/".$logo_img_name, 0606);
		 $sql = "update wiz_design set logo_img='$logo_img_name'";
		 $result = mysql_query($sql) or error(mysql_error());
	}

	complete("수정되었습니다.","dsn_logo.php");


// 로고삭제
}else if($mode == "logo_delete"){

	@unlink($mainimg_path."/".$file);

	$sql = "update wiz_design set logo_img=''";
	$result = mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","dsn_notice.php");


// 카테고리 수정
}else if($mode == "cate"){

	if($cate_img[size] > 0){
		
		file_check($cate_img[name]);

   	$cate_img_name = "cateimg.".substr($cate_img[name],-3);
    copy($cate_img[tmp_name], $mainimg_path."/".$cate_img_name);
    @chmod($mainimg_path."/".$cate_img_name, 0606);
    $cate_img_sql = " ,cate_img='".$cate_img_name."'";
	}

	$sql = "update wiz_design set cate_sub='$cate_sub', cate_menuh='$cate_menuh', cate_subx='$cate_subx', cate_suby='$cate_suby' $cate_img_sql";
	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","dsn_category.php");

// 카테고리이미지 삭제
}else if($mode =="cate_delete"){

	@unlink($mainimg_path."/".$file);

	$sql = "update wiz_design set cate_img=''";
	$result = mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","dsn_category.php");


// 메인이미지
}else if($mode == "main_img"){

	if($main_img[size] > 0){

		file_check($main_img[name]);

		$main_img_name = "mainimg.".substr($main_img[name],-3);
		copy($main_img[tmp_name], $mainimg_path."/".$main_img_name);
		@chmod($mainimg_path."/".$main_img_name, 0606);
		$main_img_sql = ", main_img='$main_img_name'";
	}

	$sql = "update wiz_design set main_link='$main_link', main_width='$main_width', main_height='$main_height' $main_img_sql";
	mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","dsn_mainimg.php");


// 메인이미지 삭제
}else if($mode =="main_delete"){

	@unlink($mainimg_path."/".$file);

	$sql = "update wiz_design set main_img=''";
	$result = mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","dsn_mainimg.php");

// 공지사항
}else if($mode == "main_notice"){

	if($notice_img[size] > 0){

		file_check($notice_img[name]);

		$notice_img_name = "notice_img.".substr($notice_img[name],-3);
		copy($notice_img[tmp_name], $mainimg_path."/".$notice_img_name);
		@chmod($mainimg_path."/".$notice_img_name, 0606);
		$notice_img_sql = " notice_img = '$notice_img_name', ";
	}

	$sql = "update wiz_design set $notice_img_sql notice_rows = '$notice_rows', notice_cut = '$notice_cut'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","");



// 공지사항이미지 삭제
}else if($mode =="notice_delete"){

	@unlink($mainimg_path."/".$file);

	$sql = "update wiz_design set notice_img=''";
	$result = mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","dsn_notice.php");



// 우측스크롤여부
}else if($mode == "right_scroll"){

	$sql = "update wiz_design set right_scroll='$right_scroll', right_prdcnt='$right_prdcnt', site_width='$site_width', right_starty='$right_starty'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","dsn_right.php");



// 상품바 삭제
}else if($mode =="prdbar_delete"){

	@unlink($mainimg_path."/".$file);

	$sql = "update wiz_prdmain set barimg='' where type='$type'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","dsn_prdmain.php?grp=".$type);



// 메인 상품
}else if($mode == "prdmain"){


	// 신상품 수정
	if($grp == "new"){
		if($new_barimg[size] > 0){

			file_check($new_barimg[name]);

			$new_barimg_name = "new_bar.".substr($new_barimg[name],-3);
			copy($new_barimg[tmp_name], $mainimg_path."/".$new_barimg_name);
			@chmod($mainimg_path."/".$new_barimg_name, 0606);
			$new_barimg_sql = " barimg='$new_barimg_name', ";
		}
		if($new_prd_row == "" || $new_prd_row <= 0) $new_prd_row = 1;
		$sql = "update wiz_prdmain set isuse='$new_isuse', prior='$new_prior', skin_type='$new_skin_type', prd_num='$new_prd_num', prd_row='$new_prd_row', prd_width='$new_prd_width', prd_height='$new_prd_height', $new_barimg_sql html='$new_html' where type='new'";
		$result = mysql_query($sql) or error(mysql_error());
	}

	// 인기상품 수정
	if($grp == "popular"){
		if($popular_barimg[size] > 0){

			file_check($popular_barimg[name]);

			$popular_barimg_name = "popular_bar.".substr($popular_barimg[name],-3);
			copy($popular_barimg[tmp_name], $mainimg_path."/".$popular_barimg_name);
			@chmod($mainimg_path."/".$popular_barimg_name, 0606);
			$popular_barimg_sql = " barimg='$popular_barimg_name', ";
		}
		if($popular_prd_row == "" || $popular_prd_row <= 0) $popular_prd_row = 1;
		$sql = "update wiz_prdmain set isuse='$popular_isuse', prior='$popular_prior', skin_type='$popular_skin_type', prd_num='$popular_prd_num', prd_row='$popular_prd_row', prd_width='$popular_prd_width', prd_height='$popular_prd_height', $popular_barimg_sql html='$popular_html' where type='popular'";
		$result = mysql_query($sql) or error(mysql_error());
	}

	// 추천상품 수정
	if($grp == "recom"){
		if($recom_barimg[size] > 0){
			file_check($recom_barimg[name]);

			 $recom_barimg_name = "recom_bar.".substr($recom_barimg[name],-3);
	     copy($recom_barimg[tmp_name], $mainimg_path."/".$recom_barimg_name);
	     @chmod($mainimg_path."/".$recom_barimg_name, 0606);
	     $recom_barimg_sql = " barimg='$recom_barimg_name', ";
		}
		if($recom_prd_row == "" || $recom_prd_row <= 0) $recom_prd_row = 1;
		$sql = "update wiz_prdmain set isuse='$recom_isuse', prior='$recom_prior', skin_type='$recom_skin_type', prd_num='$recom_prd_num', prd_row='$recom_prd_row', prd_width='$recom_prd_width', prd_height='$recom_prd_height', $recom_barimg_sql html='$recom_html' where type='recom'";
		$result = mysql_query($sql) or error(mysql_error());
	}

	// 세일상품 수정
	if($grp == "sale"){
		if($sale_barimg[size] > 0){
			file_check($sale_barimg[name]);

			 $sale_barimg_name = "sale_bar.".substr($sale_barimg[name],-3);
	     copy($sale_barimg[tmp_name], $mainimg_path."/".$sale_barimg_name);
	     chmod($mainimg_path."/".$sale_barimg_name, 0606);
	     $sale_barimg_sql = " barimg='$sale_barimg_name', ";
		}
		if($sale_prd_row == "" || $sale_prd_row <= 0) $sale_prd_row = 1;
		$sql = "update wiz_prdmain set isuse='$sale_isuse', prior='$sale_prior', skin_type='$sale_skin_type', prd_num='$sale_prd_num', prd_row='$sale_prd_row', prd_width='$sale_prd_width', prd_height='$sale_prd_height', $sale_barimg_sql html='$sale_html' where type='sale'";
		$result = mysql_query($sql) or error(mysql_error());
	}

	// 베스트상품 수정
	if($grp == "best"){
		if($best_barimg[size] > 0){
			file_check($best_barimg[name]);

			 $best_barimg_name = "best_bar.".substr($best_barimg[name],-3);
	     copy($best_barimg[tmp_name], $mainimg_path."/".$best_barimg_name);
	     @chmod($mainimg_path."/".$best_barimg_name, 0606);
	     $best_barimg_sql = " barimg='$best_barimg_name', ";
		}
		if($best_prd_row == "" || $best_prd_row <= 0) $best_prd_row = 1;
		$sql = "update wiz_prdmain set isuse='$best_isuse', prior='$sale_prior', skin_type='$sale_skin_type', prd_num='$best_prd_num', prd_row='$best_prd_row', prd_width='$best_prd_width', prd_height='$best_prd_height', $best_barimg_sql html='$best_html' where type='best'";
		$result = mysql_query($sql) or error(mysql_error());
	}

   complete("수정되었습니다.","dsn_prdmain.php?grp=$grp");


// 배너그룹수정
}else if($mode == "ban_group_update") {


	$sql = "update wiz_bannerinfo set title='$title', types='$types', types_num='$types_num', isuse='$isuse' where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("배너그룹이 수정되었습니다.","dsn_banner_input".$popup.".php?mode=ban_group_update&idx=$idx&?place=$place");


// 배너추가
}else if($mode == "ban_insert"){

	if($de_img[size] > 0){
		file_check($de_img[name]);

    $de_img_ext = strtolower(substr($de_img[name],-3));
    $de_img_name = date('ymdhis').rand(10,99).".".$de_img_ext;
		copy($de_img[tmp_name], $banner_path."/".$de_img_name);
		@chmod($banner_path."/".$de_img_name, 0606);
	}

	$content = str_replace("\\\"", "\'", $content);

	$sql = "insert into wiz_banner(idx,name,align,prior,isuse,link_url,link_target,de_type,de_img,de_html) values('', '$name','$align', '$prior', '$isuse', '$link_url', '$link_target', '$de_type', '$de_img_name', '$content')";
	$result = mysql_query($sql) or error(mysql_error());

	complete("배너가 추가되었습니다.","dsn_banner".$popup.".php?code=$name&align=$align");



// 배너수정
}else if($mode == "ban_update"){

	if($de_img[size] > 0){

		file_check($de_img[name]);

		$sql = "select de_img from wiz_banner where idx = '$idx';";
		$result = mysql_query($sql) or error(mysql_error());
		$row = mysql_fetch_array($result);

		if($row[de_img] != "") @unlink($banner_path."/".$row[de_img]);

    $de_img_ext = strtolower(substr($de_img[name],-3));
    $de_img_name = date('ymdhis').rand(10,99).".".$de_img_ext;
		copy($de_img[tmp_name], $banner_path."/".$de_img_name);
		@chmod($banner_path."/".$de_img_name, 0606);
		$de_img_sql = " de_img='$de_img_name', ";
	}

	$content = str_replace("\\\"", "\'", $content);

	$sql = "update wiz_banner set name='$name',align='$align', prior='$prior', isuse='$isuse', link_url='$link_url', link_target='$link_target',
							de_type='$de_type', $de_img_sql de_html='$content' where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("배너가 수정되었습니다.","dsn_banner_input".$popup.".php?mode=ban_update&code=$name&idx=$idx&align=$align");




// 배너삭제
}else if($mode == "ban_delete"){

	if($ban_img != "") @unlink($banner_path."/".$ban_img);

	$sql = "DELETE FROM wiz_banner WHERE idx = '$idx'";
	mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","dsn_banner".$popup.".php?code=$code");



// 탑메뉴 이미지삭제
}else if($mode == "topmenu_del"){

	if(is_file($menuimg_path."/".$file)){
		@unlink($menuimg_path."/".$file);
	}

	complete("삭제되었습니다.","dsn_topmenu.php");



// 탑메뉴관리
}else if($mode == "topmenu"){

	if($topmenu01_img[size] > 0){
		file_check($topmenu01_img[name]);
		copy($topmenu01_img[tmp_name], $menuimg_path."/topmenu01.gif");
		chmod($menuimg_path."/topmenu01.gif", 0606);
	}
	if($topmenu02_img[size] > 0){
		file_check($topmenu02_img[name]);
		copy($topmenu02_img[tmp_name], $menuimg_path."/topmenu02.gif");
		chmod($menuimg_path."/topmenu02.gif", 0606);
	}
	if($topmenu03_img[size] > 0){
		file_check($topmenu03_img[name]);
		copy($topmenu03_img[tmp_name], $menuimg_path."/topmenu03.gif");
		chmod($menuimg_path."/topmenu03.gif", 0606);
	}
	if($topmenu04_img[size] > 0){
		file_check($topmenu04_img[name]);
		copy($topmenu04_img[tmp_name], $menuimg_path."/topmenu04.gif");
		chmod($menuimg_path."/topmenu04.gif", 0606);
	}
	if($topmenu05_img[size] > 0){
		file_check($topmenu05_img[name]);
		copy($topmenu05_img[tmp_name], $menuimg_path."/topmenu05.gif");
		chmod($menuimg_path."/topmenu05.gif", 0606);
	}
	if($topmenu06_img[size] > 0){
		file_check($topmenu06_img[name]);
		copy($topmenu06_img[tmp_name], $menuimg_path."/topmenu06.gif");
		chmod($menuimg_path."/topmenu06.gif", 0606);
	}
	if($topmenu07_img[size] > 0){
		file_check($topmenu07_img[name]);
		copy($topmenu07_img[tmp_name], $menuimg_path."/topmenu07.gif");
		chmod($menuimg_path."/topmenu07.gif", 0606);
	}
	if($topmenu08_img[size] > 0){
		file_check($topmenu08_img[name]);
		copy($topmenu08_img[tmp_name], $menuimg_path."/topmenu08.gif");
		chmod($menuimg_path."/topmenu08.gif", 0606);
	}
	if($topmenu09_img[size] > 0){
		file_check($topmenu09_img[name]);
		copy($topmenu09_img[tmp_name], $menuimg_path."/topmenu09.gif");
		chmod($menuimg_path."/topmenu09.gif", 0606);
	}
	if($topmenu10_img[size] > 0){
		file_check($topmenu10_img[name]);
		copy($topmenu10_img[tmp_name], $menuimg_path."/topmenu10.gif");
		chmod($menuimg_path."/topmenu10.gif", 0606);
	}
	
	if($topmenu01_over[size] > 0){
		file_check($topmenu01_over[name]);
		copy($topmenu01_over[tmp_name], $menuimg_path."/topmenu01_over.gif");
		chmod($menuimg_path."/topmenu01_over.gif", 0606);
	}
	if($topmenu02_over[size] > 0){
		file_check($topmenu02_over[name]);
		copy($topmenu02_over[tmp_name], $menuimg_path."/topmenu02_over.gif");
		chmod($menuimg_path."/topmenu02_over.gif", 0606);
	}
	if($topmenu03_over[size] > 0){
		file_check($topmenu03_over[name]);
		copy($topmenu03_over[tmp_name], $menuimg_path."/topmenu03_over.gif");
		chmod($menuimg_path."/topmenu03_over.gif", 0606);
	}
	if($topmenu04_over[size] > 0){
		file_check($topmenu04_over[name]);
		copy($topmenu04_over[tmp_name], $menuimg_path."/topmenu04_over.gif");
		chmod($menuimg_path."/topmenu04_over.gif", 0606);
	}
	if($topmenu05_over[size] > 0){
		file_check($topmenu05_over[name]);
		copy($topmenu05_over[tmp_name], $menuimg_path."/topmenu05_over.gif");
		chmod($menuimg_path."/topmenu05_over.gif", 0606);
	}
	if($topmenu06_over[size] > 0){
		file_check($topmenu06_over[name]);
		copy($topmenu06_over[tmp_name], $menuimg_path."/topmenu06_over.gif");
		chmod($menuimg_path."/topmenu06_over.gif", 0606);
	}
	if($topmenu07_over[size] > 0){
		file_check($topmenu07_over[name]);
		copy($topmenu07_over[tmp_name], $menuimg_path."/topmenu07_over.gif");
		chmod($menuimg_path."/topmenu07_over.gif", 0606);
	}
	if($topmenu08_over[size] > 0){
		file_check($topmenu08_over[name]);
		copy($topmenu08_over[tmp_name], $menuimg_path."/topmenu08_over.gif");
		chmod($menuimg_path."/topmenu08_over.gif", 0606);
	}
	if($topmenu09_over[size] > 0){
		file_check($topmenu09_over[name]);
		copy($topmenu09_over[tmp_name], $menuimg_path."/topmenu09_over.gif");
		chmod($menuimg_path."/topmenu09_over.gif", 0606);
	}
	if($topmenu10_over[size] > 0){
		file_check($topmenu10_over[name]);
		copy($topmenu10_over[tmp_name], $menuimg_path."/topmenu10_over.gif");
		chmod($menuimg_path."/topmenu10_over.gif", 0606);
	}

	$sql = "update wiz_design set topmenu01_url='$topmenu01_url',topmenu02_url='$topmenu02_url',topmenu03_url='$topmenu03_url',topmenu04_url='$topmenu04_url',topmenu05_url='$topmenu05_url',
							topmenu06_url='$topmenu06_url',topmenu07_url='$topmenu07_url',topmenu08_url='$topmenu08_url',topmenu09_url='$topmenu09_url',topmenu10_url='$topmenu10_url'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","dsn_topmenu.php");



// 탑네비관리
}else if($mode == "topnavi"){
	
	if($topnavi_login_img[size] > 0){
		file_check($topnavi_login_img[name]);
		copy($topnavi_login_img[tmp_name], $menuimg_path."/topnavi_login.gif");
		chmod($menuimg_path."/topnavi_login.gif", 0606);
	}
	if($topnavi_logout_img[size] > 0){
		file_check($topnavi_logout_img[name]);
		copy($topnavi_logout_img[tmp_name], $menuimg_path."/topnavi_logout.gif");
		chmod($menuimg_path."/topnavi_logout.gif", 0606);
	}
	if($topnavi_join_img[size] > 0){
		file_check($topnavi_join_img[name]);
		copy($topnavi_join_img[tmp_name], $menuimg_path."/topnavi_join.gif");
		chmod($menuimg_path."/topnavi_join.gif", 0606);
	}
	if($topnavi_myshop_img[size] > 0){
		file_check($topnavi_myshop_img[name]);
		copy($topnavi_myshop_img[tmp_name], $menuimg_path."/topnavi_myshop.gif");
		chmod($menuimg_path."/topnavi_myshop.gif", 0606);
	}
	
	for($ii = 1; $ii < 7; $ii++) {
		
		$topnavi_size = $_FILES['topnavi0'.$ii.'_img']['size'];
		$topnavi_name = $_FILES['topnavi0'.$ii.'_img']['name'];
		$topnavi = $_FILES['topnavi0'.$ii.'_img']['tmp_name'];
			
		if($topnavi_size > 0){
			file_check($topnavi_name);
			copy($topnavi, $menuimg_path."/topnavi0".$ii.".gif");
			chmod($menuimg_path."/topnavi0".$ii.".gif", 0606);
		}
		
	}

	$sql = "update wiz_design set topnavi01_url='$topnavi01_url',topnavi02_url='$topnavi02_url',topnavi03_url='$topnavi03_url',topnavi04_url='$topnavi04_url',topnavi05_url='$topnavi05_url',topnavi06_url='$topnavi06_url'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","dsn_navimenu.php");



// 탑메뉴 이미지삭제
}else if($mode == "topnavi_del"){

	if(is_file($menuimg_path."/".$file)){
		@unlink($menuimg_path."/".$file);
	}

	//complete("삭제되었습니다.","dsn_navimenu.php");



// 푸터관리
}else if($mode == "footer"){

	$content = str_replace("\\\"", "\'", $content);

	$sql = "update wiz_design set footer_html = '$content'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","dsn_footer.php");

}

?>