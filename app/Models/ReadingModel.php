<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class ReadingModel extends Model{

    //define reading table
    protected $table = 'reading';
    
    // define id as primary key
    protected $primaryKey = 'id';
    
    // define other column on reading table
    protected $allowedFields = [
        'rfid',
        'temperature',
        'bpm',
        'spo2',
        'date_created'
    ];

    // MySQL query for all user 
    // Get total today scan ID (all user)
    function scanToday(){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00');
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total today temperature (all user)
    function tempToday(){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00');
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature < 36 AND temperature >37.5 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total today heartrate (all user)
    function bpmToday(){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00');
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE bpm < 60 AND bpm > 110 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }// return count of total row of result
        return $results->count;
    }

    // Get total today oxygen (all user)
    function spoToday(){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00');
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 < 95 AND spo2 > 110 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total id scan for past 7 days (all user)
    function scan7Days(){
        // define start date for past 7 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total not normal temperature for past 7 days (all user)
    function temp7Days(){
        // define start date for past 7 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature <= 35 AND temperature >=37.5 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total not normal heartrate for past 7 days (all user)
    function bpm7Days(){
        // define start date for past 7 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE bpm <= 60 AND bpm >=180 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total not normal oxygen for past 7 days (all user)
    function spo7Days(){
        // define start date for past 7 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 <= 95 AND spo2 >=200 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total id scan for past 30 days (all user)
    function scan30Days(){
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total not normal temperature for past 30 days (all user)
    function temp30Days(){
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature <= 35 AND temperature >=37.5 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total not normal heartrate for past 30 days (all user)
    function bpm30Days(){
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE bpm <= 60 AND bpm >=180 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total not normal oxygen for past 30 days (all user)
    function spo30Days(){
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 <= 95 AND spo2 >=200 AND date_created >="' . $startDate . '"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // MySQL query for single user (login user) filter by rfid of session user
    // Get total normal temperature today for single user (login user)
    function tempnormal(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature BETWEEN 36 AND 37.5 AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total low temperature today for single user (login user)
    function templow(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature < 36 AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total high temperature today for single user (login user)
    function temphigh(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature > 37.5 AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total normal heartrate today for single user (login user)
    function bpmnormal(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE bpm BETWEEN 60 AND 110 AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total low heartrate today for single user (login user)
    function bpmlow(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE bpm < 60 AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total high heartrate today for single user (login user)
    function bpmhigh(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature > 110 AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total normal oxygen today for single user (login user)
    function sponormal(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 BETWEEN 95 AND 110 AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total low oxygen today for single user (login user)
    function spolow(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 < 95  AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }

    // Get total high oxygen today for single user (login user)
    function spohigh(){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 > 110 AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results->count;
    }


}