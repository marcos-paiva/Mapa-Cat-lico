<?php

/*
 * funcao que loada todas as classe quando elas sao instancias
 * nao sendo necessario loadar cada classe quando for utiliza-la
 * nao eh necessario require ou Zen_Loader
 */
function __autoload($class)
{
	Zend_Loader::loadClass($class);
}

// para mostrar os erros, apenas nos testes(precisa estar setado no PHP.ini)
error_reporting(E_ALL|E_STRICT);
 
// Seta o timezone pra são paulo (PHP 5.1)
setlocale (LC_ALL, 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');
 
/* Seta include path para o funcionamento correto do framework ***OBRIGATÓRIO*** */
set_include_path('.'.PATH_SEPARATOR.'./lib'
.PATH_SEPARATOR.'./app/models/' //facilitar depois ao loadar as nossos modelos
.PATH_SEPARATOR.get_include_path());
 
/* Necessário para loadar qualquer outra classe do framework ***OBRIGATÓRIO*** */
include 'Zend/Loader.php'; 


//loada o controller front
//Zend_Loader::loadClass('Zend_Controller_Front'); 
/*
 Essa classe se encontra em Zend/Controller/Front.php
 Pode ser loadado diretamente pelo nome se preferir
 Para começar nós precisamos loadar primeiro o front controller
 Ele faz um controle automático para detectar a base URL e fazer o redirecionamento correto
 */
$controlador = Zend_Controller_Front::getInstance();
$controlador->throwExceptions(true); // mostrar excessões(apenas para testes)
$controlador->setControllerDirectory('./app/controllers'); // seta diretório com nossos controllers

/* Report all errors directly to the screen for simple diagnostics in the dev environment */
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

//rota para direcionar para a paroquia url direta da paroquia
$router = $controlador->getRouter();
$route = new Zend_Controller_Router_Route('/p/:idparoquia/:paroquia', array(
	'module'=>'',
	'controller' => 'paroquiaexibir',
	'action'=> 'exibir'));
$router->addRoute('index.exibir.paroquia', $route);



$controler = new Controller();

$usubase = $controler->nome();

$ano_atual = date('Y');

// Carrega a classe Smarty
$view = new ViewSmarty();

// Adiciona o Smarty no registro como view
Zend_Registry::set('view', $view);
Zend_Registry::set('controler', $controler);


//loada o arquivo de configuracao
$config = new Zend_Config_Ini('./app/config.ini','local');

//mapacatolico.com
$gkey = "ABQIAAAAtyifEzud_MG-24R0knqNRBRWaK1xaAgrzDLhuIF7flgUv3LtLhRMmFf_xHO9qJxJstPatmWQwga3CQ";

$view->assign('urlbase',$config->app->base_url);
$view->assign('usuariobase', $usubase);
$view->assign('ano_atual', $ano_atual);

Zend_Registry::set('config', $config);
Zend_Registry::set('urlbase', $config->app->base_url);
Zend_Registry::set('gkey', $gkey);
Zend_Registry::set('ano_atual', $ano_atual);
Zend_Registry::set('usuariobase', $usubase);


//loada classe BD
//Zend_Loader::loadClass('Zend_Db');
//Zend_Loader::loadClass('Zend_Db_Table');
//configurando BD
$db = Zend_Db::factory($config->db->adapter, $config->db->params);//('adapter',array())
$db->query('SET CHARACTER SET utf8'); 
Zend_Db_Table::setDefaultAdapter($db);



// Adiciona db no registro como db
Zend_Registry::set('db',$db);


//usuario nome

/*banner principal
$iBanner = new Cnbanner();
$bannercapa = $iBanner->Banner();
 
$view->assign('bannercapa', $bannercapa);
Zend_Registry::set('bannercapa', $bannercapa);*/


//Roda o sistema
$controlador->dispatch();
 
//sem fechar a tag php
