<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\FileTranslation;
use App\Models\Cms\File;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new File)->getTable())) {
            Schema::create((new File)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->default(0);
                $table->unsignedInteger('file_category_id')->nullable();
                $table->foreign('file_category_id')->references('id')->on('file_categories');
                $table->string('path')->nullable();
                $table->string('extension')->nullable();
                $table->string('size')->nullable();
                $table->dateTime('publication_date')->nullable();
                $table->string('data')->nullable();
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new FileTranslation)->getTable())) {
            Schema::create((new FileTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('file_id')->unsigned();
                $table->foreign('file_id')->references('id')->on('files');
                $table->string('locale');
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->longText('content')->nullable();
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
        if (Schema::hasTable((new FileTranslation)->getTable())) {
            Schema::drop((new FileTranslation)->getTable());
        }
        if (Schema::hasTable((new File)->getTable())) {
            Schema::drop((new File)->getTable());
        }
    }
}
