<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Zonaresidencia
 *
 * @property $zona_residencia_id
 * @property $zona_id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Paciente[] $pacientes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Zonaresidencia extends Model
{
    
    static $rules = [
		'zona_residencia_id' => 'required',
		'zona_id' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['zona_residencia_id','zona_id','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacientes()
    {
        return $this->hasMany('App\Models\Paciente', 'zona_residencia_id', 'zona_residencia_id');
    }
    

}
