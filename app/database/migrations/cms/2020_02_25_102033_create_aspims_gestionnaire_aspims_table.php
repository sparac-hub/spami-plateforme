<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspimsGestionnaireAspimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('aspims_gestionnaire_aspims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aspim_id')->unsigned();
            $table->integer('gestionnaire_aspim_id')->unsigned();
        });
    }
}
