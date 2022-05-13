<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['nombreUsuario','email','password'];

    protected $hidden = ['id','password','remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];


    public function obtenerUsuarios()
    {
        return Usuario::all();
    }

    public function obtenerLibrosPorId($id)
    {
        return Usuario::find($id);
    }

}
