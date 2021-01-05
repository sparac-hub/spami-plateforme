<?php

use App\Models\Cms\Aspim;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\TrainingTranslation;
use App\Models\Cms\Training;

class UpdateAspimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::table((new Aspim())->getTable(), function ($table) {
            $table->string('website_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {

    }
}
