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
		<td valign="bottom" class="tit">���������</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">��� �ʿ��� ������ �����մϴ�.</td>
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
			<td width="15%" class="t_name">�������</td>
			<td width="85%" class="t_value">
<?
$pay_list = explode("/",$oper_info->pay_method);
for($ii=0; $ii<count($pay_list); $ii++){
	$pay_method[$pay_list[$ii]] = true;
}
?>
				<input type="checkbox" name="pay_method[]" value="PB" <? if($pay_method["PB"]==true) echo "checked";?>>�������Ա�&nbsp;
				<input type="checkbox" name="pay_method[]" value="PC" <? if($pay_method["PC"]==true) echo "checked";?>>ī�����&nbsp;
				<input type="checkbox" name="pay_method[]" value="PN" <? if($pay_method["PN"]==true) echo "checked";?>>������ü&nbsp;
				<input type="checkbox" name="pay_method[]" value="PV" <? if($pay_method["PV"]==true) echo "checked";?>>�������&nbsp;
				<input type="checkbox" name="pay_method[]" value="PH" <? if($pay_method["PH"]==true) echo "checked";?>>�޴�������
			</td>
		</tr>
		<tr>
			<td class="t_name">�����ý���</td>
			<td class="t_value">
				<table width="100%" border="0" cellspacing="2" cellpadding="1">
					<tr>
						<td class="t_name"><input type="radio" name="pay_test" value="Y" <? if(!strcmp($oper_info->pay_test, "Y")) echo "checked" ?> onclick="javascript:document.frm.pay_id.value='tanywiz'"> �׽�Ʈ</td>
						<td class="t_value">��������� �׽�Ʈ�� �̿��մϴ�.  <br>
