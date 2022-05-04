<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id('id_etud');
            $table->timestamps();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_de_naissance');
            $table->date('date_inscription');
            $table->string('photo')->default('default.jpg');
            $table->unsignedBigInteger('promo')->nullable()->index();
            $table->timestamp('deleted_at')->nullable()->useCurrentOnDelete();
        });
        Schema::table('etudiants', function (Blueprint $table) {
          
            
            $table->foreign('promo')
                  ->references('id_pr')
                  ->on('promotions')
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
        Schema::dropIfExists('etudiants');
    }
}
