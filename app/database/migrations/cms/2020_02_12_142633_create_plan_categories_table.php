<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\PlanCategoryTranslation;
use App\Models\Cms\PlanCategory;

class CreatePlanCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new PlanCategory)->getTable())) {
            Schema::create((new PlanCategory)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->default(0);
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new PlanCategoryTranslation)->getTable())) {
            Schema::create((new PlanCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('plan_category_id')->unsigned();
                $table->foreign('plan_category_id', 'fk_plan_tra_categ_id')->references('id')->on('plan_categories');
                $table->string('locale');
                $table->string('slug');
                $table->string('name');
                $table->text('description')->nullable();
                $table->unique(['slug', 'locale', 'deleted_at']);
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
        if (Schema::hasTable((new PlanCategoryTranslation)->getTable())) {
            Schema::drop((new PlanCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new PlanCategory())->getTable())) {
            Schema::drop((new PlanCategory())->getTable());
        }
    }
}
