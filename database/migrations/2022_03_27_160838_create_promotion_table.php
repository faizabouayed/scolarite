<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id('id_pr');
            $table->timestamps();
            $table->string('libelle_pr');
            $table->year('annee_debut');
            $table->year('annee_fin');
            $table->unsignedBigInteger('option')->nullable()->index();
            $table->timestamp('deleted_at')->nullable()->useCurrentOnDelete();
        });

        Schema::table('promotions', function (Blueprint $table) {
          
            
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
        Schema::dropIfExists('promotion');
    }
}
