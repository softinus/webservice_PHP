<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

$param = "page=".$page."&searchopt=".$searchopt."&searchkey=".$searchkey;

$usetype = "Y";

$upfile_path = "../../data/poll/$code";		// ���ε� ������ġ

// ���ε� ���丮 ����
if(!is_dir($upfile_path)) mkdir($upfile_path, 0707);

// �����Է�
if($mode == "insert"){
	
	$mainskin = "	
	<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
	<tr><td><b>{SUBJECT}</b></td></tr>
	<tr><td>{CONTENT}</td></tr>
	[LOOP]
	<tr><td><img src=\"/admin/bbsmain/image/point.gif\" align=\"absmiddle\"> {QUESTION}</td></tr>
	[LOOP2]
	<tr><td> {ANSWER} </td></tr>
	[/LOOP2]
	[/LOOP]
	<tr><td height=5></td></tr>
	<tr><td align=center>{VOTE_BTN} {VIEW_BTN}</td></tr>
	</table>";
	
	if($titleimg_size > 0){
		
		file_check($titleimg_name);
	
		$ext = substr($titleimg_name,-3);
		$titleimg_name = $code."_title.".$ext;
		copy($titleimg, $upfile_path."/".$titleimg_name);
		chmod($upfile_path."/".$titleimg_name, 0606);
	}

   $sql = "insert into wiz_pollinfo (code,title,titleimg,header,footer,lpermi,rpermi,apermi,cpermi,skin,
   				permsg,perurl,mainskin,purl,usetype,spam_check,datetype_list,datetype_view,comment,rows,lists,
   				newc,subject_len,abuse,abtxt,wdate) 
   				values('$code','$title','$titleimg_name','$header','$footer','$lpermi','$rpermi','$apermi','$cpermi',
   				'$skin','$permsg','$perurl','$mainskin','$purl','$usetype','$spam_check','$datetype_list',
   				'$datetype_view','$comment','$rows','$lists','$newc','$subject_len','$abuse','$abtxt',now())";
   				
   mysql_query($sql) or error(mysql_error());
		
   complete("������ �߰� �Ͽ����ϴ�.","pollinfo_input.php?mode=update&code=$code");
   

// ��������
}else if($mode == "update"){
	
	if($titleimg_size > 0){
		
		file_check($titleimg_name);
	
		$ext = substr($titleimg_name,-3);
		$titleimg_name = $code."_title.".$ext;
		copy($titleimg, $upfile_path."/".$titleimg_name);
		chmod($upfile_path."/".$titleimg_name, 0606);
		$titleimg_sql = "titleimg='$titleimg_name', ";
	}

  $sql = "update wiz_pollinfo set title='$title', $titleimg_sql header='$header',footer='$footer',
  				lpermi='$lpermi',rpermi='$rpermi',apermi='$apermi',cpermi='$cpermi',skin='$skin',
  				permsg='$permsg',perurl='$perurl',purl='$purl',usetype='$usetype',
  				spam_check='$spam_check',datetype_list='$datetype_list',datetype_view='$datetype_view',
  				comment='$comment',rows='$rows',lists='$lists',newc='$newc',subject_len='$subject_len',
  				abuse='$abuse',abtxt='$abtxt' where code = '$code'";      
  mysql_query($sql) or error(mysql_error()); 
   
   complete("������ ���� �Ͽ����ϴ�.","pollinfo_input.php?mode=$mode&code=$code&$param");


// ��������
}else if($mode == "delete"){
   
   $sql = "delete from wiz_pollinfo where code = '$code'";
   $result = mysql_query($sql) or error(mysql_error());
   
   $sql = "delete from wiz_poll where code = '$code'";
   $result = mysql_query($sql) or error(mysql_error());
   
		exec("rm -rf ../../data/poll/$code");
		
   complete("������ ���� �Ͽ����ϴ�.","pollinfo_list.php?$param");

// Ÿ��Ʋ �̹��� ���� 
} else if(!strcmp($mode, "del_titleimg")) {
	
	$sql = "select titleimg from wiz_pollinfo where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);

	$titleimg_name = $row[titleimg];
	unlink($upfile_path."/".$titleimg_name);

	$sql = "update wiz_pollinfo set titleimg='' where code = '$code'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("Ÿ��Ʋ �̹����� ���� �Ͽ����ϴ�.","pollinfo_input.php?mode=update&code=$code");

}
?>