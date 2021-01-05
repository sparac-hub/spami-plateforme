<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\PartnerTranslation;
use App\Models\Cms\Partner;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new Partner)->getTable())) {
            Schema::create((new Partner)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->boolean('is_active')->default(0);
                $table->integer('order')->nullable();
                $table->integer('partner_category_id')->unsigned()->nullable();
                $table->foreign('partner_category_id')->references('id')->on('partner_categories');
                $table->string('protocol');
                $table->string('url');
                $table->string('image')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new PartnerTranslation)->getTable())) {
            Schema::create((new PartnerTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('partner_id')->unsigned();
                $table->foreign('partner_id')->references('id')->on('partners');
                $table->string('locale');
                $table->string('title');
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
        if (Schema::hasTable((new PartnerTranslation)->getTable())) {
            Schema::drop((new PartnerTranslation)->getTable());
        }
        if (Schema::hasTable((new Partner)->getTable())) {
            Schema::drop((new Partner)->getTable());
        }
    }
}
