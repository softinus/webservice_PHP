<?
    /*
     * [����������û ������(ActiveX)]
     *
     * �⺻ �Ķ���͸� ���õǾ� ������, ������ �ʿ��Ͻ� �Ķ���ʹ� �����޴����� �����Ͻþ� �߰��Ͻñ� �ٶ��ϴ�.
     * hashdata ��ȣȭ�� �ŷ� �������� �������� ����Դϴ�.
     *
     */


    /*
     * 1. �⺻�������� ����
     *
     * �����⺻������ �����Ͽ� �ֽñ� �ٶ��ϴ�.
     */
     if(!strcmp($oper_info->pay_test, "Y")) {//�׽�Ʈ
			$oper_info->pay_id = "tanywiz";
			$oper_info->pay_key = "6f51f77a2b2222d642e20e445101a35f";
			$platform	= "test";             //LG������ �������� ����(test:�׽�Ʈ, service:����)
			$mid = $oper_info->pay_id;
			$pay_key = $oper_info->pay_key;
		}else{//�ǰŷ�
			$platform	= "service";
			$mid = $oper_info->pay_id;
			$pay_key = $oper_info->pay_key;
		}
		$LGD_MID 		= $mid;			//LG������ �������� ����(test:�׽�Ʈ, service:����)
		$LGD_MERTKEY	= $pay_key;		//����MertKey(mertkey�� ���������� -> ������� -> ���������������� Ȯ���ϽǼ� �ֽ��ϴ�)

		$LGD_OID				=	$order_info->orderid;
		$LGD_AMOUNT			=	$order_info->total_price;
		$LGD_TIMESTAMP		=	time();
		$LGD_BUYER        = $order_info->send_name;            //�����ڸ�
    	$LGD_PRODUCTINFO  = $payment_prdname;      //��ǰ��
    	$LGD_BUYEREMAIL   = $order_info->send_email;       //������ �̸���
    	$LGD_CUSTOM_SKIN  = "red";      //�������� ����â ��Ų (red, blue, cyan, green, yellow)
    	$LGD_BUYERID		= $order_info->send_id; //������ ���̵�
    	/////////////////
		//������� ���//
		/////////////////
		switch($order_info->pay_method){
				case "PC"://�ſ�ī��
					$_paymethod = "SC0010";break;
				case "PN"://������ü
					$_paymethod = "SC0030";break;
				case "PV"://�������
					$_paymethod = "SC0040";break;
				case "PH";//�޴���
					$_paymethod = "SC0060";break;
		}
    	$LGD_CUSTOM_FIRSTPAY = $_paymethod; //�ʱ� ���� ���
    	$LGD_CUSTOM_USABLEPAY = $_paymethod;	//���� ���� ����

		//10���� �̻�� ����ũ�� ����,�� �����ڴܿ��� ����ũ�� ��뿩�� Y �� ���Ұ��
		if($oper_info->pay_escrow=='Y'){
			$payescrow="Y";
			if($order_info->pay_method=='PC'||$order_info->pay_method=='PH'){
				$payescrow="N";
			}
		}

    /*
     * 2. ������� DBó�� ������ ��ũ ����
     *
     * LGD_NOTEURL : ����������� ó��(DB) ������ URL�� �Ѱ��ּ���.
     * LGD_CASNOTEURL : �������(������) ���� ������ �Ͻô� ��� �Ʒ� LGD_CASNOTEURL �� �����Ͽ� �ֽñ� �ٶ��ϴ�.
     */

    $LGD_NOTEURL            = "http://".$_SERVER["HTTP_HOST"]."/shop/dacom/order_update.php";          //����������� ó��(DB) ������(URL�� ������ �ּ���)
    $LGD_CASNOTEURL			= "http://".$_SERVER["HTTP_HOST"]."/shop/dacom/order_update_vir.php";		//�������ϰ�쿡 ��µǴ� ������

    /*
     * 3. hashdata ��ȣȭ (�������� ������)
     *
     * hashdata ��ȣȭ ����( LGD_MID + LGD_OID + LGD_AMOUNT + LGD_TIMESTAMP + LGD_MERTKEY )
     * LGD_MID : �������̵�
     * LGD_OID : �ֹ���ȣ
     * LGD_AMOUNT : �ݾ�
     * LGD_TIMESTAMP : Ÿ�ӽ�����
     * LGD_MERTKEY : ����Ű(mertkey)
     *
     * hashdata ������ ����
     * LG�����޿��� �߱��� ����Ű(MertKey)�� �ݵ�� �Է��� �ֽñ� �ٶ��ϴ�.
     */
    $LGD_HASHDATA = md5($LGD_MID.$LGD_OID.$LGD_AMOUNT.$LGD_TIMESTAMP.$LGD_MERTKEY);
