<?

if(empty($bbs_info[header])) include_once "../inc/oneday_header.inc"; 				// 상단디자인
else {
	include $DOCUMENT_ROOT."/".$bbs_info[header]; 							// 상단디자인

}

include "../inc/bbs_info.inc"; 	 		// 게시판 정보

include "../inc/bbs_info_set.inc"; 	 								// 게시판 정보

//$now_position = "<a href=/>Home</a> &gt; 커뮤니티 &gt; $bbs_info[title]";
//include "../inc/now_position.inc";	// 현재위치

// 자동등록글체크
get_spam_check();

// 검색 파라미터
$param = "code=$code";
if($page != "") $param .= "&page=$page";
if($searchkey != "") $param .= "&searchopt=$searchopt&searchkey=$searchkey";

// 버튼설정
$list_btn = "<a href='list.php?$param'><img src='$skin_dir/image/btn_list.gif' border='0'></a>";
$confirm_btn = "<input type='image' src='$skin_dir/image/btn_confirm.gif' border='0'>";
$cancel_btn = "<img src='$skin_dir/image/btn_cancel.gif' border='0' onClick='history.go(-1)' style='cursor:hand'>";

// 선호도 숨김
if(strcmp($code, "review")) {
	$hide_star_start = "<!--"; $hide_star_end = "-->";
}

// 작성
if($mode == "") $mode = "write";
if($mode == "write"){

	if($wpermi < $mem_level) {

		// 구매회원 체크
		if(!strcmp($wpermi, "-1")) {

			$sql = "select count(idx) as cnt from wiz_basket as wb left join wiz_order as wo on wb.orderid = wo.orderid
							where wb.prdcode = '$prdcode' and wo.status = 'DC'";
			$result = mysql_query($sql) or error(mysql_error());
			$row = mysql_fetch_array($result);

			if($row[cnt] <= 0) {
				error($bbs_info[permsg],$bbs_info[perurl]);
			}

		} else {
			error($bbs_info[permsg],$bbs_info[perurl]);
		}
	}

	$name = $wiz_session[name];
	$email = $wiz_session[email];
	if($bbs_info[privacy] == "Y") $privacy_checked = "checked";

	// 비밀번호 숨김
	if($wiz_session[id] != ""){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}

	// 공지글 표시
	if(
	$mem_level == "0" || 																																			// 전체관리자
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)			// 게시판관리자
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}

// 수정
}else if($mode == "modify"){

	// 게시물 정보
	$sql = "select * from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);

	$name = $bbs_row[name];
	$email = $bbs_row[email];
	$subject = $bbs_row[subject];
	$content = $bbs_row[content];

	$name = xss_check($name);
	$email = xss_check($email);
	$tphone = xss_check($tphone);
	$hphone = xss_check($hphone);
	$zipcode = xss_check($zipcode);
	$address = xss_check($address);
	$subject = xss_check($subject);
	$content = xss_check($content);
	$reply = xss_check($reply);

	$addinfo1 = xss_check($addinfo1);
	$addinfo2 = xss_check($addinfo2);
	$addinfo3 = xss_check($addinfo3);
	$addinfo4 = xss_check($addinfo4);
	$addinfo5 = xss_check($addinfo5);

	for($ii = 1; $ii <= $upfile_max; $ii++) {
		if(!empty($bbs_row[upfile.$ii])) {
			${upfile.$ii} = "<input type='checkbox' name='delupfile[]' value='upfile".$ii."'> 삭제 (".$bbs_row[upfile.$ii._name].")";
		}
	}
	if(!empty($bbs_row[movie1])) {
		$movie1 = "<input type='checkbox' name='delupfile[]' value='movie1'> 삭제 ($bbs_row[movie1])";
	}

	$movie2 = $bbs_row[movie2];
	$movie3 = $bbs_row[movie3];

	// 비밀번호 숨김
	if(
	$mem_level == "0" || 																																			// 전체관리자
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// 게시판관리자
	($bbs_row[memid] != "" && $wiz_session[id] == $bbs_row[memid])														// 자신에글
	){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}

	// 공지글 표시
	if(
	$mem_level == "0" || 																																			// 전체관리자
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)			// 게시판관리자
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}

	if($bbs_row[ctype] == "H") $ctype_checked = "checked";
	if($bbs_row[privacy] == "Y") $privacy_checked = "checked";
	if($bbs_row[notice] == "Y") $notice_checked = "checked";

	for($ii = 1; $ii <= 5; $ii++) {
		if(!strcmp($ii, $bbs_row[star])) ${"star".$ii."_checked"} = "checked";
	}

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

	$name = xss_check($name);
	$email = xss_check($email);
	$tphone = xss_check($tphone);
	$hphone = xss_check($hphone);
	$zipcode = xss_check($zipcode);
	$address = xss_check($address);
	$subject = xss_check($subject);
	$content = xss_check($content);
	$reply = xss_check($reply);

	$addinfo1 = xss_check($addinfo1);
	$addinfo2 = xss_check($addinfo2);
	$addinfo3 = xss_check($addinfo3);
	$addinfo4 = xss_check($addinfo4);
	$addinfo5 = xss_check($addinfo5);

	if($bbs_info[privacy] == "Y" || $bbs_row[privacy] == "Y") $privacy_checked = "checked";

	// 비밀번호 숨김
	if($wiz_session[id] != ""){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}

	// 공지글 표시
	if(
	$mem_level == "0" || 																																			// 전체관리자
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)			// 게시판관리자
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}

}

// 게시물 분류
$sql = "select idx, catname, catimg from wiz_bbscat where code = '$code' and gubun != 'A' order by idx asc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
if($total > 0) {

  /* select박스형태 */
  $catlist = "<select name=\"category\">";
  $catlist .= "<option value=\"\">:: 전체목록 ::</option>";
	while($row = mysql_fetch_array($result)) {
  	$catname = $row[catname];
  	$selected = "";
		if($bbs_row[category] == $row[idx]) $selected = "selected";
    $catlist .= "<option value=\"".$row[idx]."\" ".$selected.">".$catname."</option>";

  }
  $catlist .= "</select> ";

}

// 첨부파일 사용여부
if($bbs_info[upfile] != "Y"){
	$hide_upfile_start = "<!--"; $hide_upfile_end = "-->";
}

// 동영상 사용여부
if($bbs_info[movie] != "Y"){
	$hide_movie_start = "<!--"; $hide_movie_end = "-->";
}

// 스팸글체크기능 사용여부
if(!strcmp($bbs_info[spam_check], "N") || !strcmp($mode, "modify")){
	$hide_spam_check_start = "<!--"; $hide_spam_check_end = "-->";
}

if($prdcode != ""){
	$prd_sql = "select prdcode,prdname,sellprice,strprice,prdimg_R from wiz_product where prdcode='$prdcode'";
	$prd_result = mysql_query($prd_sql);
	$prd_info = mysql_fetch_object($prd_result);

	if(!empty($prd_info->strprice)) $prd_info->sellprice = $prd_info->strprice;
	else $prd_info->sellprice = number_format($prd_info->sellprice)."원";
	
	// 상품 이미지
	if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$prd_info->prdimg_R)) $prd_info->prdimg_R = "/images/noimg_M.gif";
	else $prd_info->prdimg_R = "/data/prdimg/".$prd_info->prdimg_R;

}

// 입력스킨 인클루드
@include "$DOCUMENT_ROOT/$skin_dir/input.php";

if(empty($bbs_info[footer]))include "../inc/oneday_footer.inc"; 		// 하단디자인
else  include $DOCUMENT_ROOT."/".$bbs_info[footer]; 				// 하단디자인
?>