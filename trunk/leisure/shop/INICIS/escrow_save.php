<?
include "../../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../../inc/util.inc"; 					// ��ƿ ���̺귯��
include "../../inc/oper_info.inc"; 		// � ����

if(!strcmp($ctype, "CFRM")) {

	$sql = "UPDATE wiz_order SET escrow_stats = 'US' where tno = '$tno'";
	$result = mysql_query($sql);

} else if(!strcmp($ctype, "CNCL")) {

	$sql = "update wiz_order set status = 'RD', cancelmsg='����ũ�� ������� ��û', escrow_stat = 'UX' where tno = '$tno'";
	$result = mysql_query($sql);

}
?>

<script Language="Javascript">
<!--

	alert("����Ȯ��/������ ���������� �Ϸ�Ǿ����ϴ�.");
	self.close();

//-->
</script>