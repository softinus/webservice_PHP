<?
include "$_SERVER[DOCUMENT_ROOT]/dbcon.php";
$connect = @mysql_connect($db_host, $db_user, $db_pass) or error("DB ���ӽ� ������ �߻��߽��ϴ�.");
@mysql_select_db($db_name, $connect) or error("DB Select ������ �߻��߽��ϴ�");
include "$_SERVER[DOCUMENT_ROOT]/inc/shop_info.inc";
?>
<html>
<head>
<title>:: ���̼���Ű �Է� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="./style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function inputCheck(frm){
   if(frm.site_key.value == ""){
      alert("���̼���Ű�� �Է��ϼ���");
      frm.site_key.focus();
      return false;
   }
}

-->
</script>
</head>

<body onLoad="document.frm.site_key.focus();">
<table width="100%"  height="11" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  bgcolor="#3bc1c1">&nbsp;</td>
    <td width="222" bgcolor="#1c86cc"></td>
    <td width="2" bgcolor="#ffffff"></td>
    <td width="75" bgcolor="#AEAEAE"></td>
  </tr>
</table>
<table><tr><td height="200"></td></tr></table>
<table width="510" align="center" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit" width="120"><img src="./image/ic_tit.gif" align="absmiddle">���̼���Ű</td>
  </tr>
  <tr><td height="5"></td></tr>
</table>
<table width="510" align="center" border="0" cellspacing="1" cellpadding="0" class="t_style">
<form name="frm" action="/admin/site_key_save.php" method="post" onSubmit="return inputCheck(this);">
<input type="hidden" name="mode" value="keyupdate">
	<tr align="left" valign="middle">
		<td class="t_name">���̼���Ű</td>
		<td class="t_value" style="padding: 5px">
			<textarea name="site_key" rows="2" cols="50" class="textarea"><?=$shop_info->site_key?></textarea>
			<input type="image" src="./image/btn_confirm_s.gif" align="absmiddle">
		</td>
	</tr>
</table>
<table width="510" align="center" cellspacing="1" cellpadding="0">
	<tr><td height="10"></td></tr>
	<tr>
		<td>
			<font color="red">
			- ���̼���Ű�� ���ų� �ùٸ��� �ʽ��ϴ�. ��Ȯ�� ���̼���Ű�� �Է��ϼ���.<br>
			</font>
        	- ���̼���Ű�� ��Ȯ���� ���� ��� ��ġ 2���� �� ���� ������ ����� ����� �� �����ϴ�.<br>
        	- �������� ����� ��� ���̼��� Ű�� �ٽ� �߱޹޾ƾ� �մϴ�.<br>
        	- �������� �������ΰ�� �Ѷ��ο� �ϳ��� �߰��� �� �ֽ��ϴ�.
		</td>
	</tr>
</table>

</body>
</html>