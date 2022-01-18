<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class SettingModel extends Model{
    //define setting table
    protected $table = 'setting';
    // define id as primary key
    protected $primaryKey = 'id';
    // define other column of table
    protected $allowedFields = [
        'name',
        'value',
        'description'
    ];

    function templow($templow){
        $query = $this->db->query('UPDATE FROM reading SET value = "'.$templow.'" WHERE name = "templow"');
        if($query !== false){
            $results = $query;
        }
        else{
            return false;
        }
        return $results;
    }

    function temphigh($temphigh){
        $query = $this->db->query('UPDATE FROM reading SET value = "'.$temphigh.'" WHERE name = "temphigh"');
        if($query !== false){
            $results = $query;
        }
        else{
            return false;
        }
        return $results;
    }

    function bpmlow($bpmlow){
        $query = $this->db->query('UPDATE FROM reading SET value = "'.$bpmlow.'" WHERE name = "bpmlow"');
        if($query !== false){
            $results = $query;
        }
        else{
            return false;
        }
        return $results;
    }

    function bpmhigh($bpmhigh){
        $query = $this->db->query('UPDATE FROM reading SET value = "'.$bpmhigh.'" WHERE name = "bpmhigh"');
        if($query !== false){
            $results = $query;
        }
        else{
            return false;
        }
        return $results;
    }

    function spolow($spolow){
        $query = $this->db->query('UPDATE FROM reading SET value = "'.$spolow.'" WHERE name = "spolow"');
        if($query !== false){
            $results = $query;
        }
        else{
            return false;
        }
        return $results;
    }

    function spohigh($spohigh){
        $query = $this->db->query('UPDATE FROM reading SET value = "'.$spohigh.'" WHERE name = "spohigh"');
        if($query !== false){
            $results = $query;
        }
        else{
            return false;
        }
        return $results;
    }

}