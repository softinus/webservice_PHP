<?

include "../inc/common.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util.inc";		// util lib
include "../inc/sch_info.inc"; 	 	// 게시판 정보

$upfile_path = "../data/bbs/".$code;				// 업로드파일 위치

// 검색 파라미터
$param = "code=$code";
if($page != "") $param .= "&page=$page";
if($searchkey != "") $param .= "&searchopt=$searchopt&searchkey=$searchkey";

////////////////////////////////////////////////////////////////////////////////
// 글작성
////////////////////////////////////////////////////////////////////////////////
if($mode == "write"){

	// 스팸글 차단
	$pos = strpos($HTTP_REFERER, $HTTP_HOST);
  if($pos === false) error("잘못된 경로 입니다.");

  if(!strcmp($sch_info[spam_check], "Y")) {

	  // 자동등록방지 코드 검사
	  if(empty($_POST[tmp_vcode]) || empty($_POST[vcode])) {
	  	error("자동등록방지 코드가 존재하지 않습니다.");
	  } else if(strcmp($_POST[tmp_vcode], md5($_POST[vcode]))) {
	  	error("자동등록방지 코드가 일치하지 않습니다.");
	  }
	}

	// 작성권한 체크
	if($wpermi < $mem_level) error($sch_info[permsg],$sch_info[perurl]);
	
	// 욕설체크
	check_abuse($subject); check_abuse($content);
	
	// 첨부파일 업로드
	include $DOCUMENT_ROOT."/bbs/upfile.inc";

	// 입력데이터
	$memid = $wiz_session[id];
	$memgrp = $wiz_session[id];
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($passwd == "") $passwd = $wiz_session[passwd];
	if($sch_info[editor] == "Y") $ctype = "H";


	$sql = "select max(prino) as prino from wiz_bbs where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_array($result)){
		$prino = $row[prino] + 1;
	}
	$grpno = $prino;
	
	$sql = "insert into wiz_bbs(idx,code,prino,grpno,depno,notice,category,memid,memgrp,name,email,tphone,hphone,zipcode,address,subject,content,addinfo1,addinfo2,addinfo3,addinfo4,addinfo5,ctype,privacy,upfile1,upfile2,upfile3,upfile1_name,upfile2_name,upfile3_name,movie1,movie2,movie3,passwd,count,recom,comment,ip,wdate) 
					values('','$code','$prino','$grpno','$depno','$notice','$category','$memid','$memgrp','$name','$email','$tphone','$hphone','$zipcode','$address','$subject','$content','$addinfo1','$addinfo2','$addinfo3','$addinfo4','$addinfo5','$ctype','$privacy','$upfile1_tmp','$upfile2_tmp','$upfile3_tmp','$upfile1_name','$upfile2_name','$upfile3_name',
					'$movie1_tmp','$movie2','$movie3','$passwd','$count','$recom','$comment','$REMOTE_ADDR',unix_timestamp('$wdate'))"; 

	mysql_query($sql) or error(mysql_error());

	echo "<script>document.location='list.php?$param';</script>";

