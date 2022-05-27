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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('commentable_id')->constrained('users')->onDelete('cascade');
            $table->integer('parent_id')->constrained('users')->onDelete('cascade')->nullable()->default(null);
            $table->text('comment');
            $table->string('commentable_type')->nullable()->default(null);
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
        Schema::dropIfExists('comments');
    }
};
