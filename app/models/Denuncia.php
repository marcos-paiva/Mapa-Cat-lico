<?php

class Denuncia extends Zend_Db_Table_Abstract
{
	//configurando nome da tabela
	//por padrao Zend_Db_Table busca pelo nome da classe separando maiusculas por _
	protected $_name = 'denuncia';
	
	//identificando chave primaria da tabela
	//por padrao Zend_Db_Table busca chave primaria pelo nome id
	protected $_primary = 'de_id';



	public function Listar()
	{            
		return $this->fetchAll();

	}
       
        
}

?>