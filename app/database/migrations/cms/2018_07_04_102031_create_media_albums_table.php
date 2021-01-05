<?php

use App\Models\Cms\MediaAlbum;
use App\Models\Cms\MediaAlbumTranslation;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new MediaAlbum())->getTable())) {
            Schema::create((new MediaAlbum())->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                $table->string('url')->nullable();
                $table->integer('media_album_category_id')->unsigned()->nullable();
                $table->foreign('media_album_category_id')->references('id')->on('media_album_categories');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new MediaAlbumTranslation())->getTable())) {
            Schema::create((new MediaAlbumTranslation())->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('media_album_id')->unsigned();
                $table->foreign('media_album_id')->references('id')->on('media_albums');
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
        if (Schema::hasTable((new MediaAlbumTranslation())->getTable())) {
            Schema::drop((new MediaAlbumTranslation())->getTable());
        }
        if (Schema::hasTable((new MediaAlbum())->getTable())) {
            Schema::drop((new MediaAlbum())->getTable());
        }
    }
}
