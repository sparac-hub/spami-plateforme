<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\ZoneTranslation;
use App\Models\Cms\Zone;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Zone)->getTable())) {
            Schema::create((new Zone)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('postal_code')->nullable();
                $table->integer('city_id')->unsigned();
                $table->foreign('city_id')->references('id')->on('cities');
                $table->integer('governorate_id')->unsigned();
                $table->foreign('governorate_id')->references('id')->on('governorates');
                $table->integer('country_id')->unsigned();
                $table->foreign('country_id')->references('id')->on('countries');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                //$table->integer('deleted_by')->nullable();
                //$table->integer('created_by')->nullable();
                //$table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new ZoneTranslation)->getTable())) {
            Schema::create((new ZoneTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('zone_id')->unsigned();
                $table->foreign('zone_id')->references('id')->on('zones');
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
        if (Schema::hasTable((new ZoneTranslation)->getTable())) {
            Schema::drop((new ZoneTranslation)->getTable());
        }
        if (Schema::hasTable((new Zone)->getTable())) {
            Schema::drop((new Zone)->getTable());
        }
    }
}
