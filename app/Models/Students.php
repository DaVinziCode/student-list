<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
    ]; // specific subject for change 
    // protected $guarded = []; //change all the data
    use HasFactory;
}
