<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class UserModel extends Model{
    // define user table
    protected $table = 'users';
    // define id as primary key
    protected $primaryKey = 'id';
    // define other column of table
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