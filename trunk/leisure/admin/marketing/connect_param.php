<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
if($save != "true"){
	
// �м��� �Ķ���� ��������
$sql = "select con_parameter from wiz_operinfo";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
?>
<html>
<head>
<title>:: �м��Ķ���� ���� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="/js/valueCheck.js"></script>
</head>
<body>
<table width="100%" border="0" cellpadding=6 cellspacing=0>
<tr>
<td>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> �м��Ķ���� ����</td>
  </tr>
</table>
<table width="100%"cellpadding=2 cellspacing=1 class="t_style">
<form name="frm" action="<?=$PHP_SELF?>" method="post">
<input type="hidden" name="save" value="true">
  <tr>
    <td class="t_name" align="center" height=35 width=100>�м��Ķ����</td>
    <td class="t_value">&nbsp; 
      <input type="text" name="parameter" value="<?=$row->con_parameter?>" size="55" class="input">
      <input type="image" src="../image/btn_apply_s.gif" align="absmiddle"></td>
  </tr>
</form>
</table>
<br>
<table width="100%" border="0" cellpadding="2" cellspacing="6" class="e_style">
  <tr>
    <td bgcolor="ffffff">
    &nbsp;�� �˻����� ���� �м��ؾ��� �Ķ���� ���� �ٸ��ϴ�.<br>
    &nbsp;ex) ���̹����� "�Ƶ�ٽ�"�� �˻��Ѱ�� ��� �ּҴ� ������ �����ϴ�.<br>
    &nbsp;http://search.naver.com/search.naver?where=nexearch&<font color='red'><b>query</b></font>=%BE%C6%B5%F0%B4%D9%BD%BA&frm=t1<br>
    &nbsp;�̰�� �м��ؾ��� �Ķ���ʹ� <font color='red'><b>query</b></font>�� �˴ϴ�.<br>
    &nbsp;���� �м��Ķ���Ϳ� �� �Ķ���͸� �ĸ��� �����Ͽ� �����Ͻø� �˴ϴ�.<br>
    </td>
  </tr>
</table>

</td>
</tr>
</table>
</body>
</html>
<?
}else{
	
	$sql = "update wiz_operinfo set con_parameter = '$parameter'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("����Ǿ����ϴ�.","$PHP_SELF");
	
}
?>