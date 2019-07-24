<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Sepomex;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'paterno', 'materno', 'sexo', 'nacimiento', 'telefono', 'email', 'usuario', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function direccion()
    {
        return $this->belongsTo(Sepomex::class, 'sepoID');
    }
    
    public function publicaciones()
    {
        return $this->hasMany('App\Publicacion');
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    public function setPaternoAttribute($value)
    {
        $this->attributes['paterno'] = ucwords($value);
    }

    public function setMaternoAttribute($value)
    {
        $this->attributes['materno'] = ucwords($value);
    }

}
