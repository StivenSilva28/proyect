<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
class CreatePersonalAccessTokensTable extends Migration
=======
return new class extends Migration
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
<<<<<<< HEAD
            $table->bigIncrements('id');
=======
            $table->id();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
<<<<<<< HEAD
=======
            $table->timestamp('expires_at')->nullable();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
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
        Schema::dropIfExists('personal_access_tokens');
    }
<<<<<<< HEAD
}
=======
};
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
