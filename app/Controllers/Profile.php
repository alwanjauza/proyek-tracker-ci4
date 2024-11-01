<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Profile extends BaseController
{
    protected $fakultasModel;
    protected $prodiModel;

    public function __construct()
    {
        $this->fakultasModel = new \App\Models\FakultasModel();
        $this->prodiModel = new \App\Models\ProdiModel();
    }

    public function edit()
    {
        $userModel = new UserModel();
        $userId = user_id();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/error')->with('error', 'User not found');
        }

        $data = [
            'title' => 'Edit Profile',
            'user'  => $user,
            'fakultas' => $this->fakultasModel->asObject()->findAll(),
            'prodi' => $this->prodiModel->asObject()->findAll(),
        ];

        return view('profile/index', $data);
    }


    public function update()
    {
        $userModel = new UserModel();
        $userId = user_id();
        $user = $userModel->find($userId);

        $rules = [
            'fullname' => 'required',
            'password' => 'permit_empty|min_length[8]',
            'no_identitas' => 'required|numeric|min_length[8]|max_length[16]',
            'id_fakultas' => 'required|integer',
            'id_prodi' => 'required|integer',
        ];

        if ($this->request->getPost('username') !== $user->username) {
            $rules['username'] = 'required|alpha_numeric|min_length[3]|max_length[30]|is_unique[users.username]';
        }

        if ($this->request->getPost('email') !== $user->email) {
            $rules['email'] = 'required|valid_email|is_unique[users.email]';
        }

        if ($this->validate($rules)) {
            $data = [
                'fullname' => $this->request->getPost('fullname'),
                'no_identitas' => $this->request->getPost('no_identitas'),
                'id_fakultas' => $this->request->getPost('id_fakultas'),
                'id_prodi' => $this->request->getPost('id_prodi'),
            ];

            if ($this->request->getPost('password')) {
                $data['password_hash'] = Password::hash($this->request->getPost('password'));
            }

            if (isset($rules['username'])) {
                $data['username'] = $this->request->getPost('username');
            }

            if (isset($rules['email'])) {
                $data['email'] = $this->request->getPost('email');
            }

            if ($userModel->update($userId, $data)) {
                return redirect()->to('/project/data')->with('success', 'Profile updated successfully.');
            }
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
}
