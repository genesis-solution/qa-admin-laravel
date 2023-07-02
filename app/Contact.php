<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $table = 'contacts';

    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_country',
        'contact_area',
    ];
}
