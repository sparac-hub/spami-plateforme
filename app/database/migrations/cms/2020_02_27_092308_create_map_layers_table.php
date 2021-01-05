<?php

use App\Models\Cms\MapLayer;
use App\Models\Cms\MapLayerTranslation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapLayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable((new MapLayer)->getTable())) {
            Schema::create((new MapLayer)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->string('layer')->nullable();
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new MapLayerTranslation)->getTable())) {
            Schema::create((new MapLayerTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('map_layer_id')->unsigned();
                $table->foreign('map_layer_id')->references('id')->on('map_layers');
                $table->string('locale');
                $table->string('name');
                $table->text('description')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_layers');
    }
}
