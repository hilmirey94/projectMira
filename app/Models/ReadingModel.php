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
    // Get Risky Person today
    function riskyPerson($a, $b, $c, $d, $e, $f){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT distinct(rfid) as drfid, date_created FROM reading WHERE date_created >="' . $startDate . '" AND temperature NOT BETWEEN '.$a.' AND '.$b.' AND bpm NOT BETWEEN '.$c.' AND '.$d.' AND spo2 NOT BETWEEN '.$e.' AND '.$f.' ORDER BY DATE_CREATED DESC');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getResult();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results;
    }
    // Get Risky Person Chart today
    function riskyPersonChart($a, $b, $c, $d, $e, $f){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) AS total, DATE(date_created) AS date FROM reading WHERE date_created >="' . $startDate . '" AND temperature NOT BETWEEN '.$a.' AND '.$b.' AND bpm NOT BETWEEN '.$c.' AND '.$d.' AND spo2 NOT BETWEEN '.$e.' AND '.$f.' GROUP BY DATE(date_created)');
        // if query return with row value then get row of data else return nothing
        if($query !== false)
        {
            $results = $query->getResult();
        }
        else
        {
            return false;
        }
        // return count of total row of result
        return $results;
    }
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
    function tempToday($l, $h){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00');
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (temperature < '.$l.' OR temperature > '.$h.') AND date_created >="' . $startDate . '"');
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
    function bpmToday($l, $h){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00');
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (bpm < '.$l.' OR bpm > '.$h.') AND date_created >="' . $startDate . '"');
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
    function spoToday($l, $h){
        // define start date for today
        $startDate = date('Y-m-d 00:00:00');
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (spo2 < '.$l.' OR spo2 > '.$h.') AND date_created >="' . $startDate . '"');
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
    function temp7Days($l, $h){
        // define start date for past 7 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (temperature <= '.$l.' OR temperature >= '.$h.') AND date_created >="' . $startDate . '"');
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
    function bpm7Days($l, $h){
        // define start date for past 7 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (bpm <= '.$l.' OR bpm >= '.$h.') AND date_created >="' . $startDate . '"');
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
    function spo7Days($l, $h){
        // define start date for past 7 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (spo2 <= '.$l.' OR spo2 >= '.$h.') AND date_created >="' . $startDate . '"');
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
    function temp30Days($l, $h){
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (temperature <= '.$l.' OR temperature >= '.$h.') AND date_created >="' . $startDate . '"');
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
    function bpm30Days($l, $h){
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (bpm <= '.$l.' OR bpm >= '.$h.') AND date_created >="' . $startDate . '"');
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
    function spo30Days($l, $h){
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE (spo2 <= '.$l.' OR spo2 >= '.$h.') AND date_created >="' . $startDate . '"');
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
    function tempnormal($l, $h){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature BETWEEN '.$l.' AND '.$h.' AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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
    function templow($l){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature < '.$l.' AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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
    function temphigh($h){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature > '.$h.' AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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
    function bpmnormal($l, $h){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE bpm BETWEEN '.$l.' AND '.$h.' AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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
    function bpmlow($l){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE bpm < '.$l.' AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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
    function bpmhigh($h){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature > '.$h.' AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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
    function sponormal($l, $h){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 BETWEEN '.$l.' AND '.$h.' AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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
    function spolow($l){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 < '.$l.'  AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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
    function spohigh($h){
        // define session
        $session = session();
        // get rfid from session
        $rfid = $session->get('rfid');
        // define start date for past 30 days
        $startDate = date('Y-m-d 00:00:00', strtotime('-30 days'));
        // mysql query data from table
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 > '.$h.' AND date_created >="' . $startDate . '" AND RFID = "'.$rfid.'"');
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