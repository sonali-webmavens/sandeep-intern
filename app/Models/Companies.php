<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'email' , 'website' , 'logo'];
    public function employees()
    {
        return $this->hasMany(Employees::class , 'companies_id','id');
    }

}
