<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AcompanhamentoModel;
use App\Controllers\DateTime;
use DateTime as GlobalDateTime;

class Submissoes extends BaseController
{

    public function __construct()
    {
        $this->model = new AcompanhamentoModel();
    }
    public function index()
    {
        //
    }

    public function new()
    {
        return view('submissoes/new');
    }

    public function create()
    {
        $session = session();
        $userSession = $session->get('user');
        $file = $this->request->getFile('file');

        $fields = $this->request->getPost();
        $fields['id_usuario_envio'] = intval($userSession['id']);
        $fields['status'] = 0;
        $fields['tipoServico'] = intval($fields['tipoServico']);
        $fields['tipoTraducao'] = intval($fields['tipoTraducao']);
        $fields['tipoRevisao'] = intval($fields['tipoRevisao']);
        $fields['periodicoOrEvento'] = intval($fields['periodicoOrEvento']);

        $ok = $this->model->insert($fields);
        if($ok)
            return redirect()->to('dashboard');

        $errors = $this->model->validation->getErrors();
        return redirect()->to('submissoes/new')->with('erros', $errors)->withInput();
        
        var_dump($this->request);
    }
}
