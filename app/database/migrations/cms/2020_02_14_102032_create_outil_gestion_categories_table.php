<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\OutilGestionCategoryTranslation;
use App\Models\Cms\OutilGestionCategory;

class CreateOutilGestionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new OutilGestionCategory)->getTable())) {
            Schema::create((new OutilGestionCategory)->getTable(), function (Blueprint $table) {
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
        if (!Schema::hasTable((new OutilGestionCategoryTranslation)->getTable())) {
            Schema::create((new OutilGestionCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('outil_gestion_category_id')->unsigned();
                $table->foreign('outil_gestion_category_id', 'category_id')->references('id')->on('outil_gestion_categories');
                $table->string('locale');
                $table->string('slug');
                $table->string('name');
                $table->text('description')->nullable();
                $table->unique(['slug', 'locale', 'deleted_at'], 'slug_local_deleted_unique');
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
        if (Schema::hasTable((new OutilGestionCategoryTranslation)->getTable())) {
            Schema::drop((new OutilGestionCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new OutilGestionCategory)->getTable())) {
            Schema::drop((new OutilGestionCategory)->getTable());
        }
    }
}
