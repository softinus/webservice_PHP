<?

include "../inc/oneday_header.inc"; 			// 상단디자인

$page_type = "myshop";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/mem_info.inc"; 		// 회원 정보

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; 마이쇼핑 &gt; 나의관심상품";

include "../inc/page_info.inc"; 		// 페이지 정보
//include "../inc/now_position.inc";	// 현재위치

?>
<script language="javascript">
<!--
function saveBasket(idx){
   var frm = eval("document.wishList_" + idx);
   frm.submit();
}

function delWish(idx){
   document.location = "my_save.php?mode=my_wishdel&idx=" + idx;
}

// 체크박스 전체선택
function selectAll(){
	var i;
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = true;
			}
		}
	}
	return;
}

// 체크박스 선택해제
function selectCancel(){
	var i;
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].idx != null){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

// 체크박스선택 반전
function selectReverse(form){
	
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectCancel();
	}
}

// 체크박스 선택리스트
function selectValue(){
	var i;
	var selprd = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selprd = selprd + document.forms[i].idx.value + "|";
				}
			}
	}
	return selprd;
}

//선택상품 삭제
function delPrd(){

	selprd = selectValue();
	
	if(selprd == ""){
		alert("삭제할 상품을 선택하세요.");
		return false;
	}else{
		if(confirm("정말 삭제하시겠습니까?")){
			document.location = "my_save.php?mode=my_wishdel&selprd=" + selprd;
		}
	}
}

//선택상품 장바구니담기
function basketPrd() {
	
	selprd = selectValue();
	
	if(selprd == ""){
		alert("장바구니에 담을 관심상품을 선택하세요.");
		return false;
	}else{
		document.location = "/shop/prd_save.php?mode=insert&direct=basket&selprd=" + selprd;
	}
}

-->
</script>

