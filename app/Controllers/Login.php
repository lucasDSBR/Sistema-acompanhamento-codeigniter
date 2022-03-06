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
            return redirect()->to('login/index')->with('alert', ['danger' => 'Usuário não informado']);
        }

        $fields = $this->request->getPost();

        $usuarioModel = new UsuarioModel();

        $user = $usuarioModel
            ->where('cpf', $fields['cpf'])
            ->first();
        
        if(!$user)
            return redirect()->to('login/index')->with('alert', ['danger' => 'Usuário não encontrado']);
       
        if($user['ativo'] == 0)
            return redirect()->to('login/index')->with('alert', ['danger' => 'Usuário já cadastrado e aguardando aprovação']);
        
        if(!password_verify($fields['password'], $user['senha']))
            return redirect()->to('login/index')->with('alert', ['danger' => 'Senha inválida para este usuário']);

        $user_session = [
            'id' => $user['id'],
            'nome' => $user['nome'],
            'nivel' => $user['nivel'],
            'finalidade' => $user['finalidade']
        ];

        session()->set('user', $user_session);

        return redirect()->to('dashboard');
        
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
