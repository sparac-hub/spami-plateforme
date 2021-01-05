<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Cms\Program;
use App\Models\Cms\ProgramTranslation;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable((new Program)->getTable())) {
            Schema::create((new Program)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->boolean('is_active')->default(0);
                $table->date('established_at')->nullable();
                $table->Integer('page_id')->unsigned()->nullable();
                $table->foreign('page_id')->references('id')->on('menus');
                $table->integer('order')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new ProgramTranslation)->getTable())) {
            Schema::create((new ProgramTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('program_id')->unsigned();
                $table->foreign('program_id')->references('id')->on('programs');
                $table->string('locale');
                $table->string('title');
                $table->text('description')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
