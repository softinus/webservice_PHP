<?
include "../../inc/common.inc";
include "../../inc/util.inc";
include "../../inc/oper_info.inc";
include "../../inc/shop_info.inc";
include "../../inc/admin_check.inc";

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "s_status=$s_status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
$param .= "&reason=$reason";
//--------------------------------------------------------------------------------------------------

function changeStatus($orderid, $status, $delsno="", $deldate=""){

	global $DOCUMENT_ROOT, $HTTP_HOST, $connect, $oper_info, $order_info;

	// ����� ��ȣ�� �ִ� ��� update
	if(!empty($delsno)) {
		$sql = "update wiz_dayorder set deliver_num='$delsno', deliver_date='$deldate' where orderid='$orderid'";
		mysql_query($sql) or error(mysql_error());
	}

	$sql = "select * from wiz_dayorder where orderid = '$orderid'";


	$result = mysql_query($sql,$connect) or error(mysql_error());
	$order_info = mysql_fetch_object($result);


	$re_info[name] = $order_info->send_name;
	$re_info[email] = $order_info->send_email;
	$re_info[hphone] = $order_info->send_hphone;

	$del_com = $oper_info->del_com;
	//if($order_info->status != $status ){
	if($order_info->status){

		// ��ۿϷ� �� �ٸ� ������·� ���� �� ��ۿϷ�� -1
		if(!strcmp($order_info->status, "DC") && strcmp($status, "DC")) {

			$sql = "select wb.prdcode, wp.comcnt
							from wiz_basket as wb left join wiz_dayproduct as wp on wb.prdcode = wp.prdcode
							where wb.orderid = '$order_info->orderid'";
			$result = mysql_query($sql,$connect) or error(mysql_error());

			while($row = mysql_fetch_object($result)){

				if($row->comcnt > 0) {
					$sql = "update wiz_dayproduct set comcnt = comcnt - 1 where prdcode = '$row->prdcode'";
					mysql_query($sql) or error(mysql_error());
				}

			}

		}

		// �ֹ����, ȯ�ҿϷ� �� �ٸ� ������·� ���� �� �ֹ���Ҽ� -1
		if((!strcmp($order_info->status, "OC") && strcmp($status, "OC")) || (!strcmp($order_info->status, "RC") && strcmp($status, "RC"))){

			$sql = "select wb.prdcode, wp.cancelcnt
							from wiz_basket as wb left join wiz_dayproduct as wp on wb.prdcode = wp.prdcode
							where wb.orderid = '$order_info->orderid'";
			$result = mysql_query($sql,$connect) or error(mysql_error());

			while($row = mysql_fetch_object($result)){

				if($row->cancelcnt > 0) {
					$sql = "update wiz_dayproduct set cancelcnt = cancelcnt - 1 where prdcode = '$row->prdcode'";
					mysql_query($sql) or error(mysql_error());
				}

			}

		}

	   // �Ա�Ȯ�ν�
		if($status == "OY"){

			// ������ ���¿� ������°� �ٸ� ��쿡��
			if(strcmp($status, $order_info->status)) {

				// ���ó��(�����Ϸ�[OY]�� ��쿡�� ��� ����)
				Exe_stock();

				// �����ݻ�� ����
				if($order_info->reserve_use > 0){

				$sql = "select idx from wiz_reserve where memid = '$order_info->send_id' and orderid = '$orderid' and reserve < 0";
				$result = mysql_query($sql,$connect) or error(mysql_error());
				$total = mysql_num_rows($result);

					// �̹� �������� �������� üũ
					if($total <= 0){
					    $reserve_msg = "��ǰ���Խ� ���";
					    $sql = "insert into wiz_reserve(idx,memid,reservemsg,reserve,orderid,wdate) values('', '$order_info->send_id', '$reserve_msg', -$order_info->reserve_use, '$orderid', now())";
					    mysql_query($sql,$connect) or error(mysql_error());
					}

				}

				$oper_time = ", pay_date = now()";

				include "$DOCUMENT_ROOT/shop/prd_ordmail.inc";
				send_mailsms("order_pay", $re_info, $ordmail);

			}

		// ��ۿϷ�
		}else if(!strcmp($status, "DC")) {

			//����������
			if($order_info->reserve_price > 0){

				$sql = "select idx from wiz_reserve where memid = '$order_info->send_id' and orderid = '$orderid' and reserve > 0";
				$result = mysql_query($sql,$connect) or error(mysql_error());
				$total = mysql_num_rows($result);

				// �̹� �������� �������� üũ
				if($total <= 0){
				    $reserve_msg = "��ǰ���Խ� ������";
				    $sql = "insert into wiz_reserve(idx,memid,reservemsg,reserve,orderid,wdate) values('', '$order_info->send_id', '$reserve_msg', $order_info->reserve_price, '$orderid', now())";
				    mysql_query($sql,$connect) or error(mysql_error());
				}
			}

			$sql = "select count(idx) as counter from wiz_advertinfo where orderid='$orderid'";
			$result = mysql_query($sql)or die($sql);
			$rows = mysql_fetch_array($result);

			if($rows[counter] != 0){

				$sql = "select * from wiz_advertinfo where orderid='$orderid'";
				$result = mysql_query($sql)or die($sql);
				$rs = mysql_fetch_array($result);

			    $reserve_msg = "����ȿ���� ���� ������";
			    $sql = "insert into wiz_reserve(idx,memid,reservemsg,reserve,orderid,wdate) values('', '$rs[advert_id]', '$reserve_msg', $rs[reserve], '$orderid', now())";
			    mysql_query($sql,$connect) or error(mysql_error());
			}


			// �����úм� > ��ǰ���м� > ��ۿϷ� ����
			$sql = "select wb.prdcode, wp.comcnt
							from wiz_basket as wb left join wiz_dayproduct as wp on wb.prdcode = wp.prdcode
							where wb.orderid = '$order_info->orderid'";
			$result = mysql_query($sql,$connect) or error(mysql_error());

			while($row = mysql_fetch_object($result)){

				if(strcmp($order_info->status, $status)) {
					$sql = "update wiz_dayproduct set comcnt = comcnt + 1 where prdcode = '$row->prdcode'";
					mysql_query($sql) or error(mysql_error());
				}
			}

			$oper_time = ", send_date = now()";
			
			


		// �ֹ���ҽ�, ȯ�ҿϷ��
		}else if($status == "OC" || $status == "RC"){

			//����������(�ش��ֹ��� ���� �������� ����)
			$sql = "delete from wiz_reserve where memid='$order_info->send_id' and orderid='$order_info->orderid'";
			mysql_query($sql,$connect) or error(mysql_error());


			// �ֹ���� �� �ֹ������� ��츦 �����ϰ� ��� ����
			if(strcmp($order_info->status, "OR")) {
				// �ֹ����, �ֹ��Ϸ� ��������
				$sql = "select wb.prdcode, wb.amount, wb.optcode, wb.status, wp.optcode as p_optcode, wp.optcode2 as p_optcode2, wp.optvalue as p_optvalue, wp.opt_use
								from wiz_basket as wb left join wiz_dayproduct as wp on wb.prdcode = wp.prdcode
								where orderid = '$order_info->orderid'";
				$result = mysql_query($sql,$connect) or die(mysql_error());
				while($row = mysql_fetch_object($result)){
					// �ɼǺ� ������ ���� ��ǰ�̶�� ��ü��� ����
					if(strcmp($row->opt_use, "Y")){

						$sql = "update wiz_dayproduct set cancelcnt = cancelcnt + 1, stock = stock + $row->amount where prdcode = '$row->prdcode'";
						mysql_query($sql,$connect) or error(mysql_error());

					// �ɼǺ� ������ ��ǰ
					}else{

						$opt_list_app = "";

						$opt1_arr = explode("^", $row->p_optcode);
						$opt2_arr = explode("^", $row->p_optcode2);
						$opt_tmp = explode("^^", $row->p_optvalue);

						list($optcode1, $optcode2) = explode("/", $row->optcode);

						$arrOptCode1= explode("^",$optcode1);
						$arrOptCode2= explode("^",$optcode2);

						if(strcmp($row->stuats, "CC")) {

							$opt1_cnt = count($opt1_arr) - 1;
							$opt2_cnt = count($opt2_arr) - 1;

							if($opt1_cnt < 1) $opt1_cnt = 1;
							if($opt2_cnt < 1) $opt2_cnt = 1;

							$no = 0;
							for($ii = 0; $ii < $opt1_cnt; $ii++) {
								for($jj = 0; $jj < $opt2_cnt; $jj++) {
									list($price, $reserve, $stock) = explode("^", $opt_tmp[$no]);

									if(!empty($tmp_optvalue[$row->prdcode][$no])) $stock = $tmp_optvalue[$row->prdcode][$no];

									if(!strcmp($arrOptCode1[0], $opt1_arr[$ii]) && !strcmp($arrOptCode2[$i], $opt2_arr[$jj])) {
										$stock = $stock + $row->amount;
									}

									$opt_list_app .= $price."^".$reserve."^".$stock."^^";

									$tmp_optvalue[$row->prdcode][$no] = $stock;
									$no++;
								}

							}


							/*
							$opt_list = explode("^^",$row->p_optcode);
							for($ii=0; $ii < count($opt_list)-1; $ii++){
								$opt_list2 = explode("^",$opt_list[$ii]);
								if($opt_list2[0] == $row->optcode){
									$opt_list2[2] = $opt_list2[2] + $row->amount;
									$opt_list_app .= $opt_list2[0]."^".$opt_list2[1]."^".$opt_list2[2]."^^";
								}else{
									$opt_list_app .= $opt_list[$ii]."^^";
								}
							}
							*/

							$optvalue_sql = ", optvalue = '$opt_list_app'";

						}

						$sql = "update wiz_dayproduct set cancelcnt = cancelcnt + 1  $optvalue_sql where prdcode = '$row->prdcode'";
						mysql_query($sql,$connect) or error(mysql_error());

					}

				}
			}

			$oper_time = ", cancel_date = now()";
			include "$DOCUMENT_ROOT/shop/prd_ordmail.inc";
			send_mailsms("order_cancel", $re_info, $ordmail);

		// ���ó�� ��
		} else if(!strcmp($status, "DI")) {

			include "$DOCUMENT_ROOT/shop/prd_ordmail.inc";
			send_mailsms("order_deliver", $re_info, $ordmail);

		}

		$sql = "update wiz_dayorder set status = '$status' $oper_time where orderid = '$orderid'";
		mysql_query($sql,$connect);


   }


   // ���ó��, ��ۿϷ��� ��� ������� ����
   if(!strcmp($status, "DI") || !strcmp($status, "DC")) {

			// ������� ����
			escrow_delivery($order_info, $oper_info, $order_info->deliver_num, $order_info->deliver_date);

		}

}

