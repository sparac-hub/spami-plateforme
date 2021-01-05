<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\Role;

class AddColumnIsCustomAppRoleToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new Role)->getTable(), function ($table) {
            $table->boolean('is_custom_app_role')->default(0);
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
            $table->dropColumn('is_custom_app_role');
        });
    }
}
