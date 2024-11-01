<?php

namespace App\Controllers;

use \Myth\Auth\Password;

class User extends BaseController
{
    protected $db, $builder;
    protected $bagianModel;
    protected $jenisAppModel;
    protected $timItModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->bagianModel = new \App\Models\BagianModel();
        $this->jenisAppModel = new \App\Models\JenisAppModel();
        $this->timItModel = new \App\Models\TimItModel();
    }

    // public function list()
    // {
    //     $this->builder->select('users.id as userId, username, email, name');
    //     $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    //     $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    //     $query = $this->builder->get();

    //     $data = [
    //         'title' => 'List User',
    //         'users' => $query->getResult(),
    //     ];

    //     return view('admin/user/list', $data);
    // }

    // public function list()
    // {
    //     $itemsPerPage = 5;
    //     $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    //     $totalUsers = $this->builder->countAllResults(false);
    //     $offset = ($currentPage - 1) * $itemsPerPage;

    //     $this->builder->select('users.id as userId, username, email, name');
    //     $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    //     $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    //     $this->builder->limit($itemsPerPage, $offset);
    //     $query = $this->builder->get();

    //     $data = [
    //         'title' => 'List User',
    //         'users' => $query->getResult(),
    //         'pager' => \Config\Services::pager(),
    //         'currentPage' => $currentPage,
    //         'totalUsers' => $totalUsers,
    //         'itemsPerPage' => $itemsPerPage,
    //     ];

    //     return view('admin/user/list', $data);
    // }

    public function list()
    {
        $itemsPerPage = 5;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $keyword = $this->request->getVar('keyword');

        $this->builder->select('users.id as userId, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

        if ($keyword) {
            $this->builder->like('username', $keyword);
            $this->builder->orLike('email', $keyword);
        }

        $totalUsers = $this->builder->countAllResults(false);

        $offset = ($currentPage - 1) * $itemsPerPage;
        $this->builder->limit($itemsPerPage, $offset);

        $query = $this->builder->get();

        $data = [
            'title' => 'List User',
            'users' => $query->getResult(),
            'pager' => \Config\Services::pager(),
            'currentPage' => $currentPage,
            'totalUsers' => $totalUsers,
            'itemsPerPage' => $itemsPerPage,
            'keyword' => $keyword,
        ];

        return view('admin/user/list', $data);
    }


    public function edit($id = 0)
    {
        $this->builder->select('users.id as userId, username, email, fullname, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'Edit User',
            'user' => $query->getRow(),
        ];

        if (!$data['user']) {
            return redirect()->to('admin/user/list');
        }

        return view('admin/user/edit', $data);
    }

    public function update($id)
    {
        $fullname = $this->request->getPost('fullname');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $role = $this->request->getPost('role');

        $user = $this->builder->where('id', $id)->get()->getRow();

        $username = $username ? $username : $user->username;
        $email = $email ? $email : $user->email;

        $validation = \Config\Services::validation();
        $validation->setRules([
            'fullname' => 'permit_empty',
            'username' => 'permit_empty',
            'email' => 'permit_empty|valid_email',
            'role' => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->builder->where('id', $id)->update([
            'fullname' => $fullname,
            'username' => $username,
            'email' => $email
        ]);

        $roleBuilder = $this->db->table('auth_groups_users');
        $roleBuilder->where('user_id', $id)->update([
            'group_id' => $role
        ]);

        return redirect()->to('/admin/user/list')->with('success', 'User updated successfully');
    }

    public function new()
    {
        $data = [
            'title' => 'Buat User',
        ];

        return view('admin/user/new', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'fullname' => 'required',
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'role' => 'required|in_list[1,2]'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new \Myth\Auth\Models\UserModel();
        $userId = $userModel->insert([
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password_hash' => Password::hash($this->request->getPost('password')),
            'active' => 1,
            'active_hash' => null,
        ]);

        // Tambahkan user ke grup
        $db = \Config\Database::connect();
        $db->table('auth_groups_users')->insert([
            'user_id' => $userId,
            'group_id' => $this->request->getPost('role')
        ]);

        return redirect()->to('/admin/user/list')->with('success', 'User created successfully');
    }

    public function delete($id)
    {
        if ($this->builder->where('id', $id)->delete()) {
            return redirect()->to('/admin/user/list')->with('success', 'User deleted successfully');
        } else {
            return redirect()->to('/admin/user/list')->with('error', 'Failed to delete user');
        }
    }
}
