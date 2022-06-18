<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createacompanhamentos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id',
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => '5000',
                'null' => true,
                'default' => NULL
            ],
            'id_usuario_envio' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_usuario_analise' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => NULL
            ],
            'data_envio' => [
                'type' => 'datetime'
            ],
            'data_analise' => [
                'type' => 'datetime',
                'null' => true
            ],
            'pendente' => [
                'type' => 'int',
                'constraint' => 1
            ],
            'tipoServico' => [
                'type' => 'int',
                'constraint' => 1
            ],
            'tipoRevisao' => [
                'type' => 'int',
                'constraint' => 1
            ],
            'tipoTraducao' => [
                'type' => 'int',
                'constraint' => 1
            ],
            'nomeColabs' => [
                'type' => 'VARCHAR',
                'constraint' => '5000',
                'null' => true,
                'default' => NULL
            ],
            'periodicoOrEvento' => [
                'type' => 'int',
                'constraint' => 1
            ],
            'nomePeriodicoOrEvento' => [
                'type' => 'varchar',
                'constraint' => 200
            ],
            'justificativaPedido' => [
                'type' => 'varchar',
                'constraint' => 200
            ],
            'paginas' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true,
                'default' => null
            ],
            'status' => [
                'type' => 'int',
                'constraint' => 1,
                'default' => 0
            ],
            'pathArquivo' => [
                'type' => 'varchar',
                'constraint' => 200,
                'null' => true,
                'default' => null
            ],
            'pathResultado' => [
                'type' => 'varchar',
                'constraint' => 200,
                'null' => true,
                'default' => null
            ]
        ]);
        $this->forge->createTable('acompanhamentos');
    }

    public function down()
    {
        $this->forge->dropTable('acompanhamentos');
    }
}
