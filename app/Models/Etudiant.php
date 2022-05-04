<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Etudiant extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'etudiants';
    protected $primaryKey = 'id_etud';
    protected $fillable = [
        'name',
        'prenom',
        'date_de_naissance',
        'promo',
       
    ];}
