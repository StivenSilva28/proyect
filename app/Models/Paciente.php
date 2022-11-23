<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $paciente_id
 * @property $tipo_id_paciente
 * @property $primer_apellido
 * @property $segundo_apellido
 * @property $primer_nombre
 * @property $segundo_nombre
 * @property $fecha_nacimiento
 * @property $edad
 * @property $direccion_residencia
 * @property $telefono_residencia
 * @property $zona_residencia_id
 * @property $ocupacion_id
 * @property $fecha_registro
 * @property $sexo_id
 * @property $tipo_estado_civil
 * @property $foto
 * @property $departamento_id
 * @property $municipio_id
 * @property $pais_id
 * @property $tipo_estrato_id
 * @property $usuario_id
 * @property $nombre_madre
 * @property $observacion
 * @property $lugar_expedicion_documentoervacion
 * @property $celular_telefono
 * @property $email
 * @property $foto_paciente
 * @property $firma
 * @property $tipo_regimen_id
 * @property $aseguradoras_id
 * @property $foto_paciente_huella
 * @property $created_at
 * @property $updated_at
 *
 * @property Aseguradora $aseguradora
 * @property SystemUsuario $systemUsuario
 * @property TiposEstrato $tiposEstrato
 * @property TiposIdPaciente $tiposIdPaciente
 * @property TiposRegimenSalud $tiposRegimenSalud
 * @property TipoDepartamento $tipoDepartamento
 * @property TipoMunicipio $tipoMunicipio
 * @property TipoPai $tipoPai
 * @property TipoSexo $tipoSexo
 * @property ZonaResidencium $zonaResidencium
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{
    
    static $rules = [
		'paciente_id' => 'required',
		'tipo_id_paciente' => 'required',
		'primer_apellido' => 'required',
		'segundo_apellido' => 'required',
		'primer_nombre' => 'required',
		'segundo_nombre' => 'required',
		'fecha_nacimiento' => 'required',
		'edad' => 'required',
		'direccion_residencia' => 'required',
		'telefono_residencia' => 'required',
		'zona_residencia_id' => 'required',
		'ocupacion_id' => 'required',
		'fecha_registro' => 'required',
		'sexo_id' => 'required',
		'tipo_estado_civil' => 'required',
		'foto' => 'required',
		'departamento_id' => 'required',
		'municipio_id' => 'required',
		'pais_id' => 'required',
		'tipo_estrato_id' => 'required',
		'usuario_id' => 'required',
		'nombre_madre' => 'required',
		'observacion' => 'required',
		'lugar_expedicion_documentoervacion' => 'required',
		'celular_telefono' => 'required',
		'email' => 'required',
		'foto_paciente' => 'required',
		'firma' => 'required',
		'tipo_regimen_id' => 'required',
		'aseguradoras_id' => 'required',
		'foto_paciente_huella' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['paciente_id','tipo_id_paciente','primer_apellido','segundo_apellido','primer_nombre','segundo_nombre','fecha_nacimiento','edad','direccion_residencia','telefono_residencia','zona_residencia_id','ocupacion_id','fecha_registro','sexo_id','tipo_estado_civil','foto','departamento_id','municipio_id','pais_id','tipo_estrato_id','usuario_id','nombre_madre','observacion','lugar_expedicion_documentoervacion','celular_telefono','email','foto_paciente','firma','tipo_regimen_id','aseguradoras_id','foto_paciente_huella'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function aseguradora()
    {
        return $this->hasOne('App\Models\Aseguradora', 'aseguradoras_id', 'aseguradoras_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function systemUsuario()
    {
        return $this->hasOne('App\Models\SystemUsuario', 'usuario_id', 'usuario_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposEstrato()
    {
        return $this->hasOne('App\Models\TiposEstrato', 'tipo_estrato_id', 'tipo_estrato_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposIdPaciente()
    {
        return $this->hasOne('App\Models\TiposIdPaciente', 'tipo_id_paciente', 'tipo_id_paciente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposRegimenSalud()
    {
        return $this->hasOne('App\Models\TiposRegimenSalud', 'tipo_regimen_id', 'tipo_regimen_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoDepartamento()
    {
        return $this->hasOne('App\Models\TipoDepartamento', 'departamento_id', 'departamento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoMunicipio()
    {
        return $this->hasOne('App\Models\TipoMunicipio', 'municipio_id', 'municipio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoPai()
    {
        return $this->hasOne('App\Models\TipoPai', 'pais_id', 'pais_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoSexo()
    {
        return $this->hasOne('App\Models\TipoSexo', 'sexo_id', 'sexo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zonaResidencium()
    {
        return $this->hasOne('App\Models\ZonaResidencium', 'zona_residencia_id', 'zona_residencia_id');
    }
    

}
