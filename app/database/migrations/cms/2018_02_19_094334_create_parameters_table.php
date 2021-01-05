<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


use App\Models\Cms\ParameterGroup;
use App\Models\Cms\Parameter;
use App\Models\Cms\Module;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Parameter)->getTable())) {
            Schema::create((new Parameter)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('reference');
                $table->unique(['reference', 'deleted_at']); // Every parameter should have a unique reference
                $table->text('value')->nullable();
                $table->integer('parameter_group_id')->unsigned()->default(1);
                $table->foreign('parameter_group_id')->references('id')->on((new ParameterGroup)->getTable());
                $table->integer('module_id')->unsigned()->nullable();
                $table->foreign('module_id')->references('id')->on((new Module)->getTable());
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
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
        if (Schema::hasTable((new Parameter)->getTable())) {
            // Schema::drop((new Parameter)->getTable());
        }
    }
}
