<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\PostCategoryTranslation;
use App\Models\Cms\PostCategory;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new PostCategory)->getTable())) {
            Schema::create((new PostCategory)->getTable(), function (Blueprint $table) {
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
        if (!Schema::hasTable((new PostCategoryTranslation)->getTable())) {
            Schema::create((new PostCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('post_category_id')->unsigned();
                $table->unique(['post_category_id', 'locale', 'deleted_at'], 'pct_deletedAt_unique');
                $table->foreign('post_category_id')->references('id')->on((new PostCategory)->getTable())->onDelete('cascade');
                $table->string('name');
                $table->text('description')->nullable();
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
        if (Schema::hasTable((new PostCategoryTranslation)->getTable())) {
            // Schema::drop((new PostCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new PostCategory)->getTable())) {
            // Schema::drop((new PostCategory)->getTable());
        }
    }
}
