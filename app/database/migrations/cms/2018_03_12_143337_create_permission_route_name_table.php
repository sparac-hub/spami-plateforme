<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\Module;
use App\Models\Cms\Permission;

class CreatePermissionRouteNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('permission_route_name')) {
            Schema::create('permission_route_name', function (Blueprint $table) {
                $table->increments('id');
                $table->string('route_name');
                $table->integer('permission_id')->unsigned()->nullable();
                $table->foreign('permission_id')->references('id')->on((new Permission)->getTable());
                $table->unique(['permission_id', 'route_name']);
                $table->integer('module_id')->unsigned()->nullable();
                $table->foreign('module_id')->references('id')->on((new Module)->getTable());
                $table->boolean('is_active')->default(0)->nullable(); // Checking permission is active
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
        Schema::dropIfExists('permission_route_name');
    }
}
