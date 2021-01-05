<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\PageTranslation;
use App\Models\Cms\Page;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Page)->getTable())) {
            Schema::create((new Page)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new PageTranslation)->getTable())) {
            Schema::create((new PageTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('page_id')->unsigned();
                $table->unique(['page_id', 'locale', 'deleted_at'], 'pt_deletedAt_unique');
                $table->foreign('page_id')->references('id')->on((new Page)->getTable())->onDelete('cascade');
                $table->string('title')->nullable();
                $table->longText('content')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
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
        if (Schema::hasTable((new PageTranslation)->getTable())) {
            Schema::drop((new PageTranslation)->getTable());
        }
        if (Schema::hasTable((new Page)->getTable())) {
            Schema::drop((new Page)->getTable());
        }
    }
}
