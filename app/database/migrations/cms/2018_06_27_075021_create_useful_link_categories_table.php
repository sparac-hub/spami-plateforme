<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\UsefulLinkCategoryTranslation;
use App\Models\Cms\UsefulLinkCategory;

class CreateUsefulLinkCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new UsefulLinkCategory)->getTable())) {
            Schema::create((new UsefulLinkCategory)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('order')->nullable();
                $table->boolean('is_active')->default(0);
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new UsefulLinkCategoryTranslation)->getTable())) {
            Schema::create((new UsefulLinkCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('useful_link_category_id')->unsigned();
                $table->foreign('useful_link_category_id',
                    'ulc_translations_ul_category_id_foreign')->references('id')->on('useful_link_categories');
                $table->string('locale');
                $table->string('slug');
                $table->string('title');
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
        if (Schema::hasTable((new UsefulLinkCategoryTranslation)->getTable())) {
            Schema::drop((new UsefulLinkCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new UsefulLinkCategory)->getTable())) {
            Schema::drop((new UsefulLinkCategory)->getTable());
        }
    }
}
