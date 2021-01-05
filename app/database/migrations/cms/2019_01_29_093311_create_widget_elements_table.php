<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\WidgetElement;

class CreateWidgetElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new WidgetElement)->getTable())) {
            Schema::create((new WidgetElement)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('widget_id')->unsigned();
                $table->foreign('widget_id')->references('id')->on('widgets');
                $table->integer('widget_element_id')->unsigned();
                $table->boolean('is_active')->default(1);
                $table->integer('order')->nullable();
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
        if (Schema::hasTable((new WidgetElement)->getTable())) {
            Schema::drop((new WidgetElement)->getTable());
        }
    }
}
