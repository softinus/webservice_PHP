<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

$code = "review";
$sql = "select * from wiz_bbsinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$review_info = mysql_fetch_array($result);

$code = "qna";
$sql = "select * from wiz_bbsinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$qna_info = mysql_fetch_array($result);

?>

<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// ������ ���� �ٽ�����
function setReserve(){

	var frm = document.frm;
	var reserve_per = frm.reserve_per.value;
	
	if(Check_Num(reserve_per)){
		if(confirm("��� ��ǰ�� �������� ��ǰ������ "+reserve_per+"% �� �ϰ����� �˴ϴ�.\n\n�����Ͻðڽ��ϱ�?")){
			document.location = "shop_save.php?mode=setreserve&reserve_per=" + reserve_per;
		}
	}else{
		alert("���ڸ� �Է��ϼ���");
		frm.reserve_per.value = "";
		frm.reserve_per.focus();
	}
	
}

//PG�� Ŭ���� ������
function pg_dec(no){
	var pgdoc=document.getElementById("pgdec");
	if(no == "1"){
		//������ ����
		pgdoc.innerHTML = "<b>������ ������ > ������� > ������������ > '���ΰ�����ۿ���' �� ����(������)</b>���� �� �����ϼ���.<br>�ݵ�� �����ؾ� ī����� ������ ���������� �̷�����ϴ�.";
	}else if(no =="2"){
		//KCP����
		pgdoc.innerHTML = "<b>KCP���� �߱޹��� ���̵� �Է��ϼ���.</b><br>�ݵ�� �����ؾ� ī����� ������ ���������� �̷�����ϴ�.";
	}else if(no =="3"){
		//�̴Ͻý� ����
		pgdoc.innerHTML = "<b>�̴Ͻý����� ������ Ű������ /shop/INICIS/key/���̵��</b>���� ���ε��Ͻð�<br>�߱� ���� ������ ���̵� ���Է��Ͽ��ּ���.<br>�ݵ�� �����ؾ� ī����� ������ ���������� �̷�����ϴ�.";
	}else if(no =="4"){
		//�ô�����Ʈ ����
		pgdoc.innerHTML = "<b>�ô�����Ʈ���� �߱޹��� ���̵� �Է��ϼ���.</b><br>�ǰŷ� ���̵� �ƴҰ�� �����޼����� ��Ÿ���� �ֽ��ϴ�.<br>�ݵ�� �����ؾ� ī����� ������ ���������� �̷�����ϴ�.";
	}
}

// ������¹�ȣ ���
function accIns() {
	
	var url = "pay_account.php";
  window.open(url,"pay_Account","height=200, width=400, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");

}

// ������¹�ȣ ����
function accMod(no) {
	
	var url = "pay_account.php?mode=update&no=" + no;
  window.open(url,"pay_Account","height=200, width=400, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");

}

// ������¹�ȣ ����
function accDel(no) {
	
	if(confirm("������¹�ȣ�� �����Ͻðڽ��ϱ�?")) {
		document.location = "pay_account.php?save=true&mode=delete&no=" + no;
	}
		
}
-->
</script>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">�����̸�����</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">�����̸� ��� �ʿ��� ������ �����մϴ�.</td>
	</tr>
</table>
<a name="pay">
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> ��������</td>
		</tr>
	</table>
	<table width="100%" border="0" cellpadding="5" cellspacing="1" class="t_style">
	<form name="frm" action="shop_save.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="tmp">
		<input type="hidden" name="mode" value="oper_info">
		<tr>
			<td width="15%" class="t_name">�����̸��������</td>
			<td width="85%" class="t_value">
<?
$pay_method="";
$pay_list = explode("/",$oper_info->pay_method_day);
for($ii=0; $ii<count($pay_list); $ii++){
	$pay_method[$pay_list[$ii]] = true;
}
?>
<!--
				<input type="checkbox" name="pay_method_day[]" value="PB" <? if($pay_method["PB"]==true) echo "checked";?>>�������Ա�&nbsp;
