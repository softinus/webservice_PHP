<?php
include "../inc/bbs_info_set.inc"; 	 								// �Խ��� ����

$line = $bbs_info[line];

echo "<script Language=\"JavaScript\" src=\"/js/util_lib.js\"></script>";

// �Ķ����
$param = "&code=$code";
if($category != "") $param .= "&category=$category";
if($searchopt != "") $param .= "&searchopt=$searchopt";
if($searchkey != "") $param .= "&searchkey=$searchkey";

// ��Ϻ��� ����üũ
if($lpermi < $mem_level) error($bbs_info[permsg],$bbs_info[perurl]);
if($wpermi >= $mem_level && $code != "qna") $write_btn = "<a href=input.php?code=$code&mode=write><img src=/images/bbsimg/btn_write.gif border=0></a>";

// ��ư����
$list_btn = "<a href='list.php?code=$code'><img src='$skin_dir/image/btn_list.gif' border='0'></a>";
if($wpermi >= $mem_level) {
	$write_btn = "<a href='input.php?mode=write&code=$code'><img src='$skin_dir/image/btn_write.gif' border='0'></a>";
} else {

	if(!strcmp($bbs_info[btn_view], "Y")) {
		if(!empty($bbs_info[perurl])) $perurl = " document.location='$bbs_info[perurl]'; ";
		$write_btn = "<img src='$skin_dir/image/btn_write.gif' border='0' onClick=\"alert('$bbs_info[permsg]'); $perurl \" style='cursor:pointer'>";
	}

}

// ��õ��� ��뿩��
if($bbs_info[recom] != "Y"){
	$hide_recom_start = "<!--"; $hide_recom_end = "-->";
}

// �Խù� �з�
$sql = "select idx, gubun, catname, catimg, catimg_over from wiz_bbscat where code = '$code' order by gubun desc,idx asc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
if($total > 0) {

	//$catlist = "<a href='$PHP_SELF?ptype=list&code=".$code."'>��ü</a> | ";

	$ii = 0;
	while($row = mysql_fetch_array($result)) {

		if($total < 2 && !strcmp($row[gubun], "A")) {

		} else {

	  	if(empty($row[catimg_over])) $row[catimg_over] = $row[catimg];

	  	if(empty($category) && !strcmp($row[gubun], "A")) $row[catimg] = $row[catimg_over];

	  	if(!empty($row[catimg])) $catname = "<img src='/data/category/".$code."/".$row[catimg]."' name='bc_".$ii."' border=0 id='bc_".$ii."' onMouseOver=WIZ_swapImage('bc_".$ii."','','/data/category/".$code."/".$row[catimg_over]."',1) onMouseOut=WIZ_swapImgRestore()>";
	  	else $catname = $row[catname];

	    if($category == $row[idx]) {
	    	if(!empty($row[catimg])) $catname = "<img src='/data/category/".$code."/".$row[catimg_over]."' name='bc_".$ii."' border=0 id='bc_".$ii."' onMouseOver=WIZ_swapImage('bc_".$ii."','','/data/category/".$code."/".$row[catimg_over]."',1) onMouseOut=WIZ_swapImgRestore()>";
	    	else $catname = "<b>".$catname."</b>";
	    }

			if(!strcmp($row[gubun], "A")) {
				$catlist .= "<a href='$PHP_SELF?ptype=list&code=".$code."'>".$catname."</a>";
			} else {
	    	$catlist .= "<a href='$PHP_SELF?ptype=list&code=".$code."&category=".$row[idx]."'>".$catname."</a>";
	    }

	    if(empty($row[catimg]))  if($ii < $total-1) $catlist .= " | ";
	    $ii++;
	  }
  }

  /* select�ڽ�����
  $catlist = "<select name=\"category\" onChange=\"document.location='".$PHP_SELF."?ptype=list&category=' + this.value;\">";
  $catlist .= "<option value=\"\">:: ��ü��� ::</option>";
	while($row = mysql_fetch_array($result)) {
  	$catname = $row[catname];
  	$selected = "";
		if($category == $row[idx]) $selected = "selected";
    $catlist .= "<option value=\"".$row[idx]."\" ".$selected.">".$catname."</option>";

  }
  $catlist .= "</select>";
  */

}

