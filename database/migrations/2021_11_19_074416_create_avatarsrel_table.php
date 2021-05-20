<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvatarsrelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::create('avatarsrel', function (Blueprint $table) {
        //    $table->id();
        //    $table->foreignId('uploader_id')->constrained('users','id'); 
        //    $table->foreignId('avatar_id')->constrained('avatars', 'id'); 
        //   $table->timestamps();
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avatarsrel');
    }
}
