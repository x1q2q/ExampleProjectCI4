<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Users extends Seeder
{
    public function run()
    {
        //
        // create data
        $news_data = [
			[
				'username' => 'rafiknurf',
				'nama'  => 'Arafik Nur F',
                'alamat' => 'Widororejo, Makamhaji',
                'tempat_lahir' => 'Pengadegan, Purbalingga',
                'tanggal_lahir' => '2001-01-10',
                'jenis_kelamin' => 'laki-laki',
                'telepon' => '085714284782',
                'email' => 'rbojjes@gmail.com',
				'password' => password_hash('bojes123',PASSWORD_BCRYPT),
                'avatar' => 'rafik1.png',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
			],
            [
				'username' => 'adityans',
				'nama'  => 'Aditya Nur S',
                'alamat' => 'Kalikabong, Kalimanah',
                'tempat_lahir' => 'Pengadegan, Purbalingga',
                'tanggal_lahir' => '2008-04-12',
                'jenis_kelamin' => 'laki-laki',
                'telepon' => '08773239782',
                'email' => 'aditbojes@gmail.com',
				'password' => password_hash('adit123',PASSWORD_BCRYPT),
                'avatar' => 'adit1.png',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
			],
            [
				'username' => 'lukmans',
				'nama'  => 'Lukman Nur H',
                'alamat' => 'Karangtengah, Pengadegan',
                'tempat_lahir' => 'Pengadegan, Purbalingga',
                'tanggal_lahir' => '1994-12-04',
                'jenis_kelamin' => 'laki-laki',
                'telepon' => '08128639782',
                'email' => 'lukmannurh@gmail.com',
				'password' => password_hash('lukman123',PASSWORD_BCRYPT),
                'avatar' => 'lukman1.png',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
			]
		];

		foreach($news_data as $data){
			$this->db->table('users')->insert($data);
		}
    }
}
