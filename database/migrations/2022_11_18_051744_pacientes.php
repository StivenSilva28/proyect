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
           $table->bigIncrements('paciente_id');
            $table->bigInteger('tipo_id_paciente')->unsigned();
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->dateTime('fecha_nacimiento');
            $table->char('edad',2);
            $table->string('direccion_residencia',100);
            $table->string('telefono_residencia');
            $table->bigInteger('zona_residencia_id')->unsigned();
            $table->string('ocupacion_id',4);
            $table->dateTime('fecha_registro');
            $table->bigInteger('sexo_id')->unsigned();
            $table->string('tipo_estado_civil',6);
            $table->string('foto',256);
            $table->bigInteger('departamento_id')->unsigned();
            $table->bigInteger('municipio_id')->unsigned();
            $table->bigInteger('pais_id')->unsigned();
            $table->bigInteger('tipo_estrato_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('nombre_madre',60);
            $table->string('observacion',100);
            $table->string('lugar_expedicion_documentoervacion',100);
            $table->string('celular_telefono',10);
            $table->string('email',10);
            $table->string('foto_paciente',225);
            $table->string('firma');
            $table->bigInteger('tipo_regimen_id')->unsigned();
            $table->bigInteger('aseguradoras_id')->unsigned();
            $table->string('foto_paciente_huella');
            $table->timestamps();
            $table->foreign('tipo_id_paciente')->references('tipo_id_paciente')->on('tipos_id_pacientes')->onDelete('cascade');
            $table->foreign('zona_residencia_id')->references('zona_residencia_id')->on('zona_residencia')->onDelete('cascade');
            $table->foreign('sexo_id')->references('sexo_id')->on('tipo_sexo')->onDelete('cascade');
            $table->foreign('departamento_id')->references('departamento_id')->on('tipo_departamento')->onDelete('cascade');
            $table->foreign('municipio_id')->references('municipio_id')->on('tipo_municipio')->onDelete('cascade');
            $table->foreign('pais_id')->references('pais_id')->on('tipo_pais')->onDelete('cascade');
            $table->foreign('tipo_estrato_id')->references('tipo_estrato_id')->on('tipos_estratos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('usuario_id')->on('system_usuarios')->onDelete('cascade');
            $table->foreign('tipo_regimen_id')->references('tipo_regimen_id')->on('tipos_regimen_salud')->onDelete('cascade');
            $table->foreign('aseguradoras_id')->references('aseguradoras_id')->on('aseguradoras')->onDelete('cascade');
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
