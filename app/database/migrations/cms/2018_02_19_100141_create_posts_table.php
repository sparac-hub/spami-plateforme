<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\PostTranslation;
use App\Models\Cms\PostCategory;
use App\Models\Cms\Post;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Post)->getTable())) {
            Schema::create((new Post)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('post_category_id')->unsigned();
                $table->foreign('post_category_id')->references('id')->on((new PostCategory)->getTable());
                $table->integer('order')->nullable();
                $table->boolean('is_active')->default(0);
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new PostTranslation)->getTable())) {
            Schema::create((new PostTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('post_id')->unsigned();
                $table->unique(['post_id', 'locale', 'deleted_at'], 'pos_tran_deletedAt_unique');
                $table->foreign('post_id')->references('id')->on((new Post)->getTable())->onDelete('cascade');
                $table->string('title');
                $table->string('slug');
                $table->longText('content');
                $table->string('meta_title');
                $table->string('meta_description');
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
        if (Schema::hasTable((new PostTranslation)->getTable())) {
            Schema::drop((new PostTranslation)->getTable());
        }
        if (Schema::hasTable((new Post)->getTable())) {
            Schema::drop((new Post)->getTable());
        }
    }
}
