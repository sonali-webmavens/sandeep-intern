<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','email','phone','companies_id'];
    public function companies()
    {
        return $this->belongsTo(Companies::class );
    }
}
