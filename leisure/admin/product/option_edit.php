<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
$sql = "select optcode,optcode2,optvalue from wiz_product where prdcode = '$prdcode'";
$result = mysql_query($sql) or error(mysql_error());
$opt_row = mysql_fetch_object($result);
?>
<html>
<head>
<title>:: �ɼǼ��� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function setOption(){
	var optvalue = "";
	var optcode_01 = "";
	var optcode_02 = "";
	var optcode_03 = "";
	
	for(i=0;i<document.forms.length;i++){
		
		optcode_01 = document.forms[i].optcode_01.value;
		optcode_02 = document.forms[i].optcode_02.value;
		optcode_03 = document.forms[i].optcode_03.value;
		
		if(!optcode_01) optcode_01 = 0;
		if(!optcode_02) optcode_02 = 0;
		if(!optcode_03) optcode_03 = 0;
		
		optvalue += optcode_01 + "^" + optcode_02 + "^" + optcode_03 + "^^";

	}
	
	document.location = 'prd_save.php?mode=optedit&prdcode=<?=$prdcode?>&optvalue=' + optvalue;

}

//-->
</script>
</head>
<body>
<table width="100%" cellpadding="4"><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���ݺ����ɼ�</td>
  </tr>
</table>
<table width="100%" cellspacing="1" cellpadding="3" align="center" class="t_style">
  <tr>
    <td class="t_name" align="center">�ɼ�</td>
    <td class="t_name" align="center">�߰�����</td>
    <td class="t_name" align="center">�߰�������</td>
    <td class="t_name" align="center">����</td>
  </tr>

	<?
	$no = 0;
	$opt1_arr = explode("^", $opt_row->optcode);
	$opt2_arr = explode("^", $opt_row->optcode2);
	$opt_tmp = explode("^^", $opt_row->optvalue);
	
	for($ii = 0; $ii < count($opt1_arr) - 1; $ii++) {
		for($jj = 0; $jj < count($opt2_arr) - 1; $jj++) {
		
		$opt_list = explode("^",$opt_tmp[$no]);
		
	?>
  <form name="frm_<?=$no?>">
  <tr>
    <td class="t_value" align="center"><?=$opt1_arr[$ii]."/".$opt2_arr[$jj]?></td>
    <td class="t_value" align="center"><input type="text" size="12" name="optcode_01" value="<?=$opt_list[0]?>" class="input"></td>
    <td class="t_value" align="center"><input type="text" size="12" name="optcode_02" value="<?=$opt_list[1]?>" class="input"></td>
    <td class="t_value" align="center"><input type="text" size="12" name="optcode_03" value="<?=$opt_list[2]?>" class="input"></td>
  </tr>
  </form>
	<?
	  	$no++;
		}
	}
	?>

</table><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
      <img src="../image/btn_apply_l.gif" style="cursor:hand" onClick="setOption();"> &nbsp; 
      <img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</table>
</td></tr></table>
</body>
</html>