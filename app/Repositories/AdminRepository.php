<?php 
namespace App\Repositories;

use App\Models\Admin;

class AdminRepository{

    public function getAll(){
        return Admin::all();
    }

    public function adminDelete(Admin $admin)
    {
        $admin->delete();
    }
    public function adminUpdate(array $data , Admin $admin)
    {
        $admin->update($data);
        return $admin;
    }
}