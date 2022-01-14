<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class UserModel extends Model{

    protected $table = 'users';

    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'name',
        'rfid',
        'email',
        'password',
        'user_type',
        'image',
        'date_created',
        'email_relative'
    ];

    

}