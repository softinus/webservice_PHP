<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="JavaScript" type="text/javascript">
<!--
function deleteLevel(idx,level){
	if(confirm('ȸ������� �����Ͻðڽ��ϱ�?\n\n������ ��޿� ���� ȸ���� �Ʒ� ������� �����˴ϴ�.')){
		document.location="level_save.php?mode=delete&idx=" + idx + "&level=" + level;
	}
}

//-->
</script>

	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">��ް���</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">ȸ������� �����մϴ�.</td>
	    </tr>
	  </table>
	  		
	  <br>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="tit_sub"><img src="../image/ics_tit.gif"> ��޸��</td>
        <td align="right">
       	<img src="../image/btn_addlevel.gif" style="cursor:hand" onClick="document.location='level_input.php?mode=insert';">
        </td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    	<tr><td class="t_rd" colspan="20"></td></tr>
      <tr class="t_th">
        <th width="5%">��ȣ</th>
        <th align="center">��޸�</th>
        <th width="20%">��޷���</th>
        <th width="20%">������ξ�(%)</th>
        <th width="10%">���</th>
      </tr>
      <tr><td class="t_rd" colspan="20"></td></tr>
			<?
		 	$sql = "select * from wiz_level order by level asc, idx asc";
		 	$result = mysql_query($sql) or error(mysql_error());
		 	$total = mysql_num_rows($result);
		 	$no = $total;
			while($row = mysql_fetch_object($result)){
		
				if($row->distype == "W") $row->distype = "��";
				else  $row->distype = "% ";
			?>
      <tr> 
        <td height="30" align="center"><?=$no?></td>
        <td align="center"><?=$row->name?></td>
        <td align="center"><?=$row->level?></td>
        <td align="center"><?=$row->discount?><?=$row->distype?></td>
        <td align="center">
        <?
        if($row->level != 0){
        ?>
          <img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='level_input.php?mode=update&idx=<?=$row->idx?>';">
          <img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="deleteLevel('<?=$row->idx?>','<?=$row->level?>');">
        <?
        }
        ?>
        </td>
      </tr>
      <tr><td colspan="20" class="t_line"></td></tr>
   	<? 
   		$no--;
    }

  	if($total <= 0){
  	?>
  		<tr><td height=30 colspan=10 align=center>ȸ������� �����ϴ�.</td></tr>
  		<tr><td colspan='20' class='t_line'></td></tr>
  	<?
  	}
    ?>
    </table>

<? include "../footer.php"; ?>