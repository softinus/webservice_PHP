<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include_once "../../inc/bbs_info.inc"; ?>

<?
$upfile_path = "../../data/bbs/".$code;						// ���ε����� ��ġ
$upfile_idx = date('ymdhis').rand(1,9);						// ���ε����ϸ�
$S_width = 120; $S_height = 120;									// ���������� ũ��
$M_width = 600; $M_height = 600;									// �߰������� ũ��

// �˻� �Ķ����
$param = "code=$code&idx=$idx&page=$page&category=$category&searchopt=$searchopt&searchkey=$searchkey";

// �Խù� �Է�
if($mode == "insert"){

	// ���Ա� ����
	$pos = strpos($HTTP_REFERER, $HTTP_HOST);
  if($pos === false) error("�߸��� ��� �Դϴ�.");

	$sql = "select max(prino) as prino from wiz_bbs where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_array($result)){
		$prino = $row[prino] + 1;
	}
	$grpno = $prino;
	
	include "./upfile.inc";
	
	$memid = $wiz_admin[id];
	$memgrp = $wiz_admin[id];
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($bbs_info[editor] == "Y") $ctype = "H";
	
	$sql = "insert into wiz_bbs(idx,code,prino,grpno,depno,notice,category,memid,memgrp,name,email,tphone,hphone,zipcode,address,subject,content,addinfo1,addinfo2,addinfo3,addinfo4,addinfo5,ctype,privacy,upfile1,upfile2,upfile3,upfile1_name,upfile2_name,upfile3_name,movie1,movie2,movie3,passwd,count,recom,comment,ip,wdate) 
					values('','$code','$prino','$grpno','$depno','$notice','$category','$memid','$memgrp','$name','$email','$tphone','$hphone','$zipcode','$address','$subject','$content','$addinfo1','$addinfo2','$addinfo3','$addinfo4','$addinfo5','$ctype','$privacy','$upfile1_tmp','$upfile2_tmp','$upfile3_tmp','$upfile1_name','$upfile2_name','$upfile3_name','$movie1','$movie2','$movie3','$passwd','$count','$recom','$comment','$REMOTE_ADDR',unix_timestamp('$wdate'))"; 

	mysql_query($sql) or error(mysql_error());
   
	complete("�Խù��� �ۼ��Ǿ����ϴ�.","list.php?code=$code");




