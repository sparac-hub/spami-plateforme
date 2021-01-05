<?php

use App\Models\Cms\Sitemap;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Cms\SitemapTranslation;

class CreateSitemapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Sitemap)->getTable())) {
            Schema::create((new Sitemap)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('order')->nullable();
                $table->string('menu_group_ids')->nullable();
                $table->boolean('is_active')->default(0);
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new SitemapTranslation)->getTable())) {
            Schema::create((new SitemapTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('sitemap_id')->unsigned();
                $table->foreign('sitemap_id')->references('id')->on((new Sitemap)->getTable());
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
        if (Schema::hasTable((new SitemapTranslation)->getTable())) {
            Schema::drop((new SitemapTranslation)->getTable());
        }
        if (Schema::hasTable((new Sitemap)->getTable())) {
            Schema::drop((new Sitemap)->getTable());
        }
    }
}
