<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id('id_mod');
            $table->timestamps();
            $table->string('libelle');
            $table->string('code');
            $table->boolean('controle')->default(1);
            $table->boolean('tp')->default(1);
            $table->boolean('examen')->default(1);
            $table->enum('semestre',  ['S1','S2','S3','S4','S5','S6','S7','S8','S9','S10']);
            $table->unsignedBigInteger('enseignant')->nullable()->index();
            $table->unsignedBigInteger('option')->nullable()->index();
            $table->timestamp('deleted_at')->nullable()->useCurrentOnDelete();
        });
        Schema::table('modules', function (Blueprint $table) {
          
            
            $table->foreign('enseignant')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('option')
                  ->references('id_opt')
                  ->on('options')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
           // $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
