<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Moto
 *
 * @property $id
 * @property $id_placa
 * @property $marca
 * @property $color
 * @property $id_cliente
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Registro[] $registros
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Moto extends Model
{
    
    static $rules = [
		'id_placa' => 'required',
		'marca' => 'required',
		'id_cliente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_placa','marca','color','id_cliente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registros()
    {
        return $this->hasMany('App\Models\Registro', 'id_moto', 'id');
    }
    

}
