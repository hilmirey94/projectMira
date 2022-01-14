<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Controllers\DateTime;

  
class ManageUserController extends Controller
{

    public function index()
    {
        $userModel = new UserModel();
        $session = session();
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        $user_type = $session->get('user_type');
        $data['pageTitle'] = 'Manage User';
        $data['name'] = $name;
        $data['user_type'] = $session->get('user_type');
        $data['users'] = $userModel->orderBy('created_date', 'DESC')->findAll();
        echo view('manage-user/list.php', $data);
    }

    // add report form
    public function create(){
        $data['pageTitle'] = 'Manage User';
        return view('manage-user/create', $data);
    }
 
    // insert report
    public function store() {
        helper(['form']);
        $rules = [
            'name'              => ['label' => 'Name', 'rules' => 'required|min_length[2]|max_length[50]'],
            'rfid'              => ['label' => 'RFID', 'rules' => 'required|min_length[8]|max_length[100]|valid_rfid|is_unique[users.rfid]'],
            'email'             => ['label' => 'Email', 'rules' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]'],
            'password'          => ['label' => 'Password', 'rules' => 'required|min_length[4]|max_length[50]'],
            'user_type'         => ['label' => 'User Type', 'rules' => 'required'],
            //'image'             => ['label' => 'Name', 'rules' => 'required'],
            'confirmpassword'   => ['label' => 'Confirm Password', 'rules' => 'matches[password]']
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();

            $data = [
                'name'     => $this->request->getVar('name'),
                'rfid'     => $this->request->getVar('rfid'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'user_type'     => $this->request->getVar('user_type'),
                'image'     => $this->request->getVar('image'),
            ];

            $userModel->save($data);

            return redirect()->to('manage-user');
        }else{
            $data['validation'] = $this->validator;
            echo view('manage-user/create', $data);
        }
    }
    // show single report
    public function singleReport($id = null){
        $data['pageTitle'] = 'Edit User';
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('manage-user/edit', $data);
    }
    // update report data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'rfid' => $this->request->getVar('rfid'),
            'temperature'  => $this->request->getVar('temperature'),
            'bpm'  => $this->request->getVar('bpm'),
            'spo2'  => $this->request->getVar('spo2'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('manage-user'));
    }

    // delete report
    public function delete($id = null){
        $userModel = new UserModel();
        $data['logs'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('manage-user'));
    }
}