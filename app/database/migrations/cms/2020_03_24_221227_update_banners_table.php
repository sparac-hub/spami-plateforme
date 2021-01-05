<?php

use App\Models\Cms\Banner;
use App\Models\Cms\BannerTranslation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new Banner())->getTable(), function ($table) {
            $table->dropColumn('link_type_id');
            $table->dropColumn('link_target');
            $table->dropColumn('http_protocol');
            $table->dropColumn('external_link');
            $table->dropColumn('internal_link');
        });
        Schema::table((new BannerTranslation())->getTable(), function ($table) {
            $table->string('link_type_id')->nullable();
            $table->string('link_target')->default('_self'); //['_self', '_blank']
            $table->string('http_protocol')->nullable(); //, ['http://', 'https://']
            $table->string('external_link')->nullable();
            $table->string('internal_link')->nullable();
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
