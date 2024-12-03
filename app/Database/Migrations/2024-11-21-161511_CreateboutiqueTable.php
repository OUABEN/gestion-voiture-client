<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBoutiqueTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'quantite' => [
                'type'       => 'INT',
                'constraint' => 11, 
            ],
            'prix' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'total' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
           
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('boutique');
    }

    public function down()
    {
        $this->forge->dropTable('boutique');
    }
}
