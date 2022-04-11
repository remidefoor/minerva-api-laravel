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
        Schema::create('bestsellers', function (Blueprint $table) {
            $table->id();
            $table->integer('copies_sold');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('bestsellers_language', function (Blueprint $table) {
           $table->unsignedBigInteger('bestseller_id');
           $table->foreign('bestseller_id')->references('id')->on('bestsellers')->onDelete('cascade');
           $table->string('language', 2);
           $table->string('title');
           $table->timestamp('created_at')->useCurrent();
           $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

           $table->primary(['bestseller_id', 'language']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bestsellers');
        Schema::dropIfExists('bestsellers_language');
    }
};
