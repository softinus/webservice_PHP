<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$level_info = level_info();
?>

<script language="JavaScript" type="text/javascript">
<!--
function deleteBbs(code){
   if(confirm('������ �Խ����� �����Ͻðڽ��ϱ�?\n\n������ ����Ÿ�� �����Ҽ� �����ϴ�.')){
      document.location = 'bbs_pro_save.php?mode=delete&code=' + code;
   }
}
//-->
</script>

	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">�Խ��Ǹ��</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">�Խ����� ����/����/�����մϴ�.</td>
	    </tr>
	  </table>			
	  <br>	  
      
			<?
			$sql = "select code from wiz_bbsinfo where type!='SCH'";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			
			$rows = 20;
			$lists = 5;
			$page_count = ceil($total/$rows);
			if(!$page || $page > $page_count) $page = 1;
			$start = ($page-1)*$rows;
			$no = $total-$start;
			?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>�� �Խ��Ǽ� : <b><?=$total?></b></td>
          <td align="right">
          	<? if(strpos($wiz_admin[permi], "08-03") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
          	<? 	if(!strcmp($shop_info->addbbs_use, "Y")) { ?>
          	<img src="../image/btn_bbsadd.gif" style="cursor:hand" onClick="document.location='bbs_pro_input.php?mode=insert';">
          	<? } ?>
          	<? } ?>
          </td>
        </tr>
      </table> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="8%">��ȣ</th>
          <th width="10%">������</th>
          <th>�Խ��Ǹ�</th>
          <th width="8%">���</th>
          <th width="8%">�Խ���Ÿ��</th>
          <th width="8%">��Ϻ���</th>
          <th width="8%">�б�</th>
          <th width="8%">����</th>
          <th width="20%">���</th>
        </tr>
        <tr><td class="t_rd" colspan="20"></td></tr>
        
				<?
				$sql = "select * from wiz_bbsinfo where type!='SCH' limit $start, $rows";
				$result = mysql_query($sql) or error(mysql_error());
				
				while(($row = mysql_fetch_object($result)) && $rows){
					
					switch($row->type) {
						case "BBS" : $bbstype = "�Խ���"; break;
						case "PRD" : $bbstype = "��ǰQ&A"; break;
						case "RV" : $bbstype = "��ǰ�ı�"; break;
					}
					
					if(!strcmp($row->skin, "photoBasic")) $bbstype = "����Խ���";
					else $bbstype = "�Խ���";
				?>
			  <tr> 
          <td height="30" align="center"><?=$no?></td>
          <td align="center"><?=$row->code?></td>
          <td align="center"><?=$row->title?></td>
          <td align="center"><? if($row->usetype == "Y") echo "�����"; else echo "������"; ?></td>
          <td align="center"><?=$bbstype?></td>
          <td align="center"><?=$level_info[$row->lpermi][name]?></td>
          <td align="center"><?=$level_info[$row->rpermi][name]?></td>
          <td align="center"><?=$level_info[$row->wpermi][name]?></td>
          <td align="center">
          <img src="../image/btn_bbsman.gif" style="cursor:hand" onClick="document.location='bbs_list.php?code=<?=$row->code?>'">
          <img src="../image/btn_edit_s.gif" style="cursor:hand" onClick="document.location='bbs_pro_input.php?mode=update&code=<?=$row->code?>'">
          <img src="../image/btn_delete_s.gif" style="cursor:hand" onClick="deleteBbs('<?=$row->code?>');">
          </td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
	     <?
	     		$no--;
	        $rows--;
	      }

	    	if($total <= 0){
	    		echo "<tr><td height=30 colspan=10 align=center>��ϵ� �Խ����� �����ϴ�.</td></tr>";
	    		echo "<tr><td colspan='20' class='t_line'></td></tr>";
	    	}
	      ?>
      </table>
      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td></td>
        </tr>
      </table>
      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="33%"></td>
          <td width="33%"><? print_pagelist($page, $lists, $page_count, $param); ?></td>
          <td width="33%"></td>
        </tr>
      </table>

   

<? include "../footer.php"; ?>