<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="JavaScript" type="text/javascript">
<!--
function delContent(idx){
   if(confirm('�ش��˾��� �����Ͻðڽ��ϱ�?')){
      document.location = "shop_save.php?mode=delete&idx=" + idx;
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
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td class="t_rd" colspan=20></td></tr>
        <tr class="t_th">
          <th width="8%">��ȣ</th>
          <th>����</th>
          <th>�����Ⱓ</th>
          <th>�����</th>
          <th width="10%">���</th>
        </tr>
        <tr><td class="t_rd" colspan=20></td></tr>
	      <?
	      $sql = "select idx from wiz_content where type = 'popup' order by idx desc";
	      $result = mysql_query($sql) or error(mysql_error());
	      $total = mysql_num_rows($result);
	
	      $rows = 12;
	      $lists = 5;
	    	$page_count = ceil($total/$rows);
	    	if($page < 1 || $page > $page_count) $page = 1;
	    	$start = ($page-1)*$rows;
	    	$no = $total-$start;
	
	      $sql = "select * from wiz_content where type = 'popup' order by idx desc limit $start, $rows";
	      $result = mysql_query($sql) or error(mysql_error());
	
	      while(($row = mysql_fetch_object($result)) && $rows){
	      ?>
	        <tr align="center">
	          <td height="30" align="center"><?=$no?></td>
	          <td><?=$row->title?></td>
	          <td><?=$row->sdate?>~<?=$row->edate?></td>
	          <td><?=$row->wdate?></td>
	          <td>
	            <img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='shop_popup_input.php?mode=update&idx=<?=$row->idx?>'">
	            <img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="delContent('<?=$row->idx?>');">
	          </td>
	        </tr>
	        <tr><td colspan="20" class="t_line"></td></tr>
	      <?
	      	$no--;
	      	$rows--;
	      }
	
	      if($total <= 0){
	      ?>
	          <tr><td colspan='20' height='25' align='center'>�ۼ��� �˾��� �����ϴ�.</td></tr>
	          <tr><td colspan="20" class="t_line"></td></tr>
	      <?
	      }
	      ?>
      </table>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td height="5"></td></tr>
      	<tr>
      		<td width="33%"><img src="../image/btn_popupadd.gif" style="cursor:hand" onClick="document.location='shop_popup_input.php';"></td>
      		<td width="33%"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
      		<td width="33%"></td>
      	</tr>
      </table>

<? include "../footer.php"; ?>