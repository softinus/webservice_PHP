<?
/*
$list_btn					: 목록 버튼
$write_btn				: 쓰기 버튼
*/
?>

  <tr>
    <td height="5" colspan="9"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td><img src="<?=$skin_dir?>/image/bar_bottom_bg_l.gif"></td>
    <td width="25%" height="35" background="<?=$skin_dir?>/image/bar_bottom_bg.gif"><?=$list_btn?>&nbsp;<?=$write_btn?></td>
    <td width="50%" align="center" background="<?=$skin_dir?>/image/bar_bottom_bg.gif"><? print_pagelist($page, $lists, $page_count, $param); ?></td>
    <td width="25%" align="right" background="<?=$skin_dir?>/image/bar_bottom_bg.gif">
    
      <table border="0" cellpadding="2" cellspacing="0">
      <form name="sfrm" action="<?=$PHP_SELF?>">
      <input type="hidden" name="code" value="<?=$code?>">
      <input type="hidden" name="category" value="<?=$category?>">
        <tr>
          <td align="center">
          <select name="searchopt">
		      <option value="subject">제 목</option>
		      <option value="name">작성자</option>
		      <option value="memid">아이디</option>
		      <option value="content">내 용</option>
		      </select>	
		      <script language="javascript">
          <!--
            searchopt = document.sfrm.searchopt;
            for(ii=0; ii<searchopt.length; ii++){
               if(searchopt.options[ii].value == "<?=$searchopt?>")
                  searchopt.options[ii].selected = true;
            }
          -->
          </script>
          </td>
          <td align="center"><input name="searchkey" value="<?=$searchkey?>" type="text" size="10" class="input"></td>
          <td align="center"><input type="image" src="<?=$skin_dir?>/image/btn_search.gif" border="0" align="absmiddle" /></td>
        </tr>
      </form>
      </table>
    
    </td>
    <td><img src="<?=$skin_dir?>/image/bar_bottom_bg_r.gif"></td>
  </tr>
</table>