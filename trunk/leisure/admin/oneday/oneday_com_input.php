<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
if($mode == "update"){
   
	$sql = "select * from wiz_company where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$com_info = mysql_fetch_object($result);
	
	$charge_tel = explode("-",$com_info->charge_tel);
	$charge_tel1 = $charge_tel[0];
	$charge_tel2 = $charge_tel[1];
	$charge_tel3 = $charge_tel[2];
	$charge_hp = explode("-",$com_info->charge_hp);
	$charge_hp1 = $charge_hp[0];
	$charge_hp2 = $charge_hp[1];
	$charge_hp3 = $charge_hp[2];
	$charge_fax = explode("-",$com_info->charge_fax);
	$charge_fax1 = $charge_fax[0];
	$charge_fax2 = $charge_fax[1];
	$charge_fax3 = $charge_fax[2];

}else{
	$mode = "insert";
}
?>

<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
   
   if(frm.com_id.value == ""){
      alert("���޾�ü ���̵� �Է��ϼ���");
      frm.com_id.focus();
      return false;
   }
   if(frm.com_pw.value == ""){
      alert("���޾�ü ��й�ȣ�� �Է��ϼ���");
      frm.com_pw.focus();
      return false;
   }
   if(frm.company.value == ""){
      alert("���޾�ü �̸��� �Է��ϼ���");
      frm.company.focus();
      return false;
   }
   if(frm.bossname.value == ""){
      alert("��ǥ�ڸ��� �Է��ϼ���");
      frm.bossname.focus();
      return false;
   }
   if(frm.com_no.value == ""){
      alert("����ڵ�Ϲ�ȣ�� �Է��ϼ���");
      frm.com_no.focus();
      return false;
   }
}

//-->
</script>
<script language="javascript">
</script>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">���޾�ü ���</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">���޾�ü ������ ����մϴ�.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="company_save.php" method="post" onSubmit="return inputCheck(this);">
	<input type="hidden" name="mode" value="<?=$mode?>">
	<?if($mode=="update"){?>
	<input type="hidden" name="idx" value="<?=$com_info->idx?>">
	<?}?>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
				<tr>
					<td width="15%" class="t_name">���̵� <font color=red>*</font></td>
					<td width="35%" class="t_value"><input name="com_id" type="text" value="<?=$com_info->com_id?>" class="input" <? if($mode == "update") echo "readonly"; ?>></td>
					<td width="15%" class="t_name">��й�ȣ <font color=red>*</font></td>
					<td width="35%" class="t_value"><input name="com_pw" type="text" value="<?=$com_info->com_pw?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">���޾�ü�� <font color=red>*</font></td>
					<td class="t_value" colspan="3"><input name="company" type="text" value="<?=$com_info->company?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">��ǥ�ڸ� <font color=red>*</font></td>
					<td class="t_value"><input name="bossname" type="text" value="<?=$com_info->bossname?>" class="input"></td>
					<td class="t_name">����ڵ�Ϲ�ȣ <font color=red>*</font></td>
					<td class="t_value"><input name="com_no" type="text" value="<?=$com_info->com_no?>" class="input"></td>
				</tr>
				<tr>
					<td height="25" class="t_name" rowspan="2">�ּ�</td>
					<td class="t_value" colspan="3" >
						<input name="addr1" type="text" value="<?=$com_info->addr1?>" class="input" style="width:400px;" />
					</td>
				</tr>
				<tr>
					<td class="t_value" colspan="3" >
						<input name="addr2" type="text" value="<?=$com_info->addr2?>" class="input" style="width:400px;" />
					</td>
				</tr>
				<tr>
					<td height="25" class="t_name">����</td>
					<td class="t_value" colspan="3"><input name="business" type="text" value="<?=$com_info->business?>" class="input"></td>
				</tr>
				<tr>
					<td height="25" class="t_name">����</td>
					<td class="t_value" colspan="3"><input name="com_kind" type="text" value="<?=$com_info->com_kind?>" class="input"></td>
				</tr>
			</table>
			<br />
			<table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
				<tr>
					<td class="t_name">����ڸ� <font color=red>*</font></td>
					<td class="t_value" colspan="3"><input name="charge" type="text" value="<?=$com_info->charge?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name" width="15%">����� ��ȭ��ȣ</td>
					<td class="t_value" width="35%">
						<input type="text" name="charge_tel1" value="<?=$charge_tel1?>" size="5" class="input">- 
						<input type="text" name="charge_tel2" value="<?=$charge_tel2?>" size="5" class="input">- 
						<input type="text" name="charge_tel3" value="<?=$charge_tel3?>" size="5" class="input">
					</td>
					<td class="t_name" width="15%">����� �޴���</td>
					<td class="t_value" width="35%">
						<input type="text" name="charge_hp1" value="<?=$charge_hp1?>"  size="5" class="input">- 
						<input type="text" name="charge_hp2" value="<?=$charge_hp2?>"  size="5" class="input">- 
						<input type="text" name="charge_hp3" value="<?=$charge_hp3?>"  size="5" class="input">
					</td>
				</tr>
				<tr>
					<td class="t_name">�ѽ���ȣ <font color=red>*</font></td>
					<td class="t_value" colspan="3">
						<input type="text" name="charge_fax1" value="<?=$charge_fax1?>"  size="5" class="input">- 
						<input type="text" name="charge_fax2" value="<?=$charge_fax2?>"  size="5" class="input">- 
						<input type="text" name="charge_fax3" value="<?=$charge_fax3?>"  size="5" class="input">
					</td>
				</tr>
				<tr>
					<td class="t_name">����� �̸��� <font color=red>*</font></td>
					<td class="t_value" colspan="3"><input name="charge_email" type="text" value="<?=$com_info->charge_email?>" class="input"></td>
				</tr>
				<tr>
					<td height="25" class="t_name">�޸�</td>
					<td class="t_value" colspan="3"><textarea name="memo" rows="5" cols="90" class="textarea" style="width:100%"><?=$com_info->memo ?></textarea></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<input type="image" src="../image/btn_confirm_l.gif">&nbsp; 
			<img src="../image/btn_list_l.gif" style="cursor:hand" onclick="document.location='oneday_company.php';">
		</td>
	</tr>
</form>
</table>

<? include "../footer.php"; ?>