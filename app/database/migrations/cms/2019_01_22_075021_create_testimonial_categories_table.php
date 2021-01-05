<?php

use App\Models\Cms\TestimonialCategory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Cms\TestimonialCategoryTranslation;

class CreateTestimonialCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new TestimonialCategory)->getTable())) {
            Schema::create((new TestimonialCategory)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->integer('order')->nullable();
                $table->boolean('is_active')->default(0);
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new TestimonialCategoryTranslation)->getTable())) {
            Schema::create((new TestimonialCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('testimonial_category_id')->unsigned();
                $table->foreign('testimonial_category_id', 'fk_tstm_categ_trans')->references('id')->on('testimonial_categories');
                $table->string('locale');
                $table->string('slug');
                $table->string('title');
                $table->text('description')->nullable();
                $table->unique(['slug', 'locale', 'deleted_at']);
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
        if (Schema::hasTable((new TestimonialCategoryTranslation)->getTable())) {
            Schema::drop((new TestimonialCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new TestimonialCategory)->getTable())) {
            Schema::drop((new TestimonialCategory)->getTable());
        }
    }
}
