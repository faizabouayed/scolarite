<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id('id_nt');
            $table->timestamps();
            $table->string('type');
            $table->string('note');
            $table->unsignedBigInteger('module')->nullable()->index();
            $table->unsignedBigInteger('etudiant')->nullable()->index();
        });
        Schema::table('notes', function (Blueprint $table) {
          
            
            $table->foreign('module')
                  ->references('id_mod')
                  ->on('modules')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('etudiant')
                  ->references('id_etud')
                  ->on('etudiants')
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
        Schema::dropIfExists('notes');
    }
}
