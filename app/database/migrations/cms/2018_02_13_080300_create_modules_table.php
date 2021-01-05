<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\Module;
use App\Models\Cms\ModuleTranslation;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Module)->getTable())) {
            Schema::create((new Module)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('reference')->unique();
                $table->string('main_model')->nullable();
                $table->string('widget_orderable_columns')->nullable();
                $table->boolean('is_active')->default(0);
                $table->boolean('is_menu_module')->default(0);
                $table->integer('order')->nullable();
                $table->string('icon')->nullable();
                $table->string('backend_route')->nullable(); // For parent menus on sidebar
                $table->string('frontend_route')->nullable();
                $table->string('front_namespace')->nullable();
                $table->string('front_controller')->nullable();
                $table->boolean('is_on_backend_sidebar')->default(0);
                $table->integer('parent_id')->unsigned()->nullable();
                $table->foreign('parent_id')->references('id')->on((new Module)->getTable());
                //$table->integer('deleted_by')->nullable();
                //$table->integer('created_by')->nullable();
                //$table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new ModuleTranslation)->getTable())) {
            Schema::create((new ModuleTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('module_id')->unsigned();
                $table->unique(['module_id', 'locale', 'deleted_at']);
                $table->foreign('module_id')->references('id')->on((new Module)->getTable())->onDelete('cascade');
                $table->string('name');
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
        if (Schema::hasTable((new ModuleTranslation)->getTable())) {
            // Schema::drop((new ModuleTranslation)->getTable());
        }
        if (Schema::hasTable((new Module)->getTable())) {
            // Schema::drop((new Module)->getTable());
        }
    }
}
