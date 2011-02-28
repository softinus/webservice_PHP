<?

	$total = count($view_list);
	$v_idx = $total-1;
	$scroll_amount = 76;		// 한번에 스크롤되는 값
	if($total > 0) $div_height = 204;

	$prd_view = "
	<script>
	function gdscroll(gap){
	 var gdscroll = document.getElementById('gdscroll');
	 gdscroll.scrollTop += gap;
	}
	</script>

	<table border=0 cellspacing=0 cellpadding=0>
	<tr>
	  <td colspan=3><img src=/images/newimg/main/img_quck_top.gif width=88 height=22></td>
	</tr>
	<tr>
		<td width=1 bgcolor=e3e3e3></td>
	  <td height=22 align=center class=font_12_1>(".$total."개)</td>
	  <td width=1 bgcolor=e3e3e3></td>
	</tr>
	<tr>
		<td width=1 bgcolor=e3e3e3></td>
	  <td>

	  <table width=86 border=0 cellspacing=0 cellpadding=0>
	    <tr>
	      <td height=12 align=center valign=bottom><a href='javascript:gdscroll(-".$scroll_amount.")'><img src=/images/newimg/main/brn_alw_top.gif width=27 height=9 border=0></a></td>
	    </tr>
	    <tr><td height=4></td></tr>
	    <tr>
	      <td align=center valign=bottom>
	      <div id=gdscroll style='height:".$div_height."px;overflow:hidden'>
	";

	while(0 <= $v_idx){
		
		// 상품 이미지
		if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$view_list[$v_idx][prdimg])) $view_prdimg = "/images/noimg_R.gif";
		else $view_prdimg = "/data/prdimg/".$view_list[$v_idx][prdimg];
		
		$prd_view .= "<div><table><tr><td><a href=/shop/prd_view.php?prdcode=".$view_list[$v_idx][prdcode]."><img height=50 width=50 src=".$view_prdimg." border=0></a></td></tr></table></div>";
		$v_idx--;
	}

	if($total <= 0) $prd_view .= "<tr><td height='71' align='center'></td></tr>";

	$prd_view .= "
	      </div>
				</td>
	    </tr>
	    <tr>
	      <td height=14 align=center valign=bottom><a href='javascript:gdscroll(".$scroll_amount.")'><img src=/images/newimg/main/brn_alw_down.gif width=27 height=9 border=0></a></td>
	    </tr>
	    <tr>
	      <td height=24 align=center valign=bottom><a href=/member/my_wish.php><img src=/images/newimg/main/btn_q_1.gif width=78 height=17 border=0></a></td>
	    </tr>
	    <tr>
	      <td height=21 align=center valign=bottom><a href=/shop/prd_basket.php><img src=/images/newimg/main/btn_q_2.gif width=78 height=17 border=0></a></td>
	    </tr>
	  </table></td>
		<td width=1 bgcolor=e3e3e3></td>
	</tr>
	<tr>
	  <td colspan=3><img src=/images/newimg/main/img_quck_down.gif width=88 height=5></td>
	</tr>
	</table>
	";

?>