////////////////////////////////////////////////////////////////////////////////
// 게시물 수정
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "modify"){

	$sql = "select memid,passwd from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);
	
	
	// 수정권한 체크
	if(
		$mem_level == "0" || 																																				// 전체관리자
		($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)  ||		// 게시판관리자
		($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) || 													// 자신의글
		($bbs_row[passwd] != "" && $bbs_row[passwd] == $passwd)																			// 비밀번호일치
	){
	}else{
		error("비밀번호가 일치하지 않습니다.");
	}

	// 욕설체크
	check_abuse($subject); check_abuse($content);

	// 첨부파일 업로드
	include $DOCUMENT_ROOT."/bbs/upfile.inc";

	// 입력데이터
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($sch_info[editor] == "Y") $ctype = "H";
	
	$sql = "update wiz_bbs set notice='$notice',category='$category',name='$name',email='$email',tphone='$tphone',hphone='$hphone',zipcode='$zipcode',address='$address',subject='$subject',content='$content',addinfo1='$addinfo1',addinfo2='$addinfo2',addinfo3='$addinfo3',addinfo4='$addinfo4',addinfo5='$addinfo5',ctype='$ctype',privacy='$privacy' $upfile1_sql $upfile2_sql $upfile3_sql $movie1_sql ,movie2='$movie2',movie3='$movie3',count='$count',wdate=unix_timestamp('$wdate') where idx = '$idx'"; 
	mysql_query($sql) or error(mysql_error());
	
	if($privacy == "Y" && ($bbs_row[memid] == "" || $wiz_session[id] == "")) $param .= "&passwd=$passwd";
	
	echo "<script>alert('수정되었습니다.'); document.location='view.php?idx=$idx&$param';</script>";

////////////////////////////////////////////////////////////////////////////////
// 답글작성
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "reply"){
	
	// 작성권한 체크
	if($apermi < $mem_level) error($sch_info[permsg],$sch_info[perurl]);
	
	// 욕설체크
	check_abuse($subject); check_abuse($content);
	
	// 첨부파일 업로드
	include WIZHOME_PATH."/bbs/upfile.inc";
	
	$sql = "select idx,grpno,prino,depno,memid,memgrp,name,email from wiz_bbs where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);
	$re_name = $row[name];
	$re_email = $row[email];
	
	$grpno = $row[grpno];
	$prino = $row[prino];
	$depno = ++$row[depno];

	// 입력데이타
	$memid = $wiz_session[id];
	$memgrp = $row[memgrp].",".$memid;
	if($privacy == "Y") $memid = $row[memid];
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($passwd == "") $passwd = $wiz_session[passwd];
	if($sch_info[editor] == "Y") $ctype = "H";
	
	$sql = "update wiz_bbs set prino = prino+1 where code = '$code' and prino >= '$prino'";
	$result = mysql_query($sql) or error(mysql_error());
	
	
	$sql = "insert into wiz_bbs(idx,code,grpno,prino,depno,notice,category,memid,memgrp,name,email,tphone,hphone,zipcode,address,subject,content,addinfo1,addinfo2,addinfo3,addinfo4,addinfo5,ctype,privacy,upfile1,upfile2,upfile3,upfile1_name,upfile2_name,upfile3_name,movie1,movie2,movie3,passwd,count,recom,comment,ip,wdate) 
					values('','$code','$grpno','$prino','$depno','$notice','$category','$memid','$memgrp','$name','$email','$tphone','$hphone','$zipcode','$address','$subject','$content','$addinfo1','$addinfo2','$addinfo3','$addinfo4','$addinfo5','$ctype','$privacy','$upfile1','$upfile2','$upfile3','$upfile1_name','$upfile2_name','$upfile3_name',
					'$movie1_tmp','$movie2','$movie3','$passwd','$count','$recom','$comment','$REMOTE_ADDR',unix_timestamp('$wdate'))"; 

	mysql_query($sql) or error(mysql_error());
	
	// 답글 메일발송
	if($sch_info[remail] == "Y"){
		
		include_once "$DOCUMENT_ROOT/admin/inc/site_info.php";
		
		$mail_info = get_table("wiz_mailsms", "code = 'bbs'");
		
		$content = str_replace("\n","<br>",$content);
		$content = "<table width=100% cellpadding=2><tr><td bgcolor=#efefef>&nbsp; <b>제목 : $subject</b></td></tr><tr><td><br></td></tr><tr><td>$content</td></tr></table>";

		$email_subj = "[".$site_info[site_name]."] 문의하신 게시물 답변입니다.";
		$email_msg = str_replace("{MESSAGE}",$content,$mail_info[email_msg]);
		$email_msg = str_replace("{SITE_URL}", "http://".$HTTP_HOST, $email_msg);
		
		send_mail($site_info[site_name], $site_info[site_email], $re_name, $re_email, $email_subj, $email_msg);
		
	}
	
	echo "<script>document.location='list.php?$param';</script>";

////////////////////////////////////////////////////////////////////////////////
// 게시물 삭제
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "delete"){

	$sql = "select upfile1,upfile2,upfile3,memid,passwd from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);
	
	
	// 삭제권한 체크
	if(
	$mem_level == "0" ||																																			// 전체관리자
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)  ||	// 게시판관리자
	($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) || 												// 자신의글
	($bbs_row[passwd] != "" && $bbs_row[passwd] == $passwd)																		// 비밀번호일치
	){
	}else{
		if($passwd) error("비밀번호가 일치하지 않습니다.");
		else error("권한이 없습니다.");
	}


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
	
	echo "<script>alert('삭제되었습니다.'); document.location='list.php?$param';</script>";

