<?
include "../inc/common.inc"; 				// DB컨넥션, 접속자 파악
include "../inc/util.inc"; 		   		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

include "../inc/sch_info.inc"; 	 		// 게시판 정보

if(empty($sch_info[header])) include "../inc/header.inc"; 				// 상단디자인
else {
	include "$DOCUMENT_ROOT/inc/module.inc";											// module include
	include $DOCUMENT_ROOT."/".$sch_info[header]; 								// 상단디자인
}

include "../inc/sch_info_set.inc"; 	 								// 일정 정보

$now_position = "<a href=/>Home</a> &gt; 커뮤니티 &gt; $sch_info[title]";

include "../inc/now_position.inc";	// 현재위치

echo "<link href=\"".$skin_dir."/style.css\" rel=\"stylesheet\" type=\"text/css\">";

// 검색 파라미터
$param = "code=$code";
if($idx != "") $param .= "&idx=$idx";


if(empty($sch_info[datetype_view])) $sch_info[datetype_view] = "%Y-%m-%d";

// 게시물 정보
$sql = "select wb.*,from_unixtime(wb.wdate, '".$sch_info[datetype_view]."') as wdate, wc.catname, wc.caticon
			from wiz_bbs as wb left join wiz_bbscat as wc on wb.category = wc.idx 
			where wb.idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$bbs_row = mysql_fetch_array($result);

$memid 		= $bbs_row[memid];
$name 		= $bbs_row[name];
$email 		= $bbs_row[email];
$tphone 	= $bbs_row[tphone];
$hphone 	= $bbs_row[hphone];
$zipcode 	= $bbs_row[zipcode];
$address 	= $bbs_row[address];
$subject 	= $bbs_row[subject];
$content 	= $bbs_row[content];
$wdate 		= $bbs_row[wdate];
$count 		= $bbs_row[count];
$recom 		= $bbs_row[recom];
$ip 			= $bbs_row[ip];

$addinfo1 = $bbs_row[addinfo1];
$addinfo2 = $bbs_row[addinfo2];
$addinfo3 = $bbs_row[addinfo3];
$addinfo4 = $bbs_row[addinfo4];
$addinfo5 = $bbs_row[addinfo5];

if($bbs_row[caticon] != "") $catname = "<img src='/data/category/".$code."/".$bbs_row[caticon]."' align='absmiddle'> ";		// category
else if($bbs_row[catname] != "") $catname = "[".$bbs_row[catname]."] ";

if($bbs_row[ctype] != "H"){
	$content = htmlspecialchars($content);
	$content = str_replace("\n", "<br>", $content);
}

// 첨부파일 이미지인경우 보여주기
if(strcmp($sch_info[imgview], "N")) {
	
	for($ii = 1; $ii <= 12; $ii++) {
		if(img_type($DOCUMENT_ROOT."/data/bbs/$code/M".$bbs_row[upfile.$ii])) ${upimg.$ii} = "<div align='".$sch_info[img_align]."'><a href=javascript:openImg('".$bbs_row[upfile.$ii]."');><img src='/data/bbs/$code/M".$bbs_row[upfile.$ii]."' border='0'></a></div>";	
	}
}

// 이미지 리사이즈를 위해서 처리하는 부분
if(strpos(strtolower($content), "<img") !== false || $_ResizeCheck == true) {	
	// 이미지 리사이즈를 위해서 처리하는 부분
	$content = preg_replace("/(\<img)(.*)(\>?)/i","\\1 name=wiz_target_resize style=\"cursor:pointer\" onclick=window.open(this.src) \\2 \\3", $content);
	$content = "<table border=0 cellspacing=0 cellpadding=0 style='width:".$sch_info[mimgsize]."px;height:0px;' height=1 id='wiz_get_table_width'>
								<col width=100%></col>
								<tr>
									<td><img src='' border='0' name='wiz_target_resize' width='1' height='1'></td>
								</tr>
							</table>
							<table border=0 cellspacing=0 cellpadding=0 width=100%>
								<col width=100%></col>
								<tr><td valign=top>".$content."</td></tr>
							</table>";
	$_ResizeCheck = true;	
}

// 글보기 권한체크
if($rpermi < $mem_level) error($sch_info[permsg],$sch_info[perurl]);



// 비밀글인경우 체크
if($bbs_row[privacy] == "Y"){

	$sql = "select idx from wiz_bbs where code='$code' and grpno='$bbs_row[grpno]' and passwd='$passwd'";
	$result = mysql_query($sql) or error(mysql_error());
	$grp_passwd = mysql_num_rows($result);

	if(
	$mem_level == 0 ||																																				// 전체관리자
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)  ||	// 게시판관리자
	($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) || 												// 자신의글
	($bbs_row[passwd] != "" && $bbs_row[passwd] == $passwd) ||																// 비밀번호일치
	($wiz_session[id] != "" && strpos($bbs_row[memgrp],$wiz_session[id]) !== false) ||				// 그룹의글
	($grp_passwd > 0)																																					// 그룹비번
	){
	}else{
		if($passwd) error("비밀번호가 일치하지 않습니다.","?auth.php?&mode=view&$param");
		else  error("권한이 없습니다.","auth.php?mode=view&$param");
	}

}

