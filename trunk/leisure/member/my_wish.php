<?

include "../inc/oneday_header.inc"; 			// ��ܵ�����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; ȸ������";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/mem_info.inc"; 		// ȸ�� ����

$page_type = "join";
include "../inc/page_info.inc"; 		// ������ ����

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

// üũ�ڽ� ��ü����
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

// üũ�ڽ� ��������
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

// üũ�ڽ����� ����
function selectReverse(form){
	
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectCancel();
	}
}

// üũ�ڽ� ���ø���Ʈ
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

//���û�ǰ ����
function delPrd(){

	selprd = selectValue();
	
	if(selprd == ""){
		alert("������ ��ǰ�� �����ϼ���.");
		return false;
	}else{
		if(confirm("���� �����Ͻðڽ��ϱ�?")){
			document.location = "my_save.php?mode=my_wishdel&selprd=" + selprd;
		}
	}
}

//���û�ǰ ��ٱ��ϴ��
function basketPrd() {
	
	selprd = selectValue();
	
	if(selprd == ""){
		alert("��ٱ��Ͽ� ���� ���ɻ�ǰ�� �����ϼ���.");
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
	
	<!--���ɻ�ǰ����Ʈ-->
	<?
	// ���ļ���
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
							<td>���� ���ɻ�ǰ�� <font color=red><?=$total?>��</font> �Դϴ�.</td>
							<td align=right style="padding:0 10 0 0">
							<select name="orderby" onChange="this.form.submit();">
							<option value="">��ǰ���Ĺ��</option>
							<option value="viewcnt desc" <? if($orderby == "viewcnt desc") echo "selected"; ?>>��ȸ�� ��</option>
							<option value="wp.prdcode desc" <? if($orderby == "wp.prdcode desc") echo "selected"; ?>>�ֱٵ�ϼ� ��</option>
							<option value="sellprice asc" <? if($orderby == "sellprice asc") echo "selected"; ?>>�������� ��</option>
							<option value="sellprice desc" <? if($orderby == "sellprice desc") echo "selected"; ?>>�ְ��� ��</option>
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
							if($row->sale == "Y"){ $sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;"; $sellprice = "<s>".number_format($row->conprice)." ��</s> �� "; }
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
							else $row->sellprice = number_format($row->sellprice)."��";
								
							// ��ǰ �̹���
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
						<tr><td align=center colspan='10' height="50"><img src="/images/no_icon.gif" align=absmiddle> ���ɻ�ǰ ����Ʈ�� ����ֽ��ϴ�.</td></tr>
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

include "../inc/oneday_footer.inc"; 		// �ϴܵ�����

?>