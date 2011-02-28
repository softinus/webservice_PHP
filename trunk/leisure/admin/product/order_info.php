<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../header.php"; ?>
<?
// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "s_status=$s_status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<?
// 주문정보 가져오기
$sql = "select * from wiz_order where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);

// 배송비
deliver_price($order_info->prd_price, $oper_info);

?>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
// 고객 메일발송
function sendEmail(name,email){
	var url = "../member/send_email.php?seluser=" + name + ":" + email;
	window.open(url,"sendEmail","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 고객 sms발송
function sendSms(name,hphone){
	var url = "../member/send_sms.php?seluser=" + hphone;
	window.open(url,"sendSms","height=350, width=270, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 우편번호 찾기
function searchZip(){
	document.frm.send_address.focus();
	var url = "../member/search_zip.php?kind=send_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
function searchZip2(){
	document.frm.rece_address.focus();
	var url = "../member/search_zip.php?kind=rece_";
	window.open(url,"searchZip2","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

function basketCancel( idx, prdname ) {

<? if(!strcmp($order_info->status, "OR") || !strcmp($order_info->status, "OY") || !strcmp($order_info->status, "DR")) { ?>

	if(cancel.style.display == "block" && document.cFrm.idx.value == idx) cancel.style.display = "none";
	else cancel.style.display = "block";

	document.cFrm.idx.value = idx;
	document.getElementById("cPrd").innerHTML = prdname;

<? } else { ?>

	alert("배송처리/주문취소된 주문의 상품은 취소할 수 없습니다.");

<? } ?>

}

function resetCancel() {
	document.cFrm.idx.value = "";
	document.getElementById("cPrd").innerHTML = "";
	cancel.style.display = "none";
}

function cancelCheck( frm ) {

	if(frm.idx.value == "") {
		alert("취소상품이 선택되지 않았습니다.");
		return false;
	}

	if(frm.reason.value == "") {
		alert("취소사유를 선택해주세요.");
		frm.reason.focus();
		return false;
	}

	if(frm.bank != undefined) {

		if(frm.repay[0].checked != true && frm.repay[1].checked != true) {
			alert("환불방법을 선택하세요.")
			return false;
		}
		if(frm.repay[1].checked == true) {
			if(frm.bank.value == "") {
				alert("은행을 선택하세요.");
				frm.bank.focus();
				return false;
			}

			if(frm.account.value == "") {
				alert("입금계좌를 입력하세요.");
				frm.account.focus();
				return false;
			}

			if(frm.acc_name.value == "") {
				alert("예금주를 입력하세요.");
				frm.acc_name.focus();
				return false;
			}
		}

	}

}

var clickvalue='';
function viewCancel( idx ) {

	ccontent =eval("ccontent_"+idx+".style");

	if(clickvalue != ccontent) {
		if(clickvalue!='') {
			clickvalue.display='none';
		}

		ccontent.display='block';
		clickvalue=ccontent;
	} else {
		ccontent.display='none';
		clickvalue='';
	}

}

function orderPrint() {
	var url = "order_print.php?selorder=<?=$orderid?>";
	window.open(url,"OderPrint","height=650, width=750, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 세금계산서발행
function qclick(idnum) {

  tax01.style.display='none';
  
  if(idnum != ""){
	  tax=eval("tax"+idnum+".style");
	  tax.display='block';
	}
}

// 세금계산서 출력
function printTax(orderid) {

	var url = "/shop/print_tax_sup.php?orderid=" + orderid;
	window.open(url, "taxPub", "height=750, width=670, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=50, top=50");

}
-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">주문정보</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">주문상세 정보입니다.</td>
			  </tr>
			</table>

			<br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="70">상품코드</th>
          <th width="50"></th>
          <th width="245">상품명</th>
          <th width="60">상품가격</th>
          <th width="90">옵션</th>
          <th width="90">수량</th>
          <th width="80">적립금</th>
          <th>취소</th>
        </tr>
        <tr><td class="t_rd" colspan="20"></td></tr>
        <?
       $orderid = $order_info->orderid;
       $sql = "select * from wiz_basket where orderid = '$orderid'";
		   $result = mysql_query($sql) or error(mysql_error());
		   $total = mysql_num_rows($result);
		   
		   $prd_info = "";

		   while($row = mysql_fetch_object($result)){
		   	if($row->prdimg == "") $row->prdimg = "/images/noimage.gif";
				else $row->prdimg = "/data/prdimg/$row->prdimg";

		   	$prd_price += $row->prdprice*$row->amount;
		   	$reserve_price += $row->prdreserve*$row->amount;

				$del_type = "";

				if(!empty($row->del_type) && strcmp($row->del_type, "DA")) {
					if(!strcmp($row->del_type, "DC")) $del_type = "<br>(".deliver_name_prd($row->del_type)." : ".number_format($row->del_price)."원)";
					else $del_type = "<br>(".deliver_name_prd($row->del_type).")";
				}
				
				$prd_info .= $row->prdname."^".$row->prdprice."^".$row->amount."^^";

			?>
       	<tr bgcolor="#FFFFFF">
          <td align="center"><?=$row->prdcode?></td>
          <td><a href='/shop/prd_view.php?prdcode=<?=$row->prdcode?>' target='_blank'><img src='<?=$row->prdimg?>' width='50' height='50' border='0'></a></td>
          <td><a href='/shop/prd_view.php?prdcode=<?=$row->prdcode?>' target='_blank'><?=$row->prdname?></a><?=$del_type?></td>
          <td align="center"><?=number_format($row->prdprice)?>원</td>
          <td align="center">
	        <?
					if($row->opttitle3 != '') echo "$row->opttitle3 : $row->optcode3 <br>";
					if($row->opttitle4 != '') echo "$row->opttitle4 : $row->optcode4 <br>";
					if($row->opttitle5 != '') echo "$row->opttitle5 : $row->optcode5 <br>";
					if($row->opttitle6 != '') echo "$row->opttitle6 : $row->optcode6 <br>";
					if($row->opttitle7 != '') echo "$row->opttitle7 : $row->optcode7 <br>";
					
					if($row->opttitle != '') echo $row->opttitle;
					if($row->opttitle != '' && $row->opttitle2 != '') echo "/";
					if($row->opttitle2 != '') echo $row->opttitle2;
					if($row->opttitle != '' || $row->opttitle2 != '') echo " : ".$row->optcode." <br>";
				 	?>
          </td>
          <td align="center"><?=$row->amount?></td>
          <td align="center"><?=number_format($row->prdreserve*$row->amount)?>원</td>
          <td align="center">
					<?
					if(!strcmp($row->status, "CA") || !strcmp($row->status, "CI") || !strcmp($row->status, "CC")) {
						if(!strcmp($row->status, "CA")) $basket_status = "취소신청<br><a href=\"javascript:\" onClick=\"viewCancel('$row->idx')\">[취소내역보기]</a>";
						else if(!strcmp($row->status, "CI")) $basket_status = "처리중<br><a href=\"javascript:\" onClick=\"viewCancel('$row->idx')\">[취소내역보기]</a>";
						else if(!strcmp($row->status, "CC")) $basket_status = "취소완료<br><a href=\"javascript:\" onClick=\"viewCancel('$row->idx')\">[취소내역보기]</a>";
					?>
					<?=$basket_status?>
					<?
					} else {
					?>
          <img src="../image/btn_cancel_s.gif" style="cursor:hand"  onClick="basketCancel('<?=$row->idx?>', '<?=$row->prdname?>')">
					<?
					}
					?>
          </td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
       	<tr bgcolor="#FFFFFF" id="ccontent_<?=$row->idx?>" style="display:none">
          <td colspan="10" style="padding:3px">
            <table border="0"width="100%" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="100" align="align" class="t_name">취소사유</td>
                <td class="t_value" colspan="5"><?=$row->reason?></td>
              </tr>
              <tr>
                <td width="100" align="align" class="t_name">메모</td>
                <td class="t_value" colspan="5"><?=$row->memo?></td>
              </tr>
							<?
							if(!empty($row->repay)) {
								if(!strcmp($row->repay, "R")) $repay = "적립금";
								if(!strcmp($row->repay, "C")) $repay = "계좌이체";
							
							?>
              <tr>
                <td width="100" align="align" class="t_name">환불방법</td>
                <td class="t_value" colspan="5"><?=$repay?></td>
              </tr>
							<?
							}
							if(!empty($row->bank)) {
							?>
              <tr>
                <td width="100" align="align" class="t_name">은행명</td>
                <td class="t_value"><?=$row->bank?></td>
                <td width="100" align="align" class="t_name">계좌번호</td>
                <td class="t_value"><?=$row->account?></td>
                <td width="100" align="align" class="t_name">예금주</td>
                <td class="t_value"><?=$row->acc_name?></td>
              </tr>
							<?
							}
							?>
            </table>
          </td>
        </tr>
        <?
        }
        // 회원할인
        if($order_info->discount_price > 0){
        	$discount_msg = " - 회원할인( <b><font color=#ED1C24>".number_format($order_info->discount_price)."원</font></b> )";
        }
        // 적립금 사용
				if($order_info->reserve_use > 0){
					$reserve_msg = " - 적립금 사용(<b><font color=#ED1C24>".number_format($order_info->reserve_use)."원</font></b>)";
				}

				// 쿠폰사용
				if($order_info->coupon_use > 0){
					$coupon_msg = " - 쿠폰 사용(<b><font color=#ED1C24>".number_format($order_info->coupon_use)."원</font></b>)";
				}
        ?>
      </table>

      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="38" id="cancel" style="display:none">
      <form name="cFrm" action="order_save.php" method="post" onSubmit="return cancelCheck(this)">
    	<input type="hidden" name="orderid" value="<?=$orderid?>">
    	<input type="hidden" name="orderstatus" value="<?=$order_info->status?>">
    	<input type="hidden" name="mode" value="cancel">
    	<input type="hidden" name="idx" value="">
    		<tr><td><br></td></tr>
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> 상품취소</td>
			  </tr>
        <tr>
        	<td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td class="t_name">취소상품</td>
                <td class="t_value" id="cPrd" colspan="5"></td>
              </tr>
              <tr>
                <td class="t_name">취소사유</td>
                <td class="t_value" colspan="5">
                	<select name="reason">
                		<option value="">:: 취소사유를 선택하세요 ::</option>
                		<option value="고객변심">고객변심</option>
                		<option value="품절">품절</option>
                		<option value="배송지연">배송지연</option>
                		<option value="이중주문">이중주문</option>
                		<option value="시스템오류">시스템오류</option>
                		<option value="누락배송">누락배송</option>
                		<option value="택배분실">택배분실</option>
                		<option value="상품불량">상품불량</option>
                		<option value="기타">기타</option>
                	</select>

                </td>
              </tr>
              <tr>
                <td class="t_name">메모</td>
                <td class="t_value" colspan="5">
                	<textarea name="memo" class="input" style="width:100%;height:100px"></textarea>
                </td>
              </tr>
							<?
								if(strcmp($order_info->status, "OR") && strcmp($order_info->pay_metho, "PC")) {
							?>
              <tr>
                <td class="t_name">환불방법</td>
                <td class="t_value" colspan="5">
                	<input type="radio" name="repay" value="R"> 적립금
                	<input type="radio" name="repay" value="C"> 계좌이체
                </td>
              </tr>
              <tr>
                <td class="t_name">환불계좌</td>
                <td class="t_value">
                	<select name="bank">
                		<option value="">:: 선택하세요 :: </option>
                		<option value="경남은행">경남은행 </option>
                		<option value="광주은행">광주은행 </option>
                		<option value="국민은행">국민은행 </option>
                		<option value="기업은행">기업은행 </option>
                		<option value="농협">농협 </option>
                		<option value="대구은행">대구은행 </option>
                		<option value="도이치뱅크">도이치뱅크 </option>
                		<option value="부산은행">부산은행 </option>
                		<option value="산업은행">산업은행 </option>
                		<option value="상호저축은행">상호저축은행 </option>
                		<option value="새마을금고">새마을금고 </option>
                		<option value="수협중앙회">수협중앙회 </option>
                		<option value="신용협동조합">신용협동조합 </option>
                		<option value="신한은행">신한은행 </option>
                		<option value="외환은행">외환은행 </option>
                		<option value="우리은행">우리은행 </option>
                		<option value="우체국">우체국 </option>
                		<option value="전북은행">전북은행 </option>
                		<option value="제주은행">제주은행 </option>
                		<option value="하나은행">하나은행 </option>
                		<option value="한국시티은행">한국시티은행 </option>
                		<option value="HSBC">HSBC </option>
                		<option value="SC제일은행">SC제일은행 </option>
                	</select>
                </td>
                <td class="t_name">계좌번호</td>
                <td class="t_value">
                	<input type="text" name="account" class="input">
                </td>
                <td class="t_name">예금주</td>
                <td class="t_value">
                	<input type="text" name="acc_name" class="input">
                </td>
              </tr>
							<?
								}
							?>
            </table>
        	</td>
        </tr>
        <tr>
        	<td align="center" height="35">
        		<input type="image" src="../image/btn_confirm_s.gif"> &nbsp; 
        		<img src="../image/btn_cancel_s.gif" style="cursor:hand" onClick="resetCancel()">
        	</td>
        </tr>
      </form>
      </table>

      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="38">
        <tr><td height="10"></td></tr>
        <tr>
        	<td><b>배송비 : <?=$deliver_msg?></b></td>
          <td align="right">
          상품합계( <b><font color="#ED1C24"><?=number_format($order_info->prd_price)?>원</font></b> )
          <?=$discount_msg?>
           + 배송비( <b><font color="#ED1C24"><?=number_format($order_info->deliver_price)?>원</font></b>)
           <?=$coupon_msg?><?=$reserve_msg?>

          =
          <b><font color="#000000">총 결제금액 :</font> <font color="#ED1C24"><?=number_format($order_info->total_price)?>원</font></b>
          </td>
        </tr>
        <tr><td height="10"></td></tr>
      </table>

      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form name="frm" action="order_save.php" method="post">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="update">
      <input type="hidden" name="page" value="<?=$page?>">
      <input type="hidden" name="orderid" value="<?=$orderid?>">
      
      <input type="hidden" name="total_price" value="<?=$order_info->total_price?>">
      <input type="hidden" name="prd_info" value="<?=$prd_info?>">

      <input type="hidden" name="s_status" value="<?=$s_status?>">
      <input type="hidden" name="prev_year" value="<?=$prev_year?>">
      <input type="hidden" name="prev_month" value="<?=$prev_month?>">
      <input type="hidden" name="prev_day" value="<?=$prev_day?>">
      <input type="hidden" name="next_year" value="<?=$next_year?>">
      <input type="hidden" name="next_month" value="<?=$next_month?>">
      <input type="hidden" name="next_day" value="<?=$next_day?>">
      <input type="hidden" name="searchopt" value="<?=$searchopt?>">
      <input type="hidden" name="searchkey" value="<?=$searchkey?>">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">주문번호</td>
                <td width="35%" class="t_value"><?=$orderid?></td>
                <td width="15%" class="t_name">결제방법</td>
                <td width="35%" class="t_value"><?=pay_method($order_info->pay_method)?></td>
              </tr>
              <tr>
                <td class="t_name">주문일자</td>
                <td class="t_value"><?=$order_info->order_date?></td>
                <td class="t_name">에스크로여부</td>
                <td class="t_value"><?=$order_info->escrow_check?></td>
              </tr>
              <tr>
                <td class="t_name">결제계좌</td>
                <td class="t_value"><?=$order_info->account?></td>
                <td class="t_name">입금인</td>
                <td class="t_value"><?=$order_info->account_name?></td>
              </tr>
              <tr>
                <td class="t_name">운송장번호</td>
                <td class="t_value"><input name="deliver_num" type="text" value="<?=$order_info->deliver_num?>" class="input"></td>
                <td class="t_name">발송일자</td>
                <td class="t_value">
                	<input name="deliver_date" type="text" value="<?=$order_info->deliver_date?>" class="input">
				    			<b>발송일자 입력형식(년월일시분)</b><br>
				    			예) <?=date('Y')?>년 <?=date('m')?>월 <?=date('d')?>일 <?=date('H')?>시 <?=date('i')?>분 =
				    			<?=date('Y').date('m').date('d').date('H').date('i')?>
                </td>
              </tr>
              <tr>
                <td class="t_name">처리상태</td>
                <td class="t_value">
                	<? if(!strcmp($order_info->status, "OC") || !strcmp($order_info->status, "RC")) {	//주문취소,취소완료인 경우 상태변경 불가능 ?>
                	<b><font color="#ED1C24"><?=order_status($order_info->status);?></font></b>
                	<? } else { ?>
		                <select name="chg_status">
		                <option value="">----------</option>
										<?
										if($order_info->status == "" || $order_info->status == "OR"){
										?>
		                <option value="OR" <? if($order_info->status == "OR") echo "selected"; ?>>주문접수</option>
		                <option value="OY" <? if($order_info->status == "OY") echo "selected"; ?>>결제완료</option>
										<?
										}else{
										?>
		                <option value="OY" <? if($order_info->status == "OY") echo "selected"; ?>>결제완료</option>
		                <option value="DR" <? if($order_info->status == "DR") echo "selected"; ?>>배송준비중</option>
		                <option value="DI" <? if($order_info->status == "DI") echo "selected"; ?>>배송처리</option>
		                <option value="DC" <? if($order_info->status == "DC") echo "selected"; ?>>배송완료</option>
		                <option value="OC" <? if($order_info->status == "OC") echo "selected"; ?>>주문취소</option>
		                <option value="">----------</option>
		                <option value="RD" <? if($order_info->status == "RD") echo "selected"; ?>>취소요청</option>
		                <option value="RC" <? if($order_info->status == "RC") echo "selected"; ?>>취소완료</option>
		                <option value="CD" <? if($order_info->status == "CD") echo "selected"; ?>>교환요청</option>
		                <option value="CC" <? if($order_info->status == "CC") echo "selected"; ?>>교환완료</option>
		                <? } ?>
		                </select>
		              <? } ?>
                </td>
                <td class="t_name"></td>
                <td class="t_value"></td>
              </tr>
              <tr>
                <td class="t_name">처리시간</td>
                <td class="t_value" colspan="3">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr class="t_name">
                      <td width="25%" align="center" height="25">주문접수</td>
                      <td width="25%" align="center">결제완료</td>
                      <td width="25%" align="center">배송완료</td>
                      <td width="25%" align="center">주문취소</td>
                    </tr>
                    <tr>
                      <td align="center" height="25"><? if($order_info->order_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->order_date; ?></td>
                      <td align="center"> <? if($order_info->pay_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->pay_date; ?> </td>
                      <td align="center"> <? if($order_info->send_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->send_date; ?> </td>
                      <td align="center"> <? if($order_info->cancel_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->cancel_date; ?> </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table></td>
        </tr>
      </table>
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> 배송자정보</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">주문자명</td>
                <td width="35%" class="t_value"><input name="send_name" type="text" value="<?=$order_info->send_name?>" class="input"></td>
                <td width="15%" class="t_name">이메일</td>
                <td width="35%" class="t_value"><input name="send_email" type="text" value="<?=$order_info->send_email?>" class="input"> <a href="javascript:sendEmail('<?=$order_info->send_name?>','<?=$order_info->send_email?>')";><img src="../image/btn_send_s.gif" border="0" align="absmiddle"></a></td>
              </tr>
              <tr>
                <td class="t_name">전화번호</td>
                <td class="t_value"><input name="send_tphone" type="text" value="<?=$order_info->send_tphone?>" class="input"></td>
                <td class="t_name">휴대폰</td>
                <td class="t_value"><input name="send_hphone" type="text" value="<?=$order_info->send_hphone?>" class="input"> <a href="javascript:sendSms('<?=$order_info->send_name?>','<?=$order_info->send_hphone?>')";><img src="../image/btn_send_s.gif" border="0" align="absmiddle"></a></td>
              </tr>
              <tr>
                <td class="t_name">우편번호</td>
                <td class="t_value" colspan="3">
                  <? list($post, $post2) = explode("-",$order_info->send_post); ?>
                  <input name="send_post" type="text" value="<?=$post?>" size="5" class="input"> -
                  <input name="send_post2" type="text" value="<?=$post2?>" size="5" class="input">
                  <img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip();">
                </td>
              </tr>
              <tr>
                <td class="t_name">주소</td>
                <td class="t_value" colspan="3"><input name="send_address" type="text" value="<?=$order_info->send_address?>" size="60" class="input"></td>
              </tr>
            </table></td>
        </tr>
      </table>
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> 수취인정보</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td class="t_name">수취인명</td>
                <td class="t_value" colspan="3"><input name="rece_name" type="text" value="<?=$order_info->rece_name?>" class="input"></td>
              </tr>
              <tr>
                <td width="15%" class="t_name">전화번호</td>
                <td width="35%" class="t_value"><input name="rece_tphone" type="text" value="<?=$order_info->rece_tphone?>" class="input"></td>
                <td width="15%" class="t_name">휴대폰</td>
                <td width="35%" class="t_value"><input name="rece_hphone" type="text" value="<?=$order_info->rece_hphone?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">우편번호</td>
                <td class="t_value" colspan="3">
                  <? list($post, $post2) = explode("-",$order_info->rece_post); ?>
                  <input name="rece_post" type="text" value="<?=$post?>" size="5" class="input"> -
                  <input name="rece_post2" type="text" value="<?=$post2?>" size="5" class="input">
                  <img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip2();">
                </td>
              </tr>
              <tr>
                <td class="t_name">주소</td>
                <td class="t_value" colspan="3"><input name="rece_address" type="text" value="<?=$order_info->rece_address?>" size="60" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">요청사항</td>
                <td class="t_value" colspan="3"><textarea name="demand" rows="6" cols="60" class="textarea" style="width:100%"><?=$order_info->demand?></textarea></td>
              </tr>
              <tr>
                <td class="t_name">주문취소 사유</td>
                <td class="t_value" colspan="3"><textarea name="cancelmsg" rows="6" cols="60" class="textarea" style="width:100%"><?=$order_info->cancelmsg?></textarea></td>
              </tr>
              <tr>
                <td class="t_name">관리자메모</td>
                <td class="t_value" colspan="3"><textarea name="descript" rows="6" cols="60" class="textarea" style="width:100%"><?=$order_info->descript?></textarea></td>
              </tr>
            </table></td>
        </tr>
      </table>

			<?
			if(!strcmp($oper_info->tax_use, "Y")) {
				$sql = "select * from wiz_tax where orderid = '$orderid'";
				$result = mysql_query($sql) or error(mysql_error());
				$tax_info = mysql_fetch_array($result);
			?>
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> 세금계산서 정보</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">발급여부</td>
                <td width="85%" class="t_value" colspan="3">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                		<tr>
                			<td>
											  <input type="radio" name="tax_type" value="N" onClick="qclick('');" <? if(!strcmp($order_info->tax_type, "N") || empty($order_iinfo->tax_type)) echo "checked" ?>>발행안함 
											  <input type="radio" name="tax_type" value="T" onClick="qclick('01');" <? if(!strcmp($order_info->tax_type, "T")) echo "checked" ?>>세금계산서 신청 
											  <font color="red" onClick="printTax('<?=$orderid?>')" style="cursor:pointer">[출력]</font>
											</td>
										</tr>
										<tr>
											<td height="5"></td>
										</tr>
										<tr>
											<td>
						  		
									  		<table id="tax01" style="display:<? if(!strcmp($order_info->tax_type, "T")) echo "block"; else echo "none"; ?>" bgcolor="C8C8C8" width="500" border="0" cellspacing="1" cellpadding="2">
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; 승인여부</td>
									  				<td colspan="3" bgcolor="#FFFFFF">
									  					<input type="hidden" name="tmp_tax_pub" value="<?=$tax_info[tax_pub]?>">
														  <input type="radio" name="tax_pub" value="Y" <? if(!strcmp($tax_info[tax_pub], "Y")) echo "checked" ?>> 승인 
														  <input type="radio" name="tax_pub" value="N" <? if(!strcmp($tax_info[tax_pub], "N") || empty($tax_info[tax_pub])) echo "checked" ?>> 미승인
									  				</td>
									  			</tr>
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; 사업자 번호</td><td colspan="3" bgcolor="#FFFFFF"><input type="text" name="com_num" value="<?=$tax_info[com_num]?>" class="input" size="20"></td>
									  			</tr>
									  			<tr>
									  				<td width="20%" bgcolor="#F9F9F9">&nbsp; 상 호</td><td width="30%" bgcolor="#FFFFFF"><input type="text" name="com_name" value="<?=$tax_info[com_name]?>" class="input"></td>
									  				<td width="20%" bgcolor="#F9F9F9">&nbsp; 대표자</td><td width="30%" bgcolor="#FFFFFF"><input type="text" name="com_owner" value="<?=$tax_info[com_owner]?>" class="input"></td>
									  			</tr>
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; 사업장 소재지</td><td colspan="3" bgcolor="#FFFFFF"><input type="text" name="com_address" value="<?=$tax_info[com_address]?>" class="input" size="50"></td>
									  			</tr>
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; 업 태</td><td bgcolor="#FFFFFF"><input type="text" name="com_kind" value="<?=$tax_info[com_kind]?>" class="input"></td>
									  				<td bgcolor="#F9F9F9">&nbsp; 종 목</td><td bgcolor="#FFFFFF"><input type="text" name="com_class" value="<?=$tax_info[com_class]?>" class="input"></td>
									  			</tr>
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; 전화번호</td><td bgcolor="#FFFFFF"><input type="text" name="com_tel" value="<?=$tax_info[com_tel]?>" class="input"></td>
									  				<td bgcolor="#F9F9F9">&nbsp; 이메일</td><td bgcolor="#FFFFFF"><input type="text" name="com_email" value="<?=$tax_info[com_email]?>" class="input"></td>
									  			</tr>
									  		</table>
									  		
									  	</td>
									  </tr>
									</table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
		<? } ?>
		
		<? if(!strcmp($oper_info->pay_agent, "KCP") && strcmp($order_info->paymethod, "PC")) { ?>
      <br>
      <table border="0" cellspacing="0" cellpadding="2">
		  <tr>
		    <td class="tit_sub"><img src="../image/ics_tit.gif"> 현금영수증 정보</td>
		    <td valign="bottom" class="tit_alt">KCP 상점정보에 등록된 현금영수증 정보를 입력하세요.</td>
		  </tr>
		</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">발급여부</td>
                <td width="35%" class="t_value">
                	<input type="text" name="id_info" value="<?=$order_info->id_info?>" class="input">
                </td>
                <td width="15%" class="t_name">국세청 승인여부</td>
                <td width="35%" class="t_value">
                	<input type="radio" name="bill_yn" value="Y" <? if(!strcmp($order_info->bill_yn, "Y")) { ?> checked <? } ?>> 승인
                	<input type="radio" name="bill_yn" value="N" <? if(!strcmp($order_info->bill_yn, "N")) { ?> checked <? } ?>> 미승인
                </td>
              </tr>
              <tr>
                <td width="15%" class="t_name">승인번호</td>
                <td width="85%" class="t_value" colspan="3">
                	<input type="text" name="authno" value="<?=$order_info->authno?>" class="input">
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
		<? } ?>

      <br>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="33%"></td>
          <td width="33%" align="center">
            <input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
            <img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='order_list.php?<?=$param?>'">
          </td>
          <td width="33%" align="right"><img src="../image/btn_print_l.gif" style="cursor:hand" onClick="orderPrint()"></td>
        </tr>
      </form>
      </table>

<? include "../footer.php"; ?>