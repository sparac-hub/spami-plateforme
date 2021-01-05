<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\Widget;
use App\Models\Cms\WidgetTranslation;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Widget)->getTable())) {
            Schema::create((new Widget)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('reference')->unique();
                $table->string('placement');
                $table->integer('home_id')->nullable();
                $table->integer('module_id')->unsigned()->nullable();
                $table->foreign('module_id')->references('id')->on('modules');
                $table->string('order_column')->nullable();
                $table->string('order_column_type')->nullable();
                $table->string('type')->nullable()->default('single');
                $table->string('select_type')->nullable()->default('select');
                $table->integer('number_for_latest')->nullable();
                $table->boolean('is_active')->nullable()->default(1);
                $table->integer('order')->nullable()->default(0);
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable((new WidgetTranslation)->getTable())) {
            Schema::create((new WidgetTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('widget_id')->unsigned();
                $table->foreign('widget_id')->references('id')->on((new Widget)->getTable());
                $table->string('locale');
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('button_title')->nullable()->default('Lire la suite');
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
        if (Schema::hasTable((new WidgetTranslation)->getTable())) {
            Schema::drop((new WidgetTranslation)->getTable());
        }
        if (Schema::hasTable((new Widget)->getTable())) {
            Schema::drop((new Widget)->getTable());
        }
    }
}
