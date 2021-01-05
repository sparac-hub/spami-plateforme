<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\PlanTranslation;
use App\Models\Cms\Plan;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Plan)->getTable())) {
            Schema::create((new Plan)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->default(0);
                $table->unsignedInteger('plan_category_id')->nullable();
                $table->foreign('plan_category_id')->references('id')->on('plan_categories');
                $table->string('path')->nullable();
                $table->string('extension')->nullable();
                $table->string('size')->nullable();
                $table->dateTime('publication_date')->nullable();
                $table->string('data')->nullable();
                $table->integer('menu_id')->unsigned()->nullable();
                $table->integer('aspim_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new PlanTranslation())->getTable())) {
            Schema::create((new PlanTranslation())->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('plan_id')->unsigned();
                $table->foreign('plan_id')->references('id')->on('plans');
                $table->string('locale');
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->longText('content')->nullable();
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
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
        if (Schema::hasTable((new PlanTranslation())->getTable())) {
            Schema::drop((new PlanTranslation())->getTable());
        }
        if (Schema::hasTable((new Plan)->getTable())) {
            Schema::drop((new Plan)->getTable());
        }
    }
}