?>
<script language = 'javascript'>
<!--
/*
 * ������û �� ���ȭ�� ó��
 */

function doPay_ActiveX(){
    ret = xpay_check(document.getElementById('LGD_PAYINFO'), '<?= $platform ?>');

    if (ret=="00"){     //ActiveX �ε� ����
        var LGD_RESPCODE        = dpop.getData('LGD_RESPCODE');       //����ڵ�
        var LGD_RESPMSG         = dpop.getData('LGD_RESPMSG');        //����޼���

        if( "0000" == LGD_RESPCODE ) { //��������
	        var LGD_TID             = dpop.getData('LGD_TID');            //LG������ �ŷ�KEY
	        var LGD_PAYTYPE         = dpop.getData('LGD_PAYTYPE');        //��������
	        var LGD_PAYDATE         = dpop.getData('LGD_PAYDATE');        //��������
	        var LGD_FINANCECODE     = dpop.getData('LGD_FINANCECODE');    //��������ڵ�
	        var LGD_FINANCENAME     = dpop.getData('LGD_FINANCENAME');    //��������̸�
	        var LGD_NOTEURL_RESULT  = dpop.getData('LGD_NOTEURL_RESULT'); //����DBó��(LGD_NOTEURL)��� ('OK':����,�׿�:����)
	        var LGD_OID    			  = dpop.getData('LGD_OID');    //�ֹ���ȣ
	        var LGD_FINANCEAUTHNUM  = dpop.getData('LGD_FINANCEAUTHNUM');    //��������̸�

	        //�޴����� ������� �Ķ���ͳ����� �����Ͻþ� �ʿ��Ͻ� �Ķ���͸� �߰��Ͽ� ����Ͻñ� �ٶ��ϴ�.

            var msg = "������� : " + LGD_RESPMSG + "\n";
            msg += "LG�����ްŷ�TID : " + LGD_TID +"\n\n";
            if( LGD_NOTEURL_RESULT != "null" ) msg += LGD_NOTEURL_RESULT +"\n";
            //alert(msg);
            /*
             * �������� ȭ�� ó��
             */
             document.location.replace("/shop/order_ok.php?orderid=" + LGD_OID + "&rescode=0000&pay_method=<?=$order_info->pay_method?>&resmsg=" + LGD_NOTEURL_RESULT);
        } else { //��������
             alert("������ �����Ͽ����ϴ�. " + LGD_RESPMSG);
            /*
             * �������� ȭ�� ó��
             */
        }
    } else {
        alert("LG������ ���ڰ����� ���� ActiveX ��ġ ����");
    }
}

//-->
</script>

</head>
<body>
<table border=0 cellpadding=0 cellspacing=0 width=100%>
<form method="post" id="LGD_PAYINFO">