echo "<table width='100%' height='10'><tr><td></td></tr></table>";

// �������
@include "$DOCUMENT_ROOT/$skin_dir/list_head.php";

if(empty($bbs_info[datetype_list])) $bbs_info[datetype_list] = "%Y-%m-%d";

// ��������
$sql = "select wb.idx,wb.name,wb.category,wb.subject,from_unixtime(wb.wdate, '".$bbs_info[datetype_list]."') as wdate,wb.count,wb.comment,wb.recom,wb.upfile1,wb.content, wc.catname, wc.caticon
				from wiz_bbs as wb left join wiz_bbscat as wc on wb.category = wc.idx
				where wb.code = '$code' and wb.notice = 'Y'";
$result = mysql_query($sql) or error(mysql_error());

while($row = mysql_fetch_array($result)){

	if($row[caticon] != "") $catname = "<img src='/data/category/".$code."/".$row[caticon]."' align='absmiddle'>";		// category
	else if($row[catname] != "") $catname = "[".$row[catname]."]";

	if($bbs_info[subject_len] > 0) $row[subject] = cut_str($row[subject], $bbs_info[subject_len]);

	$no = "<font color=red>[����]</font>"; $name = $row[name]; $wdate = $row[wdate]; $count = $row[count]; $comment = $row[comment];
	$subject = "<a href='view.php?idx=$row[idx]&page=$page&$param'>$row[subject]</a>";

	$recom = $row[recom];

	$upimg_l = $row[upfile1];
	if(file_exists($DOCUMENT_ROOT."/data/bbs/".$code."/S".$row[upfile1])) $upimg_s = "/data/bbs/$code/S".$row[upfile1];							// img
	else $upimg_s = "$skin_dir/image/noimg.gif";

	$content = $row[content];
	if($row[ctype] != "H"){
		$content = str_replace("\n", "<br>", $content);
	}

	// �۸������
	@include "$DOCUMENT_ROOT/$skin_dir/list_body.php";

}

// �Խù� ����
if($category) $category_sql = " and category = '$category' ";
if($searchopt) $search_sql = " and $searchopt like '%$searchkey%' ";
if($mybbs) $my_sql=" and memid='$wiz_session[id]'";

$sql = "select idx from wiz_bbs where code = '$code' $my_sql $category_sql $search_sql order by prino desc";

$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

$idx = 0;
$rows = $bbs_info[rows];
$lists = $bbs_info[lists];
if($rows == "" || $rows < 1) $rows = "20";
if($lists == "" || $rows < 1) $lists = "5";

