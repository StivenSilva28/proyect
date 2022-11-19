<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TiposRegimenSalud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_regimen_salud', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('tipo_regimen_id');
            $table->string('descripcion',30);
            $table->char('sw_activo',1);
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
