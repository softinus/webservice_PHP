<?php
	include "../../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
	include "../../inc/util.inc"; 					// ��ƿ ���̺귯��
	include "../../inc/oper_info.inc"; 		// � ����
//*******************************************************************************
// FILE NAME : INIpayResult.php
// DATE : 2006.05
// �̴Ͻý� ������� �Աݳ��� ó��demon���� �Ѿ���� �Ķ���͸� control �ϴ� �κ� �Դϴ�.
//*******************************************************************************

//**********************************************************************************
//�̴Ͻý��� �����ϴ� ���������ü�� ����� �����Ͽ� DB ó�� �ϴ� �κ� �Դϴ�.
//�ʿ��� �Ķ���Ϳ� ���� DB �۾��� �����Ͻʽÿ�.
//**********************************************************************************

@extract($_GET);
@extract($_POST);
@extract($_SERVER);


//**********************************************************************************
//  �̺κп� �α����� ��θ� �������ּ���.

$INIpayHome = getcwd();      // �̴����� Ȩ���͸�

//**********************************************************************************


$TEMP_IP = getenv("REMOTE_ADDR");
$PG_IP  = substr($TEMP_IP,0, 10);

if( $PG_IP == "203.238.37" || $PG_IP == "210.98.138" )  //PG���� ���´��� IP�� üũ
{
        $msg_id = $msg_id;             //�޼��� Ÿ��
        $no_tid = $no_tid;             //�ŷ���ȣ
        $no_oid = $no_oid;             //���� �ֹ���ȣ
        $id_merchant = $id_merchant;   //���� ���̵�
        $cd_bank = $cd_bank;           //�ŷ� �߻� ��� �ڵ�
        $cd_deal = $cd_deal;           //��� ��� �ڵ�
        $dt_trans = $dt_trans;         //�ŷ� ����
        $tm_trans = $tm_trans;         //�ŷ� �ð�
        $no_msgseq = $no_msgseq;       //���� �Ϸ� ��ȣ
        $cd_joinorg = $cd_joinorg;     //���� ��� �ڵ�

        $dt_transbase = $dt_transbase; //�ŷ� ���� ����
        $no_transeq = $no_transeq;     //�ŷ� �Ϸ� ��ȣ
        $type_msg = $type_msg;         //�ŷ� ���� �ڵ�
        $cl_close = $cl_close;         //���� �����ڵ�
        $cl_kor = $cl_kor;             //�ѱ� ���� �ڵ�
        $no_msgmanage = $no_msgmanage; //���� ���� ��ȣ
        $no_vacct = $no_vacct;         //������¹�ȣ
        $amt_input = $amt_input;       //�Աݱݾ�
        $amt_check = $amt_check;       //�̰��� Ÿ���� �ݾ�
        $nm_inputbank = $nm_inputbank; //�Ա� ���������
        $nm_input = $nm_input;         //�Ա� �Ƿ���
        $dt_inputstd = $dt_inputstd;   //�Ա� ���� ����
        $dt_calculstd = $dt_calculstd; //���� ���� ����
        $flg_close = $flg_close;       //���� ��ȭ

        $logfile = fopen( $INIpayHome . "/log/result.log", "a+" );


        fwrite( $logfile,"************************************************");
        fwrite( $logfile,"ID_MERCHANT : ".$id_merchant."\r\n");
        fwrite( $logfile,"NO_TID : ".$no_tid."\r\n");
        fwrite( $logfile,"NO_OID : ".$no_oid."\r\n");
        fwrite( $logfile,"NO_VACCT : ".$no_vacct."\r\n");
        fwrite( $logfile,"AMT_INPUT : ".$amt_input."\r\n");
        fwrite( $logfile,"NM_INPUTBANK : ".$nm_inputbank."\r\n");
        fwrite( $logfile,"NM_INPUT : ".$nm_input."\r\n");
        fwrite( $logfile,"************************************************");

        /*
        fwrite( $logfile,"��ü �����"."\r\n");
        fwrite( $logfile, $msg_id."\r\n");
        fwrite( $logfile, $no_tid."\r\n");
        fwrite( $logfile, $no_oid."\r\n");
        fwrite( $logfile, $id_merchant."\r\n");
        fwrite( $logfile, $cd_bank."\r\n");
        fwrite( $logfile, $dt_trans."\r\n");
        fwrite( $logfile, $tm_trans."\r\n");
        fwrite( $logfile, $no_msgseq."\r\n");
        fwrite( $logfile, $type_msg."\r\n");
        fwrite( $logfile, $cl_close."\r\n");
        fwrite( $logfile, $cl_kor."\r\n");
        fwrite( $logfile, $no_msgmanage."\r\n");
        fwrite( $logfile, $no_vacct."\r\n");
        fwrite( $logfile, $amt_input."\r\n");
        fwrite( $logfile, $amt_check."\r\n");
        fwrite( $logfile, $nm_inputbank."\r\n");
        fwrite( $logfile, $nm_input."\r\n");
        fwrite( $logfile, $dt_inputstd."\r\n");
        fwrite( $logfile, $dt_calculstd."\r\n");
        fwrite( $logfile, $flg_close."\r\n");
        fwrite( $logfile, "\r\n");
        */

        fclose( $logfile );

				// �ֹ�����
				$sql = "SELECT * FROM wiz_order WHERE orderid = '$no_oid'";
				$result = mysql_query($sql) or error(mysql_error());
				$order_info = mysql_fetch_object($result);

 	            //if( ������ �Ա� ���� ����ó����� ���� ) $resultMSG = "OK";
            	////////////////////////////////////////////////////////////////////////////
				 	/////////////////////// �ֹ����� ������Ʈ //////////////////////////////////
				 	////////////////////////////////////////////////////////////////////////////

					$_Payment[status] = "OY"; //��������
					$_Payment[orderid] = $no_oid; //�ֹ���ȣ
					$_Payment[paymethod] = $order_info->pay_method; //��������
					$_Payment[ttno] = $no_tid; //�ŷ���ȣ
					$_Payment[bankkind] = $cd_bank; //�����ڵ�
					$_Payment[accountno] = $no_vacct; //���¹�ȣ
					$_Payment[pgname] = "inisic";//PG�� ����
					$_Payment[es_check]	= $oper_info->pay_escrow;//����ũ�� ��뿩��
					$_Payment[es_stats]	= "IN";//����ũ�� ����(���������� �⺻���� �߼�)
					$_Payment[tprice]		=	$amt_input; //�����ݾ�

					//����ó��(���º���,�ֹ� ������Ʈ)
					Exe_payment($_Payment);
					// ������ ó�� : ������ ���� ������ ����
					Exe_reserve();
					// ���ó��
					Exe_stock();
					// ��ٱ��� ����
			    Exe_delbasket();
					$resp = true;

//************************************************************************************

        //������ ���� �����ͺ��̽��� ��� ���������� ���� �����ÿ��� "OK"�� �̴Ͻý���
        //�����ϼž��մϴ�. �Ʒ� ���ǿ� �����ͺ��̽� ������ �޴� FLAG ������ ��������
        //(����) OK�� �������� �����ø� �̴Ͻý� ���� ������ "OK"�� �����Ҷ����� ��� �������� �õ��մϴ�
        //��Ÿ �ٸ� ������ PRINT( echo )�� ���� �����ñ� �ٶ��ϴ�

      if ($resp == true)
      {

                echo "OK";                        // ����� ������������

      }

//*************************************************************************************

}
?>
