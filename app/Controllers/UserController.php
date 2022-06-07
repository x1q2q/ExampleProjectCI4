<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        return view('general/user');
    }
    public function getDataUsers(){
        $request = Services::request();
        $datatable = new UserModel();
        $datatable->initDatatables($request);

        if ($request->isAJAX()) {
            $data = $datatable->getDatatables();
            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }
    public function insertData(){
        $validation = \Config\Services::validation();
        $attribute = [
            'first_name' => [
                'label' => 'Nama Depan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'telepon' => [
                'label' => 'Telepon',
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_natural' => '{field} harus berupa angka'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} harus valid',
                    'is_unique' => '{field} harus unique'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} harus unique'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus lebih dari 8 karakter'
                ]
            ],
            'confirm_password' => [
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} harus sama dengan field Password'
                ]
            ],
            'avatar' => [
                'label' => 'Profil',
                'rules' => 'uploaded[avatar]|ext_in[avatar,jpg,jpeg,png]|max_size[avatar,500]',
                'errors' => [
                    'uploaded' => '{field} harap diisi jpg/jpeg/png',
                    'ext_in' => '{field} harus berupa jpg/jpeg/png',
                    'max_size' => '{field} tidak boleh melebihi batas 500kb'
                ]
            ]
        ];
        $validation->setRules($attribute);

        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $users = new UserModel();
            $full_name = $this->request->getPost('first_name'). ' '.$this->request->getPost('last_name');
            $newName = '-';
            if($file = $this->request->getFile('avatar')) {
                if ($file->isValid() && ! $file->hasMoved()) {    
                   $newName = $file->getRandomName();     
                   // Store file in public/uploads/ folder
                   $file->move('../public/assets/img/uploads/users', $newName);
                }
            }
            $values = [
                "nama" => $full_name,
                "alamat" => $this->request->getPost('address'),
                "tempat_lahir" => $this->request->getPost('place_birth'),
                "tanggal_lahir" => $this->request->getPost('date_birth'),
                "telepon" => $this->request->getPost('telepon'),
                "username" => $this->request->getPost('username'),
                "email" => $this->request->getPost('email'),
                "jenis_kelamin" => $this->request->getPost('gender'),
                "avatar" => $newName,
                "password" => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT)
            ];
            $users->insert($values);
            $result = ['status' => 200, 'data' => $values];
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors()];
        }
        echo json_encode($result);
    }
}
