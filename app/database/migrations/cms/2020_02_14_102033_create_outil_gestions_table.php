<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\OutilGestionTranslation;
use App\Models\Cms\OutilGestion;

class CreateOutilGestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new OutilGestion)->getTable())) {
            Schema::create((new OutilGestion)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('is_active')->default(0);
                $table->string('type')->nullable();
                $table->string('url_video')->nullable();
                $table->string('url_lien')->nullable();
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('outil_gestion_category_id')->unsigned()->nullable();
                $table->foreign('outil_gestion_category_id', 'outil_gestion_category_id')->references('id')->on('outil_gestion_categories');
                $table->integer('aspim_id')->unsigned()->nullable();
                $table->foreign('aspim_id', 'aspim_id')->references('id')->on('aspims');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new OutilGestionTranslation)->getTable())) {
            Schema::create((new OutilGestionTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('outil_gestion_id')->unsigned();
                $table->foreign('outil_gestion_id')->references('id')->on('outil_gestions');
                $table->string('locale');
                $table->string('slug');
                $table->string('name');
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
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
        if (Schema::hasTable((new OutilGestionTranslation)->getTable())) {
            Schema::drop((new OutilGestionTranslation)->getTable());
        }
        if (Schema::hasTable((new OutilGestion)->getTable())) {
            Schema::drop((new OutilGestion)->getTable());
        }
    }
}
