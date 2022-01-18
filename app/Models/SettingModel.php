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

}