<table border=0 cellpadding=0 cellspacing=0 width="1012" align=center>
  <tr>
  	<td align=center>

    <? include "my_menu.php"; ?>

		</td>
	</tr>
	
	<!--관심상품리스트-->
	<?
	// 정렬순서
	if(empty($orderby)) $order_sql = "order by ww.wdate desc";
	else $order_sql = "order by $orderby";
	
	$sql = "select ww.idx from wiz_wishlist ww, wiz_product wp where ww.memid = '$wiz_session[id]' and ww.prdcode = wp.prdcode";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);
	
	$no = 0;
	$rows = 10;
	$lists = 5;
	$page_count = ceil($total/$rows);
	if(!$page || $page > $page_count) $page = 1;
	$start = ($page-1)*$rows;
	
	?>
	<tr><td height="15"></td></tr>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width="100%">
			<form action="<?=$PHP_SELF?>" method="get">
			<tr><td colspan=7><img src="/images/myshop_m01_02.gif"></td></tr>
			<tr><td colspan=7 bgcolor=#939393 height=3></td></tr>
			<tr>
				<td background="/images/shop_nomal_bar.gif" height=33>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
						<tr>
							<td>ㆍ총 관심상품은 <font color=red><?=$total?>개</font> 입니다.</td>
							<td align=right style="padding:0 10 0 0">
							<select name="orderby" onChange="this.form.submit();">
							<option value="">상품정렬방식</option>
							<option value="viewcnt desc" <? if($orderby == "viewcnt desc") echo "selected"; ?>>조회수 순</option>
							<option value="wp.prdcode desc" <? if($orderby == "wp.prdcode desc") echo "selected"; ?>>최근등록순 순</option>
							<option value="sellprice asc" <? if($orderby == "sellprice asc") echo "selected"; ?>>최저가격 순</option>
							<option value="sellprice desc" <? if($orderby == "sellprice desc") echo "selected"; ?>>최고가격 순</option>
							</select>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td colspan=7 bgcolor="#f7f7f7" height=3></td></tr>
			</form>
			<tr>
				<td colspan=7>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
						<?
						$sql = "select ww.*, wp.prdcode, wp.prdname, wp.sellprice, wp.strprice, wp.prdimg_R, wp.popular, wp.recom, wp.new, wp.sale, wp.shortage, wp.stock, wp.conprice from wiz_wishlist ww, wiz_product wp where ww.memid = '$wiz_session[id]' and ww.prdcode = wp.prdcode $order_sql limit $start, $rows";
						$result = mysql_query($sql) or error(mysql_error());
						
						while(($row = mysql_fetch_object($result)) && $rows){
							$sp_img = "";
							$optcode = "";
							
							if($row->popular == "Y") $sp_img .= "<img src='/images/icon_hit.gif'>&nbsp;";
							if($row->recom == "Y") $sp_img .= "<img src='/images/icon_rec.gif'>&nbsp;";
							if($row->new == "Y") $sp_img .= "<img src='/images/icon_new.gif'>&nbsp;";
							if($row->sale == "Y"){ $sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;"; $sellprice = "<s>".number_format($row->conprice)." 원</s> → "; }
							if($row->shortage == "Y" || ($row->shortage == "S" && $row->stock <= 0)) $sp_img .= "<img src='/images/icon_not.gif'>&nbsp;";
							
							$optlist = explode("^",$row->optcode);
							$row->optcode = $optlist[0];
							
							$optlist = explode("^",$row->optcode3);
							$row->optcode3 = $optlist[0];
							
							$optlist = explode("^",$row->optcode4);
							$row->optcode4 = $optlist[0];
							
							if($row->opttitle5 != '') $optcode .= $row->opttitle5." : ".$row->optcode5.", ";
							if($row->opttitle6 != '') $optcode .= $row->opttitle6." : ".$row->optcode6.", ";
							if($row->opttitle7 != '') $optcode .= $row->opttitle7." : ".$row->optcode7.", ";
							
							if($row->opttitle3 != '') $optcode .= $row->opttitle3." : ".$row->optcode3.", ";
							if($row->opttitle4 != '') $optcode .= $row->opttitle4." : ".$row->optcode4.", ";
							
	    				if($row->opttitle != '') $optcode .= $row->opttitle;
	    				if($row->opttitle != '' && $row->opttitle2 != '') $optcode .= "/";
	    				if($row->opttitle2 != '') $optcode .= $row->opttitle2;
	    				if($row->opttitle != '' || $row->opttitle2 != '') $optcode .= " : ".$row->optcode.", ";

							if(!empty($row->strprice)) $row->sellprice = $row->strprice;
							else $row->sellprice = number_format($row->sellprice)."원";
								
							// 상품 이미지
							if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$row->prdimg_R)) $row->prdimg_R = "/images/noimg_R.gif";
							else $row->prdimg_R = "/data/prdimg/".$row->prdimg_R;
						?>
						<tr>
						<form name="wishList_<?=$row->idx?>" action="/shop/prd_save.php" method="post">
						<input type="hidden" name="mode" value="insert">
						<input type="hidden" name="direct" value="basket">
						<input type="hidden" name="idx" value="<?=$row->idx?>">
							<td align="center" width="30"><input type="checkbox" name="select_checkbox"></td>
							<td align="center" style="padding:3px"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&page=<?=$page?>" target="_blank"><img src="<?=$row->prdimg_R?>" border="0" width="50"></a></td>
							<td><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&page=<?=$page?>" target="_blank"><?=$row->prdname?></a> <?=$sp_img?> <br><?=$optcode?></td>
							<td align="right" class="price"><?=$row->sellprice?></td>
						</form>
						</tr>
						<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
						<?
							$no++;
							$rows--;
						}
						
						if($total <= 0){
						?>
						<tr><td align=center colspan='10' height="50"><img src="/images/no_icon.gif" align=absmiddle> 관심상품 리스트가 비어있습니다.</td></tr>
						<tr><td colspan=10 bgcolor=#dddddd height=1></td></tr>
						<?
						}
						?>
         </table>
       </td>
     	</tr>
     	<tr><td colspan=7 bgcolor=#f7f7f7 height=3></td></tr>
     	</table>
   	</td>
	</tr>
	<tr>
		<td align=center height=50>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="25%">
						<span onClick="delPrd()" style="cursor:pointer"><img src="/images/btn_seldel.gif"></span>
						<span onClick="basketPrd()" style="cursor:pointer"><img src="/images/btn_selbasket.gif"></span>
					</td>
					<td width="50%" align="center">
						<? print_pagelist($page, $lists, $page_count, "orderby=$orderby"); ?>
					</td>
					<td width="25%">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<?

include "../inc/oneday_footer.inc"; 		// 하단디자인

?>