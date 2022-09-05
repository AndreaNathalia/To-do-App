<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_todo', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->unsignedBigInteger('user_id');      
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('todo_id');
            $table->foreign('todo_id')->references('id')->on('todos')->onDelete('cascade');
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
        Schema::dropIfExists('users_todo');

        // Schema::table('users_todo', function (Blueprint $table)
        // {
        //     $table->dropForeign('users_todo_user_id_foreign');
        //     $table->dropForeign('users_todo_todo_id_foreign');
        // });
    }
};
