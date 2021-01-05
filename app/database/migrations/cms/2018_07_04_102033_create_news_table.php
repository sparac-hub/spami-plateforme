<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\News;
use App\Models\Cms\MediaAlbum;
use App\Models\Cms\NewsCategory;
use App\Models\Cms\NewsTranslation;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new News)->getTable())) {
            Schema::create((new News)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('is_active')->default(0);
                $table->dateTime('start_date')->nullable();
                $table->dateTime('end_date')->nullable();
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('news_category_id')->unsigned()->nullable();
                $table->foreign('news_category_id')->references('id')->on((new NewsCategory())->getTable());
                $table->integer('media_album_id')->unsigned()->nullable();
                $table->foreign('media_album_id')->references('id')->on((new MediaAlbum())->getTable());
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new NewsTranslation)->getTable())) {
            Schema::create((new NewsTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('news_id')->unsigned();
                $table->foreign('news_id')->references('id')->on('news');
                $table->string('locale');
                $table->string('slug');
                $table->string('name');
                $table->string('pays')->nullable();
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                /*                $table->longText('content')->nullable();
                                $table->string('meta_title')->nullable();
                                $table->string('meta_description')->nullable();*/
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
        if (Schema::hasTable((new NewsTranslation)->getTable())) {
            Schema::drop((new NewsTranslation)->getTable());
        }
        if (Schema::hasTable((new News)->getTable())) {
            Schema::drop((new News)->getTable());
        }
    }
}
