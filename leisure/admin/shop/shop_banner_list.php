<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="JavaScript" type="text/javascript">
<!--
function delContent(idx, ban_img){
   if(confirm('�ش��ʸ� �����Ͻðڽ��ϱ�?')){
      document.location = "shop_save.php?mode=ban_delete&idx=" + idx + "&ban_img=" + ban_img;
   }
}
//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">��ʱ׷����</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">��ʱ׷��� ����,����,���� �մϴ�.</td>
        </tr>
      </table>

      <?
      $sql = "select idx from wiz_bannerinfo order by idx asc";
      $result = mysql_query($sql) or error(mysql_error());
      $total = mysql_num_rows($result);

      $rows = 12;
      $lists = 5;
    	$page_count = ceil($total/$rows);
    	if($page < 1 || $page > $page_count) $page = 1;
    	$start = ($page-1)*$rows;
    	$no = $total-$start;
      ?>
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td class="t_rd" colspan=20></td></tr>
        <tr class="t_th">
          <th width="15%">�׷��</th>
          <th>�ڵ�</th>
          <th>�̹���</th>
          <th>����</th>
          <th>��ʰ���</th>
          <th>��뿩��</th>
          <th width="15%">���</th>
        </tr>
        <tr><td class="t_rd" colspan=20></td></tr>
	      <?
	      $sql = "select * from wiz_bannerinfo order by idx asc limit $start, $rows";
	      $result = mysql_query($sql) or error(mysql_error());
	      
	      while(($row = mysql_fetch_object($result)) && $rows){
	
	      $sql = "select * from wiz_banner where name='$row->name'";
	      $result2 = mysql_query($sql) or error(mysql_error());
	      $ban_image = mysql_num_rows($result2);
	      
	      	if($row->types == "W") $row->types = "����";
	        else $row->types = "����";
	         
	        if($row->isuse == "N") $row->isuse = "������";
	        else $row->isuse = "�����";
	      ?>
        <tr align="center"> 
          <td height="30" align="center"><?=$row->title?></td>
          <td align="center"><?=$row->name?></td>
          <td align="center"><?=$ban_image?></td>
          <td align="center"><?=$row->types?></td>
          <td align="center"><?=$row->types_num?></td>
          <td align="center"><?=$row->isuse?></td>
          <td>
            <img src="../image/btn_banner.gif" style="cursor:hand" onClick="document.location='shop_banner.php?code=<?=$row->name?>'">
            <img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='shop_banner_input.php?mode=ban_group_update&idx=<?=$row->idx?>'">
          </td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
      	<?
      		$no--;
          $rows--;
        }
        
        if($total <= 0){
      	?>
        	<tr><td colspan='7' align='center' height='30'>�ۼ��� ��� �׷��� �����ϴ�.</td></tr>
        	<tr><td colspan="20" class="t_line"></td></tr>
      	<?
        }
      	?>
      </table>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td height="5"></td></tr>
      	<tr>
      		<td width="33%"></td>
      		<td width="33%"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
      		<td width="33%"></td>
      	</tr>
      </table>
      

<? include "../footer.php"; ?>