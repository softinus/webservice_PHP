<?
include "../../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�
include "../../inc/oper_info.inc";
if($save == ""){
?>
<html>
<head>
<title>��ǰ�̹��� ������</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function inputCheck(frm){
	if(frm.prdimg_R.value == ""){
		alert("��ǥ �̹��� ����� �Է��ϼ���");
		frm.prdimg_R.focus();
		return false;
	}
	if(frm.prdimg_S.value == ""){
		alert("��� �̹��� ����� �Է��ϼ���");
		frm.prdimg_S.focus();
		return false;
	}
	if(frm.prdimg_M.value == ""){
		alert("��ǰ�� �̹��� ����� �Է��ϼ���");
		frm.prdimg_M.focus();
		return false;
	}
	if(frm.prdimg_L.value == ""){
		alert("Ȯ�� �̹��� ����� �Է��ϼ���");
		frm.prdimg_L.focus();
		return false;
	}
}
//-->
</script>
</head>

<body>
<table><tr><td height="4"></td></table>

<table width="98%" align="center" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ��ǰ�̹��� ������</td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding=3 cellspacing=1 class="t_style">
<form name="frm" method="post" action="<?=$PHP_SELF?>" onSubmit="return inputCheck(this);">
<input type="hidden" name="save" value="true">
  <tr>
    <td width=50% height=25 class="t_name">&nbsp; ��ǥ �̹���</td>
    <td width=50% class="t_value"><input type="text" name="prdimg_R" value="<?=$oper_info->prdimg_R?>" size="6" class="input"></td>
  </tr>
  <tr>
    <td height=25 class="t_name">&nbsp; ��� �̹���</td>
    <td class="t_value"><input type="text" name="prdimg_S" value="<?=$oper_info->prdimg_S?>" size="6" class="input"></td>
  </tr>
  <tr>
    <td height=25 class="t_name">&nbsp; ��ǰ�� �̹���</td>
    <td class="t_value"><input type="text" name="prdimg_M" value="<?=$oper_info->prdimg_M?>" size="6" class="input"></td>
  </tr>
  <tr>
    <td height=25 class="t_name">&nbsp; Ȯ�� �̹���</td>
    <td class="t_value"><input type="text" name="prdimg_L" value="<?=$oper_info->prdimg_L?>" size="6" class="input"></td>
  </tr>
</table>

<br>
<table border=0 cellpadding=0 cellspacing=0  width=95% align=center>
  <tr>
    <td align=center>
    	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
    	<img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>
<?
}else{

	$sql = "update wiz_operinfo set prdimg_R='$prdimg_R', prdimg_S='$prdimg_S', prdimg_M='$prdimg_M', prdimg_L='$prdimg_L'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("��ǰ�̹��� ������ ������ ����Ǿ����ϴ�.","prd_imgsize.php");

}
?>