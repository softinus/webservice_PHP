<?
include "../inc/common.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util.inc"; 		   // 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

include "../inc/sch_info.inc"; 	 		// 일정 정보

if(empty($sch_info[header])) include "../inc/header.inc"; 				// 상단디자인
else {
	include "$DOCUMENT_ROOT/inc/module.inc";											// module include
	include $DOCUMENT_ROOT."/".$sch_info[header]; 								// 상단디자인
}

include "../inc/sch_info_set.inc"; 	 								// 일정 정보

$now_position = "<a href=/>Home</a> &gt; 커뮤니티 &gt; $sch_info[title]";

include "../inc/now_position.inc";	// 현재위치

echo "<link href=\"".$skin_dir."/style.css\" rel=\"stylesheet\" type=\"text/css\">";

// 자동등록글체크
get_spam_check();

// 검색 파라미터
$param = "code=$code";

// 버튼설정
$list_btn = "<a href='list.php?$param'><img src='$skin_dir/image/btn_list.gif' border='0'></a>";
$confirm_btn = "<input type='image' src='$skin_dir/image/btn_confirm.gif' border='0'>";
$cancel_btn = "<img src='$skin_dir/image/btn_cancel.gif' border='0' onClick='history.go(-1)' style='cursor:hand'>";

// 작성
if($mode == "") $mode = "write";
if($mode == "write"){

	if($wpermi < $mem_level) error($sch_info[permsg],$sch_info[perurl]);
	
	$name = $wiz_session[name];
	$email = $wiz_session[email];
	$wdate = date('Y-m-d');
	if($sch_info[privacy] == "Y") $privacy_checked = "checked";
	
	// 비밀번호 숨김
	if($wiz_session[id] != ""){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}

	// 공지글 표시
	if(
	$mem_level == "0" || 																																			// 전체관리자
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)			// 게시판관리자
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}

// 수정
}else if($mode == "modify"){

	// 게시물 정보
	$sql = "select *, from_unixtime(wdate, '%Y-%m-%d') as wdate from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);
		
	$name = $bbs_row[name];
	$email = $bbs_row[email];
	$wdate = $bbs_row[wdate];
	$subject = $bbs_row[subject];
	$content = $bbs_row[content];
	
	$movie1 = $bbs_row[movie1];
	$movie2 = $bbs_row[movie2];
	$movie3 = $bbs_row[movie3];
	
	for($ii = 1; $ii <= $upfile_max; $ii++) {
		if(!empty($bbs_row[upfile.$ii])) {
			${upfile.$ii} = "<input type='checkbox' name='delupfile[]' value='upfile".$ii."'> 삭제 (".$bbs_row[upfile.$ii._name].")";
		}
	}
	// 비밀번호 숨김
	if(
	$mem_level == "0" || 																																			// 전체관리자
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)  ||	// 게시판관리자
	($bbs_row[memid] != "" && $wiz_session[id] == $bbs_row[memid])														// 자신에글
	){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}
	
	// 공지글 표시
	if(
	$mem_level == "0" || 																																			// 전체관리자
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)			// 게시판관리자
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}
	
	if($bbs_row[ctype] == "H") $ctype_checked = "checked";
	if($bbs_row[privacy] == "Y") $privacy_checked = "checked";
	if($bbs_row[notice] == "Y") $notice_checked = "checked";

// 답변
}else if($mode == "reply"){

	$sql = "select category,subject,content,privacy,passwd from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);
	
	$category = $bbs_row[category];
	$subject = $bbs_row[subject];
	$content = $bbs_row[content]."\n\n==================== 답 변 ====================\n\n";
	$name = $wiz_session[name];
	$email = $wiz_session[email];
	$wdate = date('Y-m-d');
	
	if($sch_info[privacy] == "Y" || $bbs_row[privacy] == "Y") $privacy_checked = "checked";
	
	// 비밀번호 숨김
	if($wiz_session[id] != ""){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}
	
	// 공지글 표시
	if(
	$mem_level == "0" || 																																			// 전체관리자
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)			// 게시판관리자
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}
	
}

// 카테고리
if($sch_info[category] != ""){
	
	$catarr = explode(",",$sch_info[category]);
	$catlist = "<select name='category'>";
	$catlist .= "<option value=''>분류</option>";
	for($ii=0;$ii<count($catarr);$ii++){
		if($bbs_row[category] == $catarr[$ii]) $selected = " selected";
		else $selected = "";
		$catlist .= "<option value='".$catarr[$ii]."'".$selected.">".$catarr[$ii]."</option>";
	}
	$catlist .= "</select>";
	
}

// 첨부파일 사용여부
if($sch_info[upfile] != "Y"){
	$hide_upfile_start = "<!--"; $hide_upfile_end = "-->";
}


// 동영상 사용여부
if($sch_info[movie] != "Y"){
	$hide_movie_start = "<!--"; $hide_movie_end = "-->";
}

// 스팸글체크기능 사용여부
if(!strcmp($sch_info[spam_check], "N") || strcmp($mode, "write")){
	$hide_spam_check_start = "<!--"; $hide_spam_check_end = "-->";
}

// 입력스킨 인클루드
@include "$DOCUMENT_ROOT/$skin_dir/input.php";

if(empty($sch_info[footer]))include "../inc/footer.inc"; 		// 하단디자인
else  include $DOCUMENT_ROOT."/".$sch_info[footer]; 				// 하단디자인
?>