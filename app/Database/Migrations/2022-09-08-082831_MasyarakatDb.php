<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasyarakatDb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'alamat' => [
                'type'          => 'VARCHAR',
                'constraint'      => '225',
            ],
            'umur' => [
                'type'          => 'VARCHAR',
                'constraint'      => '225',
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('MasyarakatDb');
    }

    public function down()
    {
        $this->forge->dropTable('MasyarakatDb');
    }
}
