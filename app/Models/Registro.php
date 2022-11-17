<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Registro
 *
 * @property $id
 * @property $fecha_llegada
 * @property $fecha_entrega
 * @property $id_moto
 * @property $id_servicio
 * @property $precio_servicio_r
 * @property $id_repuesto
 * @property $precio_repuesto_r
 * @property $unidades
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Moto $moto
 * @property Repuesto $repuesto
 * @property Servicio $servicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Registro extends Model
{
    
    static $rules = [
		'fecha_llegada' => 'required',
		'fecha_entrega' => 'required',
		'id_moto' => 'required',
		'id_servicio' => 'required',
		'precio_servicio_r' => 'required',
		'id_repuesto' => 'required',
		'precio_repuesto_r' => 'required',
		'unidades' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_llegada','fecha_entrega','id_moto','id_servicio','precio_servicio_r','id_repuesto','precio_repuesto_r','unidades','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function moto()
    {
        return $this->hasOne('App\Models\Moto', 'id', 'id_moto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function repuesto()
    {
        return $this->hasOne('App\Models\Repuesto', 'id', 'id_repuesto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'id_servicio');
    }
    

}
