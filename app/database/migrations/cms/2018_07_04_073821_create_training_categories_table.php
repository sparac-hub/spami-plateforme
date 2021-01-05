<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\TrainingCategoryTranslation;
use App\Models\Cms\TrainingCategory;

class CreateTrainingCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new TrainingCategory)->getTable())) {
            Schema::create((new TrainingCategory)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new TrainingCategoryTranslation)->getTable())) {
            Schema::create((new TrainingCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('training_category_id')->unsigned();
                $table->foreign('training_category_id')->references('id')->on('training_categories');
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
        if (Schema::hasTable((new TrainingCategoryTranslation)->getTable())) {
            Schema::drop((new TrainingCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new TrainingCategory)->getTable())) {
            Schema::drop((new TrainingCategory)->getTable());
        }
    }
}
