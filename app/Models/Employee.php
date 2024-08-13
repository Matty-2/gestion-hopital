<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'email',
        'telephone',
        'service_id',
        'role',
    ];


    public function service()
        {
            return $this->belongsTo(Service::class, 'service_id');
        }
    

}

