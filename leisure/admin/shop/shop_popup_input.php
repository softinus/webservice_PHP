<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
$type = "popup";
if($mode == "") $mode = "insert";
if($mode == "update"){
	$sql = "select * from wiz_content where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$popup_info = mysql_fetch_object($result);
}
?>

<script language="JavaScript">
<!--
function inputCheck(frm){
   
   if(frm.title.value == ""){
      alert("������ �Է��ϼ���");
      frm.title.focus();
      return false;
   }
   if(frm.content.value == ""){
      alert("�˾������� �Է��ϼ���");
      return false;
   }
   
}
//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">�˾�����</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">�˾� ���,�����մϴ�.</td>
        </tr>
      </table>

			<br>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
      <form name="frm" action="shop_save.php" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="type" value="<?=$type?>">
      <input type="hidden" name="mode" value="<?=$mode?>">
      <input type="hidden" name="idx" value="<?=$idx?>">
        <tr> 
          <td class="t_name">����</td>
          <td class="t_value" colspan="3">
          <input type="text" name="title" value="<?=$popup_info->title?>" size="80" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">�ԽñⰣ</td>
          <td class="t_value" colspan="3">
          <?
        	$sdate_list = explode("-",$popup_info->sdate);
					$edate_list = explode("-",$popup_info->edate);

           if(empty($sdate_list[0])) $sdate_year = date('Y');
           else $sdate_year = $sdate_list[0];
           
           if(empty($sdate_list[1])) $sdate_month = date('m');
           else $sdate_month = $sdate_list[1];
           
           if(empty($sdate_list[2])) $sdate_day = date('d');
           else $sdate_day = $sdate_list[2];

					 if(empty($edate_list[0])) $edate_year = date('Y')+1;
           else $edate_year = $edate_list[0];
           
           if(empty($edate_list[1])) $edate_month = date('m');
           else $edate_month = $edate_list[1];
           
           if(empty($edate_list[2])) $edate_day = date('d');
           else $edate_day = $edate_list[2];
           
           if($popup_info->posi_x == "") $posi_x = "100";
           else $posi_x = $popup_info->posi_x;
           if($popup_info->posi_y == "") $posi_y = "100";
           else $posi_y = $popup_info->posi_y;
           
           if($popup_info->size_x == "") $size_x = "340";
           else $size_x = $popup_info->size_x;
           if($popup_info->size_y == "") $size_y = "400";
           else $size_y = $popup_info->size_y;

           ?>
           <select name="sdate_year" class="select2">
            <?                     
               for($ii=2004; $ii <= 2020; $ii++){
                 if($ii == $sdate_year) echo "<option value=$ii selected>$ii";
                 else echo "<option value=$ii>$ii";
               }
            ?>
              </select>
              �� 
              <select name="sdate_month" class="select2">
                <?
               for($ii=1; $ii <= 12; $ii++){
                 if($ii<10) $ii = "0".$ii;
                 if($ii == $sdate_month) echo "<option value=$ii selected>$ii";
                 else echo "<option value=$ii>$ii";
               }
            ?>
              </select>
              �� 
              <select name="sdate_day" class="select2">
                <?
               for($ii=1; $ii <= 31; $ii++){
                 if($ii<10) $ii = "0".$ii;
                 if($ii == $sdate_day) echo "<option value=$ii selected>$ii";
                 else echo "<option value=$ii>$ii";
               }
            ?>
              </select>
              �� ~ 
              <select name="edate_year" class="select2">
                <?
               for($ii=2004; $ii <= 2020; $ii++){
                 if($ii == $edate_year) echo "<option value=$ii selected>$ii";
                 else echo "<option value=$ii>$ii";
               }
            ?>
              </select>
              �� 
              <select name="edate_month" class="select2">
                <?
               for($ii=1; $ii <= 12; $ii++){
                 if($ii<10) $ii = "0".$ii;
                 if($ii == $edate_month) echo "<option value=$ii selected>$ii";
                 else echo "<option value=$ii>$ii";
               }
            ?>
              </select>
              �� 
              <select name="edate_day" class="select2">
                <?
               for($ii=1; $ii <= 31; $ii++){
                 if($ii<10) $ii = "0".$ii;
                 if($ii == $edate_day) echo "<option value=$ii selected>$ii";
                 else echo "<option value=$ii>$ii";
               }
            ?>
              </select>
              ��&nbsp;
          </td>
        </tr>
        <tr> 
          <td width="15%" class="t_name">�˾����� <font color="red">*</font></td>
          <td width="35%" class="t_value">
            <input name="popup_type" type="radio" value="W" size="6" class="input" <? if($popup_info->popup_type == "W" || $popup_info->popup_type == "") echo "checked"; ?>> �Ϲ��˾� &nbsp; 
            <input name="popup_type" type="radio" value="L" size="6" class="input" <? if($popup_info->popup_type == "L") echo "checked"; ?>> ���̾��˾�
          </td>
          <td width="15%" class="t_name"></td>
          <td width="35%" class="t_value"></td>
        </tr>
        <tr> 
          <td class="t_name">��뿩�� <font color="red">*</font></td>
          <td class="t_value">
            <input name="isuse" type="radio" value="Y" size="6" class="input" <? if($popup_info->isuse == "Y" || $popup_info->isuse == "") echo "checked"; ?>> ����� &nbsp; 
            <input name="isuse" type="radio" value="N" size="6" class="input" <? if($popup_info->isuse == "N") echo "checked"; ?>> ������
          </td>
          <td class="t_name">��ũ�ѿ���</td>
          <td class="t_value">&nbsp;
            <input name="scroll" type="radio" value="Y" size="6" class="input" <? if($popup_info->scroll == "Y") echo "checked"; ?>> �����&nbsp; 
            <input name="scroll" type="radio" value="N" size="6" class="input" <? if($popup_info->scroll == "N" || $popup_info->scroll == "") echo "checked"; ?>> ������
          </td>
        </tr>
        <tr> 
          <td class="t_name">��ġ <font color="red">*</font></td>
          <td class="t_value">&nbsp;
            X : <input name="posi_x" type="text" value="<?=$posi_x?>" size="6" class="input"> &nbsp; 
            Y : <input name="posi_y" type="text" value="<?=$posi_y?>" size="6" class="input">
          </td>
          <td class="t_name">ũ��</td>
          <td class="t_value">&nbsp;
            ���� : <input name="size_x" type="text" value="<?=$size_x?>" size="6" class="input"> &nbsp; 
            ���� : <input name="size_y" type="text" value="<?=$size_y?>" size="6" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">��ũ�ּ�</td>
          <td class="t_value" colspan="3"><input type="text" name="linkurl" value="<?=$popup_info->linkurl?>" size="60" class="input"></td>
        </tr>
        <tr>
          <td class="t_name">�˾�����</td>
          <td class="t_value" colspan="3">
          <?
          $edit_content = $popup_info->content;
          include "../webedit/WIZEditor.html";
          ?>
          </td>
        </tr>
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
              <td><img src="../image/check_tit.gif" width="75" height="19" /></td>
            </tr>
            <tr>
              <td class="chk_alt">
            	- �˾����¿��� ���̾��˾��� �̿��Ͽ� â�̾ƴ� ���̾�� ������ �� �ֽ��ϴ�.<br>
            	- �˾��� �����Ͽ����� �������� ��� �������� üũ�غ�����. �ԽñⰣ, ��뿩��, ������>����>���ͳݿɼ�>��Ű����
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
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='shop_popup.php';">
          </td>
        </tr>
      </form>
      </table>

<? include "../footer.php"; ?>