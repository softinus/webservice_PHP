<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

     <script language="JavaScript" type="text/javascript">
     <!--
     function deleteBbs(code){
       if(confirm('������ ������ �����Ͻðڽ��ϱ�?\n\n������ ����Ÿ�� �����Ҽ� �����ϴ�.')){
         document.location = 'sch_save.php?mode=delete&code=' + code + '&page=<?=$page?>';
       }
     }
     //-->
     </script>

	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">�������</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">������ ����/����/�����մϴ�.</td>
	    </tr>
	  </table>			
	  <br>	  
      

			<?
			$level_info = level_info();

			$sql = "select * from wiz_bbsinfo where type='SCH' order by code";
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
          <td>�� ������ : <b><?=$total?></b></td>
          <td align="right"><input type="submit" class="sbtn" value="�����߰�" onClick="document.location='sch_input.php?mode=insert';"></td>
        </tr>
        <tr><td height="3"></td></tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="7%" class="l_style" height="25" align="center">��ȣ</td>
          <td class="l_style" align="center">������</td>
          <td class="l_style" align="center">������</td>
          <td class="l_style" align="center">��Ϻ���</td>
          <td class="l_style" align="center">���뺸��</td>
          <td class="l_style" align="center">�۾���</td>
          <td class="l_style" align="center">��۾���</td>
          <td class="l_style" align="center">�ڸ�Ʈ����</td>
          <td width="10%" class="l_style" align="center">���</td>
        </tr>
		<?
			$sql = "select * from wiz_bbsinfo where type='SCH' order by code limit $start, $rows";
			$result = mysql_query($sql) or error(mysql_error());

		while($row = mysql_fetch_object($result)){
		?>
		  <tr>
          <td height="30" align="center"><?=$no?></td>
          <td align="center"><a href="sch_input.php?mode=update&code=<?=$row->code?>&page=<?=$page?>"><?=$row->code?></a></td>
          <td align="center"><a href="sch_input.php?mode=update&code=<?=$row->code?>&page=<?=$page?>"><?=$row->title?></a></td>
          <td align="center"><?=$level_info[$row->lpermi][name]?></td>
          <td align="center"><?=$level_info[$row->rpermi][name]?></td>
          <td align="center"><?=$level_info[$row->wpermi][name]?></td>
          <td align="center"><?=$level_info[$row->apermi][name]?></td>
          <td align="center"><?=$level_info[$row->cpermi][name]?></td>
          <td align="center">
          <input type="button" value="����" class="gbtn" onClick="document.location='sch_input.php?mode=update&code=<?=$row->code?>&page=<?=$page?>'">
          <input type="button" value="����" class="gbtn" onClick="deleteBbs('<?=$row->code?>');">
          </td>
        </tr>
        <tr><td height="1" colspan="10" bgcolor="EBEBEB"></td></tr>
     <?
     		$no--;
      }

    	if($total <= 0){
    	?>
    		<tr><td height="30" colspan="10" align="center">��ϵ� ������ �����ϴ�.</td></tr>
        <tr><td height="1" colspan="10" bgcolor="EBEBEB"></td></tr>
    	<?
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
          <td align="center"><? print_pagelist($page, $lists, $page_count, $param); ?></td>
        </tr>
      </table>


<? include "../footer.php"; ?>