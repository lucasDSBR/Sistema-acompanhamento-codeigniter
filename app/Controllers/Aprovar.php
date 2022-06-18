<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class Aprovar extends BaseController
{
    public function __construct()
    {
        $this->model = new UsuarioModel();
    }
    public function index()
    {
        $usuarioModel = new UsuarioModel();

        $data['usuariosInativos'] = $usuarioModel->where('ativo', 0)->findAll();
        return view('aprovar/aprovar', $data);
    }
    public function aprovar($id)
    {
        $idUser = $id;
        return view('aprovar/aprovar');
    }

    public function detalhesUser($matricula = null)
    {
        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->where('matricula', $matricula)->first();
        // Redireciona o visitante para dash board
        return view('detalhesUser/detalhesUserId', $data);
    }

    function aprovarUser($matriculaUser = null)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('matricula', $matriculaUser)->first();
        $usuario['ativo'] = "1";
        
        if(!$usuarioModel->save($usuario)) {
            return redirect()->back()
                ->withInput()
                ->with('alert', ['danger' => 'Erro ao aprovar usuário']);
        }else{
            //header("Location: /aprovar"); exit;
            return redirect()->back()
                ->withInput()
                ->with('alert', ['success' => 'Usuario aprovado com sucesso!']);
        }
        
    }

    function reprovarUser($matriculaUser = null)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('matricula', $matriculaUser)->first();
        $usuario['ativo'] = "0";
        
        if(!$usuarioModel->save($usuario)) {
            return redirect()->back()
                ->withInput()
                ->with('alert', ['danger' => 'Erro ao aprovar usuário']);
                
        }else{
            //header("Location: /aprovar"); exit;
            return redirect()->back()
                ->withInput()
                ->with('alert', ['success' => 'Usuário reprovado com sucesso !']);
        }
    }
}
