<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'senha', 'email', 'nivel', 'ativo', 'data_cadastro', 'cpf', 'ics', 'matricula', 'comprovante', 'finalidade'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'nome' =>[
            'label' => 'Nome',
            'rules' => 'required|min_length[10]|max_length[50]'
        ], 
        'senha' =>[
            'label' => 'Senha',
            'rules' => 'required|min_length[8]|max_length[255]'
        ], 
        'email' =>[
            'label' => 'e-mail',
            'rules' => 'required|valid_email|max_length[100]'
        ], 
        'nivel' =>[
            'label' => 'Nível',
            'rules' => 'required'
        ],
        'cpf' =>[
            'label' => 'CPF',
            'rules' => 'required|is_unique[usuarios.cpf,id,{id}]|exact_length[11]|numeric'
        ], 
        'ics' =>[
            'label' => 'ICS',
            'rules' => 'required|max_length[100]'
        ], 
        'matricula' =>[
            'label' => 'Matrícula',
            'rules' => 'required|max_length[100]'
        ], 
        'comprovante' =>[
            'label' => 'Comprovante',
            'rules' => 'required|max_length[100]'
        ], 
        'finalidade' =>[
            'label' => 'Finalidade',
            'rules' => 'required|max_length[100]'
        ],
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    protected $beforeInsert = ['beforeInsert'];

    protected function beforeInsert($data)
    {
        $data['data']['ativo'] = 0;
        $data['data']['data_cadastro'] = date('Y-m-d H:i:s');
        $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);

        return $data;
    }
}
