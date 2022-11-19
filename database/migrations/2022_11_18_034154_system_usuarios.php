<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SystemUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('usuario_id');
            $table->string('usuario');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('passwd');
            $table->char('sw_admin');
            $table->char('activo');
            $table->dateTime('fecha_caducidad_contrasena');
            $table->dateTime('fecha_caducidad_cuenta');
            $table->string('telefono');
            $table->string('tel_celular');
            $table->string('indicativo');
            $table->string('extension');
            $table->string('email');
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('firma');
            $table->timestamps();
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
