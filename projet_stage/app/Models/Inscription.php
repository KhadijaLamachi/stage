<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Utilisateur;
use App\Models\Evenement;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = ['evenement_id', 'utilisateur_id'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

}
