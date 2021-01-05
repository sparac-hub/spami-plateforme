<?php

use App\Models\Cms\MediaAlbumCategory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Cms\MediaAlbumCategoryTranslation;

class CreateMediaAlbumCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new MediaAlbumCategory())->getTable())) {
            Schema::create((new MediaAlbumCategory())->getTable(), function (Blueprint $table) {
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
        if (!Schema::hasTable((new MediaAlbumCategoryTranslation())->getTable())) {
            Schema::create((new MediaAlbumCategoryTranslation())->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('media_album_category_id')->unsigned();
                $table->foreign('media_album_category_id', 'fk_med_alb_cat')->references('id')->on('media_album_categories');
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
        if (Schema::hasTable((new MediaAlbumCategoryTranslation())->getTable())) {
            Schema::drop((new MediaAlbumCategoryTranslation())->getTable());
        }
        if (Schema::hasTable((new MediaAlbumCategory())->getTable())) {
            Schema::drop((new MediaAlbumCategory())->getTable());
        }
    }
}
