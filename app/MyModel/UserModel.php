<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table="user_tbl";
    protected $primaryKey = 'u_id';
    protected $fillable = ['email', 'password','created_at','updated_at'];
}
