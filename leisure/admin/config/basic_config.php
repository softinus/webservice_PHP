<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="javascript">
<!--
function searchZip(){
	document.frm.com_address.focus();
	var url = "../member/search_zip.php?kind=com_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

function inputCheck(frm){
	if(frm.designer_id.value == ""){
		alert("�����̳� ���̵� �Է��ϼ���.");
		frm.designer_id.focus();
		return false;
	}
	if(frm.designer_pw.value == ""){
		alert("�����̳� ��й�ȣ�� �Է��ϼ���.");
		frm.designer_pw.focus();
		return false;
	}
}

// ���̵� �ߺ�Ȯ��
function idCheck(){
   var id = document.frm.designer_id.value;
   var url = "../member/id_check.php?name=designer_id&id=" + id;
   window.open(url, "idCheck", "width=350, height=150, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=150, top=150");
}

-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">ȯ�漳��</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">����Ʈ �⺻������ �����մϴ�.</td>
			  </tr>
			</table>
			
			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="right">
            <img src="../image/btn_dbdesc.gif" style="cursor:hand" onClick="window.open('/admin/desc_table.php?mode=print','','');">
            <img src="../image/btn_filedesc.gif" style="cursor:hand" onClick="window.open('/admin/desc_file.php?mode=print','','');">
          </td>
        </tr>
      </table>

      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="tit_sub"><img src="../image/ics_tit.gif" align="absmiddle"> ���� ������Ʈ ��¥</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr>
          <td width="15%" class="t_name">���� ������Ʈ ��¥</td>
          <td width="85%" class="t_value">
          	<?=$shop_info->up_date?>
          </td>
        </tr>
      </table>
			<br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���̼���Ű ���</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
      <form name="frm" action="basic_save.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="shop_info">
        <tr>
          <td width="15%" class="t_name">���̼��� Ű</td>
          <td width="85%" class="t_value">
          	<textarea name="site_key" rows="2" cols="50" class="textarea"><?=$shop_info->site_key?></textarea>&nbsp; 
          	<a href="http://www.anywiz.co.kr" target="_blank"><img src="../image/btn_license.gif" border="0"></a>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="6">
        <tr> 
          <td>
          	<!-- - ���̼��� Ű �� ������� ������� ����Ȩ ��ġ 2���� �� ���� ������ ����� ����� �� �����ϴ�.<br//-->
          	- �������� ����� ��� ���̼��� Ű�� �ٽ� �߱޹޾ƾ� �մϴ�.<br>
          	- �������� �������ΰ�� �Ѷ��ο� �ϳ��� �߰��� �� �ֽ��ϴ�.
          </td>
        </tr>
      </table>
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> �ΰ��Ÿ��Ʋ</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
              <tr> 
                <td width="15%" class="t_name">������ �ΰ�</td>
                <td width="85%" class="t_value">
                <img src='/data/config/admin_logo.gif'><br><input name="admin_logo" type="file" class="input">
                </td>
              </tr>
              <tr>
                <td class="t_name">������ Ÿ��Ʋ</td>
                <td class="t_value"><input name="admin_title" type="text" value="<?=$shop_info->admin_title?>" size="80" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">������ ī�Ƕ���</td>
                <td class="t_value"><textarea name="admin_footer" rows="3" cols="80" class="textarea"><?=$shop_info->admin_footer?></textarea></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> �����̳� ���̵�/��й�ȣ</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr>
          <td width="15%" class="t_name">�����̳� ���̵�</td>
          <td width="85%" class="t_value"><input name="designer_id" type="text" value="<?=$shop_info->designer_id?>" maxlength="20" class="input" readonly> <img src="../image/btn_idcheck.gif" style="cursor:hand" align="absmiddle" onCLick="idCheck()"></td>
        </tr>
        <tr>
          <td class="t_name">�����̳� ��й�ȣ</td>
          <td class="t_value"><input name="designer_pw" type="text" value="<?=$shop_info->designer_pw?>" maxlength="20" class="input"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="6">
        <tr> 
          <td>
          	- �����̳� ���̵�/��й�ȣ���� �α��νÿ��� ȯ�漳�� �޴��� ��Ÿ�� �Ϲݰ����ڴ� ������ �ʽ��ϴ�.<br>
          	- ����Ʈ ���� �Ϸ��� ������ ����� ����Ǿ����� �����̳� ������ �����ϹǷ� ������ ���ӿ� ���մϴ�.</td>
        </tr>
      </table>
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> �Խ����߰� ��뿩��</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr>
          <td width="15%" class="t_name">��뿩��</td>
          <td width="85%" class="t_value">     	
          	<input type="radio" name="addbbs_use" value="Y" <? if(!strcmp($shop_info->addbbs_use, "Y") || empty($shop_info->addbbs_use)) echo "checked" ?>> ���
          	<input type="radio" name="addbbs_use" value="N" <? if(!strcmp($shop_info->addbbs_use, "N")) echo "checked" ?>> ������
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="6">
        <tr> 
          <td>
          	- �Խ����߰��� ������� �ʴ� ��� "�Խ��ǰ��� > �Խ��Ǹ��"���� �Խ����� �߰��� �� �����ϴ�.
          </td>
        </tr>
      </table>
      
      <br>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> ������ �α����� �̵�������</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr>
          <td width="15%" class="t_name">�α����� �̵�������</td>
          <td width="85%" class="t_value">
          	<table>
          	<tr><td>�⺻������ : /admin/main/main.php</td></tr>
          	<tr><td>http://<?=$HTTP_HOST?><input name="start_page" type="text" value="<?=$shop_info->start_page?>" size="50" class="input"></td></tr>
          	</table>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="6">
        <tr> 
          <td>- ������ �α��� �� �ۼ��� �ּҷ� �̵��մϴ�.</td>
        </tr>
        <tr> 
          <td>- Ŭ���̾�Ʈ��û �Ǵ� �޴��� �߿䵵�� ���� ������ �α����� �̵��������� �����մϴ�. </td>
        </tr>
      </table>

      <br>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> SMS ���</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr>
          <td width="15%" class="t_name">��뿩��</td>
          <td width="85%" class="t_value">
          	<input type="radio" name="sms_use" value="Y" <? if($shop_info->sms_use == "Y") echo "checked"; ?>>�����&nbsp;
          	<input type="radio" name="sms_use" value="N" <? if($shop_info->sms_use == "N") echo "checked"; ?>>������
          </td>
        </tr>
        <tr>
          <td class="t_name">SMS���̵�</td>
          <td class="t_value"><input type="text" name="sms_id" value="<?=$oper_info->sms_id?>" class="input"></td>
        </tr>
        <tr>
          <td class="t_name">SMS��й�ȣ</td>
          <td class="t_value"><input type="text" name="sms_pw" value="<?=$oper_info->sms_pw?>" class="input"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="6">
        <tr> 
          <td>- SMS���񽺴� �ִ������ ���� �ص帮�� SMS���� ��ü�� ����� ���ֽ��ϴ�.</td>
        </tr>
        <tr> 
          <td>- SMS�� ����ϴ°�� ���������� "SMS����" �޴��� �����Ǹ� �����׹߼� ����Ƚ���� ��ȸ�� �� �ֽ��ϴ�.</td>
        </tr>
        <tr> 
          <td>- ȸ�������� "SMS�߼�" �޴��� �����Ǿ� ��ü�߼��� �����ϸ� ȸ����Ͽ��� ����,���ù߼��� �����մϴ�.</td>
        </tr>
      </table>

      <br>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> �Ǹ����� ���</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr>
          <td width="15%" class="t_name">��뿩��</td>
          <td width="85%" class="t_value">
          	<input type="radio" name="namecheck_use" value="Y" <? if($shop_info->namecheck_use == "Y") echo "checked"; ?>>�����&nbsp;
          	<input type="radio" name="namecheck_use" value="N" <? if($shop_info->namecheck_use == "N") echo "checked"; ?>>������
          </td>
        </tr>
        <tr>
          <td class="t_name">�Ǹ����� ���̵�</td>
          <td class="t_value"><input type="text" name="namecheck_id" value="<?=$shop_info->namecheck_id?>" class="input"></td>
        </tr>
        <tr>
          <td class="t_name">�Ǹ����� ��й�ȣ</td>
          <td class="t_value"><input type="text" name="namecheck_pw" value="<?=$shop_info->namecheck_pw?>" class="input"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="6">
        <tr> 
          <td>- �Ǹ������� ����ϴ� ��� ȸ������ ������������� �Ǹ��� üũ�ϰ� �˴ϴ�.</td>
        </tr>
        <tr> 
          <td>- �Ǹ������� �ѱ��ſ�������(��)���� �����ϸ� <a href="http://www.namecheck.co.kr" target="_blank">http://www.namecheck.co.kr</a>���� ��û�Ͻ� �� �ֽ��ϴ�.</td>
        </tr>
        <tr> 
          <td>- ��û �� �߱޹��� ���̵�� ��й�ȣ�� �Է� �����ϸ� �ٷ� �Ǹ����� üũ�� �����մϴ�.</td>
        </tr>
        <tr> 
          <td><font color=red>����) ��û�� ���� cb_namecheck ������ /member ������ ���ε�(<b>����Ÿ�� �� ���̳ʸ�</b>)�� 707�۹̼��� �ݴϴ�.</font></td>
        </tr>
      </table>
      
      <br>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> SSL ���</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr>
          <td width="15%" class="t_name">��뿩��</td>
          <td width="35%" class="t_value">
          	<input type="radio" name="ssl_use" value="Y" <? if($shop_info->ssl_use == "Y") echo "checked"; ?>>�����&nbsp;
          	<input type="radio" name="ssl_use" value="N" <? if($shop_info->ssl_use == "N") echo "checked"; ?>>������
          </td>
          <td width="15%" class="t_name">��Ʈ��ȣ</td>
          <td width="35%" class="t_value">
          	<input type="text" name="ssl_port" value="<?=$shop_info->ssl_port?>" class="input">
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="6">
        <tr> 
          <td>- SSL�� ����ϴ� ��� �⺻������ ������ SSL�� ������ �Ǿ��־���մϴ�.</td>
        </tr>
        <tr> 
          <td>- Ȯ�� ��� https://�ش絵���� ex) https://<?=$HTTP_HOST?> </td>
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