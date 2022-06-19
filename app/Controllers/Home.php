<?php

namespace App\Controllers;
use App\Models\AcompanhamentoModel;
class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function dashboard()
    {
        
        $acompanhamento = new AcompanhamentoModel();

        $data['submissoes'] = $acompanhamento->findAll();
        return view('home/dashboard', $data);

    }
    public function logout()
    {
        return view('logout');
    }

    public function success()
    {
        return view('success/success');
    }
}
