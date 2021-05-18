<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'code',
        'name',
        'famille',
        'desc',
        'prix_vente',
        'prix_achat',
        'Qte'

        ];
}




