<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\CityTranslation;
use App\Models\Cms\City;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new City)->getTable())) {
            Schema::create((new City)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('country_id')->unsigned()->nullable();
                $table->foreign('country_id')->references('id')->on('countries');
                $table->integer('governorate_id')->unsigned();
                $table->foreign('governorate_id')->references('id')->on('governorates');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                //$table->integer('deleted_by')->nullable();
                //$table->integer('created_by')->nullable();
                //$table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new CityTranslation)->getTable())) {
            Schema::create((new CityTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('city_id')->unsigned();
                $table->foreign('city_id')->references('id')->on('cities');
                $table->string('name');
                //$table->integer('deleted_by')->nullable();
                //$table->integer('created_by')->nullable();
                //$table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        if (Schema::hasTable((new CityTranslation)->getTable())) {
            Schema::drop((new CityTranslation)->getTable());
        }
        if (Schema::hasTable((new City)->getTable())) {
            Schema::drop((new City)->getTable());
        }
    }
}
