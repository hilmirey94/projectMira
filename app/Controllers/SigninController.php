<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  

class SigninController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Sign In';
        helper(['form']);
        echo view('signin');
    } 
  
    public function loginAuth()
    {
        $session = session();

        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'rfid' => $data['rfid'],
                    'email' => $data['email'],
                    'user_type' => $data['user_type'],
                    'image' => $data['image'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('/home');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }

        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }

    public function resession()
    {
        $session = session();
        $userModel = new UserModel();
        $id = $this->request->$session->get('id');
        $resessionData = $userModel->where('id', $id)->first();
        $ses_data = [
            'id' => $resessionData['id'],
            'name' => $resessionData['name'],
            'rfid' => $resessionData['rfid'],
            'email' => $resessionData['email'],
            'user_type' => $resessionData['user_type'],
            'image' => $resessionData['image'],
            'isLoggedIn' => TRUE
        ];

        $session->set($ses_data);

        return redirect();
    }
}