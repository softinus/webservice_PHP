<?php
	include "../../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
	include "../../inc/util.inc"; 					// ��ƿ ���̺귯��
	include "../../inc/oper_info.inc"; 		// � ����
    /*
     * [���� �������ó��(DB) ������]
     *
     * 1) ������ ������ ���� hashdata�� ������ �ݵ�� �����ϼž� �մϴ�.
     *
     */
    $LGD_RESPCODE            = $HTTP_POST_VARS["LGD_RESPCODE"];             // �����ڵ�: 0000(����) �׿� ����
    $LGD_RESPMSG             = $HTTP_POST_VARS["LGD_RESPMSG"];              // ����޼���
    $LGD_MID                 = $HTTP_POST_VARS["LGD_MID"];                  // �������̵�
    $LGD_OID                 = $HTTP_POST_VARS["LGD_OID"];                  // �ֹ���ȣ
    $LGD_AMOUNT              = $HTTP_POST_VARS["LGD_AMOUNT"];               // �ŷ��ݾ�
    $LGD_TID                 = $HTTP_POST_VARS["LGD_TID"];                  // �������� �ο��� �ŷ���ȣ
    $LGD_PAYTYPE             = $HTTP_POST_VARS["LGD_PAYTYPE"];              // ���������ڵ�
    $LGD_PAYDATE             = $HTTP_POST_VARS["LGD_PAYDATE"];              // �ŷ��Ͻ�(�����Ͻ�/��ü�Ͻ�)
    $LGD_HASHDATA            = $HTTP_POST_VARS["LGD_HASHDATA"];             // �ؽ���
    $LGD_FINANCECODE         = $HTTP_POST_VARS["LGD_FINANCECODE"];          // ��������ڵ�(�����ڵ�)
    $LGD_FINANCENAME         = $HTTP_POST_VARS["LGD_FINANCENAME"];          // ��������̸�(�����̸�)
    $LGD_ESCROWYN            = $HTTP_POST_VARS["LGD_ESCROWYN"];             // ����ũ�� ���뿩��
    $LGD_TIMESTAMP           = $HTTP_POST_VARS["LGD_TIMESTAMP"];            // Ÿ�ӽ�����
    $LGD_ACCOUNTNUM          = $HTTP_POST_VARS["LGD_ACCOUNTNUM"];           // ���¹�ȣ(�������Ա�)
    $LGD_CASTAMOUNT          = $HTTP_POST_VARS["LGD_CASTAMOUNT"];           // �Ա��Ѿ�(�������Ա�)
    $LGD_CASCAMOUNT          = $HTTP_POST_VARS["LGD_CASCAMOUNT"];           // ���Աݾ�(�������Ա�)
    $LGD_CASFLAG             = $HTTP_POST_VARS["LGD_CASFLAG"];              // �������Ա� �÷���(�������Ա�) - 'R':�����Ҵ�, 'I':�Ա�, 'C':�Ա����
    $LGD_CASSEQNO            = $HTTP_POST_VARS["LGD_CASSEQNO"];             // �Աݼ���(�������Ա�)
    $LGD_CASHRECEIPTNUM      = $HTTP_POST_VARS["LGD_CASHRECEIPTNUM"];       // ���ݿ����� ���ι�ȣ
    $LGD_CASHRECEIPTSELFYN   = $HTTP_POST_VARS["LGD_CASHRECEIPTSELFYN"];    // ���ݿ����������߱������� Y: �����߱��� ����, �׿� : ������
    $LGD_CASHRECEIPTKIND     = $HTTP_POST_VARS["LGD_CASHRECEIPTKIND"];      // ���ݿ����� ���� 0: �ҵ������ , 1: ����������

    /*
     * ��������
     */
    $LGD_BUYER               = $HTTP_POST_VARS["LGD_BUYER"];                // ������
    $LGD_PRODUCTINFO         = $HTTP_POST_VARS["LGD_PRODUCTINFO"];          // ��ǰ��
    $LGD_BUYERID             = $HTTP_POST_VARS["LGD_BUYERID"];              // ������ ID
    $LGD_BUYERADDRESS        = $HTTP_POST_VARS["LGD_BUYERADDRESS"];         // ������ �ּ�
    $LGD_BUYERPHONE          = $HTTP_POST_VARS["LGD_BUYERPHONE"];           // ������ ��ȭ��ȣ
    $LGD_BUYEREMAIL          = $HTTP_POST_VARS["LGD_BUYEREMAIL"];           // ������ �̸���
    $LGD_BUYERSSN            = $HTTP_POST_VARS["LGD_BUYERSSN"];             // ������ �ֹι�ȣ
    $LGD_PRODUCTCODE         = $HTTP_POST_VARS["LGD_PRODUCTCODE"];          // ��ǰ�ڵ�
    $LGD_RECEIVER            = $HTTP_POST_VARS["LGD_RECEIVER"];             // ������
    $LGD_RECEIVERPHONE       = $HTTP_POST_VARS["LGD_RECEIVERPHONE"];        // ������ ��ȭ��ȣ
    $LGD_DELIVERYINFO        = $HTTP_POST_VARS["LGD_DELIVERYINFO"];         // �����

    /*
     * hashdata ������ ���� mertkey�� ���������� -> ������� -> ���������������� Ȯ���ϽǼ� �ֽ��ϴ�.
     * LG�����޿��� �߱��� ����Ű�� �ݵ�ú����� �ֽñ� �ٶ��ϴ�.
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


    $LGD_HASHDATA2 			 = md5($LGD_MID.$LGD_OID.$LGD_AMOUNT.$LGD_RESPCODE.$LGD_TIMESTAMP.$LGD_MERTKEY);

    /*
     * ���� ó����� ���ϸ޼���
     *
     * OK  : ���� ó����� ����
     * �׿� : ���� ó����� ����
     *
     * �� ���ǻ��� : ������ 'OK' �����̿��� �ٸ����ڿ��� ���ԵǸ� ����ó�� �ǿ��� �����Ͻñ� �ٶ��ϴ�.
     */
    $resultMSG = "������� ���� DBó��(LGD_CASNOTEURL) ������� �Է��� �ֽñ� �ٶ��ϴ�.";



	// �ֹ�����
	$sql = "SELECT * FROM wiz_dayorder WHERE orderid = '$LGD_OID'";
	$result = mysql_query($sql) or error(mysql_error());
	$order_info = mysql_fetch_object($result);

    if ( $LGD_HASHDATA2 == $LGD_HASHDATA ) { //�ؽ��� ������ �����̸�
        if ( "0000" == $LGD_RESPCODE ){ //������ �����̸�
        	if( "R" == $LGD_CASFLAG ) {
		         //if( ������ �Ҵ� ���� ����ó����� ���� ) $resultMSG = "OK";
		         ////////////////////////////////////////////////////////////////////////////
				 	/////////////////////// �ֹ����� ������Ʈ //////////////////////////////////
				 	////////////////////////////////////////////////////////////////////////////

					$_Payment[status]		= "OR"; //��������
					$_Payment[orderid]	= $LGD_OID; //�ֹ���ȣ
					$_Payment[paymethod]	= $order_info->pay_method; //��������
					$_Payment[ttno]		= $LGD_TID; //�ŷ���ȣ
					$_Payment[bankkind]	= $LGD_FINANCECODE; //�����ڵ�
					$_Payment[accountno]	= $LGD_ACCOUNTNUM; //���¹�ȣ
					$_Payment[pgname]		= "dacom";//PG�� ����
					$_Payment[es_check]	= $oper_info->pay_escrow;//����ũ�� ��뿩��
					$_Payment[es_stats]	= "IN";//����ũ�� ����(���������� �⺻���� �߼�)
					$_Payment[tprice]		=	$LGD_AMOUNT; //�����ݾ�

					//foreach($_Payment as $key => $value){	$logs .="$key : $value\r";	}
					//@make_log("dacom_log.txt","\r----------order_update_vir.php start--------\r".$logs."\r-------order_update_vir.php start--------\r");
					//����ó��(���º���,�ֹ� ������Ʈ)
					Exe_payment($_Payment);
					// ������ ó�� : ������ ���� ������ ����
					Exe_reserve();
					// ���ó��
					//Exe_stock();
					// ��ٱ��� ����
			    	Exe_delbasket();
					$resp = true;
					$resultMSG ="OK";

        	}else if( "I" == $LGD_CASFLAG ) {
 	            //if( ������ �Ա� ���� ����ó����� ���� ) $resultMSG = "OK";
            	////////////////////////////////////////////////////////////////////////////
				 	/////////////////////// �ֹ����� ������Ʈ //////////////////////////////////
				 	////////////////////////////////////////////////////////////////////////////

					$_Payment[status] = "OY"; //��������
					$_Payment[orderid] = $LGD_OID; //�ֹ���ȣ
					$_Payment[paymethod] = $order_info->pay_method; //��������
					$_Payment[ttno] = $LGD_OID; //�ŷ���ȣ
					$_Payment[bankkind] = $LGD_FINANCECODE; //�����ڵ�
					$_Payment[accountno] = $LGD_ACCOUNTNUM; //���¹�ȣ
					$_Payment[pgname] = "dacom";//PG�� ����
					$_Payment[es_check]	= $oper_info->pay_escrow;//����ũ�� ��뿩��
					$_Payment[es_stats]	= "IN";//����ũ�� ����(���������� �⺻���� �߼�)
					$_Payment[tprice]		=	$LGD_AMOUNT; //�����ݾ�

					//����ó��(���º���,�ֹ� ������Ʈ)
					Exe_payment($_Payment);
					// ������ ó�� : ������ ���� ������ ����
					Exe_reserve();
					// ���ó��
					Exe_stock();
					// ��ٱ��� ����
			    Exe_delbasket();
					$resp = true;
					$resultMSG ="OK";

        	}
        } else { //������ �����̸�
            /*
             * �ŷ����� ��� ���� ó��(DB) �κ�
             * ������� ó���� �����̸� "OK"
             */
            //if( �������� ����ó����� ���� ) $resultMSG = "OK";
        }
    } else { //�ؽ����� ������ �����̸�
        /*
         * hashdata���� ���� �α׸� ó���Ͻñ� �ٶ��ϴ�.
         */
        $resultMSG = "������� ���� DBó��(LGD_CASNOTEURL) �ؽ��� ������ �����Ͽ����ϴ�.";
    }

    echo $resultMSG;
?>
