<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createusuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id',
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'senha' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'nivel' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 1
            ],
            'ativo' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0
            ],
            'data_cadastro' => [
                'type' => 'datetime'
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'unique' => true
            ],
            'ics' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'matricula' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'comprovante' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'finalidade' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
