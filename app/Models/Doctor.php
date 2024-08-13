<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



    
    class Doctor extends Model
    {
        protected $fillable = ['nom','image', 'service_id']; // Assurez-vous d'inclure service_id
    
        public function service()
        {
            return $this->belongsTo(Service::class, 'service_id');
        }
    
    
}


