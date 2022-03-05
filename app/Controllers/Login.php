<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Login extends BaseController
{

    public function index()
    {
        echo view('login/index');
    }

    public function validLogin()
    {
        if (!empty($_POST) AND (empty($_POST['cpf']) OR empty($_POST['password']))) {
            return redirect()->to('login/index')->with('error', 'Usuário não informado');
        }

        $fields = $this->request->getPost();

        $usuarioModel = new UsuarioModel();

        $user = $usuarioModel
            ->where('cpf', $fields['cpf'])
            ->where('senha', $fields['password'])
            ->first();
        
        if(!$user)
            return redirect()->to('login/index')->with('error', 'Usuário inválido');
            var_dump($user);

       
        if($user['ativo'] == 0)
            return redirect()->to('login/index')->with('error', 'Usuário aguardando aprovação');

        $user_session = [
            'id' => $user['id'],
            'nome' => $user['nome'],
            'nivel' => $user['nivel'],
            'finalidade' => $user['finalidade']
        ];

        session()->set('user', $user_session);

        return redirect()->to('dashboard');
        
    }
}
