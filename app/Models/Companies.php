<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Companies extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['name' , 'email' , 'website' , 'logo'];
    public function employees()
    {
        return $this->hasMany(Employees::class , 'companies_id','id');
    }

}
