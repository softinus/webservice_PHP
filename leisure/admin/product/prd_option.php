<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="javascript">
<!--
function openOption(mode,idx){
	var url = "option_input.php?mode=" + mode + "&idx=" + idx;
  window.open(url,"","height=300, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");
}
function delOption(idx){
	if(confirm('�ɼ��� �����Ͻðڽ��ϱ�?')){
		document.location="option_save.php?mode=delete&idx=" + idx;
	}
}
-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">�ɼ��׸����</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">�ɼ��׸��� �����մϴ�.</td>
			  </tr>
			</table>
			
			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> �ɼǸ��</td>
			    <td align="right"><img src="../image/btn_optionadd.gif" style="cursor:hand" onClick="openOption('insert','');"></td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="8%">No</th>
          <th width="20%">�ɼǸ�</th>
          <th>�ɼ��׸�</th>
          <th width="10%">���</th>
        </tr>
        <tr><td class="t_rd" colspan="20"></td></tr>
        <?
        $sql = "select idx from wiz_option order by idx desc";
        $result = mysql_query($sql) or error(mysql_error());
        
        $total = mysql_num_rows($result);

        $rows = 20;
        $lists = 5;

				$page_count = ceil($total/$rows);
				if(!$page || $page > $page_count) $page = 1;
				$start = ($page-1)*$rows;
				$no = $total-$start;
				
        $sql = "select * from wiz_option order by idx desc limit $start, $rows";
        $result = mysql_query($sql) or error(mysql_error());
        
        while(($row = mysql_fetch_object($result)) && $rows){
        ?>
        <tr> 
          <td  align="center"><?=$no?></td>
          <td height="30" align="center"><?=$row->opttitle?></td>
          <td height="30" align="center"><?=$row->optcode?></td>
          <td>
          <img src="../image/btn_edit_s.gif" style="cursor:hand" onClick="openOption('update','<?=$row->idx?>')">&nbsp;
          <img src="../image/btn_delete_s.gif" style="cursor:hand" onClick="delOption('<?=$row->idx?>')">
          </td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
        <?
     		$no--;
         $rows--;
         }
                              
       	if($total <= 0){
       	?>
       		<tr><td height='30' colspan=7 align=center>��ϵ� �ɼ��׸��� �����ϴ�.</td></tr>
       		<tr><td colspan="20" class="t_line"></td></tr>
       	<?
       	}
        ?>
      </table>

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td height="5"></td></tr>
      	<tr>
      		<td width="33%"></td>
      		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
      		<td width="33%"></td>
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
            	- ��ǰ��Ͻ� �ɼǸ�� �������⸦ ���Ͽ� ���� �ɼ��� ����� �� �ֽ��ϴ�.
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

<? include "../footer.php"; ?>