<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
function delConfirm(code){
	
	if(confirm("���� �����Ͻðڽ��ϱ�?")){
		document.location = "shop_save.php?mode=mailsms&sub_mode=delete&code=" + code;
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
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td colspan=20 class="t_rd"></td></tr>
        <tr class="t_th">
          <th width="8%">��ȣ</th>
          <th width="30%">�з���</th>
          <th width="12%">���ϰ�</th>
          <th width="12%">���ϰ�����</th>
          <? if(!strcmp($shop_info->sms_use, "Y")) { ?>
          <th width="12%">SMS��</th>
          <th width="12%">SMS������</th>
        <? } ?>
          <th width="10%">���</th>
        </tr>
        <tr><td colspan=20 class="t_rd"></td></tr>
      <?
      function getYesNo($yn){
      	if($yn == "N") return "��������";
      	else if($yn == "Y") return "����";
      }
      
      $no = 1;
      $sql = "select * from wiz_mailsms";
      $result = mysql_query($sql) or error(mysql_error());
      $no = mysql_num_rows($result);
      while($row = mysql_fetch_object($result)){
      ?>
        <tr> 
          <td align="center" height="30"><?=$no?></td>
          <td>&nbsp; <?=$row->subject?></td>
          <td align="center"><?=getYesNo($row->email_cust)?></td>
          <td align="center"><?=getYesNo($row->email_oper)?></td>
          <? if(!strcmp($shop_info->sms_use, "Y")) { ?>
          <td align="center"><?=getYesNo($row->sms_cust)?></td>
          <td align="center"><?=getYesNo($row->sms_oper)?></td>
        <? } ?>
          <td align="center">
            <img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='shop_mailsms_input.php?code=<?=$row->code?>&sub_mode=update';">&nbsp;
            <img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="delConfirm('<?=$row->code?>');">
          </td>
          </td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
      <?
      	$no--;
   	}
   	?>
   	</table>

<? include "../footer.php"; ?>