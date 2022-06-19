<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AcompanhamentoModel;
use \DateTime; 
use DateTime as GlobalDateTime;
use CodeIgniter\Files\File;

class Submissoes extends BaseController
{
    private $maxFileUpload = 2048;
    private $extensionsPermited = ['pdf'];
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
        $acompanhamento = new AcompanhamentoModel();
        //Validando arquivo enviado
        $file = $this->request->getFile('file');

        $fileError = $file->getError();

        if($fileError <> 0 )
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => 'errro']);

        $fileExtensionClient = $file->guessExtension();
        if(!in_array($fileExtensionClient, $this->extensionsPermited ))
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => 'Extensão não permitida para o arquivo']);

        if((int)$file->getSizeByUnit('kb') > $this->maxFileUpload)
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => 'Arquivo maior do que o permitido']);





        $session = session();
        $userSession = $session->get('user');
        $file = $this->request->getFile('file');
        $data = new DateTime();
        $fields = $this->request->getPost();
        $fields['id_usuario_envio'] = intval($userSession['id']);
        $fields['pendente'] = "0";
        $fields['status'] = 0;
        $fields['tipoServico'] = intval($fields['tipoServico']);
        $fields['tipoTraducao'] = intval($fields['tipoTraducao']);
        $fields['tipoRevisao'] = intval($fields['tipoRevisao']);
        $fields['periodicoOrEvento'] = intval($fields['periodicoOrEvento']);
        $fields['data_envio'] = $data->format('Y-m-d H:i:s');
        $fields['data_analise'] = "0000-00-00 00:00:00";

        //Tentando gravar arquivo na pasta
        if (!$file->hasMoved()) {
            $filepath = 'arquivoParaAnalise/';
            $fields['pathArquivo'] = $filepath.$fields['id_usuario_envio'].'/'.$file->getName();
            $file->move($filepath.$fields['id_usuario_envio'].'/');
        }
        if($this->model->insert($fields))
            return redirect()->to('dashboard');

        $errors = $this->model->validation->getErrors();
        return redirect()->to('submissoes/new')->with('erros', $errors)->withInput();

        var_dump($this->request);
    }
}
