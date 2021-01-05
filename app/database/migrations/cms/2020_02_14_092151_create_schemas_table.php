<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\SchemaTranslation;
use App\Models\Cms\Schema as ModelSchema;

class CreateSchemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new ModelSchema)->getTable())) {
            Schema::create((new ModelSchema)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->default(0);
                $table->string('path')->nullable();
                $table->string('extension')->nullable();
                $table->string('size')->nullable();
                $table->dateTime('publication_date')->nullable();
                $table->string('data')->nullable();
                $table->integer('aspim_id')->unsigned()->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new SchemaTranslation())->getTable())) {
            Schema::create((new SchemaTranslation())->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('schema_id')->unsigned();
                $table->foreign('schema_id')->references('id')->on('schemas');
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
        if (Schema::hasTable((new SchemaTranslation())->getTable())) {
            Schema::drop((new SchemaTranslation())->getTable());
        }
        if (Schema::hasTable((new ModelSchema)->getTable())) {
            Schema::drop((new ModelSchema)->getTable());
        }
    }
}
