<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$sql = "select title from wiz_bannerinfo where name='$code'";
$result = mysql_query($sql) or error(mysql_error());
$banner_info = mysql_fetch_object($result);
?>
<script language="JavaScript" type="text/javascript">
<!--
function delContent(idx, ban_img){
   if(confirm('�ش��ʸ� �����Ͻðڽ��ϱ�?')){
      document.location = "shop_save.php?mode=ban_delete&code=<?=$code?>&idx=" + idx + "&ban_img=" + ban_img;
   }
}
//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">��ʰ���</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">��ʸ� ����,����,���� �մϴ�.</td>
        </tr>
      </table>
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> <?=$banner_info->title?></td>
			    <td align="right"><img src="../image/btn_banneradd.gif" style="cursor:hand" onClick="document.location='shop_banner_input.php?code=<?=$code?>'"></td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td class="t_rd" colspan=20></td></tr>
        <tr class="t_th">
          <th width="10%">�ڵ��</th>
          <th>�̹���</th>
          <th>��ũ�ּ�</th>
          <th>�켱����</th>
          <th>��뿩��</th>
          <th width="10%">���</th>
        </tr>
        <tr><td class="t_rd" colspan=20></td></tr>
	      <?
	      $sql = "select idx from wiz_banner where name='$code' order by align desc, prior asc, idx asc";
	      $result = mysql_query($sql) or error(mysql_error());
	      $total = mysql_num_rows($result);
	
	      $rows = 12;
	      $lists = 5;
	    	$page_count = ceil($total/$rows);
	    	if($page < 1 || $page > $page_count) $page = 1;
	    	$start = ($page-1)*$rows;
	    	$no = $total-$start;
	    	
	      $sql = "select * from wiz_banner where name='$code' order by align desc, prior asc, idx asc limit $start, $rows";
	      $result = mysql_query($sql) or error(mysql_error());
	      
	      while(($row = mysql_fetch_object($result)) && $rows){
	         
	         if($row->isuse == "N") $row->isuse = "������";
	         else $row->isuse = "�����";
	         
	      ?>
        <tr align="center"> 
          <td height="30" align="center"><?=$row->name?></td>
          <td>
          <?
          if($row->de_type == "IMG") echo "<img src=/data/banner/$row->de_img>";
          else echo "<table><tr><td>$row->de_html</td></tr></table>";
          ?>
          </td>
          <td><?=$row->link_url?></td>
          <td><?=$row->prior?></td>
          <td><?=$row->isuse?></td>
          <td>
            <img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='shop_banner_input.php?mode=ban_update&code=<?=$code?>&idx=<?=$row->idx?>'">
            <img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="delContent('<?=$row->idx?>','<?=$row->de_img?>');">
          </td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
      	<?
      		$no--;
          $rows--;
        }
        
        if($total <= 0){
        ?>
        	<tr><td colspan='7' align='center' height='30'>�ۼ��� ��ʰ� �����ϴ�.</td></tr>
        	<tr><td colspan="20" class="t_line"></td></tr>
				<?
        }
      	?>
      </table>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td height="5"></td></tr>
      	<tr>
      		<td width="33%"></td>
      		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&code=$code"); ?></td>
      		<td width="33%"></td>
      	</tr>
      </table>


<? include "../footer.php"; ?>