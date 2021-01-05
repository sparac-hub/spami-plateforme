<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\TrainingTranslation;
use App\Models\Cms\Training;

class UpdateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::table((new Training())->getTable(), function ($table) {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->string('url')->nullable();
        });

        Schema::table((new TrainingTranslation())->getTable(), function ($table) {
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        if (Schema::hasTable((new TrainingTranslation)->getTable())) {
            Schema::drop((new TrainingTranslation)->getTable());
        }
        if (Schema::hasTable((new Training)->getTable())) {
            Schema::drop((new Training)->getTable());
        }
    }
}
