<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
if($sub_mode == "update"){
   $sql = "select * from wiz_mailsms where code = '$code'";
   $result = mysql_query($sql) or error(mysql_error());
   $row = mysql_fetch_object($result);
}
?>
<script language="javascript">
<!--
function inputCheck(frm){

	if(frm.code.value == ""){
		alert("�ڵ���� �Է��ϼ���");
		frm.code.focus();
		return false;
	}
	if(frm.subject.value == ""){
		alert("�з����� �Է��ϼ���");
		frm.subject.focus();
		return false;
	}
	
}

function calByte(type, aquery){
	
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
		
		if(type == "cust") frm.sms_custbyte.value = tcount+"/80 bytes";
		else  frm.sms_operbyte.value = tcount+"/80 bytes";
		
		if(tcount > 80) {
			alert("�޽��������� 80 ����Ʈ �̻� ������ �� �����ϴ�.");
			
			if(type == "cust") cutText(type, frm.sms_msg.value);
			else cutText(type, frm.sms_opermsg.value);
			
			
			return;
		}
	}
	if ( temp == 0 ) { 
		
		if(type == "cust") frm.sms_custbyte.value = "0/80 bytes";
		else  frm.sms_operbyte.value = "0/80 bytes";
		
	}
}

function cutText(type, aquery) {
	
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
	
	if(type == "cust") document.frm.sms_msg.value = tmpStr;
	else  document.frm.sms_opermsg.value = tmpStr;
	
	calByte(type, tmpStr);        
}

function checkSmsmsg(type){
	
	var tmpStr;
	if(type == "cust" && document.frm.sms_msg != null){
		tmpStr = document.frm.sms_msg.value;
		calByte(type, tmpStr);
	}
}

-->
</script>


      <table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">����<? if(!strcmp($shop_info->sms_use, "Y")) { ?>/SMS<? } ?>����</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">�� ��Ȳ�� ���ϳ����� �����մϴ�.</td>
        </tr>
      </table>

			<br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="t_style">
      <form name="frm" action="shop_save.php" method="post" onSubmit="return inputCheck(this);">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="mailsms">
      <input type="hidden" name="sub_mode" value="<?=$sub_mode?>">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="3">
              <tr> 
                <td width="15%" class="t_name">�ڵ� <font color=red>*</font></td>
                <td width="85%" class="t_value">
                <input type="text" name="code" value="<?=$row->code?>" size="20" class="input" <? if($sub_mode == "update") echo "readonly"; ?>>
                </td>
              </tr>
              <tr> 
                <td class="t_name">�з��� <font color=red>*</font></td>
                <td class="t_value">
                <input type="text" name="subject" value="<?=$row->subject?>" size="60" class="input">
                </td>
              </tr>
              <?
              if($code != "mem_notice" && !strcmp($shop_info->sms_use, "Y")){
              ?>
              <tr> 
                <td class="t_name">SMS����</td>
                <td class="t_value">
                  <input type="checkbox" name="sms_cust" value="Y" <? if($row->sms_cust == 'Y') echo "checked"; ?>>������ &nbsp; &nbsp; 
                  <input type="checkbox" name="sms_oper" value="Y" <? if($row->sms_oper == 'Y') echo "checked"; ?>>�����ڼ���<br>
                  <textarea cols="35" rows="5" name="sms_msg" onKeyDown="checkSmsmsg('cust');" class="textarea"><?=$row->sms_msg?></textarea>
                  <input type="text" name="sms_custbyte" size="11" style="height:14px; border: 1px solid #91FBFF; ; font-size:8pt; font-family:����; background-color:#91FBFF" value="0/80 bytes" onfocus="this.blur()">
                </td>
              </tr>
              <?
              }
              ?>
              <?
              if($code != "mem_notice"){
              ?>
              <tr> 
                <td class="t_name">���ϼ���</td>
                <td class="t_value">
                <input type="checkbox" name="email_cust" value="Y" <? if($row->email_cust == 'Y') echo "checked"; ?>>������ &nbsp; &nbsp; 
                <input type="checkbox" name="email_oper" value="Y" <? if($row->email_oper == 'Y') echo "checked"; ?>>�����ڼ���
                </td>
              </tr>
              <tr> 
                <td class="t_name">��������</td>
                <td class="t_value">
                <input type="text" name="email_subj" value="<?=$row->email_subj?>" size="80" class="input">
                </td>
              </tr>
              <?
              }
              ?>
              <tr> 
                <td class="t_name">���ϳ���</td>
                <td class="t_value">
                
                <?
                $edit_content = $row->email_msg;
                $edit_content = str_replace("{SHOP_URL}", "http://".$HTTP_HOST, $edit_content);
                include "../webedit/WIZEditor.html";
                ?>
                
                 <table width="98%" border="0" cellpadding="5" cellspacing="3" align="center" class="e_style">
                    <tr>
                      <td bgcolor="#FFFFFF">
                      <table>
                      <tr>
                      <td><b>{DATE}</b> ���ó��� &nbsp;</td>
                      <td><b>{MEM_ID}</b> ȸ�����̵� &nbsp;</td>
                      <td><b>{MEM_PW}</b> ȸ����й�ȣ &nbsp;</td>
                      </tr>
                      <tr>
                      <td><b>{MEM_NAME}</b> ȸ���̸�</td>
                      <td><b>{SHOP_NAME}</b> ����Ʈ�� &nbsp;</td>
                      <td><b>{SHOP_EMAIL}</b> ����Ʈ �̸���</td>
                      </tr>
                      <tr>
                      <td><b>{SHOP_TEL}</b> ����Ʈ ��ȭ��ȣ &nbsp;</td>
                      <td><b>{SHOP_URL}</b> ����Ʈ �ּҷ� ����Ǿ� �߼۵˴ϴ�.</td>
                      <td></td>
                      </tr>
                      <tr>
                      <td><b>{ORDER_INFO}</b> �ֹ����� &nbsp;</td>
                      <td></td>
                      <td></td>
                      </tr>
                      </table>
                    </tr>
                  </table>
                  
                </td>
              </tr>
            </table>
            
          </td>
        </tr>
      </table>
      
      <br>
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_list_l.gif" style="cursor:hand" onclick="document.location='shop_mailsms.php';">
          </td>
        </tr>
      </form>
      </table>

      <script language="javascript">
      <!--
      checkSmsmsg('cust');
      //checkSmsmsg('oper');
      -->
      </script>

<? include "../footer.php"; ?>