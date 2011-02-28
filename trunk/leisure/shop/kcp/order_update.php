<?

	include "$DOCUMENT_ROOT/inc/common.inc";
	include "$DOCUMENT_ROOT/inc/util.inc";
	include "$DOCUMENT_ROOT/inc/oper_info.inc";

    /* ============================================================================== */
    /* =   PAGE : ���� ��û �� ��� ó�� PAGE                                       = */
    /* = -------------------------------------------------------------------------- = */
    /* =   Copyright (c)  2006   KCP Inc.   All Rights Reserverd.                   = */
    /* ============================================================================== */


    // �׽�Ʈ üũ
		if(!strcmp($oper_info->pay_test, "Y")) {
			$oper_info->pay_id = "T0007";
			$oper_info->pay_key = "3CRB7XHFjUp6fjf1FLEM.g6__";

		}
		if(!strcmp($site_cd, "T0000") || !strcmp($site_cd, "T0007")) {
			$payplus = "testpaygw.kcp.co.kr";
		} else {
			$payplus = "paygw.kcp.co.kr";
		}

?>
<?
    /* ============================================================================== */
    /* =   01. ���� ������ �¾� (��ü�� �°� ����)                                  = */
    /* = -------------------------------------------------------------------------- = */
    $g_conf_home_dir    = $DOCUMENT_ROOT."/shop/kcp/payplus";   // BIN ������ �Է�
    $g_conf_log_level   = "3";                                  // ����Ұ�
    $g_conf_pa_url  = $payplus;                    // real url : paygw.kcp.co.kr , test url : testpaygw.kcp.co.kr
    $g_conf_pa_port = "8090";                                   // ��Ʈ��ȣ , ����Ұ�
    $g_conf_mode    = 0;                                        // ����Ұ�

    require "pp_ax_hub_lib.php";                                // library [�����Ұ�]
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   02. ���� ��û ���� ����                                                  = */
    /* = -------------------------------------------------------------------------- = */
    $site_cd        = $_POST[  "site_cd"         ];             // ����Ʈ �ڵ�
    $site_key       = $_POST[  "site_key"        ];             // ����Ʈ Ű
    $req_tx         = $_POST[  "req_tx"          ];             // ��û ����
    $cust_ip        = getenv(  "REMOTE_ADDR"     );             // ��û IP
    $ordr_idxx      = $_POST[  "ordr_idxx"       ];             // ���θ� �ֹ���ȣ
    $good_name      = $_POST[  "good_name"       ];             // ��ǰ��
    /* = -------------------------------------------------------------------------- = */
    $good_mny       = $_POST[  "good_mny"        ];             // ���� �ѱݾ�
    $tran_cd        = $_POST[  "tran_cd"         ];             // ó�� ����
    /* = -------------------------------------------------------------------------- = */
    $res_cd         = "";                                       // �����ڵ�
    $res_msg        = "";                                       // ����޽���
    $tno            = $_POST[  "tno"             ];             // KCP �ŷ� ���� ��ȣ
    /* = -------------------------------------------------------------------------- = */
    $buyr_name      = $_POST[  "buyr_name"       ];             // �ֹ��ڸ�
    $buyr_tel1      = $_POST[  "buyr_tel1"       ];             // �ֹ��� ��ȭ��ȣ
    $buyr_tel2      = $_POST[  "buyr_tel2"       ];             // �ֹ��� �ڵ��� ��ȣ
    $buyr_mail      = $_POST[  "buyr_mail"       ];             // �ֹ��� E-mail �ּ�
    /* = -------------------------------------------------------------------------- = */
    $bank_name      = "";                                       // �����
    $bank_issu      = $_POST[  "bank_issu"       ];             // ������ü ���񽺻�
    /* = -------------------------------------------------------------------------- = */
    $mod_type       = $_POST[  "mod_type"        ];             // ����TYPE VALUE ������ҽ� �ʿ�
    $mod_desc       = $_POST[  "mod_desc"        ];             // �������
    /* = -------------------------------------------------------------------------- = */
    $use_pay_method = $_POST[  "use_pay_method"  ];             // ���� ���
    $bSucc          = "";                                       // ��ü DB ó�� ���� ����
    $acnt_yn        = $_POST[  "acnt_yn"         ];             // ���º���� ������ü, ������� ����
    /* = -------------------------------------------------------------------------- = */
    $card_cd        = "";                                       // �ſ�ī�� �ڵ�
    $card_name      = "";                                       // �ſ�ī�� ��
    $app_time       = "";                                       // ���νð� (��� ���� ���� ����)
    $app_no         = "";                                       // �ſ�ī�� ���ι�ȣ
    $noinf          = "";                                       // �ſ�ī�� ������ ����
    $quota          = "";                                       // �ſ�ī�� �Һΰ���
    $bankname       = "";                                       // �����
    $depositor      = "";                                       // �Ա� ���� ������ ����
    $account        = "";                                       // �Ա� ���� ��ȣ
    /* = -------------------------------------------------------------------------- = */
    $escw_used      = $_POST[  "escw_used"       ];             // ����ũ�� ��� ����
    $pay_mod        = $_POST[  "pay_mod"         ];             // ����ũ�� ����ó�� ���
    $deli_term      = $_POST[  "deli_term"       ];             // ��� �ҿ���
    $bask_cntx      = $_POST[  "bask_cntx"       ];             // ��ٱ��� ��ǰ ����
    $good_info      = $_POST[  "good_info"       ];             // ��ٱ��� ��ǰ �� ����
    $rcvr_name      = $_POST[  "rcvr_name"       ];             // ������ �̸�
    $rcvr_tel1      = $_POST[  "rcvr_tel1"       ];             // ������ ��ȭ��ȣ
    $rcvr_tel2      = $_POST[  "rcvr_tel2"       ];             // ������ �޴�����ȣ
    $rcvr_mail      = $_POST[  "rcvr_mail"       ];             // ������ E-Mail
    $rcvr_zipx      = $_POST[  "rcvr_zipx"       ];             // ������ �����ȣ
    $rcvr_add1      = $_POST[  "rcvr_add1"       ];             // ������ �ּ�
    $rcvr_add2      = $_POST[  "rcvr_add2"       ];             // ������ ���ּ�
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   03. �ν��Ͻ� ���� �� �ʱ�ȭ (��, ������ü �� ����ī��� ����)            = */
    /* = -------------------------------------------------------------------------- = */
    /* =       ������ �ʿ��� �ν��Ͻ��� �����ϰ� �ʱ�ȭ �մϴ�. ��, ������ü ��     = */
    /* =       ����ī���� ���� ���� ����� ���� ��������� ���� �ʱ� ������       = */
    /* =       ���� ����� ����ϴ� �������� ���ܵ˴ϴ�.                            = */
    /* = -------------------------------------------------------------------------- = */
    if ( ( $use_pay_method != "010000000000" && $use_pay_method != "0000000000100" ) || $bank_issu == "SCMF" )    // ������ü, ����ī�带 ������ ��� ���������� ���, �Ǵ� ����ϾȽɰ����� ���
    {
        $c_PayPlus = new C_PP_CLI;
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   04. ó�� ��û ���� ����, ����                                            = */
    /* = -------------------------------------------------------------------------- = */

    /* = -------------------------------------------------------------------------- = */
    /* =   04-1. ���� ��û                                                          = */
    /* = -------------------------------------------------------------------------- = */
        if ( $req_tx == "pay" )
        {
            $c_PayPlus->mf_set_encx_data( $_POST[ "enc_data" ] , $_POST[ "enc_info" ] );
        }

    /* = -------------------------------------------------------------------------- = */
    /* =   04-2. ���� ��û                                                          = */
    /* = -------------------------------------------------------------------------- = */
        else if ( $req_tx == "mod" )
        {
            $tran_cd = "00200000";

            $c_PayPlus->mf_set_modx_data( "tno",        $tno            );          // KCP ���ŷ� �ŷ���ȣ
            $c_PayPlus->mf_set_modx_data( "mod_type",   $mod_type       );          // ���ŷ� ���� ��û ����
            $c_PayPlus->mf_set_modx_data( "mod_ip",     $cust_ip        );          // ���� ��û�� IP
            $c_PayPlus->mf_set_modx_data( "mod_desc",   $mod_desc       );          // ���� ����
        }

    /* = -------------------------------------------------------------------------- = */
    /* =   04-3. ����ũ�� ���º��� ��û                                              = */
    /* = -------------------------------------------------------------------------- = */
        else if ( $req_tx == "mod_escrow" )
        {
            $tran_cd = "00200000";

            $c_PayPlus->mf_set_modx_data( "tno",        $tno            );          // KCP ���ŷ� �ŷ���ȣ
            $c_PayPlus->mf_set_modx_data( "mod_type",   $mod_type       );          // ���ŷ� ���� ��û ����
            $c_PayPlus->mf_set_modx_data( "mod_ip",     $cust_ip        );          // ���� ��û�� IP
            $c_PayPlus->mf_set_modx_data( "mod_desc",   $mod_desc       );          // ���� ����
            if ($mod_type == "STE1")                                                // ���º��� Ÿ���� [��ۿ�û]�� ���
            {
                $c_PayPlus->mf_set_modx_data( "deli_numb",   $_POST[ "deli_numb" ] );          // ����� ��ȣ
                $c_PayPlus->mf_set_modx_data( "deli_corp",   $_POST[ "deli_corp" ] );          // �ù� ��ü��
            }
            else if ($mod_type == "STE2" || $mod_type == "STE4")                    // ���º��� Ÿ���� [������] �Ǵ� [���]�� ������ü, ��������� ���
            {
                if ($acnt_yn == "Y")
                {
                    $c_PayPlus->mf_set_modx_data( "refund_account",   $_POST[ "refund_account" ] );      // ȯ�Ҽ�����¹�ȣ
                    $c_PayPlus->mf_set_modx_data( "refund_nm",        $_POST[ "refund_nm"      ] );      // ȯ�Ҽ�������ָ�
                    $c_PayPlus->mf_set_modx_data( "bank_code",        $_POST[ "bank_code"      ] );      // ȯ�Ҽ��������ڵ�
                }
            }
        }

    /* = -------------------------------------------------------------------------- = */
    /* =   04-4. ����                                                               = */
    /* = -------------------------------------------------------------------------- = */
        if ( $tran_cd != "" )
        {
            $c_PayPlus->mf_do_tx( $trace_no,  $g_conf_home_dir, $site_cd,
                          $site_key,  $tran_cd,    "", $g_conf_pa_url,  $g_conf_pa_port,  "payplus_cli_slib",
                          $ordr_idxx, $cust_ip,    $g_conf_log_level, 0, $g_conf_mode );

            $tno       = $c_PayPlus->mf_get_res_data( "tno" );
        }
        else
        {
            $c_PayPlus->m_res_cd  = "9562";
            $c_PayPlus->m_res_msg = "���� ����";
        }

        $res_cd    = $c_PayPlus->m_res_cd;
        $res_msg   = $c_PayPlus->m_res_msg;
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   05. ���� ��� ó��                                                       = */
    /* = -------------------------------------------------------------------------- = */

        if ( $req_tx == "pay" )
        {
            if( $res_cd == "0000" )
            {
							// �ֹ�����
							$sql = "SELECT * FROM wiz_order WHERE orderid = '$ordr_idxx'";
							$result = mysql_query($sql) or error(mysql_error());
							$order_info = mysql_fetch_object($result);
    /* = -------------------------------------------------------------------------- = */
    /* =   05-1. �ſ�ī�� ���� ��� ó��                                            = */
    /* = -------------------------------------------------------------------------- = */
                if ( $use_pay_method == "100000000000" )
                {
                    $card_cd          = $c_PayPlus->mf_get_res_data( "card_cd"   );  // ī�� �ڵ�
                    $card_name        = $c_PayPlus->mf_get_res_data( "card_name" );  // ī�� ����
                    $app_time         = $c_PayPlus->mf_get_res_data( "app_time"  );  // ���� �ð�
                    $app_no           = $c_PayPlus->mf_get_res_data( "app_no"    );  // ���� ��ȣ
                    $noinf            = $c_PayPlus->mf_get_res_data( "noinf"     );  // ������ ���� ( 'Y' : ������ )
                    $quota            = $c_PayPlus->mf_get_res_data( "quota"     );  // �Һ� ����

			     					////////////////////////////////////////////////////////////////////////////
			     				 	// �ֹ����� ������Ʈ
			     				 	////////////////////////////////////////////////////////////////////////////
			     				 	$_Payment[status] = "OY"; //��������
			     					$_Payment[orderid] = $ordr_idxx; //�ֹ���ȣ
			     					$_Payment[paymethod] = "PC"; //��������
			     					$_Payment[ttno] = $tno; //�ŷ���ȣ
			     					$_Payment[bankkind] = ""; //�����ڵ�(��������ϰ��)
			     					$_Payment[accountno] = ""; //���¹�ȣ(��������ϰ��)
			     					$_Payment[pgname] = "kcp";//PG�� ����
			     					$_Payment[tprice]		=	$good_mny; //�����ݾ�

			     					//����ó��(���º���,�ֹ� ������Ʈ)
			     					Exe_payment($_Payment);
			     					// ������ ó�� : ������ ���� ������ ����
			     					Exe_reserve();
			     					// ���ó��
			     					Exe_stock();
			     					// ��ٱ��� ����
			     			    Exe_delbasket();
                }

    /* = -------------------------------------------------------------------------- = */
    /* =   05-2. ������� ���� ��� ó��                                            = */
    /* = -------------------------------------------------------------------------- = */
                if ( $use_pay_method == "001000000000" )
                {
                    $bankname         = $c_PayPlus->mf_get_res_data( "bankname"  );  // �Ա��� ���� �̸�
                    $depositor        = $c_PayPlus->mf_get_res_data( "depositor" );  // �Ա��� ���� ������
                    $account          = $c_PayPlus->mf_get_res_data( "account"   );  // �Ա��� ���� ��ȣ
	
		                $Payment[status] = "OR"; //��������
										$Payment[orderid] = $ordr_idxx; //�ֹ���ȣ
										$Payment[paymethod] = "PV"; //��������
										$Payment[ttno] = $tno; //���ι�ȣ
										$Payment[bankkind] = $bankname; //�����ڵ�(��������ϰ��)
										$Payment[accountno] = $account; //���¹�ȣ(��������ϰ��)
										$Payment[accountname] = $account; //������(��������ϰ��)
										$Payment[pgname] = "kcp";//PG�� ����
										$Payment[es_check]	= $oper_info->pay_escrow;//����ũ�� ��뿩��
										$Payment[es_stats]	= "IN";//����ũ�� ����(���������� �⺻���� �߼�)
										$Payment[tprice]		=	$good_mny; //�����ݾ�
										//����ó��(���º���,�ֹ� ������Ʈ)
			     					Exe_payment($Payment);
			     					// ������ ó�� : ������ ���� ������ ����
			     					Exe_reserve();
			     					// ���ó��
			     					//Exe_stock();
			     					// ��ٱ��� ����
			   			    	Exe_delbasket();
			           }

    /* = -------------------------------------------------------------------------- = */
    /* =   05-3. �޴��� ���� ��� ó��                                              = */
    /* = -------------------------------------------------------------------------- = */
                if ( $use_pay_method == "000010000000" )
                {
                    $app_time         = $c_PayPlus->mf_get_res_data( "hp_app_time"  );  // ���� �ð�

                    $_Payment[status] = "OY"; //��������
										$_Payment[orderid] = $ordr_idxx; //�ֹ���ȣ
										$_Payment[paymethod] = "PH"; //��������
										$_Payment[ttno] = $app_time; //���νð�
										$_Payment[bankkind] = ""; //�����ڵ�(��������ϰ��)
										$_Payment[accountno] = ""; //���¹�ȣ(��������ϰ��)
										$_Payment[accountname] = ""; //������(��������ϰ��)
										$_Payment[pgname] = "kcp";//PG�� ����
										$_Payment[tprice]		=	$good_mny; //�����ݾ�
										//����ó��(���º���,�ֹ� ������Ʈ)
			     					Exe_payment($_Payment);
			     					// ������ ó�� : ������ ���� ������ ����
			     					Exe_reserve();
			     					// ���ó��
			     					Exe_stock();
			     					// ��ٱ��� ����
			     			    Exe_delbasket();
                }

    /* = -------------------------------------------------------------------------- = */
    /* =   05-4. ī��� ����Ʈ ���� ��� ó��                                       = */
    /* = -------------------------------------------------------------------------- = */
                if ( $use_pay_method == "000100000000" )
                {
                    $app_time         = $c_PayPlus->mf_get_res_data( "app_time"  );  // ���� �ð�
                }

    /* = -------------------------------------------------------------------------- = */
    /* =   05-5. ARS ���� ��� ó��                                                 = */
    /* = -------------------------------------------------------------------------- = */
                if ( $use_pay_method == "000000000010" )
                {
                    $app_time         = $c_PayPlus->mf_get_res_data( "app_time"  );  // ���� �ð�
                }

    /* = -------------------------------------------------------------------------- = */
    /* =   05-6. ���� ����� ��ü ��ü������ DB ó�� �۾��Ͻô� �κ��Դϴ�.         = */
    /* = -------------------------------------------------------------------------- = */
    /* =         ���� ����� DB �۾� �ϴ� �������� ���������� ���ε� �ǿ� ����      = */
    /* =         DB �۾��� �����Ͽ� DB update �� �Ϸ���� ���� ���, �ڵ�����       = */
    /* =         ���� ��� ��û�� �ϴ� ���μ����� �����Ǿ� �ֽ��ϴ�.                = */
    /* =         DB �۾��� ���� �� ���, bSucc ��� ����(String)�� ���� "false"     = */
    /* =         �� ������ �ֽñ� �ٶ��ϴ�. (DB �۾� ������ ��쿡�� "false" �̿��� = */
    /* =         ���� �����Ͻø� �˴ϴ�.)                                           = */
    /* = -------------------------------------------------------------------------- = */





                	$bSucc = "";             // DB �۾� ������ ��� "false" �� ����

    /* = -------------------------------------------------------------------------- = */
    /* =   05-7. DB �۾� ������ ��� �ڵ� ���� ���                                 = */
    /* = -------------------------------------------------------------------------- = */
                if ( $bSucc == "false" )
                {
                    $c_PayPlus->mf_clear();

                    $tran_cd = "00200000";

                    $c_PayPlus->mf_set_modx_data( "tno",      $tno                  );         // KCP ���ŷ� �ŷ���ȣ
                    $c_PayPlus->mf_set_modx_data( "mod_type", "STE2"                );         // ���ŷ� ���� ��û ����
                    $c_PayPlus->mf_set_modx_data( "mod_ip",   $cust_ip              );         // ���� ��û�� IP
                    $c_PayPlus->mf_set_modx_data( "mod_desc", "��� ó�� ���� - �ڵ� ���" );  // ���� ����

                    $c_PayPlus->mf_do_tx( $tno,  $g_conf_home_dir, $site_cd,
                                          $site_key,  $tran_cd,    "",
                                          $g_conf_pa_url,  $g_conf_pa_port,  "payplus_cli_slib",
                                          $ordr_idxx, $cust_ip,    $g_conf_log_level,
                                          0,    $g_conf_mode );

                    $res_cd  = $c_PayPlus->m_res_cd;
                    $res_msg = $c_PayPlus->m_res_msg;
                }

            }    // End of [res_cd = "0000"]

    /* = -------------------------------------------------------------------------- = */
    /* =   05-8. ���� ���и� ��ü ��ü������ DB ó�� �۾��Ͻô� �κ��Դϴ�.         = */
    /* = -------------------------------------------------------------------------- = */
            else
            {
            }
        }
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   06. ���� ��� ó��                                                       = */
    /* = -------------------------------------------------------------------------- = */
        else if ( $req_tx == "mod" )
        {
        }
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   07. ����ũ�� ���º��� ��� ó��                                          = */
    /* = -------------------------------------------------------------------------- = */
        else if ( $req_tx == "mod_escrow" )
        {
        }
    } // End of Process
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   08. ������ü �� ����ī�� ��� ó�� (��������� ���� �ʴ� ���)           = */
    /* = -------------------------------------------------------------------------- = */
    else
    {
        $res_cd    = $_POST[ "res_cd"  ];                       // �����ڵ�
        $res_msg   = $_POST[ "res_msg" ];                       // ����޽���

        if ( $use_pay_method == "010000000000" )
        {
            $bank_name = $_POST[ "bank_name" ];                 // �����

            $Payment[status] = "OY"; //��������
						$Payment[orderid] = $ordr_idxx; //�ֹ���ȣ
						$Payment[paymethod] = "PN"; //��������
						$Payment[ttno] = $tno; //���ι�ȣ
						$Payment[bankkind] = $bankname; //�����ڵ�(�Ա��� �����)
						$Payment[accountno] = ""; //���¹�ȣ(��������ϰ��)
						$Payment[accountname] = ""; //������(��������ϰ��)
						$Payment[pgname] = "kcp";//PG�� ����
						$Payment[es_check]	= $oper_info->pay_escrow;//����ũ�� ��뿩��
						$Payment[es_stats]	= "IN";//����ũ�� ����(���������� �⺻���� �߼�)
						$Payment[tprice]		=	$good_mny; //�����ݾ�
						//����ó��(���º���,�ֹ� ������Ʈ)
						Exe_payment($Payment);
						// ������ ó�� : ������ ���� ������ ����
						Exe_reserve();
						// ���ó��
						Exe_stock();
						// ��ٱ��� ����
		    		Exe_delbasket();
        }
    }
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   09. �� ���� �� ��������� ȣ��                                           = */
    /* ============================================================================== */

