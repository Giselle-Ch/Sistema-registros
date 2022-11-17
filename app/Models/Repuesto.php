<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Repuesto
 *
 * @property $id
 * @property $nombre_repuesto
 * @property $marca
 * @property $precio_repuesto
 * @property $created_at
 * @property $updated_at
 *
 * @property Registro[] $registros
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Repuesto extends Model
{
    
    static $rules = [
		'nombre_repuesto' => 'required',
		'marca' => 'required',
		'precio_repuesto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_repuesto','marca','precio_repuesto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registros()
    {
        return $this->hasMany('App\Models\Registro', 'id_repuesto', 'id');
    }
    

}
