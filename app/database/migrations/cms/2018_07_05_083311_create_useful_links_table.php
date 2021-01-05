<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\UsefulLinkTranslation;
use App\Models\Cms\UsefulLink;

class CreateUsefulLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new UsefulLink)->getTable())) {
            Schema::create((new UsefulLink)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                $table->integer('useful_link_category_id')->unsigned()->nullable();
                $table->foreign('useful_link_category_id')->references('id')->on('useful_link_categories');
                $table->string('protocol');
                $table->string('url');
                $table->string('image')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new UsefulLinkTranslation)->getTable())) {
            Schema::create((new UsefulLinkTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('useful_link_id')->unsigned();
                $table->foreign('useful_link_id')->references('id')->on('useful_links');
                $table->string('locale');
                $table->string('title');
                $table->text('description')->nullable();
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
        if (Schema::hasTable((new UsefulLinkTranslation)->getTable())) {
            Schema::drop((new UsefulLinkTranslation)->getTable());
        }
        if (Schema::hasTable((new UsefulLink)->getTable())) {
            Schema::drop((new UsefulLink)->getTable());
        }
    }
}
