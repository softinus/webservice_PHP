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
    $platform               = $HTTP_POST_VARS["platform"];             //LG������ �������� ����(test:�׽�Ʈ, service:����)    
	$mid                    = $HTTP_POST_VARS["LGD_MID"];              //�������̵�(LG���������� ���� �߱޹����� �������̵� �Է��ϼ���)
	                                                                   //�׽�Ʈ ���̵�� 't'�� �����ϰ� �Է��ϼ���.   
	$LGD_MID                = (("test" == $platform)?"t":"").$mid;     //�������̵�(�ڵ�����)               
    $LGD_OID                = $HTTP_POST_VARS["LGD_OID"];              //�ֹ���ȣ(�������� ����ũ�� �ֹ���ȣ�� �Է��ϼ���)
    $LGD_AMOUNT             = $HTTP_POST_VARS["LGD_AMOUNT"];           //�����ݾ�("," �� ������ �����ݾ��� �Է��ϼ���)
    $LGD_MERTKEY            = $HTTP_POST_VARS["LGD_MERTKEY"];          //����MertKey(mertkey�� ���������� -> ������� -> ���������������� Ȯ���ϽǼ� �ֽ��ϴ�)
    $LGD_TIMESTAMP          = $HTTP_POST_VARS["LGD_TIMESTAMP"];        //Ÿ�ӽ�����
    $LGD_BUYER              = $HTTP_POST_VARS["LGD_BUYER"];            //�����ڸ�
    $LGD_PRODUCTINFO        = $HTTP_POST_VARS["LGD_PRODUCTINFO"];      //��ǰ��
    $LGD_BUYEREMAIL         = $HTTP_POST_VARS["LGD_BUYEREMAIL"];       //������ �̸���
    $LGD_CUSTOM_SKIN        = $HTTP_POST_VARS["LGD_CUSTOM_SKIN"];      //�������� ����â ��Ų (red, blue, cyan, green, yellow)
	
    /*
     * 2. ������� DBó�� ������ ��ũ ����
     *
     * LGD_NOTEURL : ����������� ó��(DB) ������ URL�� �Ѱ��ּ���.
     * LGD_CASNOTEURL : �������(������) ���� ������ �Ͻô� ��� �Ʒ� LGD_CASNOTEURL �� �����Ͽ� �ֽñ� �ٶ��ϴ�.
     */	
    $LGD_NOTEURL            = $HTTP_POST_VARS["LGD_NOTEURL"];          //����������� ó��(DB) ������(URL�� ������ �ּ���)
    $LGD_CASNOTEURL			= "http://����URL/cas_noteurl.php";    

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


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>������ eCredit���� �����׽�Ʈ</title>

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
	        //�޴����� ������� �Ķ���ͳ����� �����Ͻþ� �ʿ��Ͻ� �Ķ���͸� �߰��Ͽ� ����Ͻñ� �ٶ��ϴ�.           
	        
            var msg = "������� : " + LGD_RESPMSG + "\n";            
            msg += "LG�����ްŷ�TID : " + LGD_TID +"\n\n";                                      
            if( LGD_NOTEURL_RESULT != "null" ) msg += LGD_NOTEURL_RESULT +"\n";
            alert(msg);
            /*
             * �������� ȭ�� ó��
             */        
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
<form method="post" id="LGD_PAYINFO">
<table>
    <tr>
        <td>������ �̸� </td>
        <td><?= $LGD_BUYER ?></td>
    </tr>
    <tr>
        <td>��ǰ���� </td>
        <td><?= $LGD_PRODUCTINFO ?></td>
    </tr>
    <tr>
        <td>�����ݾ� </td>
        <td><?= $LGD_AMOUNT ?></td>
    </tr>
    <tr>
        <td>������ �̸��� </td>
        <td><?= $LGD_BUYEREMAIL ?></td>
    </tr>
    <tr>
        <td>�ֹ���ȣ </td>
        <td><?= $LGD_OID ?></td>
    </tr>	
    <tr>
        <td colspan="2">* �߰� �� ������û �Ķ���ʹ� �޴����� �����ϼ���.</td>
    </tr>
    <tr>
        <td>
        <input type="button" value="������û(ActiveX)" onclick="doPay_ActiveX()"/><br>
        </td>
    </tr>
</table>

<input type="hidden" name="LGD_MID"             value="<?= $LGD_MID ?>">                		<!-- �������̵� -->
<input type="hidden" name="LGD_OID"             value="<?= $LGD_OID ?>">                		<!-- �ֹ���ȣ -->
<input type="hidden" name="LGD_BUYER"           value="<?= $LGD_BUYER ?>">           			<!-- ������ -->
<input type="hidden" name="LGD_PRODUCTINFO"     value="<?= $LGD_PRODUCTINFO ?>">     			<!-- ��ǰ���� -->
<input type="hidden" name="LGD_AMOUNT"          value="<?= $LGD_AMOUNT ?>">             		<!-- �����ݾ� -->
<input type="hidden" name="LGD_BUYEREMAIL"      value="<?= $LGD_BUYEREMAIL ?>">         		<!-- ������ �̸��� -->
<input type="hidden" name="LGD_CUSTOM_SKIN"     value="<?= $LGD_CUSTOM_SKIN ?>">        		<!-- ����â SKIN -->
<input type="hidden" name="LGD_TIMESTAMP"       value="<?= $LGD_TIMESTAMP ?>">          		<!-- Ÿ�ӽ����� -->
<input type="hidden" name="LGD_HASHDATA"        value="<?= $LGD_HASHDATA ?>">           		<!-- �ؽ��� -->
<input type="hidden" name="LGD_NOTEURL"         value="<?= $LGD_NOTEURL ?>">         			<!-- �������ó��_URL(LGD_NOTEURL) -->
<input type="hidden" name="LGD_VERSION"         value="PHP_XPay_Lite_1.0">						<!-- �������� (�������� ������) -->
<!-- �������(������) ���������� �Ͻô� ���  �Ҵ�/�Ա� ����� �뺸�ޱ� ���� �ݵ�� LGD_CASNOTEURL ������ LG �����޿� �����ؾ� �մϴ� . -->
<!-- input type="hidden" name="LGD_CASNOTEURL"          	value="<?= $LGD_CASNOTEURL ?>"-->					<!-- ������� NOTEURL -->  


</form>
</body>
<!--  xpay.js�� �ݵ�� body �ؿ� �νñ� �ٶ��ϴ�. -->
<script language="javascript" src="<?= $_SERVER['SERVER_PORT']!=443?"http":"https" ?>://xpay.lgdacom.net<?=($platform == "test")?":7080":""?>/xpay/js/xpay.js" type="text/javascript"></script>
</html>

