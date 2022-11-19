<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('pacientes', function (Blueprint $table) {
           $table->engine = 'InnoDB';


            $table->string('id_pacientes');
            $table->string('tipo_id_paciente',3);
            $table->string('primer_apellido');
            $table->string('segundo_apellido',30);
            $table->string('primer_nombre',30);
            $table->string('segundo_nombre',30);
            $table->dateTime('fecha_nacimiento');
            $table->char('edad',2);
            $table->string('direccion_residencia',100);
            $table->string('telefono_residencia',30);
            $table->string('zona_residencia',1);
            $table->string('ocupacion_id',4);
            $table->dateTime('fecha_registro');
            $table->char('sexo_id',1);
            $table->string('tipo_estado_civil',6);
            $table->string('foto',256);
            $table->string('departamento_id',4);
            $table->string('municipio_id',4);
            $table->string('pais_id',4);
            $table->string('tipo_estrato_id',2);
            $table->integer('usuario_id');
            $table->string('nombre_madre',60);
            $table->string('observacion',100);
            $table->string('lugar_expedicion_documentoervacion',100);
            $table->string('celular_telefono',10);
            $table->string('email',10);
            $table->string('foto_paciente',225);
            $table->string('firma');
            $table->string('regimen_id');
            $table->string('aseguradora_id');
            $table->string('foto_paciente_huella');
            $table->timestamps();
            $table->foreign('tipo_id_paciente')->references('tipo_id_paciente')->on('tipos_id_paciente')->onDelete('cascade');
            $table->foreign('zona_residencia')->references('zona_residencia_id')->on('zona_residencia')->onDelete('cascade');
            $table->foreign('sexo_id')->references('sexo_id')->on('tipo_sexo')->onDelete('cascade');
            $table->foreign('departamento_id')->references('departamento_id')->on('tipo_departamento')->onDelete('cascade');
            $table->foreign('municipio_id')->references('municipio_id')->on('tipo_municipio')->onDelete('cascade');
            $table->foreign('pais_id')->references('pais_id')->on('tipo_pais')->onDelete('cascade');
            $table->foreign('tipo_estrato_id')->references('tipo_estrato_id')->on('tipos_estractos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('usuario_id')->on('system_usuario')->onDelete('cascade');
            $table->foreign('regimen_id')->references('tipo_regimen_id')->on('tipo_regimen_salud')->onDelete('cascade');
            $table->foreign('aseguradora_id')->references('aseguradora_id')->on('aseguradoras')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
