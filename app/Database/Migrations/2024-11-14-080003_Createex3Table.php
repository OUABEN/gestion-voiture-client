<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createex3Table extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'prenom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ex3');
    }

    public function down()
    {
        $this->forge->dropTable('ex3');
     
    }
}
