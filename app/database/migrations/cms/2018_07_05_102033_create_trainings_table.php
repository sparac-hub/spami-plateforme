<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\TrainingTranslation;
use App\Models\Cms\Training;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Training)->getTable())) {
            Schema::create((new Training)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('is_active')->default(0);
                $table->dateTime('start_date')->nullable();
                $table->dateTime('end_date')->nullable();
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('training_category_id')->unsigned()->nullable();
                $table->foreign('training_category_id')->references('id')->on('training_categories');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new TrainingTranslation)->getTable())) {
            Schema::create((new TrainingTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('training_id')->unsigned();
                $table->foreign('training_id')->references('id')->on('trainings');
                $table->string('locale');
                $table->string('slug');
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->longText('content')->nullable();
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
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
        if (Schema::hasTable((new TrainingTranslation)->getTable())) {
            Schema::drop((new TrainingTranslation)->getTable());
        }
        if (Schema::hasTable((new Training)->getTable())) {
            Schema::drop((new Training)->getTable());
        }
    }
}
