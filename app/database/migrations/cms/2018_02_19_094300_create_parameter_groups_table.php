<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


use App\Models\Cms\ParameterGroup;

class CreateParameterGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new ParameterGroup)->getTable())) {
            Schema::create((new ParameterGroup)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('reference');
                $table->unique(['reference', 'deleted_at']);
                $table->string('name')->unique();
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
        if (Schema::hasTable((new ParameterGroup)->getTable())) {
            // Schema::drop((new ParameterGroup)->getTable());
        }
    }
}
