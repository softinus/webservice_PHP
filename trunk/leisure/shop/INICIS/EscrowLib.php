<?

class Escrow
{
	
	var $EscrowType;    // ��û���� (��۵�� - dr, ��۾�����Ʈ - du,  ��ǰ��� - rr, ��ǰ������Ʈ - ru)
	var $mid;
	var $inipayhome;      // �̴����� ���ҽý����� ��ġ�Ǿ� �ִ� ���� ���
	var $hanatid;           // �ϳ����� �ŷ� TID
	var $sendMsg;         // ���� ��û �޼���
	var $EscrowMsg;     // ��û �޼���
	var $rEscrowMsg;    // ��� �޼���
	var $test;
	

	function startAction()
	{
	
		$this->EscrowMsg = 
		        	"inipayhome=" . $this->inipayhome . "^" .
		        	"test=" .$this->test . "^" .
				"mid=" . $this->mid . "^" .
				"EscrowType=" . $this->EscrowType . "^" .
				"msg=" .$this->sendMsg;
		$this->rEscrowMsg = exec($this->inipayhome . '/phpexec/INIescrow.phpexec \'' . $this->EscrowMsg . '\'');
							
		if(strlen($this->rEscrowMsg) <= 1)
			$this->rEscrowMsg = "ResultCode=01&ResultMsg=INVOKE ERR : " . $this->inipayhome . '/phpexec/INIescrow.phpexec';
					
		parse_str($this->rEscrowMsg);
		$this->resultCode = $ResultCode;
		$this->resultMsg = $ResultMsg;
		
	}
	
	
}

?>
