<?
include "../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		   // ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

include "../inc/sch_info.inc"; 	 		// ���� ����

if(empty($sch_info[header])) include "../inc/header.inc"; 				// ��ܵ�����
else {
	include "$DOCUMENT_ROOT/inc/module.inc";											// module include
	include $DOCUMENT_ROOT."/".$sch_info[header]; 								// ��ܵ�����
}

include "../inc/sch_info_set.inc"; 	 								// ���� ����

$now_position = "<a href=/>Home</a> &gt; Ŀ�´�Ƽ &gt; $sch_info[title]";

include "../inc/now_position.inc";	// ������ġ

echo "<link href=\"".$skin_dir."/style.css\" rel=\"stylesheet\" type=\"text/css\">";

// �ڵ���ϱ�üũ
get_spam_check();

// �˻� �Ķ����
$param = "code=$code";

// ��ư����
$list_btn = "<a href='list.php?$param'><img src='$skin_dir/image/btn_list.gif' border='0'></a>";
$confirm_btn = "<input type='image' src='$skin_dir/image/btn_confirm.gif' border='0'>";
$cancel_btn = "<img src='$skin_dir/image/btn_cancel.gif' border='0' onClick='history.go(-1)' style='cursor:hand'>";

// �ۼ�
if($mode == "") $mode = "write";
if($mode == "write"){

	if($wpermi < $mem_level) error($sch_info[permsg],$sch_info[perurl]);
	
	$name = $wiz_session[name];
	$email = $wiz_session[email];
	$wdate = date('Y-m-d');
	if($sch_info[privacy] == "Y") $privacy_checked = "checked";
	
	// ��й�ȣ ����
	if($wiz_session[id] != ""){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}

	// ������ ǥ��
	if(
	$mem_level == "0" || 																																			// ��ü������
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)			// �Խ��ǰ�����
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}

// ����
}else if($mode == "modify"){

	// �Խù� ����
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
			${upfile.$ii} = "<input type='checkbox' name='delupfile[]' value='upfile".$ii."'> ���� (".$bbs_row[upfile.$ii._name].")";
		}
	}
	// ��й�ȣ ����
	if(
	$mem_level == "0" || 																																			// ��ü������
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
	($bbs_row[memid] != "" && $wiz_session[id] == $bbs_row[memid])														// �ڽſ���
	){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}
	
	// ������ ǥ��
	if(
	$mem_level == "0" || 																																			// ��ü������
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)			// �Խ��ǰ�����
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}
	
	if($bbs_row[ctype] == "H") $ctype_checked = "checked";
	if($bbs_row[privacy] == "Y") $privacy_checked = "checked";
	if($bbs_row[notice] == "Y") $notice_checked = "checked";

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
	$wdate = date('Y-m-d');
	
	if($sch_info[privacy] == "Y" || $bbs_row[privacy] == "Y") $privacy_checked = "checked";
	
	// ��й�ȣ ����
	if($wiz_session[id] != ""){
		$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
	}
	
	// ������ ǥ��
	if(
	$mem_level == "0" || 																																			// ��ü������
	($sch_info[bbsadmin] != "" && strpos($sch_info[bbsadmin],$wiz_session[id]) !== false)			// �Խ��ǰ�����
	){
	}else{
		$hide_notice_start = "<!--"; $hide_notice_end = "-->";
	}
	
}

// ī�װ�
if($sch_info[category] != ""){
	
	$catarr = explode(",",$sch_info[category]);
	$catlist = "<select name='category'>";
	$catlist .= "<option value=''>�з�</option>";
	for($ii=0;$ii<count($catarr);$ii++){
		if($bbs_row[category] == $catarr[$ii]) $selected = " selected";
		else $selected = "";
		$catlist .= "<option value='".$catarr[$ii]."'".$selected.">".$catarr[$ii]."</option>";
	}
	$catlist .= "</select>";
	
}

// ÷������ ��뿩��
if($sch_info[upfile] != "Y"){
	$hide_upfile_start = "<!--"; $hide_upfile_end = "-->";
}


// ������ ��뿩��
if($sch_info[movie] != "Y"){
	$hide_movie_start = "<!--"; $hide_movie_end = "-->";
}

// ���Ա�üũ��� ��뿩��
if(!strcmp($sch_info[spam_check], "N") || strcmp($mode, "write")){
	$hide_spam_check_start = "<!--"; $hide_spam_check_end = "-->";
}

// �Է½�Ų ��Ŭ���
@include "$DOCUMENT_ROOT/$skin_dir/input.php";

if(empty($sch_info[footer]))include "../inc/footer.inc"; 		// �ϴܵ�����
else  include $DOCUMENT_ROOT."/".$sch_info[footer]; 				// �ϴܵ�����
?>