// 조회수 증가
$sql = "update wiz_bbs set count = count+1 where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());

// 버튼설정
$list_btn = "<a href='list.php?$param'><image src='$skin_dir/image/btn_list.gif' border='0'></a>";
if($wpermi >= $mem_level){
	$write_btn = "<a href='input.php?mode=write&$param'><image src='$skin_dir/image/btn_write.gif' border='0'></a>";
	$modify_btn = "<a href='input.php?mode=modify&$param'><image src='$skin_dir/image/btn_modify.gif' border='0'></a>";
	$delete_btn = "<a href='auth.php?mode=delete&$param'><image src='$skin_dir/image/btn_delete.gif' border='0'></a>";
}

if($sch_info[recom] == "Y"){
	$recom_btn = "<a href='/schedule/save.php?mode=recom&prev=view.php&$param'><image src='$skin_dir/image/btn_recom.gif' border=0></a>";
}

// 첨부파일
for($ii = 1; $ii <= 12; $ii++) {
	if($bbs_row[upfile.$ii] != "") ${upfile.$ii}  = "<a href='/bbs/down.php?code=$code&idx=$idx&no=".$ii."'>".$bbs_row[upfile.$ii._name]."</a>";
}

//if($bbs_row[movie1] != "") $movie1 = "<embed src='/data/bbs/$code/".$bbs_row[movie1]."' autostart=false></embed><br>";
if($bbs_row[movie1] != "") $movie1 = "<embed src='".$bbs_row[movie1]."' autostart=false></embed><br>";
if($bbs_row[movie2] != "") $movie2 = "<embed src='".$bbs_row[movie2]."' autostart=false></embed><br>";
if($bbs_row[movie3] != "") $movie3 = "<embed src='".$bbs_row[movie3]."' autostart=false></embed><br>";

// 이전글
$sql = "select idx,subject from wiz_bbs where code = '$code' and prino > $bbs_row[prino] order by prino asc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_array($result)) $prev = "<a href='view.php?code=$code&idx=$row[idx]'>$row[subject]</a>";



// 다음글
$sql = "select idx,subject from wiz_bbs where code = '$code' and prino < $bbs_row[prino] order by prino desc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_array($result)) $next = "<a href='view.php?ptype=view&code=$code&idx=$row[idx]'>$row[subject]</a>";



// 댓글 작성 비밀번호 숨김
if($wiz_session[id] != ""){
	$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
}

// 첨부파일 사용여부
if($sch_info[upfile] != "Y"){
	$hide_upfile_start = "<!--"; $hide_upfile_end = "-->";
}

// 추천기능 사용여부
if($sch_info[recom] != "Y"){
	$hide_recom_start = "<!--"; $hide_recom_end = "-->";
}

// 스팸글체크기능 사용여부
if(!strcmp($sch_info[spam_check], "N")){
	$hide_spam_check_start = "<!--"; $hide_spam_check_end = "-->";
}

?>
<script language="javascript">
<!--
function openImg(img){
   var url = "openimg.php?code=<?=$code?>&img=" + img;
   window.open(url,"openImg","width=300,height=300,scrollbars=yes");
}
//-->
</script>

<?
if($bbs_row[prdcode] != ""){
	$prd_sql = "select prdcode,prdname,sellprice,prdimg_R from wiz_product where prdcode='$bbs_row[prdcode]'";
	$prd_result = mysql_query($prd_sql);
	$prd_info = mysql_fetch_object($prd_result);
?>
<table border=0 cellpadding=2 cellspacing=4 width=98% align=center bgcolor=e7e7e7>
	<tr>
		<td bgcolor=ffffff>
		  <table width="100%" border=0>
		  	<tr>
		  		<td width="100"><img src="/data/prdimg/<?=$prd_info->prdimg_R?>" width="100" height="100"></td>
		  		<td width="20"></td>
		  		<td width="300"><?=$prd_info->prdname?><br><font class="price"><?=number_format($prd_info->sellprice)?>원</font></td>
		  		<td align="center"><a href="/shop/prd_view.php?prdcode=<?=$prd_info->prdcode?>"><img src="/images/btn_prdview.gif" border="0"></a></td>
		  	</tr>
		  </table>
		</td>
	</tr>
</table>

<?
}
?>

<?php

// 뷰스킨 인클루드
@include "$DOCUMENT_ROOT/$skin_dir/view_head.php";
@include "$DOCUMENT_ROOT/schedule/comment.inc";
@include "$DOCUMENT_ROOT/$skin_dir/view_foot.php";

view_img_resize();
?>

<?
if(empty($sch_info[footer]))include "../inc/footer.inc"; 		// 하단디자인
else  include $DOCUMENT_ROOT."/".$sch_info[footer]; 				// 하단디자인
?>