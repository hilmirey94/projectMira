<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class LogsModel extends Model{

    protected $table = 'logs';
    
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'operation',
        'description',
        'rfid',
        'date_created'
    ];

}