<?php

class Controller
{
	public $session;
	
	public function __construct()
	{
		$this->session = new Zend_Session_Namespace('paroquias');
	}
	
	public function logado()
	{
		if (isset($this->session->id)) // verifico se session existe
			{ return true; }
		return false;
	}


	
	public function atualizarSessao()
	{		
		$this->session->setExpirationSeconds("1200");
	}
	
	public function id()
	{
		return $this->session->id;
			
	}
	
}

?>
