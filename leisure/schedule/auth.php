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

// 파라미터
$param = "code=$code";

// 게시물정보
$sql = "select memid from wiz_bbs where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$bbs_row = mysql_fetch_array($result);

// 코멘트정보
if($mode == "delco"){
	$co_sql = "select id from wiz_comment where idx = '$idx'";
	$co_result = mysql_query($co_sql) or error(mysql_error());
	$co_row = mysql_fetch_array($co_result);
}

// 버튼설정
$confirm_btn = "<input type='image' src='$skin_dir/image/btn_confirm.gif' border='0'>";

if($mode == "view")
	$cancel_btn = "<img src='$skin_dir/image/btn_cancel.gif' border='0' onClick=document.location='list.php?$param' style='cursor:hand'>";
else
	$cancel_btn = "<img src='$skin_dir/image/btn_cancel.gif' border='0' onClick='history.go(-1);' style='cursor:hand'>";


// 관리자이거나 자기글인경우
if(
	$mem_level == "0" ||																																			// 전체관리자
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// 게시판관리자
	($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) ||													// 자신의글
	($co_row[id] != "" && $co_row[id] == $wiz_session[id])															// 자신의코멘드
){
	$input_passwd = "글을 삭제하시겠습니까?";
}else{
	
	// 상황별 메세지
	if($mode == "view") $mode_msg = "이 글은 비밀글입니다. 비밀번호를 입력하여 주십시요.";
	else if($mode == "delete") $mode_msg = "글을 삭제합니다. 비밀번호를 입력하여 주십시요.";
	else if($mode == "delco") $mode_msg = "댓글을 삭제합니다. 비밀번호를 입력하여 주십시요.";

	$input_passwd = "<input type='password' name='passwd' size='25' class='input'>";

}

if($mode == "view") $act_url = "view.php";
else if($mode == "delete" || $mode == "delco") $act_url = "save.php";

@include "$DOCUMENT_ROOT/$skin_dir/passwd.php";

if(empty($sch_info[footer]))include "../inc/footer.inc"; 		// 하단디자인
else  include $DOCUMENT_ROOT."/".$sch_info[footer]; 				// 하단디자인
?>