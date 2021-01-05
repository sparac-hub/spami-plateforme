<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\HomeSection;
use App\Models\Cms\Module;
use App\Models\Cms\Menu;

class CreateHomeSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new HomeSection)->getTable())) {
            Schema::create((new HomeSection)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('reference')->unique(); // Every parameter should have a unique reference
                $table->text('value')->nullable();
                $table->integer('parameter_group_id')->unsigned()->default(1);
                $table->foreign('parameter_group_id')->references('id')->on((new HomeSection)->getTable());
                $table->integer('module_id')->unsigned()->nullable();
                $table->foreign('module_id')->references('id')->on((new Module)->getTable());
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on((new Menu)->getTable());
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
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new HomeSection)->getTable());
    }
}
