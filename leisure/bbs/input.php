<?

if(empty($bbs_info[header])) include_once "../inc/oneday_header.inc"; 				// ��ܵ�����
else {
	include $DOCUMENT_ROOT."/".$bbs_info[header]; 							// ��ܵ�����

}

include "../inc/bbs_info.inc"; 	 		// �Խ��� ����

include "../inc/bbs_info_set.inc"; 	 								// �Խ��� ����

//$now_position = "<a href=/>Home</a> &gt; Ŀ�´�Ƽ &gt; $bbs_info[title]";
//include "../inc/now_position.inc";	// ������ġ

// �ڵ���ϱ�üũ
get_spam_check();

// �˻� �Ķ����
$param = "code=$code";
if($page != "") $param .= "&page=$page";
if($searchkey != "") $param .= "&searchopt=$searchopt&searchkey=$searchkey";

// ��ư����
$list_btn = "<a href='list.php?$param'><img src='$skin_dir/image/btn_list.gif' border='0'></a>";
$confirm_btn = "<input type='image' src='$skin_dir/image/btn_confirm.gif' border='0'>";
$cancel_btn = "<img src='$skin_dir/image/btn_cancel.gif' border='0' onClick='history.go(-1)' style='cursor:hand'>";

// ��ȣ�� ����
if(strcmp($code, "review")) {
	$hide_star_start = "<!--"; $hide_star_end = "-->";
}

// �ۼ�
if($mode == "") $mode = "write";
if($mode == "write"){

	if($wpermi < $mem_level) {

		// ����ȸ�� üũ
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

	// ��й�ȣ ����
	if($wiz_session[id] != ""){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}

	// ������ ǥ��
	if(
	$mem_level == "0" || 																																			// ��ü������
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)			// �Խ��ǰ�����
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}

// ����
}else if($mode == "modify"){

	// �Խù� ����
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
			${upfile.$ii} = "<input type='checkbox' name='delupfile[]' value='upfile".$ii."'> ���� (".$bbs_row[upfile.$ii._name].")";
		}
	}
	if(!empty($bbs_row[movie1])) {
		$movie1 = "<input type='checkbox' name='delupfile[]' value='movie1'> ���� ($bbs_row[movie1])";
	}

	$movie2 = $bbs_row[movie2];
	$movie3 = $bbs_row[movie3];

	// ��й�ȣ ����
	if(
	$mem_level == "0" || 																																			// ��ü������
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
	($bbs_row[memid] != "" && $wiz_session[id] == $bbs_row[memid])														// �ڽſ���
	){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}

	// ������ ǥ��
	if(
	$mem_level == "0" || 																																			// ��ü������
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)			// �Խ��ǰ�����
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

// �亯
}else if($mode == "reply"){

	$sql = "select category,subject,content,privacy,passwd from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);


	$category = $bbs_row[category];
	$subject = $bbs_row[subject];
	$content = $bbs_row[content]."\n\n==================== �� �� ====================\n\n";
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

	// ��й�ȣ ����
	if($wiz_session[id] != ""){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}

	// ������ ǥ��
	if(
	$mem_level == "0" || 																																			// ��ü������
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)			// �Խ��ǰ�����
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}

}

// �Խù� �з�
$sql = "select idx, catname, catimg from wiz_bbscat where code = '$code' and gubun != 'A' order by idx asc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
if($total > 0) {

  /* select�ڽ����� */
  $catlist = "<select name=\"category\">";
  $catlist .= "<option value=\"\">:: ��ü��� ::</option>";
	while($row = mysql_fetch_array($result)) {
  	$catname = $row[catname];
  	$selected = "";
		if($bbs_row[category] == $row[idx]) $selected = "selected";
    $catlist .= "<option value=\"".$row[idx]."\" ".$selected.">".$catname."</option>";

  }
  $catlist .= "</select> ";

}

// ÷������ ��뿩��
if($bbs_info[upfile] != "Y"){
	$hide_upfile_start = "<!--"; $hide_upfile_end = "-->";
}

// ������ ��뿩��
if($bbs_info[movie] != "Y"){
	$hide_movie_start = "<!--"; $hide_movie_end = "-->";
}

// ���Ա�üũ��� ��뿩��
if(!strcmp($bbs_info[spam_check], "N") || !strcmp($mode, "modify")){
	$hide_spam_check_start = "<!--"; $hide_spam_check_end = "-->";
}

if($prdcode != ""){
	$prd_sql = "select prdcode,prdname,sellprice,strprice,prdimg_R from wiz_product where prdcode='$prdcode'";
	$prd_result = mysql_query($prd_sql);
	$prd_info = mysql_fetch_object($prd_result);

	if(!empty($prd_info->strprice)) $prd_info->sellprice = $prd_info->strprice;
	else $prd_info->sellprice = number_format($prd_info->sellprice)."��";
	
	// ��ǰ �̹���
	if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$prd_info->prdimg_R)) $prd_info->prdimg_R = "/images/noimg_M.gif";
	else $prd_info->prdimg_R = "/data/prdimg/".$prd_info->prdimg_R;

}

// �Է½�Ų ��Ŭ���
@include "$DOCUMENT_ROOT/$skin_dir/input.php";

if(empty($bbs_info[footer]))include "../inc/oneday_footer.inc"; 		// �ϴܵ�����
else  include $DOCUMENT_ROOT."/".$bbs_info[footer]; 				// �ϴܵ�����
?>