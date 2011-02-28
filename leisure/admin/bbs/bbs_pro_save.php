<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
$upfile_path = "../../data/bbs/$code";		// ���ε� ������ġ

$upfile_idx = date('ymdhis').rand(1,9);					// ���ε����ϸ�
$category_path = "../../data/category/$code";		// ī�װ� ���ε� ������ġ

// ���ε� ���丮 ����
if(!is_dir($upfile_path)) mkdir($upfile_path, 0707);

// ���ε� ���丮 ����
if(!is_dir($category_path)) mkdir($category_path, 0707);

if($mode == "insert"){

	if($titleimg[size] > 0){
		
		file_check($titleimg[name]);
	
		$ext = substr($titleimg[name],-3);
		$titleimg_name = $code."_title.".$ext;
		copy($titleimg[tmp_name], $upfile_path."/".$titleimg_name);
		chmod($upfile_path."/".$titleimg_name, 0606);
	}
	
	if(empty($type)) $type = "BBS";
	if(empty($skin)) $type = "bbsBasic";

	$sql = "insert into wiz_bbsinfo (code,type,title,titleimg,header,footer,category,bbsadmin,lpermi,
					rpermi,wpermi,apermi,cpermi,datetype_list,datetype_view,skin,permsg,perurl,pageurl,editor,
					usetype,privacy,upfile,movie,comment,remail,imgview,recom,abuse,abtxt,simgsize,mimgsize,
					rows,lists,newc,hotc,line,subject_len,img_align,btn_view,spam_check,view_list)
					values('$code','$type','$title','$titleimg_name','$header','$footer','$category','$bbsadmin',
					'$lpermi','$rpermi','$wpermi','$apermi','$cpermi','$datetype_list','$datetype_view','$skin',
					'$permsg','$perurl','$pageurl','$editor','$usetype','$privacy','$upfile','$movie','$comment',
					'$remail','$imgview','$recom','$abuse','$abtxt','$simgsize','$mimgsize','$rows','$lists',
					'$newc','$hotc','$line','$subject_len','$img_align','$btn_view','$spam_check','$view_list')";
	$result = mysql_query($sql);

	if(mysql_errno() > 0) echo "<script>alert('�̹̻����� �Խ����Դϴ�.');history.go(-1);</script>";
	else {
		
		if(empty($catname)) $catname = "��ü";
		
		//��ü ī�װ� �߰�
	  $sql = "insert into wiz_bbscat (idx,gubun,code,catname,catimg,catimg_over,caticon)
	  				values('','A','$code','$catname','$catimg_tmp','$catimg_over_tmp','$caticon_tmp')";
	  mysql_query($sql) or error(mysql_error());
	
		complete("�Խ����� �߰� �Ͽ����ϴ�.","bbs_pro_input.php?mode=update&code=$code");
	}


}else if($mode == "update"){

	if($titleimg[size] > 0){
		
		file_check($titleimg[name]);
	
		$ext = substr($titleimg[name],-3);
		$titleimg_name = $code."_title.".$ext;
		copy($titleimg[tmp_name], $upfile_path."/".$titleimg_name);
		chmod($upfile_path."/".$titleimg_name, 0606);
		$titleimg_sql = "titleimg='$titleimg_name', ";
	}

	$sql = "update wiz_bbsinfo set title='$title', $titleimg_sql
					header='$header',footer='$footer',category='$category',bbsadmin='$bbsadmin',
					lpermi='$lpermi',rpermi='$rpermi',wpermi='$wpermi',apermi='$apermi',cpermi='$cpermi',
					datetype_list='$datetype_list',datetype_view='$datetype_view',skin='$skin',
					permsg='$permsg',perurl='$perurl',pageurl='$pageurl',editor='$editor',usetype='$usetype',
					privacy='$privacy',upfile='$upfile',movie='$movie',comment='$comment',remail='$remail',
					imgview='$imgview',recom='$recom',abuse='$abuse',abtxt='$abtxt',
					simgsize='$simgsize',mimgsize='$mimgsize',rows='$rows',lists='$lists',newc='$newc',
					hotc='$hotc',line='$line',subject_len='$subject_len',img_align='$img_align',
					btn_view='$btn_view',spam_check='$spam_check',view_list='$view_list' where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("�Խ��� ������ �����Ͽ����ϴ�.","bbs_pro_input.php?mode=update&code=$code");


}else if($mode == "delete"){

	if($code == "qna" || $code == "faq" || $code == "notice" || $code == "review"){
		comalert("�ش� �Խ����� ������ �� �����ϴ�.");
		exit;
	}

	$sql = "delete from wiz_bbsinfo where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	
	$sql = "delete from wiz_bbscat where code = '$code'";
	mysql_query($sql) or error(mysql_error());
	
	$sql = "delete from wiz_bbs where code = '$code'";
	mysql_query($sql) or error(mysql_error());
	
	// ÷������, ī�װ� ���丮 ����
	nRmDir($upfile_path); nRmDir($category_path);
	
	complete("�ش�Խ����� �����Ǿ����ϴ�.","bbs_pro_list.php");


}else if($mode == "del_titleimg"){

	$sql = "select titleimg from wiz_bbsinfo where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);

	$titleimg_name = $row[titleimg];
	unlink($upfile_path."/".$titleimg_name);

	$sql = "update wiz_bbsinfo set titleimg='' where code = '$code'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("Ÿ��Ʋ �̹����� ���� �Ͽ����ϴ�.","bbs_pro_input.php?mode=update&code=$code");

// ī�װ� �Է�
} else if(!strcmp($mode, "catinsert")) {
	
	if(!strcmp($gubun, "A")) {
	
		$sql = "select gubun from wiz_bbscat where code = '$code' and gubun = 'A'";
		$result = mysql_query($sql) or error(mysql_error());
		$row = mysql_fetch_array($result);
		
		if(!empty($row[gubun])) {
			error("�̹� ��ü�з��� ��ϵǾ� �ֽ��ϴ�.", "");
			exit;
		}
		
	}
	
	// ���ε� ���丮 ����
	if(!is_dir($category_path)) mkdir($category_path, 0707);
	
	if($catimg[size] > 0){

		file_check($catimg[name]);

		$catimg_tmp = $upfile_idx."_img.".substr($catimg[name],-3);
		copy($catimg[tmp_name], $category_path."/".$catimg_tmp);
		chmod($category_path."/".$catimg_tmp, 0606);

	}
	if($catimg_over[size] > 0){

		file_check($catimg_over[name]);

		$catimg_over_tmp = $upfile_idx."_img_over.".substr($catimg_over[name],-3);
		copy($catimg_over[tmp_name], $category_path."/".$catimg_over_tmp);
		chmod($category_path."/".$catimg_over_tmp, 0606);

	}
	if($caticon[size] > 0){

		file_check($caticon[name]);

		$caticon_tmp = $upfile_idx."_icon.".substr($caticon[name],-3);
		copy($caticon[tmp_name], $category_path."/".$caticon_tmp);
		chmod($category_path."/".$caticon_tmp, 0606);

	}

  $sql = "insert into wiz_bbscat (idx,gubun,code,catname,catimg,catimg_over,caticon)
  				values('','$gubun','$code','$catname','$catimg_tmp','$catimg_over_tmp','$caticon_tmp')";
  mysql_query($sql) or error(mysql_error());

  $idx = mysql_insert_id();

	echo "<script>window.opener.document.location.href = window.opener.document.URL;</script>";
	complete("����Ǿ����ϴ�.","category_input.php?code=$code&title=$title&idx=$idx&mode=catupdate");

// ī�װ� ����
} else if(!strcmp($mode, "catupdate")) {

	if(!strcmp($gubun, "A")) {
	
		$sql = "select gubun from wiz_bbscat where code = '$code' and gubun = 'A' and idx != '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		$row = mysql_fetch_array($result);
		
		if(!empty($row[gubun])) {
			error("�̹� ��ü�з��� ��ϵǾ� �ֽ��ϴ�.", "");
			exit;
		}
		
	}
	
	// ���ε� ���丮 ����
	if(!is_dir($category_path)) mkdir($category_path, 0707);
	
	$sql = "select catimg,catimg_over,caticon from wiz_bbscat where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$cat_row = mysql_fetch_array($result);
	
	for($ii = 0; $ii < count($delfile); $ii++) {
		
		if($cat_row[$delfile[$ii]] != ""){
			@unlink($category_path."/".$cat_row[$delfile[$ii]]);
			${$delfile[$ii]."_sql"} = " , $delfile[$ii] = '' ";
		}
	}
	
	if($catimg[size] > 0){

		file_check($catimg[name]);

		$catimg_tmp = $upfile_idx."_img.".substr($catimg[name],-3);
		copy($catimg[tmp_name], $category_path."/".$catimg_tmp);
		chmod($category_path."/".$catimg_tmp, 0606);

		if($cat_row[catimg] != ""){
			@unlink($category_path."/".$cat_row[catimg]);
		}
		$catimg_sql = " , catimg='$catimg_tmp' ";


	}
	if($catimg_over[size] > 0){

		file_check($catimg_over[name]);

		$catimg_over_tmp = $upfile_idx."_img_over.".substr($catimg_over[name],-3);
		copy($catimg_over[tmp_name], $category_path."/".$catimg_over_tmp);
		chmod($category_path."/".$catimg_over_tmp, 0606);

		if($cat_row[catimg_over] != ""){
			@unlink($category_path."/".$cat_row[catimg_over]);
		}
		$catimg_over_sql = " , catimg_over='$catimg_over_tmp' ";


	}
	if($caticon[size] > 0){

		file_check($caticon[name]);

		$caticon_tmp = $upfile_idx."_icon.".substr($caticon[name],-3);
		copy($caticon[tmp_name], $category_path."/".$caticon_tmp);
		chmod($category_path."/".$caticon_tmp, 0606);

		if($cat_row[caticon] != ""){
			@unlink($category_path."/".$cat_row[caticon]);
		}
		$caticon_sql = " , caticon='$caticon_tmp' ";

	}
	
  $sql = "update wiz_bbscat set gubun='$gubun', catname='$catname' $catimg_sql $catimg_over_sql $caticon_sql where idx = '$idx'";
  mysql_query($sql) or error(mysql_error()); 
  
	echo "<script>window.opener.document.location.href = window.opener.document.URL;</script>";
	complete("�����Ǿ����ϴ�.","category_input.php?code=$code&title=$title&idx=$idx&mode=catupdate");

// ī�װ� ����
} else if(!strcmp($mode, "catdelete")) {
		
	$sql = "select gubun, code, catimg, catimg_over, caticon from wiz_bbscat where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$cat_row = mysql_fetch_array($result);
	
	if(!strcmp($cat_row[gubun], "A")) {
		error("��ü�з��� ������ �� �����ϴ�.", "");
		exit;
	}
	
	@unlink($category_path."/".$cat_row[catimg]);
	@unlink($category_path."/".$cat_row[catimg_over]);
	@unlink($category_path."/".$cat_row[caticon]);
	
  $sql = "delete from wiz_bbscat where idx = '$idx'";
  mysql_query($sql) or error(mysql_error()); 
	
	echo "<script>window.opener.document.location.href = window.opener.document.URL;</script>";
	complete("�����Ǿ����ϴ�.","category.php?code=$code&title=$title");
	
}
?>