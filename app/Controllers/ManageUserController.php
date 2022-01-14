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
        $data['users'] = $userModel->orderBy('date_created', 'DESC')->findAll();
        echo view('manage-user/list.php', $data);
    }

    // add report form
    public function create(){
        $session = session();
        $data['user_type'] = $session->get('user_type');
        $data['pageTitle'] = 'Manage User';
        return view('manage-user/create', $data);
    }
 
    // insert report
    public function store() {
        $session = session();
        $data['user_type'] = $session->get('user_type');
        helper(['form']);
        $rules = [
            'name'              => ['label' => 'Name', 'rules' => 'required|min_length[2]|max_length[50]'],
            'rfid'              => ['label' => 'RFID', 'rules' => 'required|min_length[8]|max_length[100]|is_unique[users.rfid]'],
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
            ];
            $image = $this->request->getFile('image');
            if ($this->request->getFile('image') != ''){
                $validationRule = [
                    'image' => [
                        'label' => 'Image File',
                        'rules' => 'uploaded[image]'
                            . '|is_image[image]'
                            . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                ];
                if (! $this->validate($validationRule)) {
                    $data['validation'] = $this->validator;
        
                    return view('manage-user/edit', $data);
                }
                $imageName = $image->getRandomName();
                $image->move('uploads/', $imageName);
                $data['image'] = $imageName;
            }
            
            $userModel->save($data);

            return redirect()->to('manage-user');
        }else{
            $data['validation'] = $this->validator;
            echo view('manage-user/create', $data);
        }
    }
    // show single report
    public function singleReport($id = null){
        $data['pageTitle'] = 'Manage User';
        $session = session();
        $data['user_type'] = $session->get('user_type');
        $data['image'] = $session->get('image');
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('manage-user/edit', $data);
    }
    // update report data
    public function update(){
        $session = session();
        $rfid = $session->get('rfid');
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name'     => $this->request->getVar('name'),
            'rfid'     => $this->request->getVar('rfid'),
            'email'    => $this->request->getVar('email'),
            'email_relative' => $this->request->getVar('email_relative'),
        ];
        $userType = $this->request->getVar('user_type');
        if ($userType != null){
            $data['user_type'] = $userType;
        }
        $image = $this->request->getFile('image');
        if ($this->request->getFile('image') != ''){
            $validationRule = [
                'image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[image]'
                        . '|is_image[image]'
                        . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ];
            if (! $this->validate($validationRule)) {
                $data['user_obj'] = $userModel->where('id', $id)->first();
                $data['validation'] = $this->validator;
    
                return view('manage-user/edit', $data);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
            $data['image'] = $imageName;
        }
        $userModel->update($id, $data);
        // Resession in case change own data
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
        return $this->response->redirect(site_url('manage-user'));
    }

    // delete report
    public function delete($id = null){
        $userModel = new UserModel();
        $data['logs'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('manage-user'));
    }
}