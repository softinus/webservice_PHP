<? if(!strcmp($oper_info->prdrel_use, "Y")) { ?>
<table width=100% border=0 cellpadding=0 cellspacing=0>
  <tr>
    <td><img src="/images/bar_prdrel.gif"></td>
  </tr>
  <tr><td bgcolor="#999999" height="3"></td></tr>
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="100%" border="0">
<?
$no = 0;
$rel_sql = "select wr.idx,wp.prdcode,wp.prdname,wp.prdimg_R,wp.sellprice,wp.strprice from wiz_prdrelation wr, wiz_product wp where wr.prdcode = '$prdcode' and wr.relcode = wp.prdcode and wp.showset != 'N'";
$rel_result = mysql_query($rel_sql);
while($rel_row = mysql_fetch_object($rel_result)){
	if($no%5 == 0) echo "<tr>";
	
	if(!empty($rel_row->strprice)) $rel_row->sellprice = $rel_row->strprice;
	else $rel_row->sellprice = number_format($rel_row->sellprice)."¿ø";
?>
    <td width="20%" align="center">
      <table width="100">
        <tr><td><a href="/shop/prd_view.php?prdcode=<?=$rel_row->prdcode?>"><img src="/data/prdimg/<?=$rel_row->prdimg_R?>" width="100" border="0"></a></td></tr>
        <tr><td><a href="/shop/prd_view.php?prdcode=<?=$rel_row->prdcode?>"><?=cut_str($rel_row->prdname,20)?></a></td></tr>
        <tr><td align="center"><font class="price"><?=$rel_row->sellprice?></font></td></tr>
      </table>
    </td>
<?
	$no++;
}
?>
</table><br>
<? } ?>