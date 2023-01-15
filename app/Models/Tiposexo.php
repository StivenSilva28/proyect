<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tiposexo
 *
 * @property $sexo_id
 * @property $sexo_tipo
 * @property $descripcion
 * @property $sw_mostrar
 * @property $created_at
 * @property $updated_at
 *
 * @property Paciente[] $pacientes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tiposexo extends Model
{
    
    static $rules = [
		'sexo_id' => 'required',
		'sexo_tipo' => 'required',
		'descripcion' => 'required',
		'sw_mostrar' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sexo_id','sexo_tipo','descripcion','sw_mostrar'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacientes()
    {
        return $this->hasMany('App\Models\Paciente', 'sexo_id', 'sexo_id');
    }
    

}
