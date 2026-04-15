<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'name','phone','email','id_number','role','photo','portal_file','certificate','major','status','notes'
    ];
}?>