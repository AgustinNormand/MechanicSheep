<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Permissions\HasPermissionsTrait;
use App\Notifications\PasswordReset;
use App\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasPermissionsTrait;

    protected $primaryKey = 'ID_USUARIO';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'estado',
        'ID_PERSONA',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail());
    }

    //Relacion uno a uno
    public function persona(){
        return $this->belongsTo('App\Models\Persona','ID_PERSONA');
    }

    public function rols(){
        return $this->belongsToMany('App\Models\Rol', 'rol_usuarios', 'ID_USUARIO', 'ID_ROL');
    }

    public function turno_pendiente(){
        return $this->hasMany('App\Models\Turno_pendiente','ID_USUARIO')->orderBy('FECHA_SOLICITUD','DESC');
    }
}
