<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


use App\Models\Cms\Menu;
use App\Models\Cms\MenuTranslation;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Menu)->getTable())) {
            Schema::create((new Menu)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_group_id')->unsigned();
                $table->integer('module_id')->unsigned()->nullable();
                $table->string('route_name')->nullable();
                $table->string('route_parameters')->nullable();
                $table->foreign('module_id')->references('id')->on('modules');
                $table->integer('parent_id')->unsigned()->nullable();
                $table->foreign('parent_id')->references('id')->on('menus');
                $table->integer('link_type_id')->nullable();
                $table->enum('http_protocol', ['http://', 'https://'])->nullable();
                $table->string('external_link')->nullable();
                $table->string('internal_link')->nullable();
                $table->enum('link_target', ['_blank', '_self',/* '_parent', '_top'*/])->nullable();
                $table->boolean('is_active')->default(1);
                $table->string('icon')->nullable();
                $table->integer('order')->nullable();
                $table->string('css_class')->nullable();
                $table->text('image1')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new MenuTranslation)->getTable())) {
            Schema::create((new MenuTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('menu_id')->unsigned();
                $table->unique(['slug', 'locale', 'deleted_at'], 'menu_trans_slug_unique');
                $table->foreign('menu_id')->references('id')->on((new Menu)->getTable())->onDelete('cascade');
                $table->string('label');
                $table->string('slug');
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->longText('content')->nullable();
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
        if (Schema::hasTable((new MenuTranslation)->getTable())) {
            // Schema::drop((new MenuTranslation)->getTable());
        }
        if (Schema::hasTable((new Menu)->getTable())) {
            // Schema::drop((new Menu)->getTable());
        }
    }
}
