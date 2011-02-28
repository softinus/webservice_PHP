<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
$param = "group=$group&searchopt=$searchopt&keyword=$keyword&dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
?>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">상품통계분석</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">상품의 상세 통계분석</td>
	</tr>
</table>

<br>

<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
<form name="frm" action="<?=$PHP_SELF?>" method="get">
	<tr>
		<td class="t_name">상품분류</td>
		<td class="t_value" colspan="3">
			<input type="radio" name="catcode" value="all" <?if($catcode == "all" || $catcode == ""){?>checked<?}?>/> 전체
		
<?
$sql = "select * from wiz_daycategory  where depthno='1' order by priorno01 asc, priorno02 asc, priorno03 asc";
$result = mysql_query($sql)or die($sql);
while($row = mysql_fetch_array($result)){
?>
			<input type="radio" name="catcode" value="<?=$row["catcode"]?>" <?if($catcode == $row["catcode"]){?>checked<?}?>/> <?=$row["catname"]?>
<?
}
?>	
		</td>
	</tr>
	<tr>
		<td width="15%" class="t_name">공급업체</td>
		<td width="25%" class="t_value">
			<select name="company" class="select2">
				<option value="">::: 공급업체 :::</option>
			<?
			$csql = "select * from wiz_company order by wdate desc";
			$cresult = mysql_query($csql)or die($csql);
	
			while($rs = mysql_fetch_array($cresult)){
			?>
				<option <?if($company==$rs[idx]){?>selected<?}?> value="<?=$rs[idx]?>"><?=$rs[company]?></option>
			<?
			}	
			?>
			</select>
		</td>
		<td width="15%" class="t_name">조건</td>
		<td width="45%" class="t_value">
			<select name="searchopt">
				<option value="">:: 조건선택 ::</option>
				<option value="prdname" <? if($searchopt == "wp.prdname") echo "selected"; ?>>상품명</option>
				<option value="prdcode" <? if($searchopt == "wp.prdcode") echo "selected"; ?>>상품코드</option>
			</select>
			<input type="text" name="keyword" value="<?=$keyword?>" class="input">
			<input type="image" src="../image/btn_search.gif" align="absmiddle">
		</td>
	</tr>
</form>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="10"></td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="t_rd" colspan="20"></td>
	</tr>
	<tr class="t_th">
		<th width="50">No</th>
		<th></th>
		<th width="210">상품명</th>
<?
$view_orderby = "desc";
$deimg_orderby = "desc";
$basket_orderby = "desc";
$order_orderby = "desc";
$cancel_orderby = "desc";
$com_orderby = "desc";

if($orderkey == "viewcnt"){
	if($orderby == "asc" || $orderby == "") $view_orderby = "desc";
	else $view_orderby = "asc";
}else if($orderkey == "deimgcnt"){
	if($orderby == "asc" || $orderby == "") $deimg_orderby = "desc";
	else $deimg_orderby = "asc";
}else if($orderkey == "basketcnt"){
	if($orderby == "asc" || $orderby == "") $basket_orderby = "desc";
	else $basket_orderby = "asc";
}else if($orderkey == "ordercnt"){
	if($orderby == "asc" || $orderby == "") $order_orderby = "desc";
	else $order_orderby = "asc";
}else if($orderkey == "cancelcnt"){
	if($orderby == "asc" || $orderby == "") $cancel_orderby = "desc";
	else $cancel_orderby = "asc";
}else if($orderkey == "comcnt"){
	if($orderby == "asc" || $orderby == "") $com_orderby = "desc";
	else $com_orderby = "asc";
}
?>
		<!--
		<th width="70"><a href="<?=$PHP_SELF?>?orderkey=viewcnt&orderby=<?=$view_orderby?>&<?=$param?>"><font color="#ffffff"><? if($view_orderby == "desc") echo "▲"; else echo "▼"; ?>상세보기</font></a></th>
		<th width="90"><a href="<?=$PHP_SELF?>?orderkey=deimgcnt&orderby=<?=$deimg_orderby?>&<?=$param?>"><font color="#ffffff"><? if($deimg_orderby == "desc") echo "▲"; else echo "▼"; ?>상세이미지</font></a></th>
		<th width="70"><a href="<?=$PHP_SELF?>?orderkey=basketcnt&orderby=<?=$basket_orderby?>&<?=$param?>"><font color="#ffffff"><? if($basket_orderby == "desc") echo "▲"; else echo "▼"; ?>장바구니</font></a></th>
		-->
		<th width="70"><a href="<?=$PHP_SELF?>?orderkey=ordercnt&orderby=<?=$order_orderby?>&<?=$param?>"><font color="#ffffff"><? if($order_orderby == "desc") echo "▲"; else echo "▼"; ?>주문수</font></a></th>
		<th width="70"><a href="<?=$PHP_SELF?>?orderkey=cancelcnt&orderby=<?=$cancel_orderby?>&<?=$param?>"><font color="#ffffff"><? if($cancel_orderby == "desc") echo "▲"; else echo "▼"; ?>주문취소</font></a></th>
		<th width="70"><a href="<?=$PHP_SELF?>?orderkey=comcnt&orderby=<?=$com_orderby?>&<?=$param?>"><font color="#ffffff"><? if($com_orderby == "desc") echo "▲"; else echo "▼"; ?>배송완료</font></a></th>	
	</tr>
	<tr>
		<td class="t_rd" colspan="20"></td>
	</tr>
