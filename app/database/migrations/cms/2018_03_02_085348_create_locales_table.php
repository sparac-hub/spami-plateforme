<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


use App\Models\Cms\Locale;

class CreateLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Locale)->getTable())) {
            Schema::create((new Locale)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('reference');
                $table->unique(['reference', 'deleted_at'], 'loc_name_unique');
                $table->string('name');
                $table->unique(['name', 'deleted_at'], 'loc_ref_unique');
                $table->boolean('is_default')->default(0);
                $table->boolean('is_active')->default(0);
                $table->boolean('is_rtl')->default(0);
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
        if (Schema::hasTable((new Locale)->getTable())) {
            // Schema::drop((new Locale)->getTable());
        }
    }
}
