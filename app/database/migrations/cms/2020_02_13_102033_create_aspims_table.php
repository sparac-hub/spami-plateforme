<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\AspimTranslation;
use App\Models\Cms\Aspim;

class CreateAspimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Aspim)->getTable())) {
            Schema::create((new Aspim)->getTable(), function (Blueprint $table) {
                $table->increments('id');

                $table->string('website')->nullable();
                $table->year('included_at')->nullable();
                $table->double('total_surface', 14, 2)->nullable();
                $table->double('total_surface_marine', 14, 2)->nullable();
                $table->double('width', 14, 2)->nullable();
                $table->integer('aspim_category_id')->unsigned()->nullable();
                $table->foreign('aspim_category_id')
                    ->references('id')
                    ->on('aspim_categories');
                $table->date('creation_date')->nullable();

                $table->string('geojson')->nullable();
                $table->boolean('is_mpa')->default(false);
                $table->string('mapamed_feature_id')->nullable();
                $table->text('business_plan')->nullable();

                $table->boolean('is_active')->default(0);
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new AspimTranslation)->getTable())) {
            Schema::create((new AspimTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('aspim_id')->unsigned();
                $table->foreign('aspim_id')->references('id')->on('aspims');
                $table->string('locale');
                $table->string('slug');
                $table->text('name');
                $table->text('status')->nullable();
                $table->text('creation_text')->nullable();
                $table->mediumText('physical_features')->nullable();
                $table->mediumText('ecological_features')->nullable();
                $table->mediumText('threats_and_pressures')->nullable();
                $table->mediumText('teritory')->nullable();
                $table->mediumText('mediterranean_importance')->nullable();
                $table->text('management_body')->nullable();
                $table->text('geographic_position')->nullable();
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
                $table->unique(['slug', 'locale', 'deleted_at']);
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
        if (Schema::hasTable((new AspimTranslation)->getTable())) {
            Schema::drop((new AspimTranslation)->getTable());
        }
        if (Schema::hasTable((new Aspim)->getTable())) {
            Schema::drop((new Aspim)->getTable());
        }
    }
}
