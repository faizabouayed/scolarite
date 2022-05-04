<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Promotion extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'promotions';
   /* protected $newDateFormat = $promotion->annee->format('Y-Y'); 
    dd($newDateFormat);*/
    protected $primaryKey = 'id_pr';
    protected $fillable = [
        'libelle',
        'annee_debut',
        'annee_fin',
        'option',
       
    ];
}