////////////////////////////////////////////////////////////////////////////////
// 코멘트 입력
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "comment"){
	
	// 스팸글 차단
	$pos = strpos($HTTP_REFERER, $HTTP_HOST);
  if($pos === false) error("잘못된 경로 입니다.");

  if(!strcmp($sch_info[spam_check], "Y")) {

	  // 자동등록방지 코드 검사
	  if(empty($_POST[tmp_vcode]) || empty($_POST[vcode])) {
	  	error("자동등록방지 코드가 존재하지 않습니다.");
	  } else if(strcmp($_POST[tmp_vcode], md5($_POST[vcode]))) {
	  	error("자동등록방지 코드가 일치하지 않습니다.");
	  }
	}

	// 작성권한 체크
	if($cpermi < $mem_level) error($sch_info[permsg],$sch_info[perurl]);
	
	if($name == "") $name = $wiz_session[name];
	if($passwd == "") $passwd = $wiz_session[passwd];

	// 욕설체크
	check_abuse($name); check_abuse($content);
	
	$ctype = "SCH";
	
	$sql = "insert into wiz_comment(idx,ctype,cidx,prdcode,star,id,name,content,passwd,wdate,wip)
					values('', '$ctype', '$idx', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
					
  $result = mysql_query($sql) or error(mysql_error());

	// 댓글수 업데이트
	$sql = "select idx from wiz_comment where cidx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$comment = mysql_num_rows($result);
	
	$sql = "update wiz_bbs set comment = '$comment' where idx = '$idx'";
	mysql_query($sql) or error(mysql_error());
	
	comalert("댓글을 작성하였습니다.", "view.php?code=$code&idx=$idx");
	
////////////////////////////////////////////////////////////////////////////////
// 코멘트 삭제
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "delco"){
	
	$sql = "select id,passwd from wiz_comment where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);

	// 삭제권한 체크
	if(
	$mem_level == "0" ||																																			// 전체관리자
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)  ||	// 게시판관리자
	($row[id] != "" && $row[id] == $wiz_session[id]) || 																// 자신의글
	($row[passwd] != "" && $row[passwd] == $passwd)																						// 비밀번호일치
	){
	}else{
		if($passwd) error("비밀번호가 일치하지 않습니다.");
		else error("권한이 없습니다.");
	}

	$sql = "delete from wiz_comment where idx='$idx'";
  $result = mysql_query($sql) or error(mysql_error());

  // 댓글수 업데이트
	$sql = "select idx from wiz_comment where cidx='$cidx'";
	$result = mysql_query($sql) or error(mysql_error());
	$comment = mysql_num_rows($result);

	$sql = "update wiz_bbs set comment = '$comment' where idx = '$cidx'";
	mysql_query($sql) or error(mysql_error());

	comalert("댓글을 삭제하였습니다.", "view.php?code=$code&idx=$bbs_idx");

////////////////////////////////////////////////////////////////////////////////
// 추천하기
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "recom"){

	if(strlen($HTTP_COOKIE_VARS["sch_recom".$idx])==0){

		$sql = "update wiz_bbs set recom = recom + 1 where idx='$idx'";
		$result = mysql_query($sql) or error(mysql_error());

      setcookie("sch_recom".$idx, "$idx", time()+60*60*24*365);

		echo "<script>alert('추천되었습니다.');document.location='view.php?code=$code&idx=$idx&recom=ok';</script>";

	}else{

		echo "<script>alert('한번만 추천가능합니다..');document.location='view.php?code=$code&idx=$idx';</script>";

	}

}
?>