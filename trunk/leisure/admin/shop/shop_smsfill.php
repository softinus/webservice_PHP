<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="javascript">
<!--
function inputCheck(frm){
   
  //if(frm.sms_id.value == ""){
	//	alert("sms���̵� �Է��ϼ���.");
	//	frm.sms_id.focus();
	//	return false;
	//}
   
}

function popJoin(stype) {
	
	if(stype == "J"){
		document.smsjoin.action = "http://www.icodekorea.com/res/join_company_fix.php";
		window.open("", "popJoin", "height=700, width=617, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
	}else{
		window.open("", "popJoin", "height=600, width=617, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
	}
	
	document.smsjoin.submit();

}

function popFill() {
	
<? if(!empty($oper_info->sms_id) && !empty($oper_info->sms_pw)) { ?>
	window.open("", "popFill", "height=500, width=667, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
	document.smsfill.submit();
<? } else { ?>
	alert("sms���̵�� ��й�ȣ�� �Է��ϼ���.");
<? } ?>

}

function popLog() {
	
<? if(!empty($oper_info->sms_id) && !empty($oper_info->sms_pw)) { ?>
   window.open("", "popLog", "height=550, width=750, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
   document.smslog.submit();
<? } else { ?>
	alert("sms���̵�� ��й�ȣ�� �Է��ϼ���.");
<? } ?>
	
}

-->
</script>


      <table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">SMS����</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">SMS�� �����մϴ�.</td>
        </tr>
      </table>

			<br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form action="shop_save.php" method="post" onSubmit="return inputCheck(this)">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="smsfill">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
            	<tr>
                <td width="17%" align="left" class="t_name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sms����</td>
                <td colspan="3" class="t_value">
                	<table width="100%">
                		<tr>
                			<td>
                				<input name="sms_type" type="radio" value="C" <? if($oper_info->sms_type == "" || $oper_info->sms_type == "C") echo "checked"; ?>><b>������</b> (�Ǵ� 25��, 10���� ������ 4000�� �߼�)
                			</td>
                			<td>
                				<img src="../image/btn_sms_apply.gif" style="cursor:hand" onClick="popJoin('C')">
                				<img src="../image/btn_sms_fill.gif" style="cursor:hand" onClick="popFill()">
                			</td>
                			<td rowspan="2" align="right">
                				<img src="../image/btn_sms_search.gif" style="cursor:hand" onClick="popLog()">
                			</td>
                		</tr>
                		<tr>
                			<td>
                				<input name="sms_type" type="radio" value="J" <? if($oper_info->sms_type == "J") echo "checked"; ?>><b>������</b> (�Ǵ� 20��, ��50,000������ 2500��)
                			</td>
                			<td>
                				<img src="../image/btn_sms_apply2.gif" style="cursor:hand" onClick="popJoin('J')">
                			</td>
                		</tr>
                	</table>
                </td>
              </tr>
              <tr>
                <td width="17%" align="left" class="t_name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sms���̵�</td>
                <td colspan="3" class="t_value">Any_<input name="sms_id" type="text" value="<?=str_replace("Any_","",$oper_info->sms_id)?>" style="width:163" class="input"></td>
              </tr>
              <tr>
                <td align="left" class="t_name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sms��й�ȣ</td>
                <td colspan="3" class="t_value"><input name="sms_pw" type="password" value="<?=$oper_info->sms_pw?>" size="30" class="input"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table><br>
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
       <tr>
       	 <td width="40%"></td>
         <td align="center"><input type="image" src="../image/btn_confirm_l.gif"></td>
         <td width="40%" align="right"></td>
       </tr>
      </form>
      </table>
      

      <br>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="9d9d9d">
        <tr>
          <td width="5" height="5"><img src="../image/check_left_top.gif"></td>
          <td width="100%"></td>
          <td width="5" height="5"><img src="../image/check_right_top.gif"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td colspan="2"><img src="../image/check_tit.gif" width="75" height="19" /></td>
            </tr>
            <tr>
            	<td class="chk_alt" valign="top">
              <font color=#000000><b>���ǻ���</b></font><br>
              - sms ���̵�,��й�ȣ�� �Է��� �����ؾ� ������ �����մϴ�.<br>
              - �߼۰����ȸ�� Ŭ���Ͻø� �߼��� sms�� ���� ������ Ȯ���� �� �ֽ��ϴ�.<br>
              - �߼��� ���� �ʴ� ��� ��ȭ������ IP(211.172.232.124)�� Port(7192~7195)�� Ȯ���غ�����.<br>
              - �ý��ۻ󿡼� �ܾ��� ���� �� �ڵ����� ���񽺰� ����˴ϴ�.<br>
              - ȸ�Ź�ȣ�� "�⺻����>������ �޴���" ��ȣ�̹Ƿ� ����ϰ� ��� ��ȣ�� �����Ͻñ� �ٶ��ϴ�.<br>
              - SMS���񽺴� <a href="http://icodekorea.com" target="_blank">�����ڵ�(http://icodekorea.com)</a>�� �����Ͽ� �����˴ϴ�.<br>
  					  - ���/��꼭���� ���Ǵ� �����ڵ� �����Ͻñ� �ٶ��ϴ�.
              </td>
              <td class="chk_alt" valign="top">
              <font color=#000000><b>����</b></font><br>
              1. ��û�ϱ� ��ư�� ���� ��û���� �ۼ�, SMS�� ���� �մϴ�.<br>
              2. ��û�� ID�� ��ȣ�� sms���̵�, sms��й�ȣ�� �Է��� �� �����մϴ�.<br>
              3. 1��,2���� �� ��ġ�ø� SMS �߼��� �����մϴ�.<br><br><br>
            	</td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
          <td></td>
          <td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
        </tr>
      </table>
      
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td align="center">
         <iframe src="http://www.icodekorea.com/res/userinfo.php?userid=<?=$oper_info->sms_id?>&userpw=<?=$oper_info->sms_pw?>&r_url=http://<?=$HTTP_HOST?>/admin/shop/shop_smsinfo.php" frameborder="0" width="100%" height="400"></iframe>
       </tr>
      </table>

			<!-- sms��û�ϱ� -->
      <form name="smsjoin" method="post" target="popJoin" action="http://www.icodekorea.com/res/join_company_fix_a.php">
			<input type="hidden" name="sellid" value="anywiz">	
			</form>

			<!-- sms�����ϱ� -->
			<form name="smsfill" method="post" target="popFill" action="http://www.icodekorea.com/company/credit_card_input.php">
			<input type="hidden" name="icode_id" value="<?=$oper_info->sms_id?>">
			<input type="hidden" name="icode_passwd" value="<?=$oper_info->sms_pw?>">
			</form>

			<!-- sms�߼۳��� -->
			<form name="smslog" method="post" target="popLog" action="http://www.icodekorea.com/icodemsg/web/sms_sendmail_box.php">
			<input type="hidden" name="icode_id" value="<?=$oper_info->sms_id?>">
			<input type="hidden" name="icode_passwd" value="<?=$oper_info->sms_pw?>">	
			</form>

<? include "../footer.php"; ?>