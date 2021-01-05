<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\GovernorateTranslation;
use App\Models\Cms\Governorate;

class CreateGovernoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Governorate)->getTable())) {
            Schema::create((new Governorate)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('country_id')->unsigned();
                $table->foreign('country_id')->references('id')->on('countries');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new GovernorateTranslation)->getTable())) {
            Schema::create((new GovernorateTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('governorate_id')->unsigned();
                $table->unique(['governorate_id', 'locale', 'deleted_at'], 'gov_trans_deletedAt_unique');
                $table->foreign('governorate_id')->references('id')->on('governorates');
                $table->string('name');
                //$table->integer('deleted_by')->nullable();
                //$table->integer('created_by')->nullable();
                //$table->integer('updated_by')->nullable();
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
        if (Schema::hasTable((new GovernorateTranslation)->getTable())) {
            Schema::drop((new GovernorateTranslation)->getTable());
        }
        if (Schema::hasTable((new Governorate)->getTable())) {
            Schema::drop((new Governorate)->getTable());
        }
    }
}