<?

// 상품그룹
if(!empty($group)) $group_sql = " and wp.$group = 'Y' ";

// 조건검색
if(!empty($searchopt)) $searchopt_sql = " and wp.$searchopt like '%$keyword%' ";

// 상품분류
if(!empty($catcode) && $catcode != "all") $searchopt_sql .= " and wc.catcode like '$catcode%' ";

// 공급업체
if(!empty($catcode) && $catcode != "all") $searchopt_sql .= " and wp.company_idx like '$company%' ";


// 정렬순서
if(!empty($orderkey) && !empty($orderby)) $order_sql = " order by $orderkey $orderby, wp.prior desc";
else $order_sql = " order by wp.prior desc";

$sql = "select distinct(wp.prdcode) from wiz_dayproduct wp inner join wiz_daycprelation as wc on wp.prdcode = wc.prdcode where wp.prdcode != '' $group_sql $searchopt_sql $order_sql";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

$rows = 12;
$lists = 5;
if(!$page) $page = 1;
$page_count = ceil($total/$rows);
$start = ($page-1)*$rows;
$no = $total-$start;

$sql = "select distinct(wp.prdcode), wp.prdname, wp.prdimg_R, wp.viewcnt, wp.deimgcnt, wp.basketcnt, wp.ordercnt, wp.cancelcnt, wp.comcnt 
from wiz_dayproduct wp inner join wiz_daycprelation as wc on wp.prdcode = wc.prdcode
where wp.prdcode != '' $group_sql $searchopt_sql $order_sql limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result)) && $rows){
	if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
	else $row->prdimg_R = "/data/prdimg/$row->prdimg_R";

	$isql = "select * from wiz_dayorder wo, wiz_dayproduct wp, wiz_basket wb where wb.orderid=wo.orderid and wb.prdcode = wo.prdcode and wp.prdcode = '$row->prdcode' group by wo.orderid";
	$istm = mysql_query($isql)or die($isql);
	$ordercnt = mysql_num_rows($istm);

?>
	<tr>
		<td align="center" height="28"><?=$no?></td>
		<td>&nbsp; <a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="_blank"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0" align="absmiddle"></a></td>
		<td><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="_blank"><?=$row->prdname?></a></td>
		<!--
		<td align="center"><?=$row->viewcnt?></td>
		<td align="center"><?=$row->deimgcnt?></td>
		<td align="center"><?=$row->basketcnt?></td>
		-->
		<td align="center"><?=$ordercnt?></td>
		<td align="center"><?=$row->cancelcnt?></td>
		<td align="center"><?=$row->comcnt?></td>
	</tr>
	<tr>
		<td colspan="20" class="t_line"></td>
	</tr>
<?
$no--;
$rows--;
}
?>
</table>

<br>

<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="33%"></td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&orderkey=$orderkey&orderby=$orderby&$param"); ?></td>
		<td width="33%" align="right"></td>
	</tr>
</table>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="9d9d9d">
	<tr>
		<td width="5" height="5"><img src="../image/check_left_top.gif"></td>
		<td width="100%"></td>
		<td width="5" height="5"><img src="../image/check_right_top.gif"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="6">
				<tr>
					<td><img src="../image/check_tit.gif" width="75" height="19" /></td>
				</tr>
				<tr>
					<td class="chk_alt">
						<b><font color="#000000">통계 참고사항</font></b><br>
						- 주문수는 주문접수,결제완료,배송완료,취소등의 모든 접수상태의 총 주문수 입니다.<br />
						- 배송완료는 배송,발급이 완료된 주문의 수 입니다.<br />
						- 주문취소는 정상적으로 취소완료된 주문의 수 입니다.<br />
					</td>
				</tr>
			</table>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
		<td></td>
		<td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
	</tr>
</table>


<? include "../footer.php"; ?>