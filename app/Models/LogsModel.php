<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class LogsModel extends Model{
    // define logs table
    protected $table = 'logs';
    // define id as primary key
    protected $primaryKey = 'id';
    // define other column of table
    protected $allowedFields = [
        'operation',
        'description',
        'rfid',
        'date_created'
    ];

}