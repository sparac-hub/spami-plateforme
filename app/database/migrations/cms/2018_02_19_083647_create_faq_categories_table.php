<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\FaqCategoryTranslation;
use App\Models\Cms\FaqCategory;

class CreateFaqCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new FaqCategory())->getTable())) {
            Schema::create((new FaqCategory())->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->nullable();
                $table->integer('order')->nullable();
                $table->boolean('is_active')->default(0);
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new FaqCategoryTranslation)->getTable())) {
            Schema::create((new FaqCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('faq_category_id')->unsigned();
                $table->unique(['faq_category_id', 'locale', 'deleted_at'], 'fct_deletedAt_unique');
                $table->foreign('faq_category_id')->references('id')->on((new FaqCategory())->getTable())->onDelete('cascade');
                $table->string('slug');
                $table->string('name');
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
        if (Schema::hasTable((new FaqCategoryTranslation)->getTable())) {
            // Schema::drop((new FaqCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new FaqCategory())->getTable())) {
            // Schema::drop((new FaqCategory())->getTable());
        }
    }
}
