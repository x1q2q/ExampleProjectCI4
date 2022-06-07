<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'id' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
			'username' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
			],
			'nama' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
			],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
			'tempat_lahir' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'tanggal_lahir date default null',
			'jenis_kelamin'      => [
				'type'           => 'ENUM',
				'constraint'     => ['laki-laki', 'perempuan'],
				'default'        => 'laki-laki',
			],
            'telepon' => [
				'type' => 'VARCHAR',
				'constraint' => 15,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'avatar' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'created_at datetime default current_timestamp',
        	'updated_at datetime default current_timestamp on update current_timestamp'
		]);
		//buat primary key
		$this->forge->addKey('id', true);
		//buat nama tabel
		$this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
