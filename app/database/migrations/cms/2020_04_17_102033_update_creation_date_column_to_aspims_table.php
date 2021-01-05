<?php

use App\Models\Cms\Aspim;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\TrainingTranslation;
use App\Models\Cms\Training;
use Illuminate\Support\Facades\Schema;

class UpdateCreationDateColumnToAspimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::table((new Aspim())->getTable(), function (Blueprint $table) {
            $table->integer('creation_date')->nullable()->change();
            //$table->year('creation_date')->nullable()->change();
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
