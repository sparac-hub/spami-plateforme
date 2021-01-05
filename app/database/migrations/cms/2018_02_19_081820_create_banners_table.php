<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\BannerTranslation;
use App\Models\Cms\Banner;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Banner)->getTable())) {
            Schema::create((new Banner)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('link_type_id')->nullable();
                $table->string('link_target')->default('_self'); //['_self', '_blank']
                $table->string('http_protocol')->nullable(); //, ['http://', 'https://']
                $table->string('external_link')->nullable();
                $table->string('internal_link')->nullable();
                $table->string('type'); //['image_file','video_file', 'script']
                $table->string('image_filepath')->nullable();
                $table->string('video_filepath')->nullable();
                $table->text('script')->nullable();
                $table->integer('width')->nullable();
                $table->integer('height')->nullable();
                $table->boolean('is_for_mobile')->default(0);
                $table->boolean('is_active')->default(0);
                $table->string('css_class')->nullable();
                $table->text('thumb')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new BannerTranslation)->getTable())) {
            Schema::create((new BannerTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('banner_id')->unsigned();
                $table->unique(['banner_id', 'locale', 'deleted_at']);
                $table->foreign('banner_id')->references('id')->on((new Banner)->getTable())->onDelete('cascade');
                $table->string('back_office_title');
                $table->string('title')->nullable();
                $table->string('title_2')->nullable();
                $table->text('description')->nullable();
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
                $table->string('button_title')->nullable();
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
        if (Schema::hasTable((new BannerTranslation)->getTable())) {
            Schema::drop((new BannerTranslation)->getTable());
        }
        if (Schema::hasTable((new Banner)->getTable())) {
            Schema::drop((new Banner)->getTable());
        }
    }
}
