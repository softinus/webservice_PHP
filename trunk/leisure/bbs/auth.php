<?

if(empty($bbs_info[header])) include "../inc/oneday_header.inc"; 				// ��ܵ�����
else {
	include "$DOCUMENT_ROOT/inc/module.inc";										// module include
	include $DOCUMENT_ROOT."/".$bbs_info[header]; 							// ��ܵ�����
}
include "../inc/bbs_info.inc"; 	 		// �Խ��� ����


include "../inc/bbs_info_set.inc"; 	 								// �Խ��� ����

$now_position = "<a href=/>Home</a> &gt; Ŀ�´�Ƽ &gt; $bbs_info[title]";
include "../inc/now_position.inc";	// ������ġ

// �Ķ����
$param = "code=$code";
if($grp != "") $param .= "&category=$category";
if($page != "") $param .= "&page=$page";
if($searchopt != "") $param .= "&searchopt=$searchopt";
if($searchkey != "") $param .= "&searchkey=$searchkey";

// �Խù�����
$sql = "select memid from wiz_bbs where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$bbs_row = mysql_fetch_array($result);

// �ڸ�Ʈ����
if($mode == "delco"){
	$co_sql = "select id from wiz_comment where idx = '$idx'";
	$co_result = mysql_query($co_sql) or error(mysql_error());
	$co_row = mysql_fetch_array($co_result);
}

// ��ư����
$confirm_btn = "<input type='image' src='$skin_dir/image/btn_confirm.gif' border='0'>";

if($mode == "view")
	$cancel_btn = "<img src='$skin_dir/image/btn_cancel.gif' border='0' onClick=document.location='list.php?$param' style='cursor:hand'>";
else
	$cancel_btn = "<img src='$skin_dir/image/btn_cancel.gif' border='0' onClick='history.go(-1);' style='cursor:hand'>";


// �������̰ų� �ڱ���ΰ��
if(
	$mem_level == "0" ||																																			// ��ü������
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
	($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) ||													// �ڽ��Ǳ�
	($co_row[id] != "" && $co_row[id] == $wiz_session[id])															// �ڽ����ڸ��
){
	$input_passwd = "���� �����Ͻðڽ��ϱ�?";
}else{
	
	// ��Ȳ�� �޼���
	if($mode == "view") $mode_msg = "�� ���� ��б��Դϴ�. ��й�ȣ�� �Է��Ͽ� �ֽʽÿ�.";
	else if($mode == "delete") $mode_msg = "���� �����մϴ�. ��й�ȣ�� �Է��Ͽ� �ֽʽÿ�.";
	else if($mode == "delco") $mode_msg = "����� �����մϴ�. ��й�ȣ�� �Է��Ͽ� �ֽʽÿ�.";

	$input_passwd = "<input type='password' name='passwd' size='25' class='input'>";

}

if($mode == "view") $act_url = "view.php";
else if($mode == "delete" || $mode == "delco") $act_url = "save.php";

@include "$DOCUMENT_ROOT/$skin_dir/passwd.php";

if(empty($bbs_info[footer]))include "../inc/oneday_footer.inc"; 		// �ϴܵ�����
else  include $DOCUMENT_ROOT."/".$bbs_info[footer]; 				// �ϴܵ�����

?>