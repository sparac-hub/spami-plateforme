<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\FileCategoryTranslation;
use App\Models\Cms\FileCategory;

class CreateFileCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new FileCategory)->getTable())) {
            Schema::create((new FileCategory)->getTable(), function (Blueprint $table) {
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
        if (!Schema::hasTable((new FileCategoryTranslation)->getTable())) {
            Schema::create((new FileCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('file_category_id')->unsigned();
                $table->foreign('file_category_id')->references('id')->on('file_categories');
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
        if (Schema::hasTable((new FileCategoryTranslation)->getTable())) {
            Schema::drop((new FileCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new FileCategory)->getTable())) {
            Schema::drop((new FileCategory)->getTable());
        }
    }
}
