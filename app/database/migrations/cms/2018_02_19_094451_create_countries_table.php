<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\CountryTranslation;
use App\Models\Cms\Country;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Country)->getTable())) {
            Schema::create((new Country)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('order')->nullable();
                $table->boolean('is_active')->default(0);
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new CountryTranslation)->getTable())) {
            Schema::create((new CountryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('nationality')->nullable();
                $table->string('locale');
                $table->integer('country_id')->unsigned();
                $table->unique(['country_id', 'locale', 'deleted_at'], 'ct_deletedAt_unique');
                $table->foreign('country_id')->references('id')->on('countries');
                $table->unique(['country_id', 'locale', 'deleted_at']);
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
        if (Schema::hasTable((new CountryTranslation)->getTable())) {
            Schema::drop((new CountryTranslation)->getTable());
        }
        if (Schema::hasTable((new Country)->getTable())) {
            Schema::drop((new Country)->getTable());
        }
    }
}
