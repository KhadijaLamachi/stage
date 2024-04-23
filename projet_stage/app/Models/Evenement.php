<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Inscription;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = ['titre','description','date_debut','date_fin', 'domaines_cibles', 'posts_cibles'];
    protected $casts = [
        'domaines_cibles' => 'array',
        'posts_cibles' => 'array',
    ];
    public function inscriptions(){
        return $this -> hasMany(Inscription::class);
    }
}