-->
				<input type="checkbox" name="pay_method_day[]" value="PC" <? if($pay_method["PC"]==true) echo "checked";?>>ī�����&nbsp;
				<input type="checkbox" name="pay_method_day[]" value="PN" <? if($pay_method["PN"]==true) echo "checked";?>>������ü&nbsp;
				<!--
				<input type="checkbox" name="pay_method_day[]" value="PV" <? if($pay_method["PV"]==true) echo "checked";?>>�������&nbsp;
				-->
				<input type="checkbox" name="pay_method_day[]" value="PH" <? if($pay_method["PH"]==true) echo "checked";?>>�޴�������
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> �����̸� ��������</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td class="t_name" width="15%">���� �̹���0</td>
			<td class="t_value" width="35%"><img src="/data/oneday/<?=$oper_info->number0?>" align="absmiddle"/> <input name="number0" type="file" class="input"></td>
			<td class="t_name" width="15%">���� �̹���1</td>
			<td class="t_value" width="35%"><img src="/data/oneday/<?=$oper_info->number1?>" align="absmiddle"/> <input name="number1" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">���� �̹���2</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number2?>" align="absmiddle"/> <input name="number2" type="file" class="input"></td>
			<td class="t_name">���� �̹���3</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number3?>" align="absmiddle"/> <input name="number3" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">���� �̹���4</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number4?>" align="absmiddle"/> <input name="number4" type="file" class="input"></td>
			<td class="t_name">���� �̹���5</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number5?>" align="absmiddle"/> <input name="number5" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">���� �̹���6</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number6?>" align="absmiddle"/> <input name="number6" type="file" class="input"></td>
			<td class="t_name">���� �̹���7</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number7?>" align="absmiddle"/> <input name="number7" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">���� �̹���8</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number8?>" align="absmiddle"/> <input name="number8" type="file" class="input"></td>
			<td class="t_name">���� �̹���9</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number9?>" align="absmiddle"/> <input name="number9" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">�ֹ���ư �̹���</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->button_buy?>" /> <input name="button_buy" type="file" class="input"><br /></td>
			<td class="t_name">ǰ����ư �̹���</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->button_soldout?>" /> <input name="button_soldout" type="file" class="input"><br /></td>
		</tr>
		<tr>
			<td class="t_name">�ǸŽð� ����� �޼���</td>
			<td class="t_value" colspan="3"><input name="timemsg" type="text" class="input" size="60" value="<?=$oper_info->timemsg?>" /></td>
		</tr>
		<tr>
			<td class="t_name">�����ο� ������ �޼���</td>
			<td class="t_value" colspan="3"><input name="countmsg" type="text" class="input" size="60" value="<?=$oper_info->countmsg?>" /></td>
		</tr>
		<tr>
			<td class="t_name">SNS �˸��� ���</td>
			<td class="t_value" colspan="3">
<?
$arrSns =explode(",",$oper_info->sns);
?>
				<input name="sns[]" type="checkbox" value="twiter" <?if(in_array("twiter",$arrSns)){echo "checked";}?> /> Ʈ����
				<input name="sns[]" type="checkbox" value="me2day" <?if(in_array("me2day",$arrSns)){echo "checked";}?> /> ��������
				<input name="sns[]" type="checkbox" value="cyworld" <?if(in_array("cyworld",$arrSns)){echo "checked";}?> /> ���̿���
				<input name="sns[]" type="checkbox" value="facebook" <?if(in_array("facebook",$arrSns)){echo "checked";}?> /> ���̽���
				<input name="sns[]" type="checkbox" value="sms" <?if(in_array("sms",$arrSns)){echo "checked";}?> /> SMS
				<input name="sns[]" type="checkbox" value="email" <?if(in_array("email",$arrSns)){echo "checked";}?> /> E-mail
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td height="10" colspan="3"></td>
		</tr>
		<tr>
			<td width="10"></td>
			<td class="alert">�����̹���</td>
			<td class="alert">: �����ð� ī���Ϳ��� ���� �̹��� ���˴ϴ�.</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td class="alert">�ֹ�/ǰ����ư</td>
			<td class="alert">: ������ �ֹ����ɽ��� ���Ź�ư�� �������� ǰ���� ��Ÿ���� �̹����� �÷��ּ���.</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td class="alert">�޼���</td>
			<td class="alert">: �ǸŽð��� �� �޼����� �����ο�/���� ������ �޼����� �����Ͽ� �Է��Ҽ� �ֽ��ϴ�..</td>
		</tr>
	</table>
	<br>
	<table align="center" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
				<img src="../image/btn_cancel_l.gif" style="cursor:hand" onClick="history.go(-1);">
			</td>
		</tr>
</form>
	</table>

<? include "../footer.php"; ?>