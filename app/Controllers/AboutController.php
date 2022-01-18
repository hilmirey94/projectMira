<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
  
class AboutController extends Controller
{

    public function index()
    {
        // define session
        $session = session();
        // define page title as 'About'
        $data['pageTitle'] = 'About';
        echo view('about/index.php', $data);
    }
}