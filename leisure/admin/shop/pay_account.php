<?
include "../../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�
include "../../inc/oper_info.inc";

if($save == ""){

	if(empty($mode)) $mode = "insert";

	if(!strcmp($mode, "update")) {

		$pay_account = explode("\n", $oper_info->pay_account);

		for($ii = 0; $ii <= count($pay_account); $ii++) {

			$account_tmp = explode("^", $pay_account[$ii]);

			if(!strcmp($account_tmp[0], $no)) {

				$bank = $account_tmp[1];
				$account = $account_tmp[2];
				$name = $account_tmp[3];

				$ii = count($pay_account) + 1;

			}

		}

	}

?>
<html>
<head>
<title>������¹�ȣ</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function inputCheck(frm){
	if(frm.bank.value == ""){
		alert("������� �Է��ϼ���");
		frm.bank.focus();
		return false;
	}
	if(frm.account.value == ""){
		alert("���¹�ȣ���� �Է��ϼ���");
		frm.account.focus();
		return false;
	}
	if(frm.name.value == ""){
		alert("�����ָ� �Է��ϼ���");
		frm.name.focus();
		return false;
	}
}
//-->
</script>
</head>

<BODY onLoad="window.focus();"> 
<table width="100%" cellpadding=10 cellspacing=0><tr><td>
	
<table width="100%" align=center border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ������¹�ȣ</td>
  </tr>
</table>
<table width="100%" align=center border="0" cellpadding=3 cellspacing=1 class="t_style">
<form name="frm" method="post" action="<?=$PHP_SELF?>" onSubmit="return inputCheck(this);">
<input type="hidden" name="save" value="true">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="no" value="<?=$no?>">
  <tr>
    <td width=30% height=25 class="t_name">&nbsp; �����</td>
    <td width=70% class="t_value"><input type="text" name="bank" value="<?=$bank?>" class="input"></td>
  </tr>
  <tr>
    <td height=25 class="t_name">&nbsp; ���¹�ȣ</td>
    <td class="t_value"><input type="text" name="account" value="<?=$account?>" class="input"></td>
  </tr>
  <tr>
    <td height=25 class="t_name">&nbsp; ������</td>
    <td class="t_value"><input type="text" name="name" value="<?=$name?>" class="input"></td>
  </tr>
</table>

<br>
<table border=0 cellpadding=0 cellspacing=0 align=center>
  <tr>
    <td>
    	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
    	<img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>

</td></tr></table>

<?
}else{

	if(!strcmp($mode, "insert")) {

		$pay_account = explode("\n",$oper_info->pay_account);
		$pay_account_cnt = count($pay_account) - 1;

		$account_tmp = explode("^", $pay_account[$pay_account_cnt]);

		$no = $account_tmp[0] + 1;

		$pay_account_tmp = $oper_info->pay_account."\n".$no."^".$bank."^".$account."^".$name;

		$sql = "update wiz_operinfo set pay_account = '".$pay_account_tmp."'";
		mysql_query($sql) or error(mysql_error());

		echo "<script>alert('����Ǿ����ϴ�.');window.opener.document.location.href = window.opener.document.URL;self.close();</script>";

	} else if(!strcmp($mode, "update")) {

		$pay_account = explode("\n",$oper_info->pay_account);
		for($ii = 0; $ii < count($pay_account); $ii++) {

			$account_tmp = explode("^", $pay_account[$ii]);

			if(!empty($account_tmp[0])) {

				if(!strcmp($no, $account_tmp[0])) {
					$pay_account_tmp .= "\n".$no."^".$bank."^".$account."^".$name;
				} else {
					$pay_account_tmp .= "\n".$account_tmp[0]."^".$account_tmp[1]."^".$account_tmp[2]."^".$account_tmp[3];
				}

			}

		}

		$sql = "update wiz_operinfo set pay_account = '".$pay_account_tmp."'";
		mysql_query($sql) or error(mysql_error());

		echo "<script>alert('�����Ǿ����ϴ�.');window.opener.document.location.href = window.opener.document.URL;self.close();</script>";

	} else if(!strcmp($mode, "delete")) {

		$pay_account = explode("\n",$oper_info->pay_account);
		for($ii = 0; $ii < count($pay_account); $ii++) {

			$account_tmp = explode("^", $pay_account[$ii]);

			if(!empty($account_tmp[0])) {
				if(!strcmp($no, $account_tmp[0])) {
					$delete = true;
				} else {
					if(!strcmp($delete, true)) $account_tmp[0] = $account_tmp[0] - 1;
					$pay_account_tmp .= "\n".$account_tmp[0]."^".$account_tmp[1]."^".$account_tmp[2]."^".$account_tmp[3];
				}
			}

		}

		$sql = "update wiz_operinfo set pay_account = '".$pay_account_tmp."'";
		mysql_query($sql) or error(mysql_error());

		echo "<script>alert('�����Ǿ����ϴ�.');document.location='shop_oper.php';</script>";

	}

}
?>