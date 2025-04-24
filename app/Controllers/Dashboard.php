<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek apakah sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }
        
        return view('dashboard');
    }
}