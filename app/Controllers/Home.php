<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function dashboard()
    {
        
        $data = [
            'titulo' => 'Titulo desejado',
            'submissoes' => []
        ];
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
