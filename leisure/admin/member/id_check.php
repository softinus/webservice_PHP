<?
include_once "$_SERVER[DOCUMENT_ROOT]/inc/common.inc";
include "$_SERVER[DOCUMENT_ROOT]/inc/mem_info.inc";

$sql = "select id from wiz_member where id='$id'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

$sql = "select id from wiz_admin where id = '$id'";
$result = mysql_query($sql) or error(mysql_error());
$total2 = mysql_num_rows($result);

$sql = "select designer_id from wiz_shopinfo  where designer_id  = '$id' or anywiz_id = '".md5($id)."'";
$result = mysql_query($sql) or error(mysql_error());
$total3 = mysql_num_rows($result);

if($id != ""){
	if($total > 0){
		$checkmsg = "<font color=#00BCBC><b>".$id."</b></font> �� �̹� ������� ���̵� �Դϴ�.";
	} else if($total2 + $total3 > 0) {
		$checkmsg = "<font color=#00BCBC><b>".$id."</b></font> �� ����� �� ���� ���̵� �Դϴ�.";
	} else{
		$checkmsg = "<font color=#00BCBC><b>".$id."</b></font> �� ��밡���� ���̵� �Դϴ�. <img src='../image/btn_confirm_s.gif' style='cursor:hand' align='absmiddle' onClick='setId();'>";
	}
}else{
	$checkmsg = "����ϰ��� �ϴ� ���̵� �Է��ϼ���";
}
?>
<html>
<head>
<title>���̵� �ߺ�üũ</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../js/util_lib.js"></script>
<script language="JavaScript">
<!--

// �Է°� üũ
function inputCheck(frm){
	
	if(frm.id.value.length < 3 || frm.id.value.length > 12){
		alert("���̵�� 3 ~ 12�ڸ��� �����մϴ�.");
		frm.id.focus();
		return false;
	}else{
		if(!Check_Char(frm.id.value)){
			alert("���̵�� Ư�����ڸ� ����Ҽ� �����ϴ�.");
			frm.id.focus();
			return false;
		}
   }

}
// ���̵� �Է������� ����
function setId(){
	opener.frm.<?=$name?>.value = '<?=$id?>';
	self.close();
}
//-->
</script>
</head>

<body onLoad="document.frm.id.focus();">
	
<table width="100%" cellpadding=10 cellspacing=0><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���̵� �˻�</td>
  </tr>
</table>
<table width="100%"cellpadding=2 cellspacing=1 class="t_style">
<form name="frm" method="post" action="<?=$PHP_SELF?>" onSubmit="return inputCheck(this)">
	<input type=hidden name=name value="<?=$name?>">
  <tr>
    <td height=25 width="100" class="t_name" align="center">���̵�</td>
    <td class="t_value">
      <input type="text" name="id" class="input" size="20" value="<?=$id?>">
      <input type="image" src="../image/btn_search.gif" align="absmiddle">
    </td>
  </tr>
</form>
</table>
<br>

<table border=0 cellpadding=2 cellspacing=0 width=100% bgcolor=#ffffff align=center>
	<tr>
	  <td colspan="2" align="center"><?=$checkmsg?></td>
	</tr>
</table>	

</td></tr></table>
</body>
</html>