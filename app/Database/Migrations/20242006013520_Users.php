<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => '10',
                'unique' => true,
                'null' => false,
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'created_at' => [
                'type' => 'text',
            ],
            'updated_at' => [
                'type' => 'text',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}
