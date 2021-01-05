<?php

use App\Models\Cms\MediaFile;
use App\Models\Cms\MediaAlbum;
use App\Models\Cms\MediaFileTranslation;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new MediaFile)->getTable())) {
            Schema::create((new MediaFile)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('is_active')->default(0);
                $table->string('type')->nullable();
                $table->string('url');
                $table->integer('order')->nullable();
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('media_album_id')->unsigned()->nullable();
                $table->foreign('media_album_id')->references('id')->on((new MediaAlbum())->getTable());
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new MediaFileTranslation)->getTable())) {
            Schema::create((new MediaFileTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('media_file_id')->unsigned();
                $table->foreign('media_file_id')->references('id')->on('media_files');
                $table->string('locale');
                $table->string('slug');
                $table->string('name');
                $table->text('description')->nullable();
                $table->unique(['slug', 'locale', 'deleted_at']);
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
        if (Schema::hasTable((new MediaFileTranslation)->getTable())) {
            Schema::drop((new MediaFileTranslation)->getTable());
        }
        if (Schema::hasTable((new MediaFile)->getTable())) {
            Schema::drop((new MediaFile)->getTable());
        }
    }
}
