<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class UserModel extends Model{

    protected $table = 'users';
    
    protected $allowedFields = [
        'name',
        'rfid',
        'email',
        'password',
        'user_type',
        'image',
        'created_at'
    ];

    

}