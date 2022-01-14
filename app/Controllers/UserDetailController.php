<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Controllers\DateTime;
  
class UserDetailController extends Controller
{

    public function index()
    {
        $userModel = new UserModel();
        $session = session();
        $id = $session->get('id');
        $userModel = new UserModel();
        $data['pageTitle'] = 'User Detail';
        $data['user_obj'] = $userModel->where('id', $id)->first();
        echo view('user-detail/list.php', $data);
    }

    public function singleReport($id = null)
    {
        $userModel = new UserModel();
        $session = session();
        $id = $session->get('id');
        $userModel = new UserModel();
        $data['pageTitle'] = 'User Detail';
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('user-detail/edit', $data);
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
    
                return view('user-detail/edit', $data);
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
        return $this->response->redirect(site_url('user-detail/'.$id));
    }

}