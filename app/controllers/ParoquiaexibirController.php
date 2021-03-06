<?php

class ParoquiaexibirController extends Zend_Controller_Action {

    public $view;
    public $controler;
    public $gkey;
    public $urlbase;

    public function init() {

        $this->view = Zend_Registry::get("view");
        $this->controler = Zend_Registry::get("controler");
        $this->gkey = Zend_Registry::get("gkey");
    }

    public function exibirAction() {

        $d = new Diocese();
        $p = new Paroquias();
        $t = new Denunciatipo();
        $u = new Usuarios();

        $idparoquia = $this->_request->getUserParam("idparoquia");
        $paroquia = $this->_request->getUserParam("paroquia");


        $result = $p->ListarExibir($paroquia, $idparoquia);

        if ($result["pa_tipo"] == 1) {
            $tipo = "Paroquia";
        } else {
            $tipo = "Capela";
        }

        $diocese = $d->GetName($result["di_id"]);
        $bispo = $d->GetBispo($result["di_id"]);

        $usuario = $u->ListarDados($result["us_id"]);

        if ($this->controler->id() > 0) {

            $denuncia = $t->Listar();
            $this->view->assign('denuncia', $denuncia);
        }


        $this->view->assign('apikey', $this->gkey);
        $this->view->assign('tipo', $tipo);
        $this->view->assign('usuario', $usuario["us_nome"]);
        $this->view->assign('usuarioid', $usuario["us_id"]);
        $this->view->assign('email', $usuario["us_email"]);
        $this->view->assign('bispo', $bispo);
        $this->view->assign('diocese', $diocese);
        $this->view->assign('pa', $result);

        $this->view->assign('template', "default/parish.tpl");
        $this->view->display('default/common_main.tpl');
    }

    public function validarAction() {

        $id = $this->_request->getPost('paroquia');
        $pont = $this->_request->getPost('validacao');

        $va = new Validacao();

        if (!$va->ListarDados($this->controler->id(), $id)) {


            $dados = array('us_id' => $this->controler->id(),
                'pa_id' => $id);
            $va->insert($dados);

            $par = new Paroquias();
            $pont++;
            $dado = array('pa_validacao' => $pont);
            $id = "pa_id=" . $id;

            $par->update($dado, $id);
        }
        $this->_redirect($_SERVER['HTTP_REFERER']);
    }

    
    public function listaproximosAction() {

        $pagina = 1;
        if ($this->_request->getPost('pagina')) {
            $pagina = $this->_request->getPost('pagina');
        }

        //$this->view->assign('proximos',$proximos);

        $p = new Paroquias();

        $latitude = $this->_request->getPost('lat');
        $longitude = $this->_request->getPost('long');

        $result = $p->ListarProximas($latitude, $longitude)->toArray();
        $qtd = 8;
        $total = count($result);

        foreach ($result as $r) {
            $dado = array(
                'latitude' => $r['pa_latitude'],
                'longitude' => $r['pa_longitude']
            );
        }

        $this->view->assign('latitude', $latitude);
        $this->view->assign('longitude', $longitude);

        $this->view->assign('proximos', Paginacao::paginar($result, $pagina, $qtd));

        $this->view->assign('url', $this->urlbase);

        $this->view->assign('template', "default/parish.tpl");
        $this->view->display('default/lista-proximos.tpl');
    }

}

?>