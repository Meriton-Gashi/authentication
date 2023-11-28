<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $casts = [
        'phones' => 'json',
        'emails' => 'json',
    ];
    protected $table = 'contacts'; // Emri i tabelës në bazën e të dhënave
    protected $fillable = ['firstname', 'lastname','address','zip','country','phones','emails','publish']; // Kolonat që lejohen të plotësohen


}