?>
    <html>
    <head>
    <script>
        function goResult()
        {
            var openwin = window.open( 'proc_win.html', 'proc_win', '' );
            document.pay_info.submit();
            openwin.close();
        }
    </script>
    </head>
    <body onload="goResult()">
    <form name="pay_info" method="post" action="/shop/order_ok.php">
        <input type="hidden" name="req_tx"            value="<?=$req_tx?>">            <!-- ��û ���� -->
        <input type="hidden" name="use_pay_method"    value="<?=$use_pay_method?>">    <!-- ����� ���� ���� -->
        <input type="hidden" name="bSucc"             value="<?=$bSucc?>">             <!-- ���θ� DB ó�� ���� ���� -->

        <input type="hidden" name="rescode"            value="<?=$res_cd?>">            <!-- ��� �ڵ� -->
        <input type="hidden" name="resmsg"           value="<?=$res_cd.':'.$res_msg?>">           <!-- ��� �޼��� -->
        <input type="hidden" name="orderid"         value="<?=$ordr_idxx?>">         <!-- �ֹ���ȣ -->
        <input type="hidden" name="tno"               value="<?=$tno?>">               <!-- KCP �ŷ���ȣ -->
        <input type="hidden" name="good_mny"          value="<?=$good_mny?>">          <!-- �����ݾ� -->
        <input type="hidden" name="good_name"         value="<?=$good_name?>">         <!-- ��ǰ�� -->
        <input type="hidden" name="buyr_name"         value="<?=$buyr_name?>">         <!-- �ֹ��ڸ� -->
        <input type="hidden" name="buyr_tel1"         value="<?=$buyr_tel1?>">         <!-- �ֹ��� ��ȭ��ȣ -->
        <input type="hidden" name="buyr_tel2"         value="<?=$buyr_tel2?>">         <!-- �ֹ��� �޴�����ȣ -->
        <input type="hidden" name="buyr_mail"         value="<?=$buyr_mail?>">         <!-- �ֹ��� E-mail -->

        <input type="hidden" name="escw_used"         value="<?=$escw_used?>">         <!-- ����ũ�� ��� ���� -->
        <input type="hidden" name="pay_mod"           value="<?=$pay_mod?>">           <!-- ����ũ�� ����ó�� ��� -->
        <input type="hidden" name="deli_term"         value="<?=$deli_term?>">         <!-- ��� �ҿ��� -->
        <input type="hidden" name="bask_cntx"         value="<?=$bask_cntx?>">         <!-- ��ٱ��� ��ǰ ���� -->
        <input type="hidden" name="good_info"         value="<?=$good_info?>">         <!-- ��ٱ��� ��ǰ �� ���� -->
        <input type="hidden" name="rcvr_name"         value="<?=$rcvr_name?>">         <!-- ������ �̸� -->
        <input type="hidden" name="rcvr_tel1"         value="<?=$rcvr_tel1?>">         <!-- ������ ��ȭ��ȣ -->
        <input type="hidden" name="rcvr_tel2"         value="<?=$rcvr_tel2?>">         <!-- ������ �޴�����ȣ -->
        <input type="hidden" name="rcvr_mail"         value="<?=$rcvr_mail?>">         <!-- ������ E-Mail -->
        <input type="hidden" name="rcvr_zipx"         value="<?=$rcvr_zipx?>">         <!-- ������ �����ȣ -->
        <input type="hidden" name="rcvr_add1"         value="<?=$rcvr_add1?>">         <!-- ������ �ּ� -->
        <input type="hidden" name="rcvr_add2"         value="<?=$rcvr_add2?>">         <!-- ������ ���ּ� -->

        <input type="hidden" name="card_cd"           value="<?=$card_cd?>">           <!-- ī���ڵ� -->
        <input type="hidden" name="card_name"         value="<?=$card_name?>">         <!-- ī��� -->
        <input type="hidden" name="app_time"          value="<?=$app_time?>">          <!-- ���νð� -->
        <input type="hidden" name="app_no"            value="<?=$app_no?>">            <!-- ���ι�ȣ -->
        <input type="hidden" name="quota"             value="<?=$quota?>">             <!-- �Һΰ��� -->

        <input type="hidden" name="bank_name"         value="<?=$bank_name?>">         <!-- ����� -->

        <input type="hidden" name="bankname"          value="<?=$bankname?>">          <!-- �Ա� ���� -->
        <input type="hidden" name="depositor"         value="<?=$depositor?>">         <!-- �Աݰ��� ������ -->
        <input type="hidden" name="account"           value="<?=$account?>">           <!-- �Աݰ��� ��ȣ -->

    </form>
    </body>
    </html>