// �ֹ����� ����
if($mode == "chgstatus"){

	changeStatus($orderid, $chg_status, $deliver_num, $deliver_date);

	//����
	if($isdeliver=="N" && $orgstatus=="OY") {
		
		$coupon_sql	= ",coupon_number=concat('_U',orderid), coupon_date=CURRENT_TIMESTAMP()";

//		$sql	= "SELECT (SELECT prdname FROM wiz_dayproduct p WHERE p.prdcode=d.prdcode) AS prdname, d.* FROM wiz_dayorder d WHERE orderid='".$orderid."'";
		$sql = "SELECT * from wiz_dayproduct wp, wiz_dayorder wo where wp.prdcode=wo.prdcode and wo.orderid='$orderid'";
		$rs		= mysql_query($sql) or die($sql);
		$row	= mysql_fetch_array($rs);

		$subject	= "[".$shop_info->shop_name."] ".$row["rece_name"]."�� ������ �߱޵Ǿ����ϴ�.";
		$content	= "[".$shop_info->shop_name."]_U".$orderid." ".$row["prdname"];
		send_sms($shop_info->shop_tel, $rece_hphone, $content, $shop_info->shop_name);

		//����			

/*
		$content	= "[�ʹݳ���] ".$rand.$orderid." ".$row["prdname"];
		include "coupon_mail.php";
		send_sms("070-8670-5159", $rece_hphone, $content, "�ʹݳ���");		
		send_mail("�ʹݳ���", "ui50@oinet.co.kr", $rece_name, $rece_email, $subject, $mail_content);
*/



	}
	complete("�ֹ������� �����Ǿ����ϴ�.","order_list.php?page=$page&$param");

// �ֹ����� ����
}else if($mode == "update"){

	$send_post = $send_post."-".$send_post2;
	$rece_post = $rece_post."-".$rece_post2;

	if(!empty($chg_status)) {
		changeStatus($orderid, $chg_status, $deliver_num, $deliver_date);
		$chg_status_sql = " status = '$chg_status', ";
	}

	//����
	if($isdeliver=="N" && $orgstatus=="OY") {
		
		$coupon_sql	= ",coupon_number=concat('_U',orderid), coupon_date=CURRENT_TIMESTAMP()";

//		$sql	= "SELECT (SELECT prdname FROM wiz_dayproduct p WHERE p.prdcode=d.prdcode) AS prdname, d.* FROM wiz_dayorder d WHERE orderid='".$orderid."'";
		$sql = "SELECT * from wiz_dayproduct wp, wiz_dayorder wo where wp.prdcode=wo.prdcode and wo.orderid='$orderid'";
		$rs		= mysql_query($sql) or die($sql);
		$row	= mysql_fetch_array($rs);

		$subject	= "[".$shop_info->shop_name."] ".$row["rece_name"]."�� ������ �߱޵Ǿ����ϴ�.";
		$content	= "[".$shop_info->shop_name."]_U".$orderid." ".$row["prdname"];
		send_sms($shop_info->shop_tel, $rece_hphone, $content, $shop_info->shop_name);

		//����			

/*
		$content	= "[�ʹݳ���] ".$rand.$orderid." ".$row["prdname"];
		include "coupon_mail.php";
		send_sms("070-8670-5159", $rece_hphone, $content, "�ʹݳ���");		
		send_mail("�ʹݳ���", "ui50@oinet.co.kr", $rece_name, $rece_email, $subject, $mail_content);
*/



	}

	
	$sql = "update wiz_dayorder set $chg_status_sql send_name = '$send_name', send_tphone = '$send_tphone', send_hphone = '$send_hphone', send_email = '$send_email',
                        send_post = '$send_post', send_address = '$send_address', rece_name =' $rece_name', rece_tphone = '$rece_tphone',
                        rece_hphone = '$rece_hphone', rece_email = '$rece_email', rece_post = '$rece_post', rece_address = '$rece_address', demand = '$demand', message = '$message', cancelmsg='$cancelmsg', descript = '$descript',
                        deliver_num = '$deliver_num', deliver_date = '$deliver_date', tax_type = '$tax_type', id_info='$id_info', bill_yn='$bill_yn', authno='$authno' $coupon_sql where orderid = '$orderid'";

  $result = mysql_query($sql,$connect) or error(mysql_error());

  $sql = "select orderid from wiz_tax where orderid = '$orderid'";
  $result = mysql_query($sql) or error(mysql_error());
  $row = mysql_fetch_array($result);

	include_once "../../inc/shop_info.inc";
	
	$shop_name 		= $shop_info->com_name;
	$shop_owner 		= $shop_info->com_owner;
	$shop_num			= $shop_info->com_num;
	$shop_address	= $shop_info->com_address;
	$shop_kind 		= $shop_info->com_kind;
	$shop_class		= $shop_info->com_class;
	$shop_tel			= $shop_info->com_tel;
	$shop_email		= $shop_info->shop_email;

  if(!strcmp($tax_pub, "Y") && strcmp($tmp_tax_pub, "Y")) $tax_pub_sql = ", wdate = now(), shop_name='$shop_name', shop_owner='$shop_owner', shop_num='$shop_num', shop_address='$shop_address', shop_kind='$shop_kind', shop_class='$shop_class', shop_tel='$shop_tel', shop_email='$shop_email' ";

  if(!empty($row[orderid]))
	  $sql = "update wiz_tax set com_num='$com_num', com_name='$com_name', com_owner='$com_owner', com_address='$com_address', com_kind='$com_kind', com_class='$com_class', com_tel='$com_tel', com_email='$com_email'
	  				, tax_pub='$tax_pub' $tax_pub_sql where orderid = '$orderid'";
	else {

		include_once "../../inc/shop_info.inc";

		$shop_name 		= $shop_info->com_name;
		$shop_owner 	=	$shop_info->com_owner;
		$shop_num			= $shop_info->com_num;
		$shop_address	= $shop_info->com_address;
		$shop_kind 		= $shop_info->com_kind;
		$shop_class		= $shop_info->com_class;
		$shop_tel			= $shop_info->com_tel;
		$shop_email		= $shop_info->shop_email;

		$supp_price = intval($total_price/1.1);
		$tax_price = $total_price - $supp_price;

		$sql = "INSERT INTO wiz_tax(orderid,com_num,com_name,com_owner,com_address,com_kind,com_class,com_tel,com_email,shop_num,shop_name,shop_owner,shop_address,shop_kind,shop_class,shop_tel,shop_email,prd_info,supp_price,tax_price,tax_pub,tax_date)
						VALUES ('".$orderid."','".$com_num."','".$com_name."','".$com_owner."','".$com_address."','".$com_kind."','".$com_class."','".$com_tel."','".$com_email."','".$shop_num."','".$shop_name."','".$shop_owner."','".$shop_address."','".$shop_kind."','".$shop_class."','".$shop_tel."','".$shop_email."','".$prd_info."','".$supp_price."','".$tax_price."','".$tax_pub."',now())";

	}

  mysql_query($sql) or error(mysql_error());

  complete("�ֹ������� �����Ǿ����ϴ�.","order_info.php?orderid=$orderid&page=$page&$param");


// �ֹ�����
}else if($mode == "delete"){

	$i=0;
	$array_selorder = explode("|",$selorder);
	while($array_selorder[$i]){
		$orderid = $array_selorder[$i];
		$sql = "delete from wiz_dayorder where orderid = '$orderid'";
		$result = mysql_query($sql,$connect) or error(mysql_error());

		$sql = "delete from wiz_basket where orderid = '$orderid'";
		$result = mysql_query($sql,$connect) or error(mysql_error());

		$sql = "delete from wiz_tax where orderid = '$orderid'";
		mysql_query($sql) or error(mysql_error());

		$i++;
	}

	complete("�ֹ��� �����Ͽ����ϴ�.","order_list.php?page=$page&$param");


// �ֹ����� �ϰ�����
}else if($mode == "batchStatus"){

	$i=0;
	$array_selorder = explode("|",$selorder);
	while($array_selorder[$i]){
		list($orderid, $old_status) = explode(":",$array_selorder[$i]);

		if(strcmp($old_status, "OC") && strcmp($old_status, "RC")) {
			changeStatus($orderid, $chg_status,$deliveryno[$i], $deliver_date[$i]);
		}

		$i++;
	}

	echo "<script>alert('�ֹ����¸� �����Ͽ����ϴ�.');opener.document.location.reload();self.close();</script>";

// ��ǰ ���
}else if($mode == "cancel"){

	if(!strcmp($orderstatus, "OR")) {

		$sql = "select wb.*, wo.reserve_use, wo.reserve_price, wo.deliver_price, wo.prd_price, wo.prd_price, wm.level, wp.optcode as p_optcode, wp.optcode2 as p_optcode2, wp.optvalue as p_optvalue
						from wiz_basket as wb LEFT JOIN wiz_dayorder as wo ON wb.orderid = wo.orderid
						LEFT JOIN wiz_member AS wm ON wo.send_id = wm.id
						LEFT JOIN wiz_dayproduct AS wp ON wb.prdcode = wp.prdcode
						where wb.idx = '$idx'";
		$result = mysql_query($sql,$connect) or error(mysql_error());
		$row = mysql_fetch_array($result);

		$reserve_price = $row[reserve_price] - ($row[prdreserve] * $row[amount]);
		$prd_price 		 = $row[prd_price] - ($row[prdprice] * $row[amount]);

		$discount_price = level_discount($row[level],$prd_price);			// ȸ������ [$discount_msg �޼��� ����]
		$deliver_price = deliver_price($prd_price, $oper_info);				// ��ۺ�
		$total_price = $prd_price + $deliver_price - $discount_price; // ��ü�����ݾ�

		// �ֹ� �������� �ش� �ݾ�, ������, ��ۺ�, ȸ�����κ� ����
		$sql = "update wiz_dayorder set reserve_price = '$reserve_price', deliver_price = '$deliver_price',
						discount_price = '$discount_price', prd_price = '$prd_price', total_price = '$total_price'
						where orderid = '$row[orderid]'";
		mysql_query($sql,$connect) or error(mysql_error());

		// basket ������Ʈ
		$sql = "update wiz_basket set status = 'CC', admin = '$wiz_admin[id]', bank = '$bank', account = '$account',
						acc_name = '$acc_name', reason = '$reason', memo = '$memo', repay = '$repay', ca_date = now(), cc_date = now()
						where idx = '$idx'";
		mysql_query($sql,$connect) or error(mysql_error());

   	complete("��ǰ�� ��ҵǾ����ϴ�.","order_info.php?orderid=$row[orderid]&page=$page&$param");

	} else {

		// basket ������Ʈ
		$sql = "update wiz_basket set status = 'CA', admin = '$wiz_admin[id]', bank = '$bank', account = '$account',
						acc_name = '$acc_name', reason = '$reason', memo = '$memo', repay = '$repay', ca_date = now()
						where idx = '$idx'";
		mysql_query($sql,$connect) or error(mysql_error());

   	complete("��ǰ�� ��ҿ�û�� �Ǿ����ϴ�. ��ǰ��Ҹ�Ͽ��� Ȯ���Ͻ� �� �ֽ��ϴ�.","order_info.php?orderid=$orderid&page=$page&$param");

	}

// ������� ���
} else if(!strcmp($mode, "cancel_status")){

	if(!strcmp($chg_status, "CC")) {

			$sql = "select wb.*, wo.reserve_use, wo.reserve_price, wo.deliver_price, wo.prd_price, wo.prd_price, wo.send_id, wo.status as o_status, wm.level, wp.optcode as p_optcode, wp.optcode2 as p_optcode2, wp.optvalue as p_optvalue, wp.opt_use
							from wiz_basket as wb LEFT JOIN wiz_dayorder as wo ON wb.orderid = wo.orderid
							LEFT JOIN wiz_member AS wm ON wo.send_id = wm.id
							LEFT JOIN wiz_dayproduct AS wp ON wb.prdcode = wp.prdcode
							where wb.idx = '$idx'";
			$result = mysql_query($sql,$connect) or error(mysql_error());
			$row = mysql_fetch_array($result);

		if(!strcmp($row[status], "CC")) {
			error("�̹� ���ó���� ��ǰ�Դϴ�.");
		} else {

			$reserve_price = $row[reserve_price] - ($row[prdreserve] * $row[amount]);
			$prd_price 		 = $row[prd_price] - ($row[prdprice] * $row[amount]);

			$discount_price = level_discount($row[level],$prd_price);			// ȸ������ [$discount_msg �޼��� ����]
			$deliver_price = deliver_price($prd_price, $oper_info);				// ��ۺ�
			$total_price = $prd_price + $deliver_price - $discount_price; // ��ü�����ݾ�

			// �ֹ� �������� �ش� �ݾ�, ������, ��ۺ�, ȸ�����κ� ����
			$sql = "update wiz_dayorder set reserve_price = '$reserve_price', deliver_price = '$deliver_price',
							discount_price = '$discount_price', prd_price = '$prd_price', total_price = '$total_price'
							where orderid = '$row[orderid]'";
			mysql_query($sql,$connect) or error(mysql_error());

			// ��ǰ ���
			// �ֹ������� ��츦 �����ϰ� �������
			if(strcmp($row[o_status], "OR")) {
				// �ɼǺ� ������ ���� ��ǰ�̶�� ��ü ��� ����
				if(strcmp($row[opt_use], "Y")){

					if(!strcmp($row[shortage], "S")) {
						$sql = "update wiz_dayproduct set cancelcnt = cancelcnt + 1, stock = stock + $row[amount] where prdcode = '$row[prdcode]'";
						$result = mysql_query($sql) or die(mysql_error());
					} else {
						$sql = "update wiz_dayproduct set cancelcnt = cancelcnt + 1 where prdcode = '$row[prdcode]'";
						$result = mysql_query($sql) or die(mysql_error());
					}

				// �ɼǺ� ������ ��ǰ
				}else{

					$opt_list_app = "";

					$opt1_arr = explode("^", $row[p_optcode]);
					$opt2_arr = explode("^", $row[p_optcode2]);
					$opt_tmp = explode("^^", $row[p_optvalue]);

					list($optcode1, $optcode2) = explode("/", $row[optcode]);

					$opt1_cnt = count($opt1_arr) - 1;
					$opt2_cnt = count($opt2_arr) - 1;

					if($opt1_cnt < 1) $opt1_cnt = 1;
					if($opt2_cnt < 1) $opt2_cnt = 1;

					$no = 0;
					for($ii = 0; $ii < $opt1_cnt; $ii++) {
						for($jj = 0; $jj < $opt2_cnt; $jj++) {
							list($price, $reserve, $stock) = explode("^", $opt_tmp[$no]);

							if(!empty($tmp_optvalue[$row[prdcode]][$no])) $stock = $tmp_optvalue[$row[prdcode]][$no];

							if(!strcmp($optcode1, $opt1_arr[$ii]) && !strcmp($optcode2, $opt2_arr[$jj])) {
								$stock = $stock + $row[amount];
							}

							$opt_list_app .= $price."^".$reserve."^".$stock."^^";

							$tmp_optvalue[$row[prdcode]][$no] = $stock;
							$no++;
						}
					}

					$sql = "update wiz_dayproduct set cancelcnt = cancelcnt + 1, optvalue = '$opt_list_app' where prdcode = '$row[prdcode]'";
					mysql_query($sql,$connect) or error(mysql_error());

				}
			}
		}

		// ���������� ȯ�� �� ������ ����
		if(!strcmp($row[repay], "R")) {
			$sql = "insert into wiz_reserve(idx,memid,reservemsg,reserve,orderid,wdate)
							values('', '$row[send_id]', '��ǰȯ�� ������','".($row[prdprice] * $row[amount])."','$row[orderid]',now())";
			mysql_query($sql,$connect) or error(mysql_error());
		}

		$cc_date_sql = ", cc_date = now() ";

	}

//	$sql = "update wiz_basket set status = '$chg_status' $cc_date_sql where idx = '$idx'";
	mysql_query($sql,$connect) or error(mysql_error());

	// ���ݰ�꼭 �ݾ� ����
	$supp_price = intval($total_price/1.1);
	$tax_price = $total_price - $supp_price;

	$prd_info = "";

	$b_sql = "select prdname, prdprice, amount from wiz_basket where orderid = '$row[orderid]' and status != 'CC' order by idx asc";
	$b_result = mysql_query($b_sql,$connect) or error(mysql_error());
	while($b_row = mysql_fetch_array($b_result)) {
		$prd_info .= $b_row[prdname]."^".$b_row[prdprice]."^".$b_row[amount]."^^";
	}

	$sql = "update wiz_tax set supp_price='$supp_price', tax_price='$tax_price', prd_info='$prd_info' where orderid = '$row[orderid]'";
	mysql_query($sql,$connect) or error(mysql_error());


 	complete("����Ǿ����ϴ�.","cancel_list.php?page=$page&$param");

// ������� ����
} else if(!strcmp($mode, "delete_basket")) {

	$idx_list = explode("|", $selbasket);
	for($ii = 0; $ii < count($idx_list); $ii++) {
		$idx = $idx_list[$ii];

		$sql = "delete from wiz_basket where idx = '$idx'";
		mysql_query($sql,$connect) or error(mysql_error());
	}

  complete("�����Ǿ����ϴ�.","cancel_list.php?page=$page&$param");

// ��һ��� �ϰ�����
}else if($mode == "batchStatusBasket"){

	$i=0;
	$array_selbasket = explode("|",$selbasket);
	while($array_selbasket[$i]){
		$idx = $array_selbasket[$i];

		$sql = "select wb.*, wo.reserve_use, wo.reserve_price, wo.deliver_price, wo.prd_price, wo.prd_price, wo.send_id, wm.level, wp.optcode as p_optcode, wp.optcode2 as p_optcode2, wp.optvalue as p_optvalue
						from wiz_basket as wb LEFT JOIN wiz_dayorder as wo ON wb.orderid = wo.orderid
						LEFT JOIN wiz_member AS wm ON wo.send_id = wm.id
						LEFT JOIN wiz_dayproduct AS wp ON wb.prdcode = wp.prdcode
						where wb.idx = '$idx'";
		$result = mysql_query($sql,$connect) or error(mysql_error());
		$row = mysql_fetch_array($result);

		if(!strcmp($row[status], "CC")) {
		} else {
			if(!strcmp($chg_status, "CC")) {
				$reserve_price = $row[reserve_price] - ($row[prdreserve] * $row[amount]);
				$prd_price 		 = $row[prd_price] - ($row[prdprice] * $row[amount]);

				$discount_price = level_discount($row[level],$prd_price);			// ȸ������ [$discount_msg �޼��� ����]
				$deliver_price = deliver_price($prd_price, $oper_info);				// ��ۺ�
				$total_price = $prd_price + $deliver_price - $discount_price; // ��ü�����ݾ�

				// �ֹ� �������� �ش� �ݾ�, ������, ��ۺ�, ȸ�����κ� ����
				$sql = "update wiz_dayorder set reserve_price = '$reserve_price', deliver_price = '$deliver_price',
								discount_price = '$discount_price', prd_price = '$prd_price', total_price = '$total_price'
								where orderid = '$row[orderid]'";
				mysql_query($sql,$connect) or error(mysql_error());

				// ��ǰ ���
				// �ɼǺ� ������ ���� ��ǰ�̶�� ��ü��� ����
				if($row[optcode] == ""){

					$sql = "update wiz_dayproduct set cancelcnt = cancelcnt + 1 , comcnt = comcnt - 1, stock = stock + $row[amount] where prdcode = '$row[prdcode]'";
					mysql_query($sql,$connect) or error(mysql_error());

				// �ɼǺ� ������ ��ǰ
				}else{

					$opt_list_app = "";

					$opt1_arr = explode("^", $row[p_optcode]);
					$opt2_arr = explode("^", $row[p_optcode2]);
					$opt_tmp = explode("^^", $row[p_optvalue]);

					list($optcode1, $optcode2) = explode("/", $row[optcode]);

					$opt1_cnt = count($opt1_arr) - 1;
					$opt2_cnt = count($opt2_arr) - 1;

					if($opt1_cnt < 1) $opt1_cnt = 1;
					if($opt2_cnt < 1) $opt2_cnt = 1;

					$no = 0;
					for($ii = 0; $ii < $opt1_cnt; $ii++) {
						for($jj = 0; $jj < $opt2_cnt; $jj++) {
							list($price, $reserve, $stock) = explode("^", $opt_tmp[$no]);

							if(!empty($tmp_optvalue[$row[prdcode]][$no])) $stock = $tmp_optvalue[$row[prdcode]][$no];

							if(!strcmp($optcode1, $opt1_arr[$ii]) && !strcmp($optcode2, $opt2_arr[$jj])) {
								$stock = $stock + $row[amount];
							}

							$opt_list_app .= $price."^".$reserve."^".$stock."^^";

							$tmp_optvalue[$row[prdcode]][$no] = $stock;
							$no++;
						}
					}
					$sql = "update wiz_dayproduct set cancelcnt = cancelcnt + 1 , comcnt = comcnt - 1, optvalue = '$opt_list_app' where prdcode = '$row[prdcode]'";
					mysql_query($sql,$connect) or error(mysql_error());

				}

				$cc_date_sql = ", cc_date = now() ";
			}

			// ���������� ȯ�� �� ������ ����
			if(!strcmp($row[repay], "R")) {
				$sql = "insert into wiz_reserve(idx,memid,reservemsg,reserve,orderid,wdate)
								values('', '$row[send_id]', '��ǰȯ�� ������','".($row[prdprice] * $row[amount])."','$row[orderid]',now())";
				mysql_query($sql,$connect) or error(mysql_error());
			}
			$sql = "update wiz_basket set status = '$chg_status' $cc_date_sql where idx = '$idx'";
			mysql_query($sql,$connect) or error(mysql_error());

			// ���ݰ�꼭 �ݾ� ����
			$supp_price = intval($total_price/1.1);
			$tax_price = $total_price - $supp_price;

			$prd_info = "";

			$b_sql = "select prdname, prdprice, amount from wiz_basket where orderid = '$row[orderid]' and status != 'CC' order by idx asc";
			$b_result = mysql_query($b_sql) or error(mysql_error());
			while($b_row = mysql_fetch_array($b_result)) {
				$prd_info .= $b_row[prdname]."^".$b_row[prdprice]."^".$b_row[amount]."^^";
			}

			$sql = "update wiz_tax set supp_price='$supp_price', tax_price='$tax_price', prd_info='$prd_info' where orderid = '$row[orderid]'";
			mysql_query($sql,$connect) or error(mysql_error());

		}

		$i++;
	}

	echo "<script>alert('���¸� �����Ͽ����ϴ�.\\n\\n��ҿϷ�� ���� ���°� ������� �ʽ��ϴ�.');opener.document.location.reload();self.close();</script>";

// ���ݰ�꼭 ��� > ����
} else if(!strcmp($mode, "tax_status")) {

	include_once "../../inc/shop_info.inc";

	$shop_name 		= $shop_info->com_name;
	$shop_owner 	= $shop_info->com_owner;
	$shop_num			= $shop_info->com_num;
	$shop_address	= $shop_info->com_address;
	$shop_kind 		= $shop_info->com_kind;
	$shop_class		= $shop_info->com_class;
	$shop_tel			= $shop_info->com_tel;
	$shop_email		= $shop_info->shop_email;

  if(!strcmp($tax_pub, "Y") && strcmp($tmp_tax_pub, "Y")) $tax_pub_sql = ", wdate = now(), shop_name='$shop_name', shop_owner='$shop_owner', shop_num='$shop_num', shop_address='$shop_address', shop_kind='$shop_kind', shop_class='$shop_class', shop_tel='$shop_tel', shop_email='$shop_email' ";

	$sql = "update wiz_tax set tax_pub = '$tax_pub' $tax_pub_sql where orderid = '$orderid'";
	mysql_query($sql,$connect) or error(mysql_error());

 	complete("����Ǿ����ϴ�.","tax_list.php?page=$page&$param");

// ���ݰ�꼭 ����
} else if(!strcmp($mode, "tax_delete")) {

	$orderid_list = explode("|", $selvalue);
	for($ii = 0; $ii < count($orderid_list); $ii++) {
		$orderid = $orderid_list[$ii];
		$sql = "delete from wiz_tax where orderid = '$orderid'";
		mysql_query($sql,$connect) or error(mysql_error());

		$sql = "update wiz_dayorder set tax_type = 'N' where orderid = '$orderid'";
		mysql_query($sql,$connect) or error(mysql_error());
	}

  complete("�����Ǿ����ϴ�.","tax_list.php?page=$page&$param");

// ���ݰ�꼭 ��� > �����ϰ�����
} else if(!strcmp($mode, "batchStatusTax")) {

	include_once "../../inc/shop_info.inc";

	$shop_name 		= $shop_info->com_name;
	$shop_owner 	= $shop_info->com_owner;
	$shop_num			= $shop_info->com_num;
	$shop_address	= $shop_info->com_address;
	$shop_kind 		= $shop_info->com_kind;
	$shop_class		= $shop_info->com_class;
	$shop_tel			= $shop_info->com_tel;
	$shop_email		= $shop_info->shop_email;

  if(!strcmp($tax_pub, "Y") && strcmp($tmp_tax_pub, "Y")) $tax_pub_sql = ", wdate = now(), shop_name='$shop_name', shop_owner='$shop_owner', shop_num='$shop_num', shop_address='$shop_address', shop_kind='$shop_kind', shop_class='$shop_class', shop_tel='$shop_tel', shop_email='$shop_email' ";

	$orderid_list = explode("|", $selvalue);
	for($ii = 0; $ii < count($orderid_list); $ii++) {

		$orderid = $orderid_list[$ii];

		$sql = "update wiz_tax set tax_pub = '$tax_pub' $tax_pub_sql where orderid = '$orderid'";
		mysql_query($sql,$connect) or error(mysql_error());

	}

  echo "<script>alert('����Ǿ����ϴ�.');opener.document.location.reload();self.close();</script>";

}
?>