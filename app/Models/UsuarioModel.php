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
            'rules' => 'required|max_length[50]'
        ], 
        'senha' =>[
            'label' => 'Senha',
            'rules' => 'required|max_length[40]'
        ], 
        'email' =>[
            'label' => 'e-mail',
            'rules' => 'required|max_length[100]'
        ], 
        'nivel' =>[
            'label' => 'Nível',
            'rules' => 'required'
        ], 
        'ativo' =>[
            'label' => 'Ativo',
            'rules' => 'required'
        ], 
        'data_cadastro' =>[
            'label' => 'Data do cadastro',
            'rules' => 'required'
        ], 
        'cpf' =>[
            'label' => 'CPF',
            'rules' => 'required|max_length[11]'
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

}
