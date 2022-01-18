<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Controllers\DateTime;
use App\Models\SettingModel;

class ManageWebController extends Controller
{
    public function __construct()
    {
        // define session
        $session = session();
        // get email and user_type of session user
        $email = $session->get('email');
        $access = $session->get('user_type');
        // if session user is not admin then generate access denied message
        if($access != 'admin')
        {
            // print access denied message
            echo '<html><meta name="viewport" content="width=500, initial-scale=1"><body style="margin-top: 40px;"><center>';
            echo '<strong style="color: red; font-size: 24px;">Access Denied!!!</strong><br/><br/>';
            echo 'User with email <strong>\''.$email.'\'</strong> are not authorized to access this page.<br/>';
            echo 'Require access higher than <strong>'.$access.'</strong> level.';
            echo '<p style="margin-top: 50px;"><hr/>'.SITE_NAME.' 2021-2022 - '.SITE_CREATOR.'</p>';
            echo '</center></body></html>';
            // process stop
            die; 
        }

    }

    public function index()
    {
        $settingModel = new SettingModel();

        $session = session();
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        $user_type = $session->get('user_type');
        $data['pageTitle'] = 'Manage Web';
        $data['name'] = $name;
        $data['user_type'] = $session->get('user_type');
        $data['templow'] = $settingModel->where('name', 'templow')->first();
        $data['temphigh'] = $settingModel->where('name', 'temphigh')->first();
        $data['bpmlow'] = $settingModel->where('name', 'bpmlow')->first();
        $data['bpmhigh'] = $settingModel->where('name', 'bpmhigh')->first();
        $data['spolow'] = $settingModel->where('name', 'bpmlow')->first();
        $data['spohigh'] = $settingModel->where('name', 'bpmhigh')->first();
        echo view('manage-web/list.php', $data);
    }
 
    // update report data
    public function update(){
        $settingModel = new SettingModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'value'  => $this->request->getVar('value'),
            'description'  => $this->request->getVar('description'),
        ];
        $settingModel->update($id, $data);
        return $this->response->redirect(site_url('manage-report'));
    }
}