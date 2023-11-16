<?php
namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Repositories\AdminRepository;

class AdminController extends Controller
{
    public function __construct(private AdminRepository $adminRepository)
    {
        $this->adminRepository=$adminRepository;
    }

    public function getAll(){
        $users=$this->adminRepository->getAll();
        return view('admin.admin.index',['users'=>$users]);
    }

    public function adminEdit(Admin $admin){
        return view('admin.admin.form',['admin'=>$admin]);
    }
 
    public function adminDelete(Admin $admin){
        $this->adminRepository->adminDelete($admin);
        return redirect(route('admin.index'));
    }
    
    public function adminUpdate(Request $request,Admin $admin)
    {
        $data = [
            'name'=>$request->get('name'),
            'email'=>$request->get('email')
        ];
        $userUpdate=$this->adminRepository->adminUpdate($data,$admin);
        return redirect()->route('admin.index');
    }
}
