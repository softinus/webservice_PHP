<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="JavaScript" type="text/javascript">
<!--
function delAdmin(id){
   if(confirm('�ش�����ڸ� �����Ͻðڽ��ϱ�?')){
      document.location = "shop_save.php?mode=shop_admin&sub_mode=delete&id=" + id;
   }
}
//-->
</script>


			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">�����ڸ��</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">�����ڸ� �߰�/����/���� �մϴ�.</td>
        </tr>
      </table>

			<br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td class="t_rd" colspan=6></td></tr>
        <tr class="t_th">
          <th width="8%">��ȣ</td>
          <th width="15%">���̵�</td>
          <th>����</td>
          <th width="20%">����������</td>
          <th width="20%">�����</td>
          <th width="10%">���</td>
        </tr>
				<tr><td class="t_rd" colspan=6></td></tr>
	      <?
	      $sql = "select id from wiz_admin order by wdate desc";
	      $result = mysql_query($sql) or error(mysql_error());
	      $total = mysql_num_rows($result);
	
	      $rows = 12;
	      $lists = 5;
	    	$page_count = ceil($total/$rows);
	    	if($page < 1 || $page > $page_count) $page = 1;
	    	$start = ($page-1)*$rows;
	    	$no = $total-$start;
	    	
	      $sql = "select * from wiz_admin order by wdate desc limit $start, $rows";
	      $result = mysql_query($sql) or error(mysql_error());
	      
	      while(($row = mysql_fetch_array($result)) && $rows){
	      ?>
	        <tr align="center"> 
	          <td height="30" align="center"><?=$no?></td>
	          <td><?=$row[id]?></td>
	          <td><?=$row[name]?></td>
	          <td><?=$row[last]?></td>
	          <td><?=$row[wdate]?></td>
	          <td>
	            <img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='shop_admin_input.php?sub_mode=update&id=<?=$row[id]?>'">
	            <img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="delAdmin('<?=$row[id]?>');">
	          </td>
	        </tr>
	        <tr><td colspan="20" class="t_line"></td></tr>
	      <?
	      	$no--;
	      	$rows--;
	      }
	      if($total <= 0){
	      ?>
	        <tr><td height="30" colspan="10" align="center">��ϵ� �����ڰ� �����ϴ�.</td></tr>
	        <tr><td colspan="20" class="t_line"></td></tr>
	      <?
	      }
	      ?>
      </table>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td height="5"></td></tr>
      	<tr>
      		<td width="33%"><img src="../image/btn_adminadd.gif" style="cursor:hand" onClick="document.location='shop_admin_input.php?sub_mode=insert';"></td>
      		<td width="33%"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
      		<td width="33%"></td>
      	</tr>
      </table>
                            

<? include "../footer.php"; ?>