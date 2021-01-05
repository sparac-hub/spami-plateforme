<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\WidgetMenu;

class CreateWidgetMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new WidgetMenu)->getTable())) {
            Schema::create((new WidgetMenu)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('widget_id')->unsigned();
                $table->foreign('widget_id')->references('id')->on('widgets');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
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
        if (Schema::hasTable((new WidgetMenu)->getTable())) {
            Schema::drop((new WidgetMenu)->getTable());
        }
    }
}
