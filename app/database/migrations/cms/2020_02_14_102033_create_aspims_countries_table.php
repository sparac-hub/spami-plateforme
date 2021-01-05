<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\Aspim;
use App\Models\Cms\Country;

class CreateAspimsCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('aspims_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aspim_id')->unsigned();
            $table->foreign('aspim_id')
                ->references('id')
                ->on((new Aspim)->getTable());
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
                ->references('id')
                ->on((new Country)->getTable());
        });
    }
}
