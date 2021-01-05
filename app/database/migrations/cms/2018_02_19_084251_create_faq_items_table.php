<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\FaqItemTranslation;
use App\Models\Cms\FaqCategory;
use App\Models\Cms\FaqItem;

class CreateFaqItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new FaqItem)->getTable())) {
            Schema::create((new FaqItem)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->nullable();
                $table->integer('order')->nullable();
                $table->boolean('is_active')->default(0);
                $table->integer('faq_category_id')->unsigned()->nullable();
                $table->foreign('faq_category_id')->references('id')->on((new FaqCategory)->getTable());
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new FaqItemTranslation)->getTable())) {
            Schema::create((new FaqItemTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('locale');
                $table->integer('faq_item_id')->unsigned();
                $table->unique(['faq_item_id', 'locale', 'deleted_at']);
                $table->foreign('faq_item_id')->references('id')->on((new FaqItem)->getTable())->onDelete('cascade');
                $table->text('question')->nullable();
                $table->text('answer')->nullable();
                $table->string('image')->nullable();
                $table->string('thumb')->nullable();
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
        if (Schema::hasTable((new FaqItemTranslation)->getTable())) {
            // Schema::drop((new FaqItemTranslation)->getTable());
        }
        if (Schema::hasTable((new FaqItem)->getTable())) {
            // Schema::drop((new FaqItem)->getTable());
        }
    }
}
