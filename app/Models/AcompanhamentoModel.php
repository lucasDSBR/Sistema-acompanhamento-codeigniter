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
        'titulo',
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
            'titulo' => [
                'label' => 'Titulo',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O titulo é obrigatório'
                ]
            ],
            'id_usuario_envio' => [
                'label' => 'Usuário requerente',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O Id do usuário de envio é obrigatório'
                ]
            ],
            'id_usuario_analise' => [
                'label' => 'Usuário que analisou',
                'rules' => 'max_length[200]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'data_envio' => [
                'label' => 'Data de envio',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Erro na data.'
                ]
            ],
            'data_analise' => [
                'label' => 'Data de análise',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Erro na data.'
                ]
            ],
            'pendente' => [
                'label' => 'Pendente',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O status é obrigatório.'
                ]
            ],
            'tipoServico' => [
                'label' => 'Tipo de serviço',
                'rules' => 'max_length[3]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'tipoRevisao' => [
                'label' => 'Tipo de revisão',
                'rules' => 'max_length[3]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'tipoTraducao' => [
                'label' => 'Tipo de tradução',
                'rules' => 'max_length[3]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'nomeColabs' => [
                'label' => 'Colaboradores',
                'rules' => 'max_length[5000]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'periodicoOrEvento' => [
                'label' => 'Periódico ou evento',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo "Periodico ou evento" é obrigatório.'
                ]
            ],
            'nomePeriodicoOrEvento' => [
                'label' => 'Nome do periódico ou evento',
                'rules' => 'max_length[200]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'justificativaPedido' => [
                'label' => 'Justificativa do pedido',
                'rules' => 'max_length[200]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'paginas' => [
                'label' => 'Páginas',
                'rules' => 'max_length[100]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo status é obrigatório.'
                ]
            ],
            'pendente' => [
                'label' => 'Pendente',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo Pendente é obrigatório.'
                ]
            ],
            'pathArquivo' => [
                'label' => 'Caminho do arquivo',
                'rules' => 'max_length[200]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
            'pathResultado' => [
                'label' => 'Caminho do resultado',
                'rules' => 'max_length[200]',
                'errors' => [
                    'required' => 'Tamanho máximo de caracteres excedido.'
                ]
            ],
        ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

}
