<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Controllers\DateTime;

  
class ManageReportController extends Controller
{

    public function index()
    {
        $readingModel = new ReadingModel();

        $session = session();
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        $user_type = $session->get('user_type');
        $data['pageTitle'] = 'Manage Report';
        $data['name'] = $name;
        $data['user_type'] = $session->get('user_type');
        $data['reading'] = $readingModel->orderBy('date_created', 'DESC')->findAll();
        echo view('manage-report/list.php', $data);
    }

    // add report form
    public function create(){
        $data['pageTitle'] = 'Manage Report';
        return view('manage-report/create', $data);
    }
 
    // insert report
    public function store() {
        $readingModel = new ReadingModel();
        $data = [
            'rfid' => $this->request->getVar('rfid'),
            'temperature'  => $this->request->getVar('temperature'),
            'bpm'  => $this->request->getVar('bpm'),
            'spo2'  => $this->request->getVar('spo2'),
        ];
        $readingModel->insert($data);
        return $this->response->redirect(site_url('manage-report'));
    }
    // show single report
    public function singleReport($id = null){
        $data['pageTitle'] = 'Manage Report';
        $readingModel = new ReadingModel();
        $data['report_obj'] = $readingModel->where('id', $id)->first();
        return view('manage-report/edit', $data);
    }
    // update report data
    public function update(){
        $readingModel = new ReadingModel();
        $id = $this->request->getVar('id');
        $data = [
            'rfid' => $this->request->getVar('rfid'),
            'temperature'  => $this->request->getVar('temperature'),
            'bpm'  => $this->request->getVar('bpm'),
            'spo2'  => $this->request->getVar('spo2'),
        ];
        $readingModel->update($id, $data);
        return $this->response->redirect(site_url('manage-report'));
    }

    // delete report
    public function delete($id = null){
        $readingModel = new ReadingModel();
        $data['logs'] = $readingModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('manage-report'));
    }
}