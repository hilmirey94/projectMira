<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class ReadingModel extends Model{

    protected $table = 'reading';
    
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'rfid',
        'temperature',
        'bpm',
        'spo2',
        'date_created'
    ];

    function scanToday(){
        $startDate = date('Y-m-d 00:00:00');
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE date_created >="' . $startDate . '"');
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        return $results->count;
    }

    function tempToday(){
        $startDate = date('Y-m-d 00:00:00');
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE temperature <= 35 AND temperature >=37.5 AND date_created >="' . $startDate . '"');
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        return $results->count;
    }

    function bpmToday(){
        $startDate = date('Y-m-d 00:00:00');
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE bpm <= 60 AND bpm >=180 AND date_created >="' . $startDate . '"');
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        return $results->count;
    }

    function spoToday(){
        $startDate = date('Y-m-d 00:00:00');
        $query = $this->db->query('SELECT COUNT(*) count FROM reading WHERE spo2 <= 95 AND spo2 >=200 AND date_created >="' . $startDate . '"');
        if($query !== false)
        {
            $results = $query->getRow();
        }
        else
        {
            return false;
        }
        return $results->count;
    }

}