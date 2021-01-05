<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\PartnerCategoryTranslation;
use App\Models\Cms\PartnerCategory;

class CreatePartnerCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new PartnerCategory)->getTable())) {
            Schema::create((new PartnerCategory)->getTable(), function (Blueprint $table) {
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
        if (!Schema::hasTable((new PartnerCategoryTranslation)->getTable())) {
            Schema::create((new PartnerCategoryTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('partner_category_id')->unsigned();
                $table->foreign('partner_category_id')->references('id')->on('partner_categories');
                $table->string('locale');
                $table->string('slug');
                $table->string('title'); // Todo: rename [title] to [name]
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
        if (Schema::hasTable((new PartnerCategoryTranslation)->getTable())) {
            Schema::drop((new PartnerCategoryTranslation)->getTable());
        }
        if (Schema::hasTable((new PartnerCategory)->getTable())) {
            Schema::drop((new PartnerCategory)->getTable());
        }
    }
}
