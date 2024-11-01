<?php

namespace App\Controllers;

class Error extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Error Page',
        ];
        return view('error/404', $data);
    }
}
