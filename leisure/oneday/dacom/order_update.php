<?php
include "../../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../../inc/util.inc"; 					// ��ƿ ���̺귯��
include "../../inc/oper_info.inc"; 		// � ����
    $LGD_RESPCODE="";                         // �����ڵ�: 0000(����) �׿� ����
    $LGD_RESPMSG="";                          // ����޼���
    $LGD_HASHDATA="";                         // �ؽ���
    $LGD_TID="";                              // �������� �ο��� �ŷ���ȣ
    $LGD_MID="";                              // �������̵�
    $LGD_OID="";                              // �ֹ���ȣ
    $LGD_AMOUNT="";                           // �ŷ��ݾ�
    $LGD_PAYTYPE="";                          // ���������ڵ�
    $LGD_PAYDATE="";                          // �ŷ��Ͻ�(�����Ͻ�/��ü�Ͻ�)
    $LGD_FINANCECODE="";                      // ��������ڵ�(ī������/�����ڵ�)
    $LGD_FINANCENAME="";                      // ��������̸�(ī���̸�/�����̸�)
    $LGD_TIMESTAMP="";

    $LGD_FINANCEAUTHNUM="";                   // ���ι�ȣ(�ſ�ī��)
    $LGD_CARDNUM="";                          // ī���ȣ(�ſ�ī��)
    $LGD_CARDINSTALLMONTH="";                 // �Һΰ�����(�ſ�ī��)
    $LGD_CARDNOINTYN="";                      // �������Һο���(�ſ�ī��) - '1'�̸� �������Һ� '0'�̸� �Ϲ��Һ�
    $LGD_TRANSAMOUNT="";                      // ȯ������ݾ�(�ſ�ī��)
    $LGD_EXCHANGERATE="";                     // ȯ��(�ſ�ī��)

    $LGD_ACCOUNTNUM="";                       // ���¹�ȣ(������ü, �������Ա�)

    $LGD_PAYTELNUM="";                        // �޴�����ȣ(�޴���)

    $LGD_CASFLAG="";                          // �������Ա� �÷���(�������Ա�) - 'R':�����Ҵ�, 'I':�Ա�, 'C':�Ա����
    $LGD_CASTAMOUNT="";                       // �Ա��Ѿ�(�������Ա�)
    $LGD_CASCAMOUNT="";                       // ���Աݾ�(�������Ա�)
    $LGD_CASSEQNO="";                         // �Աݼ���(�������Ա�)
    $LGD_CASHRECEIPTNUM="";                   // ���ݿ����� ���ι�ȣ

    $LGD_CASHRECEIPTKIND="";                  // ���ݿ��������� (0: �ҵ������ , 1: ����������)
    $LGD_CASHRECEIPTSELFYN="";                // ���ݿ����������߱������� Y: �����߱��� ����, �׿� : ������
    $LGD_ESCROWYN="";

    /*
     * OKĳ����
     */
    $LGD_OCBSAVEPOINT = "";                   // OKĳ���� ��������Ʈ
    $LGD_OCBTOTALPOINT = "";                  // OKĳ���� ��������Ʈ
    $LGD_OCBUSABLEPOINT = "";                 // OKĳ���� ��밡�� ����Ʈ

    $LGD_RESPCODE = $HTTP_POST_VARS["LGD_RESPCODE"];
    $LGD_RESPMSG = $HTTP_POST_VARS["LGD_RESPMSG"];
    $LGD_HASHDATA = $HTTP_POST_VARS["LGD_HASHDATA"];
    $LGD_TID = $HTTP_POST_VARS["LGD_TID"];
    $LGD_MID = $HTTP_POST_VARS["LGD_MID"];
    $LGD_OID = $HTTP_POST_VARS["LGD_OID"];
    $LGD_AMOUNT = $HTTP_POST_VARS["LGD_AMOUNT"];
    $LGD_PAYTYPE = $HTTP_POST_VARS["LGD_PAYTYPE"];
    $LGD_PAYDATE = $HTTP_POST_VARS["LGD_PAYDATE"];
    $LGD_FINANCECODE = $HTTP_POST_VARS["LGD_FINANCECODE"];
    $LGD_FINANCENAME = $HTTP_POST_VARS["LGD_FINANCENAME"];
    $LGD_FINANCEAUTHNUM = $HTTP_POST_VARS["LGD_FINANCEAUTHNUM"];
    $LGD_CARDNUM = $HTTP_POST_VARS["LGD_CARDNUM"];
    $LGD_CARDNOINTYN = $HTTP_POST_VARS["LGD_CARDNOINTYN"];
    $LGD_TRANSAMOUNT = $HTTP_POST_VARS["LGD_TRANSAMOUNT"];
    $LGD_EXCHANGERATE = $HTTP_POST_VARS["LGD_EXCHANGERATE"];
    $LGD_ACCOUNTNUM = $HTTP_POST_VARS["LGD_ACCOUNTNUM"];
    $LGD_PAYTELNUM = $HTTP_POST_VARS["LGD_PAYTELNUM"];
    $LGD_CASFLAG = $HTTP_POST_VARS["LGD_CASFLAG"];
    $LGD_CASTAMOUNT = $HTTP_POST_VARS["LGD_CASTAMOUNT"];
    $LGD_CASCAMOUNT = $HTTP_POST_VARS["LGD_CASCAMOUNT"];
    $LGD_CASSEQNO= $HTTP_POST_VARS["LGD_CASSEQNO"];
    $LGD_CASHRECEIPTNUM= $HTTP_POST_VARS["LGD_CASHRECEIPTNUM"];
    $LGD_CASHRECEIPTKIND= $HTTP_POST_VARS["LGD_CASHRECEIPTKIND"];
    $LGD_CASHRECEIPTSELFYN= $HTTP_POST_VARS["LGD_CASHRECEIPTSELFYN"];
    $LGD_ESCROWYN= $HTTP_POST_VARS["LGD_ESCROWYN"];

    $LGD_CARDINSTALLMONTH = $HTTP_POST_VARS["LGD_CARDINSTALLMONTH"];
    $LGD_TIMESTAMP = $HTTP_POST_VARS["LGD_TIMESTAMP"];

    $LGD_OCBSAVEPOINT= $HTTP_POST_VARS["LGD_OCBSAVEPOINT"];
    $LGD_OCBTOTALPOINT= $HTTP_POST_VARS["LGD_OCBTOTALPOINT"];
    $LGD_OCBUSABLEPOINT= $HTTP_POST_VARS["LGD_OCBUSABLEPOINT"];

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


    $LGD_HASHDATA2 = md5($LGD_MID.$LGD_OID.$LGD_AMOUNT.$LGD_RESPCODE.$LGD_TIMESTAMP.$LGD_MERTKEY);

    /*
     * ���� ó����� ���ϸ޼���
     *
     * OK   : ���� ó����� ����
     * �׿� : ���� ó����� ����
     *
     * �� ���ǻ��� : ������ 'OK' �����̿��� �ٸ����ڿ��� ���ԵǸ� ����ó�� �ǿ��� �����Ͻñ� �ٶ��ϴ�.
     */
    $resultMSG = "������� ���� DBó��(NOTE_URL) ������� �Է��� �ֽñ� �ٶ��ϴ�.";

	// �ֹ�����
	$sql = "SELECT * FROM wiz_dayorder WHERE orderid = '$LGD_OID'";


	$result = mysql_query($sql) or error(mysql_error());
	$order_info = mysql_fetch_object($result);

    if ($LGD_HASHDATA2 == $LGD_HASHDATA) {      //�ؽ��� ������ �����ϸ�
        if($LGD_RESPCODE == "0000"){            //������ �����̸�

         ////////////////////////////////////////////////////////////////////////////
		 	/////////////////////// �ֹ����� ������Ʈ //////////////////////////////////
		 	////////////////////////////////////////////////////////////////////////////

			$_Payment[status] = "OY"; //��������
			$_Payment[orderid] = $LGD_OID; //�ֹ���ȣ
			$_Payment[paymethod] = $order_info->pay_method; //��������
			$_Payment[ttno] = $LGD_TID; //�ŷ���ȣ
			$_Payment[bankkind] = $LGD_FINANCECODE; //�����ڵ�(��������ϰ��)
			$_Payment[accountno] = $LGD_ACCOUNTNUM; //���¹�ȣ(��������ϰ��)
			$_Payment[pgname] = "dacom";//PG�� ����
			$_Payment[es_check]	= $oper_info->pay_escrow;//����ũ�� ��뿩��
			$_Payment[es_stats]	= "IN";//����ũ�� ����(���������� �⺻���� �߼�)
			$_Payment[tprice]		=	$LGD_AMOUNT; //�����ݾ�
			foreach($_Payment as $key => $value){
						$logs .="$key : $value\r";
					}
			//@make_log("dacom_log.txt","\r---------------------------order_update.php start----------------------------------\r".$logs."\r---------------------------order_update.php END----------------------------------\r");
			//����ó��(���º���,�ֹ� ������Ʈ)




			Exe_payment2($_Payment);
			// ������ ó�� : ������ ���� ������ ����

			$sql = "select * from wiz_basket where orderid = '$LGD_OID'";
			$result = mysql_query($sql);

			while($basket_info = mysql_fetch_array($result)){
				$optcode = explode("^",$basket_info[optcode]);
				$sql = "select * from wiz_dayproduct where prdcode='$basket_info[prdcode]'";
				$stm = mysql_query($sql)or die($sql);
				$prdinfo=mysql_fetch_array($stm);
				$arrOptCode = explode("^",$prdinfo[optcode]);
				$arrOptValue = explode("^^",$prdinfo[optvalue]);
				$arrAmount = explode(",",$basket_info[amount]);
				$changeOptValue = "";

				for($i=0; $i<count($arrOptValue); $i++){
					$arrOptValue2 = explode("^",$arrOptValue[$i]);
					if($arrOptValue2[0] != ""){
						if($arrOptCode[$i]==$optcode[0]){
								if($arrOptValue2[2] != 0){
									$changeOptValue .= $arrOptValue2[0]."^".$arrOptValue2[1]."^".($arrOptValue2[2]-$basket_info[amount])."^".$arrOptValue2[3]."^".$arrOptValue2[4]."^^";
									//echo $arrAmount[$i]."<br />";
								}else{
									$changeOptValue .= $arrOptValue2[0]."^".$arrOptValue2[1]."^".($arrOptValue2[2])."^".$arrOptValue2[3]."^".$arrOptValue2[4]."^^";
								}
						}else{
							$changeOptValue .= $arrOptValue2[0]."^".$arrOptValue2[1]."^".($arrOptValue2[2])."^".$arrOptValue2[3]."^".$arrOptValue2[4]."^^";
						}
					}
				}
				$sql = "update wiz_dayproduct set optvalue = '$changeOptValue' where prdcode='$basket_info[prdcode]'";
				mysql_query($sql)or die($sql);
			}


			Exe_reserve();
			// ���ó��
//			Exe_stock();
			// ��ٱ��� ����
		    Exe_delbasket();
			$resultMSG ="OK";

        }else { //������ �����̸�
            /*
             * �ŷ����� ��� ���� ó��(DB) �κ�
             * ������� ó���� �����̸� "OK"
             */
           //if( �������� ����ó����� ���� ) resultMSG = "OK";
        }
    } else {                                    //�ؽ��� ������ �����̸�
        /*
         * hashdata���� ���� �α׸� ó���Ͻñ� �ٶ��ϴ�.
         */
		$resultMSG = "������� ���� DBó��(NOTE_URL) �ؽ��� ������ �����Ͽ����ϴ�.";
    }

    echo $resultMSG;
?>