<input type="hidden" name="LGD_CUSTOM_FIRSTPAY" value="<?= $LGD_CUSTOM_FIRSTPAY ?>">         <!-- �ʱ�������� -->
<input type="hidden" name="LGD_CUSTOM_USABLEPAY" value="<?= $LGD_CUSTOM_USABLEPAY ?>">         <!-- ���ð������� -->
<input type="hidden" name="LGD_MID"             value="<?= $LGD_MID ?>">                		<!-- �������̵� -->
<input type="hidden" name="LGD_OID"             value="<?= $LGD_OID ?>">                		<!-- �ֹ���ȣ -->
<input type="hidden" name="LGD_BUYER"           value="<?= $LGD_BUYER ?>">           			<!-- ������ -->
<input type="hidden" name="LGD_BUYERID"         value="<?= $LGD_BUYERID ?>">           		<!-- ������ID -->
<input type="hidden" name="LGD_PRODUCTINFO"     value="<?= $LGD_PRODUCTINFO ?>">     			<!-- ��ǰ���� -->
<input type="hidden" name="LGD_AMOUNT"          value="<?= $LGD_AMOUNT ?>">             		<!-- �����ݾ� -->
<input type="hidden" name="LGD_BUYEREMAIL"      value="<?= $LGD_BUYEREMAIL ?>">         		<!-- ������ �̸��� -->
<input type="hidden" name="LGD_CUSTOM_SKIN"     value="<?= $LGD_CUSTOM_SKIN ?>">        		<!-- ����â SKIN -->
<input type="hidden" name="LGD_TIMESTAMP"       value="<?= $LGD_TIMESTAMP ?>">          		<!-- Ÿ�ӽ����� -->
<input type="hidden" name="LGD_HASHDATA"        value="<?= $LGD_HASHDATA ?>">           		<!-- �ؽ��� -->
<input type="hidden" name="LGD_NOTEURL"         value="<?= $LGD_NOTEURL ?>">         			<!-- �������ó��_URL(LGD_NOTEURL) -->
<input type="hidden" name="LGD_VERSION"         value="PHP_XPay_Lite_1.0">						<!-- �������� (�������� ������) -->
<!-- ����ũ�� ���� �Ķ���� ���� ���� -->
<input type=hidden name=LGD_ESCROW_GOODID			value='<?=$order_info->orderid?>'>
<input type=hidden name=LGD_ESCROW_GOODNAME 		value='<?=$order_info->orderid?>'>
<input type=hidden name=LGD_ESCROW_GOODCODE 		value='<?=$order_info->orderid?>'>
<input type=hidden name=LGD_ESCROW_UNITPRICE		value='<?=$order_info->total_price?>'>
<input type=hidden name=LGD_ESCROW_QUANTITY 		value='1'>

<input type=hidden name=LGD_ESCROW_ZIPCODE 		value='<?=$order_info->rece_post?>'>
<input type=hidden name=LGD_ESCROW_ADDRESS1 		value='<?=$order_info->rece_address?>' >
<input type=hidden name=LGD_ESCROW_ADDRESS2 		value='' >
<input type=hidden name=LGD_ESCROW_BUYERPHONE 	value='<?=$order_info->rece_hphone?>' >

<input type=hidden name=escrowflag					value='<?=$oper_info->pay_escrow?>'>
<!-- ����ũ�� ���� �Ķ���� ���� �� -->

<!-- �������(������) ���������� �Ͻô� ���  �Ҵ�/�Ա� ����� �뺸�ޱ� ���� �ݵ�� LGD_CASNOTEURL ������ LG �����޿� �����ؾ� �մϴ� . -->
<input type="hidden" name="LGD_CASNOTEURL"     	value="<?= $LGD_CASNOTEURL ?>">
<!-- ������� NOTEURL -->


<tr>
    <td style="padding:15 0 20 0">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<!--tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t03.gif"></td></tr-->
		<tr><td height=3 bgcolor=#999999></td></tr>
		<tr><td bgcolor=#F9F9F9 style="padding:10">

			<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
			  <tr>
			    <td style="padding:5">
				   <table border=0 cellpadding=0 cellspacing=0>
					  <tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td width=100>�������</td>
						 <td>: <?=pay_method($pay_method)?></td></tr>
					  <tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td>�����ݾ�</td>
						 <td>: <span class="price"><?=number_format($order_info->total_price)?>��</span></td>
					  </tr>
					</table>
			    </td>
			  </tr>
			</table>

		</td></tr>
		</table>
    </td>
  </tr>
  <tr><td height=1 background="/images/dot.gif"></td></tr>
  <tr>
    <td height=80 align=center>
	    <img src="/images/but_pay.gif" onclick="javascript:doPay_ActiveX()" style="cursor:hand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <a href="/"><img src="/images/but_cancel.gif" border=0></a>
     </td>
  </tr>
</form>
</table>


</body>
<!--  xpay.js�� �ݵ�� body �ؿ� �νñ� �ٶ��ϴ�. -->
<script language="javascript" src="<?= $_SERVER['SERVER_PORT']!=443?"http":"https" ?>://xpay.lgdacom.net<?=($platform == "test")?":7080":""?>/xpay/js/xpay.js" type="text/javascript"></script>
</html>

