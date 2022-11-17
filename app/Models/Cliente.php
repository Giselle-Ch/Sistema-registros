<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre_cliente
 * @property $dui_cliente
 * @property $celular
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @property Moto[] $motos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'nombre_cliente' => 'required',
		'dui_cliente' => 'required',
		'celular' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_cliente','dui_cliente','celular','correo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function motos()
    {
        return $this->hasMany('App\Models\Moto', 'id_cliente', 'id');
    }
    

}
