<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SignupController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Sign Up';
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'              => ['label' => 'Name', 'rules' => 'required|min_length[2]|max_length[50]'],
            'rfid'              => ['label' => 'RFID', 'rules' => 'required|min_length[8]|max_length[100]|is_unique[users.rfid]'],
            'email'             => ['label' => 'Email', 'rules' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]'],
            'password'          => ['label' => 'Password', 'rules' => 'required|min_length[4]|max_length[50]'],
            'confirmpassword'   => ['label' => 'Confirm Password', 'rules' => 'matches[password]']
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();

            $data = [
                'name'     => $this->request->getVar('name'),
                'rfid'     => $this->request->getVar('rfid'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'user_type'  => 'normal',
            ];

            $userModel->save($data);

            return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
          
    }
  
}