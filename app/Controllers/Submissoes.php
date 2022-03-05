<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AcompanhamentoModel;

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
        $img = $this->request->getFile('file');

        $fields = $this->request->getPost();

        if($this->model->insert($fields))
            return redirect()->to('dashboard');

        $errors = $this->model->validation->getErrors();
        return redirect()->to('submissoes/new')->with('erros', $errors)->withInput();
        
        var_dump($this->request);
    }
}
