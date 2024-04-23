<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Utilisateur extends Model implements Authenticatable
{
    use HasFactory, Notifiable, AuthenticatableTrait;

    protected $fillable = ['nom', 'prenom', 'cin', 'email', 'password', 'telephone', 'role', 'post', 'domaine'];
    
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function isAdmin()
    {
        return $this->role === 'Administrateur'; 
    }
}
