<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<?

$array_selorder = explode("|",$selorder);
$hp_data = "";

$isFirst = true;

if(count($array_selorder) == 1){
	$maxcount = 1;
}else{
	$maxcount = count($array_selorder)-1;
}

for($i=0; $i< $maxcount; $i++){

	$sql = "select * from wiz_dayorder where orderid='$array_selorder[$i]'";
	$stm = mysql_query($sql)or die($sql);
	$row = mysql_fetch_array($stm);

	$rece_hphone = $row[rece_hphone];

	if($isFirst==true){
		$hp_data .= $rece_hphone;
		$isFirst=false;
	}else{
		$hp_data .= ",".$rece_hphone;
	}
}


?>

<html>
<head>
<title>:: SMS�߼� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
function inputCheck(frm){
	if(frm.seluser.value == ""){
		alert("�޴��� �޴�����ȣ�� �Է��ϼ���");
		frm.seluser.focus();
		return false;
	}

	if(frm.content.value == ""){
		alert("������ �Է��ϼ���");
		frm.content.focus();
		return false;
	}
}

function calByte(aquery){
	var tmpStr;
	var temp = 0;
	var onechar;
	var tcount = 0;;

	tmpStr = new String(aquery);
	temp = tmpStr.length;
	for(k=0; k<temp; k++) {
		onechar = tmpStr.charAt(k);
		if(escape(onechar).length > 4) {
			tcount += 2;
		} else if(onechar != '\n' || onechar != '\r') {
			tcount++;
		}

		frm.sms_byte.value = tcount+"/80 bytes";

		if(tcount > 80) {
			alert("�޽��������� 80 ����Ʈ �̻� ������ �� �����ϴ�.");
			cutText(frm.content.value);
			return;
		}
	}
	if ( temp == 0 ) { 
		frm.sms_byte.value = "0/80 bytes";
	}
}

function cutText(aquery) {
	var tmpStr;
	var temp=0;
	var onechar;
	var tcount = 0;

	tmpStr = new String(aquery);
	temp = tmpStr.length;

	for(t=0; t<temp; t++){
		onechar = tmpStr.charAt(t);
		if(escape(onechar).length > 4) {
			tcount += 2;
		} else if(onechar != '\n' || onechar != '\r') {
			tcount++;
		}
		if(tcount > 80) {
			tmpStr = tmpStr.substring(0, t);
			break;
		}
	}
	document.frm.content.value = tmpStr;
	calByte(tmpStr);        
}

function checkSmsmsg(){
	var tmpStr = document.frm.content.value;
	calByte(tmpStr);
}


//-->
</script>
</head>
<body>
<?
if($coupon_number != ""){
	$msg = "������ȣ : ".$coupon_number."\n �̿��� �ּż� �����մϴ�.";
}
?>
<table width="100%" border="0" cellpadding=6 cellspacing=0>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td class="tit_sub"><img src="../image/ics_tit.gif"> SMS�߼�</td>
				</tr>
			</table>
			<table width="100%" border="0" cellpadding=2 cellspacing=1 class="t_style">
			<form name="frm" action="member_save.php" method="post" onSubmit="return inputCheck(this);">
				<input type="hidden" name="mode" value="sendsms">
				<input type="hidden" name="se_name" value="<?=$shop_info->shop_name?>">
				<input type="hidden" name="se_tel" value="<?=$shop_info->shop_hand?>">
				<tr>
					<td height="30" width="30%" align=center class="t_name">��������</td>
					<td class="t_value"><?=$shop_info->shop_name?>(<?=$shop_info->shop_hand?>)</td>
				</tr>
				<tr>
					<td height="30" align=center class="t_name">�޴��޴���</td>
					<td class="t_value">
						<textarea name="seluser" rows="2" cols="20" class="textarea" style="width:100%"><?=$hp_data?></textarea>
						<table>
							<tr>
								<td>����) 011-123-4567,016-123-4567</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height="30" align=center class="t_name">����</td>
					<td align="center" class="t_value">
						<textarea name="content" rows="10" cols="36" class="textarea" style="width:100%" onKeyDown="checkSmsmsg();"><?=$msg?></textarea>
					</td>
				</tr>
			</table>
			<table width="100%" border="0" cellpadding=2 cellspacing=1>
				<tr>
					<td align="right"><input type="text" name="sms_byte" size="11" style="height:14px; border: 1px solid #91FBFF; ; font-size:8pt; font-family:����; background-color:#91FBFF" value="0/80 bytes" onfocus="this.blur()"></td>
				</tr>
			</table>
			<table align="center" border="0" cellpadding=0 cellspacing=0>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td>
						<input type="image" src="../image/btn_send_l.gif"> &nbsp; 
						<img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
					</td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>