<script language="javascript">
<!--
function viewImg(img){
   var url = "/admin/bbs/view_img.php?code=<?=$code?>&img=" + img;
   window.open(url, "viewImg", "height=100, width=100, menubar=no, scrollbars=no, resizable=yes, toolbar=no, status=no");
}
//-->
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="layout:fixed;">
  <tr>
  	<td colspan="10">
  		
  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td height="28" width="67"><img src="<?=$skin_dir?>/image/view_t_title.gif"></td>
    <td background="<?=$skin_dir?>/image/bar_bg1.gif" style="word-break:break-all;">&nbsp; <b><?=$catname?><?=$subject?></b></td>
    <td width="9"><img src="<?=$skin_dir?>/image/view_t_title_bg.gif"></td>
    </tr>
    </table>
      
    </td>
  </tr>
  <tr>
    <td width="8%" height="28">&nbsp;<img src="<?=$skin_dir?>/image/view_t_name.gif"></td>
    <td align="left">: <?=$name?> &nbsp;<?=$email?></td>
    <td width="8%"><img src="<?=$skin_dir?>/image/view_t_date.gif"></td>
    <td width="15%" align="left">: <?=$wdate?></td>
    <td width="8%"><img src="<?=$skin_dir?>/image/view_t_click.gif"></td>
    <td width="6%">: <?=$count?></td>
  </tr>
  
  <?=$hide_upfile_start?>
  <tr>
    <td height="1" colspan="20" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td width="8%" height="28">&nbsp;<img src="<?=$skin_dir?>/image/view_t_file2.gif"></td>
    <td align="left" colspan="5" >: <?=$upfile1?> <?=$upfile2?> <?=$upfile3?></td>
  </tr>
  <?=$hide_upfile_end?>
  <tr>
    <td height="1" colspan="20" bgcolor="dddddd"></td>
  </tr>
  
  <tr>
    <td colspan="20" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td height="200" valign="top" align="left" style="word-break:break-all;">
        <?=$upimg1?><?=$upimg2?><?=$upimg3?>
      	<?=$movie1?><?=$movie2?><?=$movie3?>
      	<?=$content?>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5" colspan="20"></td>
  </tr>
</table>