<!--2. �Ϻ� ���� �׽�Ʈ�� ���� ������ �̷�����Ƿ� �����Ͻñ� �ٶ��ϴ�.<br>
3. �ô�����Ʈ ���� �׽�Ʈ�� �����޼����� ����Ҽ��� �ֽ��ϴ�.-->
						</td>
					</tr>
					<tr>
						<td width="120" class="t_name"><input type="radio" name="pay_test" value="N" <? if(!strcmp($oper_info->pay_test, "N")) echo "checked" ?>> PG��ü ����</td>
						<td class="t_value"><!--input type="hidden" name="pay_agent" value="DACOM"//--><input name="pay_agent" value="DACOM" type="radio" <? if($oper_info->pay_agent == "DACOM") echo "checked"; ?> onclick="javascript:pg_dec('1')"> LG������ (http://ecredit.dacom.net)<br>
							<table border="0" cellpadding="4" cellspacing="6" bgcolor="#efefef">
								<tr>
									<td><font color="red"><b>����1 : ���������� <s>�Ϲݰ��Խ� 3.7%</s> => ���ް��Խ� 3.5%</b></font><br><a href="http://pgweb.dacom.net/pg/wmp/Home/application/apply_testid.jsp?cooperativecode=wizshop" target="_blank"><b>>> ���ް����ϱ�</b></a> (��ũ�� ���ؼ� �����ؾ߸� ���ް����� �̷�����ϴ�.)<br><br><font color="red"><b>����2 : ���ΰ�� ���� "����â2.0"���� ����</b></font><br>"�����ް����� > ������������ > ���� ��� ���� ����" �� �ݵ�� "����â2.0" ���� �����ϼ���<br>"����â2.0" �� �������� ������ ������ ���������� �̷������ �ʽ��ϴ�.<br>
									</td>
								</tr>
							</table>
							<input name="pay_agent" value="KCP" type="radio" <? if($oper_info->pay_agent == "KCP") echo "checked"; ?> onclick="javascript:pg_dec('2')"> KCP (http://www.payplus.co.kr)<br>
							<input name="pay_agent" value="INICIS" type="radio" <? if($oper_info->pay_agent == "INICIS") echo "checked"; ?> onclick="javascript:pg_dec('3')"> INICIS (http://www.inicis.com)<br>
							<input name="pay_agent" value="ALLTHEGATE" type="radio" <? if($oper_info->pay_agent == "ALLTHEGATE") echo "checked"; ?> onclick="javascript:pg_dec('4')"> AlltheGate (�ô�����Ʈ)
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="t_name">���� ID</td>
			<td class="t_value"><input name="pay_id" value="<?=$oper_info->pay_id?>" type="text" class="input"><br><br><div id="pgdec" style="color:red;"></div></td>
		</tr>
		<tr>
			<td class="t_name">���� mertkey</td>
			<td class="t_value"><input name="pay_key" value="<?=$oper_info->pay_key?>" type="text" size="50" class="input"> &nbsp;</td>
		</tr>
		<tr>
			<td class="t_name">������¹�ȣ</td>
			<td class="t_value">
				<table width="100%" border="0" cellspacing="2" cellpadding="1">
					<tr>
						<td height="25" align="right"><img src="../image/btn_bankadd.gif" style="cursor:hand" align="absmiddle" onClick="accIns()"></td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="2" cellpadding="1">
					<tr>
						<td height="25" align="center" class="t_name">�����</td>
						<td align="center" class="t_name">���¹�ȣ</td>
						<td align="center" class="t_name">������</td>
						<td align="center" class="t_name">���</td>
					</tr>
<?php
$pay_account = explode("\n", $oper_info->pay_account);
for($ii = 0; $ii < count($pay_account); $ii++) {
	$account = explode("^", $pay_account[$ii]);
	if(!empty($account[0])) {
?>
					<tr>
						<td height="20" align="center" class="t_value"><?=$account[1]?></td>
						<td align="center" class="t_value"><?=$account[2]?></td>
						<td align="center" class="t_value"><?=$account[3]?></td>
						<td align="center" class="t_value">
							<img src="../image/btn_edit_s.gif" style="cursor:hand" onClick="accMod('<?=$account[0]?>')">
							<img src="../image/btn_delete_s.gif" style="cursor:hand" onClick="accDel('<?=$account[0]?>')">
						</td>
					</tr>
<?php
	}
}
?>
				</table>
<!--textarea cols="50" rows="5" name="pay_account" class="textarea"><?=$oper_info->pay_account?></textarea//-->
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td width="10"></td>
			<td width="16%" valign="top" class="alert">������ ID</td>
			<td><font color=black>: ���� �ý��ۻ翡�� �ο����� ������ ���� ID�� �Է��ϼ���</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td valign="top" class="alert">������¹�ȣ</td>
			<td>: �ֹ��� ����� ������¸� �Է��մϴ�.</td>
		</tr>
	</table>
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> ����ũ��</td>
		</tr>
	</table>
	<table width="100%" border="0" cellpadding="5" cellspacing="1" class="t_style">
		<tr>
			<td width="15%" class="t_name">��뿩��</td>
			<td width="85%" class="t_value">
				<input name="pay_escrow" value="Y" type="radio" <? if($oper_info->pay_escrow == "Y") echo "checked"; ?> > �����
				<input name="pay_escrow" value="N" type="radio" <? if($oper_info->pay_escrow == "N") echo "checked"; ?> > ������
			</td>
		</tr>
		<tr>
			<td class="t_name">����ũ�� ����url</td>
			<td class="t_value">
				<table width="100%" border="0" cellspacing="2" cellpadding="1">
					<tr>
						<td class="t_name">LG������</td>
						<td class="t_value">http://<?=$HTTP_HOST?>/oneday/dacom/escrow_save.php</td>
					</tr>
					<tr>
						<td class="t_name">KCP (PayPlus)</td>
						<td class="t_value">http://<?=$HTTP_HOST?>/oneday/kcp/escrow_save.php</td>
					</tr>
<!--tr>
<td class="t_name">INICIS (�̴Ͻý�)</td>
<td class="t_value">http://<?=$HTTP_HOST?>/shop/INICIS/escrow_save.php</td>
</tr//-->
				</table>
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td width="10"></td>
			<td width="16%" valign="top" class="alert">�������Ա�</td>
			<td><font color=black>: ����ũ�� ���� 10�����̻��� �ֹ������� �������Ա� ����� ������ϴ�.</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td width="16%" valign="top" class="alert">KCP�� ����Ͻô� ���</td>
			<td><font color=black>: ���������� "���θ�����" > "��������" > "���� ���� URL����" > "���� ����URL ������" �κп� ����ũ�� ����url�� �Է�</td>
		</tr>
	</table>
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> ������¼���</td>
		</tr>
	</table>
	<table width="100%" border="0" cellpadding="5" cellspacing="1" class="t_style">
		<tr>
			<td width="15%" class="t_name">������� ����url</td>
			<td width="85%" class="t_value">
				<table width="100%" border="0" cellspacing="2" cellpadding="1">
					<tr>
						<td class="t_name">LG������</td>
						<td class="t_value">http://<?=$HTTP_HOST?>/oneday/dacom/order_update_vir.php</td>
					</tr>
					<tr>
						<td class="t_name">KCP (PayPlus)</td>
						<td class="t_value">http://<?=$HTTP_HOST?>/oneday/kcp/escrow_save.php</td>
					</tr>
					<tr>
						<td class="t_name">INICIS (�̴Ͻý�)</td>
						<td class="t_value">http://<?=$HTTP_HOST?>/oneday/INICIS/order_update_vir.php</td>
					</tr>
					<tr>
						<td class="t_name">ALLTHEGATE (�ô�����Ʈ)</td>
						<td class="t_value">http://<?=$HTTP_HOST?>/oneday/allthegate/auto_vbankresult.php</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td width="10"></td>
			<td width="16%" valign="top" class="alert">KCP ����������</td>
			<td><font color=black>:  "���θ�����" > "��������" > "���� ���� URL����" > "���� ����URL ������" �κп� ������� ����url�� �Է�</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td width="16%" valign="top" class="alert">INICIS ����������</td>
			<td><font color=black>:  "����" > "�������" > "�Ա��뺸���" > "URL ���� ���" ���� > "�Աݳ����뺸URL �ʵ�" �κп� ������� ����url�� �Է�</td>
		</tr>
	</table>
	<br>
<a name="del">
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> �������</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td class="t_name">�ù��</td>
			<td class="t_value">
<?php
$del_com_str = "�������,�����ù�,�����ù�,���ο�ĸ,��ü���ù�,�����ù�,Ʈ���,�����ù�,�����ù�,�ѹ̸��ù�,Bell Express,CJ GLS,HTH,KGB�ù�,KT�������ù�";
$del_com_list = explode(",", $del_com_str);
?>

				<select name="del_com">
<? for($ii = 0; $ii < count($del_com_list); $ii++) { ?>
					<option value="<?=$del_com_list[$ii]?>" <? if(!strcmp(trim($oper_info->del_com), $del_com_list[$ii])) echo "selected" ?>><?=$del_com_list[$ii]?></option>
<? } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="t_name">�����������</td>
			<td class="t_value"><input name="del_trace" value="<?=$oper_info->del_trace?>" type="text" size="80" class="input"></td>
		</tr>
	</table>
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> �⺻ �����å</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td width="15%" class="t_name">��۹���</td>
			<td width="85%" class="t_value"><input type="radio" name="del_method" value="DA" <? if($oper_info->del_method == "DA") echo "checked"; ?>>��ۺ� ���׹���</td>
		</tr>
		<tr>
			<td class="t_name">�����ںδ�</td>
			<td class="t_value"><input type="radio" name="del_method" value="DB" <? if($oper_info->del_method == "DB") echo "checked"; ?>>�����ںδ� (����)</td>
		</tr>
		<tr>
			<td class="t_name">������</td>
			<td class="t_value">
				<input type="radio" name="del_method" value="DC" <? if($oper_info->del_method == "DC") echo "checked"; ?>>
				<input name="del_fixprice" type="text" value="<?=$oper_info->del_fixprice?>" class="input">��
			</td>
		</tr>
		<tr>
			<td class="t_name">���Ű��ݺ�</td>
			<td class="t_value">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>
							<input type="radio" name="del_method" value="DD" <? if($oper_info->del_method == "DD") echo "checked"; ?>>
							<input type="text" name="del_staprice" value="<?=$oper_info->del_staprice?>" class="input">
						</td>
						<td>&nbsp;�̻󱸸Ž� <input type="text" name="del_staprice2" value="<?=$oper_info->del_staprice2?>" class="input"> ��</td>
					</tr>
					<tr>
						<td></td>
						<td>&nbsp;���ϱ��Ž� <input type="text" name="del_staprice3" value="<?=$oper_info->del_staprice3?>" class="input"> ��</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="t_name">��������</td>
			<td class="t_value">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="10"></td>
						<td>�����ȣ</td>
						<td>������</td>
					</tr>
					<tr>
						<td width="10"></td>
						<td>
							<input name="del_extrapost1" type="text" value="<?=$oper_info->del_extrapost1?>" class="input" size="9"> ����
							<input name="del_extrapost12" type="text" value="<?=$oper_info->del_extrapost12?>" class="input" size="9"> ����
						</td>
						<td>
							<input name="del_extraprice1" type="text" value="<?=$oper_info->del_extraprice1?>" class="input" size="20">��
						</td>
					</tr>
					<tr>
						<td width="10"></td>
						<td>
							<input name="del_extrapost2" type="text" value="<?=$oper_info->del_extrapost2?>" class="input" size="9"> ����
							<input name="del_extrapost22" type="text" value="<?=$oper_info->del_extrapost22?>" class="input" size="9"> ����
						</td>
						<td>
							<input name="del_extraprice2" type="text" value="<?=$oper_info->del_extraprice2?>" class="input" size="20">��
						</td>
					</tr>
					<tr>
						<td width="10"></td>
						<td>
							<input name="del_extrapost3" type="text" value="<?=$oper_info->del_extrapost3?>" class="input" size="9"> ����
							<input name="del_extrapost32" type="text" value="<?=$oper_info->del_extrapost32?>" class="input" size="9"> ����
						</td>
						<td>
							<input name="del_extraprice3" type="text" value="<?=$oper_info->del_extraprice3?>" class="input" size="20">��
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td width="10"></td>
			<td width="16%" valign="top" class="alert">��۷� ����</td>
			<td>: ��۷Ḧ 4���� ���·� �����ϸ� �� ��Ȳ�� ��۷� ������ �մϴ�.</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td valign="top" class="alert">��������</td>
			<td>: ���������� ���� ��۷Ḧ ���� �մϴ�. �����ֱ� �Ѱ���� ��� 695840 ���� 695844 ���� 2000��</td>
		</tr>
	</table>
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> ��ǰ�� �����å</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td width="15%" class="t_name">������ ��ǰ</td>
			<td width="85%" class="t_value">
				<input type="radio" name="del_prd" value="DA" <? if($oper_info->del_prd == "DA") echo "checked"; ?>> ������ ��ǰ�� �Բ� �ֹ��� ���, ��ü ��ۺ� ������մϴ�.<br>
				<input type="radio" name="del_prd" value="DB" <? if($oper_info->del_prd == "DB") echo "checked"; ?>> ������ ��ǰ�� �Բ� �ֹ��� ���, ������ ��ǰ�� ������ ��ǰ�� ��ۺ� �ΰ��մϴ�.
			</td>
		</tr>
		<tr>
			<td class="t_name">��ǰ�� ��ۺ�</td>
			<td class="t_value">
				<input type="radio" name="del_prd2" value="DA" <? if($oper_info->del_prd2 == "DA") echo "checked"; ?>> ��ǰ�� 2�� �̻� �ֹ��� ���, ��ǰ�� ��ۺ�� �⺻ ��ۺ� �ջ��� �ݾ��� ��ۺ�� �����մϴ�.<br>
				<input type="radio" name="del_prd2" value="DB" <? if($oper_info->del_prd2 == "DB") echo "checked"; ?>> ��ǰ�� 2�� �̻� �ֹ��� ���, ��ǰ�� ��ۺ�� �⺻ ��ۺ� �� �� ū ��ۺ� ��ü ��ۺ�� �����մϴ�.
			</td>
		</tr>
	</table>
	<br>
<a name="res">
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> ����������</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td class="t_name">��뿩��</td>
			<td class="t_value" colspan="3">
				<input type="radio" name="reserve_use" value="Y" <? if($oper_info->reserve_use == "Y") echo "checked"; ?>>�����
				<input type="radio" name="reserve_use" value="N" <? if($oper_info->reserve_use == "N") echo "checked"; ?>>������</td>
		</tr>
		<tr>
			<td width="15%" class="t_name">ȸ������ ������</td>
			<td width="35%" class="t_value"><input name="reserve_join" type="text" value="<?=$oper_info->reserve_join?>" class="input"></td>
			<td width="15%" class="t_name">��õ�� ������</td>
			<td width="35%" class="t_value"><input name="reserve_recom" type="text" value="<?=$oper_info->reserve_recom?>" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">�ּһ�� ������</td>
			<td class="t_value"><input name="reserve_min" type="text" value="<?=$oper_info->reserve_min?>" class="input"></td>
			<td class="t_name">1ȸ �ִ��� ������</td>
			<td class="t_value"><input name="reserve_max" type="text" value="<?=$oper_info->reserve_max?>" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">��ǰ���Ž� ������</td>
			<td class="t_value"><input name="reserve_buy" type="text" value="<?=$oper_info->reserve_buy?>" class="input"> %</td>
			<td class="t_name">������ �ϰ�����</td>
			<td class="t_value">
			<input name="reserve_per" type="text" value="<?=$oper_info->reserve_per?>" class="input" size="10"> % &nbsp;
			<img src="../image/btn_apply.gif" style="cursor:hand" align="absmiddle" onClick="setReserve();">
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td width="10"></td>
			<td width="16%" valign="top" class="alert">��뿩��</td>
			<td>: ��ǰ���Խ� ������ ����/��� , ȸ�����Խ�, ��õ���ΰ�� �� ������ ����� �����մϴ�.</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td valign="top" class="alert">��ǰ���Ž� ������</td>
			<td>: ��ǰ��Ͻ� �Ǹűݾ׿� �ۼ��� �ۼ�Ʈ�� �����Ͽ� �������� �ڵ����˴ϴ�.</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td valign="top" class="alert">������ �ϰ�����</td>
			<td>: ���� ��ϵǾ��ִ� ��ǰ�� �������� �ۼ��� �ۼ�Ʈ�� �ٽ� �����մϴ�.</td>
		</tr>
	</table>
	<br>
	<input type="hidden" name="review_usetype" value="N" />
	<input type="hidden" name="qna_usetype" value="N" />
<?/*?>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> ��ǰ�� ����</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td width="15%" class="t_name">��뿩��</td>
			<td width="35%" class="t_value">
				<input type="radio" name="review_usetype" value="Y" <? if($review_info[usetype] == "Y") echo "checked"; ?>>�����
				<input type="radio" name="review_usetype" value="N" <? if($review_info[usetype] == "N") echo "checked"; ?>>������
			</td>
			<td width="15%" class="t_name">�ۼ�����</td>
			<td width="35%" class="t_value">
				<select name="review_wpermi">
					<option value="">��ü</option>
					<?=level_list();?>
					<option value="-1">����ȸ��</option>
					<option value="0">������</option>
				</select>
			</td>
		</tr>
	</table>
<script language="javascript">
<!--
wpermi = document.frm.review_wpermi;
for(ii=0; ii<wpermi.length; ii++){
	if(wpermi.options[ii].value == "<?=$review_info[wpermi]?>")
	wpermi.options[ii].selected = true;
}
-->
</script>

	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> ��ǰQ&A ����</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td width="15%" class="t_name">��뿩��</td>
			<td width="35%" class="t_value">
				<input type="radio" name="qna_usetype" value="Y" <? if($qna_info[usetype] == "Y") echo "checked"; ?>>�����
				<input type="radio" name="qna_usetype" value="N" <? if($qna_info[usetype] == "N") echo "checked"; ?>>������
			</td>
			<td width="15%" class="t_name">�ۼ�����</td>
			<td width="35%" class="t_value">
				<select name="qna_wpermi">
					<option value="">��ü</option>
					<?=level_list();?>
					<option value="0">������</option>
				</select>
			</td>
		</tr>
	</table>
<script language="javascript">
<!--
wpermi = document.frm.qna_wpermi;
for(ii=0; ii<wpermi.length; ii++){
	if(wpermi.options[ii].value == "<?=$qna_info[wpermi]?>")
	wpermi.options[ii].selected = true;
}
-->
</script>
<?*/?>
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> ���ݰ�꼭 ����</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td width="15%" class="t_name">��뿩��</td>
			<td width="35%" class="t_value">
				<input type="radio" name="tax_use" value="Y" <? if($oper_info->tax_use == "Y") echo "checked"; ?>>�����
				<input type="radio" name="tax_use" value="N" <? if($oper_info->tax_use == "N") echo "checked"; ?>>������
			</td>
			<td width="15%" class="t_name">�߱޽���</td>
			<td width="35%" class="t_value">
				<input type="radio" name="tax_status" value="OY" <? if($oper_info->tax_status == "OY") echo "checked"; ?>>�����Ϸ�
				<input type="radio" name="tax_status" value="DC" <? if($oper_info->tax_status == "DC") echo "checked"; ?>>��ۿϷ�
			</td>
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