// �Խù� ����
}else if($mode == "update"){

	include "./upfile.inc";
	
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($bbs_info[editor] == "Y") $ctype = "H";
	
	$sql = "update wiz_bbs set notice='$notice',category='$category',name='$name',email='$email',tphone='$tphone',hphone='$hphone',zipcode='$zipcode',address='$address',subject='$subject',content='$content',addinfo1='$addinfo1',addinfo2='$addinfo2',addinfo3='$addinfo3',addinfo4='$addinfo4',addinfo5='$addinfo5',ctype='$ctype',privacy='$privacy' $upfile_sql $movie1_sql ,movie1='$movie1',movie2='$movie2',movie3='$movie3',passwd='$passwd',count='$count',wdate=unix_timestamp('$wdate') where idx = '$idx'"; 
	
	mysql_query($sql) or error(mysql_error());
   
	complete("�Խù��� �����Ǿ����ϴ�.","view.php?$param");




// ����ۼ�
}else if($mode == "reply"){

	$sql = "select idx,grpno,prino,depno,memid,memgrp,name,email from wiz_bbs where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);
	$re_name = $row[name];
	$re_email = $row[email];

	$grpno = $row[grpno];
	$prino = $row[prino];
	$depno = ++$row[depno];

	include "./upfile.inc";
	
	$memid = $wiz_admin[id];
	$memgrp = $row[memgrp].",".$memid;
	if($privacy == "Y") $memid = $row[memid];
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($bbs_info[editor] == "Y") $ctype = "H";
	
	$sql = "update wiz_bbs set prino = prino+1 where code = '$code' and prino >= '$prino'";
	$result = mysql_query($sql) or error(mysql_error());

	$sql = "insert into wiz_bbs(idx,code,prino,grpno,depno,notice,category,memid,memgrp,name,email,tphone,hphone,zipcode,address,subject,content,addinfo1,addinfo2,addinfo3,addinfo4,addinfo5,ctype,privacy,upfile1,upfile2,upfile3,upfile1_name,upfile2_name,upfile3_name,passwd,count,recom,comment,ip,wdate) 
					values('','$code','$prino','$grpno','$depno','$notice','$category','$memid','$memgrp','$name','$email','$tphone','$hphone','$zipcode','$address','$subject','$content','$addinfo1','$addinfo2','$addinfo3','$addinfo4','$addinfo5','$ctype','$privacy','$upfile1','$upfile2','$upfile3','$upfile1_name','$upfile2_name','$upfile3_name','$passwd','$count','$recom','$comment','$REMOTE_ADDR',unix_timestamp('$wdate'))"; 

	mysql_query($sql) or error(mysql_error());


	// ��� ���Ϲ߼�
	if($bbs_info[remail] == "Y"){
		
		include "../../inc/bbs_info.php";
		$mail_info = get_table("wiz_mailsms", "code = 'bbs'");
		
		$content = str_replace("\n","<br>",$content);
		$content = "<table width=100% cellpadding=2><tr><td bgcolor=#efefef>&nbsp; <b>���� : $subject</b></td></tr><tr><td><br></td></tr><tr><td>$content</td></tr></table>";

		$email_subj = "[".$site_info[site_name]."] �����Ͻ� �Խù� �亯�Դϴ�.";
		$email_msg = str_replace("{MESSAGE}",$content,$mail_info[email_msg]);
		$email_msg = str_replace("{SITE_URL}", "http://".$HTTP_HOST, $email_msg);
		
		send_mail($site_info[site_name], $site_info[site_email], $re_name, $re_email, $email_subj, $email_msg);
		
	}
	
	complete("����� �ۼ��Ǿ����ϴ�.","list.php?code=$code&page=$page");



// �ۻ���
}else if($mode == "delete"){

	$sql = "select upfile1,upfile2,upfile3 from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);

  if($bbs_row[upfile1] != ""){
		@unlink($upfile_path."/".$bbs_row[upfile1]);
		@unlink($upfile_path."/S".$bbs_row[upfile1]);
		@unlink($upfile_path."/M".$bbs_row[upfile1]);
	}
	if($bbs_row[upfile2] != ""){
		@unlink($upfile_path."/".$bbs_row[upfile2]);
		@unlink($upfile_path."/S".$bbs_row[upfile2]);
		@unlink($upfile_path."/M".$bbs_row[upfile2]);
	}
	if($bbs_row[upfile3] != ""){
		@unlink($upfile_path."/".$bbs_row[upfile3]);
		@unlink($upfile_path."/S".$bbs_row[upfile3]);
		@unlink($upfile_path."/M".$bbs_row[upfile3]);
	}
	
	$sql = "delete from wiz_bbs where idx = '$idx'";
	mysql_query($sql) or error(mysql_error());
	
	complete("�Խù��� �����Ǿ����ϴ�.","list.php?$param");
	


// ���߻���
}else if($mode == "delbbs"){

	$array_selbbs = explode("|",$selbbs);
	for($ii=0;$ii<count($array_selbbs);$ii++){
		
		$idx = $array_selbbs[$ii];
		$sql = "select upfile1,upfile2,upfile3 from wiz_bbs where idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		$bbs_row = mysql_fetch_array($result);

		if($bbs_row[upfile1] != ""){
			@unlink($upfile_path."/".$bbs_row[upfile1]);
			@unlink($upfile_path."/S".$bbs_row[upfile1]);
			@unlink($upfile_path."/M".$bbs_row[upfile1]);
		}
		if($bbs_row[upfile2] != ""){
			@unlink($upfile_path."/".$bbs_row[upfile2]);
			@unlink($upfile_path."/S".$bbs_row[upfile2]);
			@unlink($upfile_path."/M".$bbs_row[upfile2]);
		}
		if($bbs_row[upfile3] != ""){
			@unlink($upfile_path."/".$bbs_row[upfile3]);
			@unlink($upfile_path."/S".$bbs_row[upfile3]);
			@unlink($upfile_path."/M".$bbs_row[upfile3]);
		}
		
		$sql = "delete from wiz_bbs where idx='$idx'";
		mysql_query($sql) or error(mysql_error());

	}

	complete("�Խù��� �����Ǿ����ϴ�.","list.php?$param");




// ÷������ ����
}else if($mode == "delfile"){

	$sql = "select upfile1,upfile2,upfile3 from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);

	if($file == "upfile1"){
		$upfile_sql = " upfile1 = '', upfile1_name = ''";
		@unlink($upfile_path."/".$bbs_row[upfile1]);
		@unlink($upfile_path."/S".$bbs_row[upfile1]);
		@unlink($upfile_path."/M".$bbs_row[upfile1]);
	}else if($file == "upfile2"){
		$upfile_sql = " upfile2 = '', upfile2_name = ''";
		@unlink($upfile_path."/".$bbs_row[upfile2]);
		@unlink($upfile_path."/S".$bbs_row[upfile2]);
		@unlink($upfile_path."/M".$bbs_row[upfile2]);
	}else if($file == "upfile3"){
		$upfile_sql = " upfile3 = '', upfile3_name = ''";
		@unlink($upfile_path."/".$bbs_row[upfile3]);
		@unlink($upfile_path."/S".$bbs_row[upfile3]);
		@unlink($upfile_path."/M".$bbs_row[upfile3]);
	}
	
	$sql = "update wiz_bbs set $upfile_sql where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("������ �����Ǿ����ϴ�.","input.php?mode=update&$param");
	
	
// �ڸ�Ʈ �Է�
}else if($mode == "comment"){
	
	$ctype = "SCH";
	
	$sql = "insert into wiz_comment(idx,ctype,cidx,prdcode,star,id,name,content,passwd,wdate,wip) 
					values('', '$ctype', '$cidx', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
	$result = mysql_query($sql) or error(mysql_error());

	// ��ۼ� ������Ʈ
	$sql = "select idx from wiz_comment where ctype='SCH' and cidx='$cidx'";
	$result = mysql_query($sql) or error(mysql_error());
	$comment = mysql_num_rows($result);
	
	$sql = "update wiz_bbs set comment = '$comment' where idx = '$cidx'";
	mysql_query($sql) or error(mysql_error());
	
	complete("����� �ۼ��Ǿ����ϴ�.","view.php?code=$code&idx=$cidx");


// �ڸ�Ʈ ����
}else if($mode == "delcomment"){
	
	$sql = "delete from wiz_comment where idx='$idx'";
  $result = mysql_query($sql) or error(mysql_error());
  
  // ��ۼ� ������Ʈ
	$sql = "select idx from wiz_comment where cidx='$cidx'";
	$result = mysql_query($sql) or error(mysql_error());
	$comment = mysql_num_rows($result);
	
	$sql = "update wiz_bbs set comment = '$comment' where idx = '$cidx'";
	mysql_query($sql) or error(mysql_error());
	
  complete("����� �����Ǿ����ϴ�.","view.php?code=$code&idx=$cidx");

}
?>