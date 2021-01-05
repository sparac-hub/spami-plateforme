<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\Permission;
use App\Models\Cms\Module;

class AddModuleIdColumnToPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new Permission)->getTable(), function ($table) {
            $table->integer('module_id')->unsigned()->nullable();
            $table->foreign('module_id')->references('id')->on((new Module)->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