$ttime = mktime(0,0,0,date('m'),date('d'),date('Y'));
$page_count = ceil($total/$rows);
if(!$page || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $total-$start;

$sql = "select wb.*,wb.wdate as wtime,from_unixtime(wb.wdate, '".$bbs_info[datetype_list]."') as wdate, wc.catname, wc.caticon
				from wiz_bbs as wb left join wiz_bbscat as wc on wb.category = wc.idx
				where wb.code = '$code' $category_sql $search_sql $my_sql
				order by wb.prino desc limit $start, $rows";

$result = mysql_query($sql) or error(mysql_error());

while($row = mysql_fetch_array($result)){

	$catname		="";
	$lock_icon	="";
	$re_icon		="";
	$new_icon		="";
	$hot_icon		="";
	$file_icon	="";
	$re_space		="";
	$upimg_s		="";
	$upimg_size = "";

	$name 		= $row[name];
	$email 		= $row[email];
	$count 		= $row[count];
	$comment 	= $row[comment];
	$recom 		= $row[recom];
	$wdate 		= $row[wdate];
	//$wdate = str_replace("-",".",$row[wdate]);

	$content = $row[content];
	if($row[ctype] != "H"){
		$content = str_replace("\n", "<br>", $content);
	}

	if(!empty($row[upfile1])) {
		// ÷������
		$file_icon = "<a href='/bbs/down.php?code=$code&idx=$row[idx]&no=1'><img src='$skin_dir/image/file.gif' border='0' align='absmiddle'></a>";			// file
	}

	if($row[caticon] != "") $catname = "<img src='/data/category/".$code."/".$row[caticon]."' align='absmiddle'>";		// category
	else if($row[catname] != "") $catname = "[".$row[catname]."]";

	if($bbs_info[subject_len] > 0) $row[subject] = cut_str($row[subject], $bbs_info[subject_len]);

	$subject = "<a href='view.php?idx=$row[idx]&page=$page&$param'>$row[subject]</a>";		// subject
	$viewBbs = "view.php?idx=$row[idx]&page=$page&$param";
	if($row[privacy] == "Y"){																																					// privacy
		if(
			($mem_level == "0") ||																																		// ��ü������
			($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
			($row[memid] != "" && $row[memid] == $wiz_session[id])																 ||	// �ڽ��Ǳ�
			($wiz_session[id] != "" && strpos($row[memgrp],$wiz_session[id]) !== false)								// �׷��Ǳ�
		){
		}else{
			$subject = "<a href='auth.php?mode=view&idx=$row[idx]&page=$page&$param'>$row[subject]</a>";
			$viewBbs = "auth.php?mode=view&idx=$row[idx]&page=$page&$param";
			if(!empty($file_icon)) $file_icon = "<a href='auth.php?mode=view&idx=$row[idx]&page=$page&$param'><img src='$skin_dir/image/file.gif' border='0' align='absmiddle'></a>";
		}
		$lock_icon = "<img src='$skin_dir/image/lock.gif' border='0' align='absmiddle'>";
	}

	//$wdate_list = explode(".",$wdate);
	//$wtime = mktime(0,0,0,$wdate_list[1],$wdate_list[2],$wdate_list[0]);
	$wtime = $row[wtime];
	if(($ttime-$wtime)/86400 <= $bbs_info[newc]) 	$new_icon = "<img src='$skin_dir/image/new.gif' border='0' align='absmiddle'>";				// new
	if($row[count] > $bbs_info[hotc]) 						$hot_icon = "<img src='$skin_dir/image/hot.gif' border='0' align='absmiddle'>";				// hot
	if($row[depno] != 0) 													$re_icon = "<img src='$skin_dir/image/re.gif' border='0' align='absmiddle'>";					// re

	for($ii=0; $ii < $row[depno]; $ii++) 					$re_space .= "&nbsp;&nbsp;";																													// respace

	$upimg_l = $row[upfile1];
	if(file_exists($DOCUMENT_ROOT."/data/bbs/".$code."/S".$row[upfile1])) $upimg_s = "/data/bbs/$code/S".$row[upfile1];							// img
	else $upimg_s = "$skin_dir/image/noimg.gif";

	$viewImg = "javascript:viewImg('".$upimg_l."')";

	if(!empty($row[prdcode])) {

	 	// ��ǰ����
	 	$prd_sql = "select prdcode,prdname,prdimg_S1 from wiz_product where prdcode='$row[prdcode]'";
	 	$prd_result = mysql_query($prd_sql);
	 	$prd_row = mysql_fetch_array($prd_result);
	 	
		// ��ǰ �̹���
		if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$prd_row[prdimg_S1])) $prd_row[prdimg_S1] = "/images/noimg_S.gif";
		else $prd_row[prdimg_S1] = "/data/prdimg/".$prd_row[prdimg_S1];

	 	$prdimg = "<a href='/shop/prd_view.php?prdcode=$prd_row[prdcode]'><img src='$prd_row[prdimg_S1]' width='50' height='50' border='0'></a>";
	 	$prdname = cut_str($prd_row[prdname],30);

	} else {

		$prdimg = "";
		$prdname = "";

	}

	// �۸������
	@include "$DOCUMENT_ROOT/$skin_dir/list_body.php";

	$no--;
	$idx++;

}

if($total <= 0){
	//echo "<tr><td height='25' align='center' colspan='20'>��ϵ� ���� �����ϴ�.</td></tr>";
}

if(!empty($view_idx)) $param .= "&idx=$view_idx";

// �ϴ�����
@include "$DOCUMENT_ROOT/$skin_dir/list_foot.php";
?>