<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


use App\Models\Cms\MenuBanner;

class CreateMenuBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new MenuBanner)->getTable())) {
            Schema::create((new MenuBanner)->getTable(), function (Blueprint $table) {
                $table->increments('id');
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
        if (Schema::hasTable((new MenuBanner)->getTable())) {
            // Schema::drop((new MenuBanner)->getTable());
        }
    }
}
