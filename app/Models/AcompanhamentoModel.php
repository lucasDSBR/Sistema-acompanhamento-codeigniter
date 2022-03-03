<?php

namespace App\Models;

use CodeIgniter\Model;

class AcompanhamentoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'acompanhamentos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_usuario_envio',
        'id_usuario_analise',
        'data_envio',
        'data_analise',
        'pedente',
        'tipoServico',
        'tipoRevisao',
        'tipoTraducao',
        'nomeColabs',
        'periodicoOrEvento',
        'nomePeriodicoOrEvento',
        'justificativaPedido',
        'paginas',
        'status',
        'pathArquivo',
        'pathResultado',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_usuario_envio' => [
            'label' => 'Usuário requerente',
            'rules' => 'required'
        ],
        'id_usuario_analise' => [
            'label' => 'Usuário que analisou',
            'rules' => ''
        ],
        'data_envio' => [
            'label' => 'Data de envio',
            'rules' => 'required'
        ],
        'data_analise' => [
            'label' => 'Data de análise',
            'rules' => ''
        ],
        'pedente' => [
            'label' => 'Pendente',
            'rules' => 'required'
        ],
        'tipoServico' => [
            'label' => 'Tipo de serviço',
            'rules' => 'required'
        ],
        'tipoRevisao' => [
            'label' => 'Tipo de revisão',
            'rules' => 'required'
        ],
        'tipoTraducao' => [
            'label' => 'Tipo de tradução',
            'rules' => 'required'
        ],
        'nomeColabs' => [
            'label' => 'Colaboradores',
            'rules' => 'max_length[5000]'
        ],
        'periodicoOrEvento' => [
            'label' => 'Periódico ou evento',
            'rules' => 'required'
        ],
        'nomePeriodicoOrEvento' => [
            'label' => 'Nome do periódico ou evento',
            'rules' => 'max_length[200]'
        ],
        'justificativaPedido' => [
            'label' => 'Justificativa do pedido',
            'rules' => 'max_length[200]'
        ],
        'paginas' => [
            'label' => 'Páginas',
            'rules' => 'max_length[100]'
        ],
        'status' => [
            'label' => 'Status',
            'rules' => 'required'
        ],
        'pathArquivo' => [
            'label' => 'Caminho do arquivo',
            'rules' => 'max_length[200]'
        ],
        'pathResultado' => [
            'label' => 'Caminho do resultado',
            'rules' => 'max_length[200]'
        ],
        ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

}
