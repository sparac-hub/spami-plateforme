<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\TestimonialTranslation;
use App\Models\Cms\Testimonial;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Testimonial)->getTable())) {
            Schema::create((new Testimonial)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                $table->integer('testimonial_category_id')->unsigned()->nullable();
                $table->foreign('testimonial_category_id', 'fk_tstm_tstm_categ')->references('id')->on('testimonial_categories');
                $table->string('image')->nullable();
                $table->string('linkedin')->nullable();
                $table->string('facebook')->nullable();
                $table->string('instagram')->nullable();
                $table->string('twitter')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new TestimonialTranslation)->getTable())) {
            Schema::create((new TestimonialTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('testimonial_id')->unsigned();
                $table->foreign('testimonial_id')->references('id')->on('testimonials');
                $table->string('locale');
                $table->string('slug')->nullable();
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
        if (Schema::hasTable((new TestimonialTranslation)->getTable())) {
            Schema::drop((new TestimonialTranslation)->getTable());
        }
        if (Schema::hasTable((new Testimonial)->getTable())) {
            Schema::drop((new Testimonial)->getTable());
        }
    }
}
