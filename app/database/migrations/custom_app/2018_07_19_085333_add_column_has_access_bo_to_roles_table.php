<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\Role;

class AddColumnHasAccessBoToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new Role)->getTable(), function ($table) {
            $table->boolean('has_access_bo')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table((new Role)->getTable(), function ($table) {
            $table->dropColumn('has_access_bo');
        });
    }
}
