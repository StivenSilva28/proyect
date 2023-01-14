<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tiposidpaciente
 *
 * @property $tipo_id_paciente
 * @property $abreviado
 * @property $descripcion
 * @property $codigo_alterno
 * @property $created_at
 * @property $updated_at
 *
 * @property Paciente[] $pacientes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tiposidpaciente extends Model
{
    
    static $rules = [
		'tipo_id_paciente' => 'required',
		'abreviado' => 'required',
		'descripcion' => 'required',
		'codigo_alterno' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_id_paciente','abreviado','descripcion','codigo_alterno'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacientes()
    {
        return $this->hasMany('App\Models\Paciente', 'tipo_id_paciente', 'tipo_id_paciente');
    }
    

}
