<? include_once "$_SERVER[DOCUMENT_ROOT]/inc/common.inc" ?>
<html>
<head>
<title>:: �ֹ����� �ϰ�ó�� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language='javascript'>
<!--
function showdsn(svalue){

	if(svalue=="DI" || svalue=="DC"){
		document.getElementById("showdel").style.display="";
		resizeTo(330,500);
	}else{
		document.getElementById("showdel").style.display="none";
		resizeTo(250,250);
	}
	return;
}

function inputCheck(frm) {

	var cnt = document.forms["frm"].elements["deliveryno[]"].length;

	if(frm.chg_status.value == "DI") {

		for(ii = 0; ii < cnt; ii++) {

			if(!document.forms["frm"].elements["deliveryno[]"][ii].value) {
				alert("�����ȣ�� �Է��ϼ���."); document.forms["frm"].elements["deliveryno[]"][ii].focus(); return false;
			}
			if(!document.forms["frm"].elements["deliver_date[]"][ii].value) {
				alert("�߼����ڸ� �Է��ϼ���."); document.forms["frm"].elements["deliver_date[]"][ii].focus(); return false;
			}

		}

	}

}
-->
</script>
</head>
<body onLoad="resizeTo(250,250);">
<table width="100%" cellpadding=0 cellspacing=10><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> �ֹ����� �ϰ�ó��</td>
  </tr>
</table>
<table width="100%" cellpadding=2 cellspacing=1 class="t_style">
<form action="order_save.php" name="frm" onsubmit="return inputCheck(this)">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="batchStatus">
<input type="hidden" name="selorder" value="<?=$selorder?>">
  <tr align=center>
    <td height="23" class="t_name" width=100><b>���¼���</b></td>
    <td class="t_value">
    <select name="chg_status" style="width:90" onChange="javascript:showdsn(this.value);">
    <option value="OR">�ֹ�����
    <option value="OY">�����Ϸ�
    <option value="DR">����غ���
    <option value="DI">���ó��
    <option value="DC">��ۿϷ�
    <option value="OC">�ֹ����
    <option value="">----------
    <option value="RD">ȯ�ҿ�û
    <option value="RC">ȯ�ҿϷ�
    <option value="CD">��ȯ��û
    <option value="CC">��ȯ�Ϸ�
    </select>
    </td>
  </tr>
  <tr align=center id="showdel" style='display:none;'>
    <td colspan=2 align=center bgcolor=#ffffff>
    <div>
    <table cellspacing=1 cellpadding=0 width=100% border=0>
    	<tr>
    		<td align=center><b>�ֹ���ȣ</b></td>
    		<td align=center><b>�����ȣ</b></td>
    		<td align=center><b>�߼�����</b></td>
    	</tr>
    	<?
    	$array_selorder = explode("|",$selorder);
			foreach($array_selorder as $key => $value){
				list($value, $old_status) = explode(":", $value);
				if(trim($value)){

				$sql = "select deliver_num, deliver_date from wiz_order where orderid = '$value'";
				$result = mysql_query($sql) or error(mysql_error());
				$row = mysql_fetch_array($result);

				echo "<tr>
						<td align=center>$value</td>
						<td align=center><input type=text size=12 name=\"deliveryno[]\" value=\"$row[deliver_num]\" class=input></td>
						<td align=center>
							<input type=text size=12 name=\"deliver_date[]\" value=\"$row[deliver_date]\" onClick=\"if(this.value == '') this.value='".date(Ymdhi)."';\" class=\"input\">
						</td>
					</tr>";
				}
			}
    	?>
    	<tr>
    		<td colspan="3" style="padding-top:3px">
    			<b>�߼����� �Է�����(����Ͻú�)</b><br>
    			��) <?=date('Y')?>�� <?=date('m')?>�� <?=date('d')?>�� <?=date('H')?>�� <?=date('i')?>�� =
    		<?=date('Y').date('m').date('d').date('H').date('i')?>
    		</td>
    	</tr>
    </table>
    </div>
    </td>
  </tr>
</table>
<table width="100%">
  <tr>
  	<td align="center"><br>�ֹ���� �� ��ҿϷ�� �ֹ���<br>���°� ������� �ʽ��ϴ�.</td>
  </tr>
</table>
<br>
<table align="center">
  <tr>
    <td><input type="image" src="../image/btn_confirm_l.gif"></td>
  </tr>
</form>
</table>


</td></tr></table>
</body>
</html>