<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


use App\Models\Cms\ContactMessage;

class CreateContactMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new ContactMessage)->getTable())) {
            Schema::create((new ContactMessage)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->string('email');
                $table->string('subject')->nullable();
                $table->text('message');
                $table->string('name')->nullable();
                $table->boolean('is_company')->nullable();
                $table->string('fiscal_code')->nullable();
                $table->string('domain')->nullable();
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('phone')->nullable();
                $table->string('fax')->nullable();
                $table->text('address')->nullable();
                $table->string('postal_code')->nullable();
                $table->string('nationality_str')->nullable();
                $table->string('governorate_str')->nullable();
                $table->integer('governorate_id')->unsigned()->nullable();
                $table->foreign('governorate_id')->references('id')->on('governorates');
                $table->string('type')->nullable();
                $table->string('other_type')->nullable();
                $table->dateTime('read_at')->nullable();
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
        if (Schema::hasTable((new ContactMessage)->getTable())) {
            // Schema::drop((new ContactMessage)->getTable());
        }
    }
}
