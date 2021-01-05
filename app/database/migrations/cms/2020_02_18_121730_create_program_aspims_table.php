<?php

use App\Models\Cms\Aspim;
use App\Models\Cms\Program;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramAspimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_aspims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aspim_id')->unsigned();
            $table->foreign('aspim_id')->references('id')->on((new Aspim())->getTable());
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on((new Program)->getTable());
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
        Schema::dropIfExists('program_aspims');
    }
}
