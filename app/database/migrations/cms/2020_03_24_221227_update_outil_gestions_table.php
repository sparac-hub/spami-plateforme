<?php

use App\Models\Cms\Banner;
use App\Models\Cms\BannerTranslation;
use App\Models\Cms\OutilGestion;
use App\Models\Cms\OutilGestionTranslation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOutilGestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new OutilGestion())->getTable(), function ($table) {
            $table->dropColumn('type');
            $table->dropColumn('url_video');
            $table->dropColumn('url_lien');
        });
        Schema::table((new OutilGestionTranslation())->getTable(), function ($table) {
            $table->string('type')->nullable();
            $table->string('url_video')->nullable();
            $table->string('url_lien')->nullable();
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
