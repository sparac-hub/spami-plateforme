<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\ProcedureTranslation;
use App\Models\Cms\Procedure;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Procedure)->getTable())) {
            Schema::create((new Procedure)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->default(0);
                $table->unsignedInteger('procedure_category_id')->nullable();
                $table->foreign('procedure_category_id')->references('id')->on('procedure_categories');
                $table->dateTime('publication_date')->nullable();
                $table->string('data')->nullable();
                $table->unsignedInteger('aspim');
                $table->foreign('aspim')->references('id')->on('aspims');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new ProcedureTranslation)->getTable())) {
            Schema::create((new ProcedureTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('procedure_id')->unsigned();
                $table->foreign('procedure_id')->references('id')->on('procedures');
                $table->string('locale');
                $table->string('name');
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
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
        if (Schema::hasTable((new ProcedureTranslation)->getTable())) {
            Schema::drop((new ProcedureTranslation)->getTable());
        }
        if (Schema::hasTable((new Procedure)->getTable())) {
            Schema::drop((new Procedure)->getTable());
        }
    }
}
