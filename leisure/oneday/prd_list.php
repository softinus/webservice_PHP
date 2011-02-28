<?
include "../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		   		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/cat_info.inc"; 			// ī�װ�����
include "../inc/brd_info.inc"; 			// �귣������

// �̵����� ����(��õ��ǰ ��ǰ�̹��� ����Ʈ����)
if($cat_info->prd_width == "") 	$cat_info->prd_width = "130";
if($cat_info->prd_height == "") $cat_info->prd_height = "130";
if($cat_info->prd_num == "" || $cat_info->prd_num <= 0) $cat_info->prd_num = 16;

include "../inc/header.inc"; 				// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

?>

<table width=98% border=0 cellpadding=0 cellspacing=0 align=center>
	<tr>
		<td align="center">

			<? include "./prd_category.inc";				// ī�װ� ?>

			<? include "./prd_recom.inc";					// ��õ��ǰ ?>

			<?php
			// ���ļ���
			if($orderby == "") $order_sql = "order by wp.prior desc, prdcode desc";
			else $order_sql = "order by $orderby";

			// ī�װ��� ã��
			if(!empty($catcode)){
				$catcode01 = substr($catcode,0,2);
				$catcode02 = substr($catcode,2,2);
				$catcode03 = substr($catcode,4,2);
				if($catcode01 == "00") $catcode01 = "";
				if($catcode02 == "00") $catcode02 = "";
				if($catcode03 == "00") $catcode03 = "";
				$tmpcode = $catcode01.$catcode02.$catcode03;
				$catcode_sql = " wc.catcode like '$tmpcode%' and ";
			}

			// ��ǰ�׷캰 ã�� (�Ż�ǰ,��õ��ǰ,���ϻ�ǰ,�α��ǰ)
			if($grp != "") $grp_sql = " wp.$grp = 'Y' and ";

			// �귣�庰 ã��
			if($brand != "") $brand_sql = " wp.brand = '$brand' and ";

			$sql = "select wp.prdcode from wiz_cprelation wc, wiz_product wp, wiz_category wy where $catcode_sql $grp_sql $brand_sql wy.catuse != 'N' and wc.catcode = wy.catcode and wc.prdcode = wp.prdcode and wp.showset != 'N' $order_sql";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			?>

			<table width=100% border=0 cellpadding=0 cellspacing=0>
				<tr><td><img src="/images/prdlist_list_title.gif"></td></tr>
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<form action="<?=$PHP_SELF?>" method="get">
						<input type="hidden" name="catcode" value="<?=$catcode?>">
						<input type="hidden" name="grp" value="<?=$grp?>">
						<input type="hidden" name="brand" value="<?=$brand?>">
				      <tr>
				        <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="4">
				          <tr>
				            <td class="11gray_01" background="/images/form_bar_bg1.gif" height="39">�� <span class="11red_01"><strong><?=$total?></strong></span>�� �� ��ǰ�� ��� �Ǿ����ϴ�.</td>
				            <td align="right" background="/images/form_bar_bg1.gif">
											<select name="orderby" onChange="this.form.submit();">
											<option value="">��ǰ���Ĺ��</option>
											<option value="viewcnt desc" <? if($orderby == "viewcnt desc") echo "selected"; ?>>��ȸ�� ��</option>
											<option value="prdcode desc" <? if($orderby == "prdcode desc") echo "selected"; ?>>�ֱٵ�ϼ� ��</option>
											<option value="sellprice asc" <? if($orderby == "sellprice asc") echo "selected"; ?>>�������� ��</option>
											<option value="sellprice desc" <? if($orderby == "sellprice desc") echo "selected"; ?>>�ְ��� ��</option>
											</select>
										</td>
				          </tr>
				        </table></td>
				      </tr>
				    </form>
				    </table>
					</td>
				</tr>
			</table>

	  	<table width=100% border=0 cellpadding=0 cellspacing=0>
			<?

			$no = 0;
			$rows = $cat_info->prd_num;
			$lists = 5;
			$page_count = ceil($total/$rows);
			if(!$page || $page > $page_count) $page = 1;
			$start = ($page-1)*$rows;


			$sql = "select distinct wp.prdcode, wp.prdname, wp.stortexp, wp.prdcom, wp.reserve, wp.sellprice, wp.strprice, wp.prdimg_R, wp.popular, wp.recom, wp.new, wp.best, wp.sale, wp.shortage, wp.prdicon, wp.stock,
										wp.conprice, wp.coupon_use, wp.coupon_type, wp.coupon_dis, wp.coupon_amount, wp.coupon_limit, wp.coupon_edate
										from wiz_cprelation wc, wiz_product wp, wiz_category wy
										where $catcode_sql $grp_sql $brand_sql wy.catuse != 'N' and wc.catcode = wy.catcode and wc.prdcode = wp.prdcode and wp.showset != 'N'
										$order_sql limit $start, $rows";
			$result = mysql_query($sql) or error(mysql_error());

			while(($row = mysql_fetch_object($result)) && $rows){


			// ��ǰ������
			$sp_img = "";
			if($row->popular == "Y") 	$sp_img .= "<img src='/images/icon_hit.gif'>&nbsp;";
			if($row->recom == "Y") 		$sp_img .= "<img src='/images/icon_rec.gif'>&nbsp;";
			if($row->new == "Y") 			$sp_img .= "<img src='/images/icon_new.gif'>&nbsp;";
			if($row->sale == "Y") 		$sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;";
			if($row->best == "Y") 		$sp_img .= "<img src='/images/icon_best.gif'>&nbsp;";
			if($row->shortage == "Y" || ($row->shortage == "S" && $row->stock <= 0)) $sp_img .= "<img src='/images/icon_not.gif'>&nbsp;";

			$prdicon_list = explode("/",$row->prdicon);
			for($ii=0; $ii<count($prdicon_list)-1; $ii++){
				$sp_img .= "<img src='/data/prdicon/".$prdicon_list[$ii]."'> ";
			}

			// ����������
			$coupon_img = "";
			if(
			$row->coupon_use == "Y" &&
			$row->coupon_edate >= date('Y-m-d') &&
			($row->coupon_limit == "N" || ($row->coupon_limit == "" && $row->coupon_amount > 0))
			){

				$coupon_img = "<font class=coupon>".number_format($row->coupon_dis).$row->coupon_type."</font> <img src='/images/icon_coupon.gif'>&nbsp;";
			}

			// ����(�ǸŰ����� ������� ����ǥ��)
			$conprice = "";
			if($row->conprice > $row->sellprice){
				$conprice = "<s>".number_format($row->conprice)."��</s> �� ";
			}

			$sellprice = "<font class=price>".number_format($row->sellprice)."��</font>";

			if(!empty($row->strprice)) {
				$conprice = "";
				$sellprice = "<font class=price>".$row->strprice."</font>";;
			}

			if($no%4 == 0){
				if($no == 0) echo "<tr>";
				else echo "<tr><td height='1' background='/images/dot_line.gif' colspan='20'></td></tr><tr>";
			}

			// ��ǰ �̹���
			if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$row->prdimg_R)) $row->prdimg_R = "/images/noimg_R.gif";
			else $row->prdimg_R = "/data/prdimg/".$row->prdimg_R;

			?>
			<td width=25% style="padding:5 5 5 5" valign=top align=center>
				<table width=120 border=0 cellpadding=0 cellspacing=0>
				<tr><td align=center><a href="prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&brand=<?=$brand?>&page=<?=$page?>"><img src="<?=$row->prdimg_R?>" border="0" width="<?=$cat_info->prd_width?>" height="<?=$cat_info->prd_height?>"></a></td></tr>
				<tr><td align=center><a href="prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&brand=<?=$brand?>&page=<?=$page?>"><?=cut_str($row->prdname,25)?></a></td></tr>
				<tr><td align=center><?=$conprice?><?=$sellprice?></td></tr>
				<tr><td align=center><?=$coupon_img?><?=$sp_img?></td></tr>
				</table>
			</td>
	   	<?
				$rows--;
				$no++;
			}

			if($total <= 0) echo "<tr><td align=center height=80>��ϵ� ��ǰ�� �����ϴ�.</td></tr>";
			?>
			</table>

			<table width=100% border=0 cellpadding=0 cellspacing=0>
				<tr><td background='/images/dot_line.gif'></td></tr>
				<tr><td height="10"></td></tr>
			</table>

			<? print_pagelist($page, $lists, $page_count, "&catcode=$catcode&grp=$grp&orderby=$orderby&brand=$brand"); ?>

		</td>
	</tr>
</table>


<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>