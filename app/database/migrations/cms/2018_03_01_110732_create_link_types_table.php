<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Cms\LinkType;

class CreateLinkTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new LinkType)->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference');
            $table->string('name');
            //$table->integer('deleted_by')->nullable();
            //$table->integer('created_by')->nullable();
            //$table->integer('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable((new LinkType)->getTable())) {
            Schema::dropIfExists((new LinkType)->getTable());
        }
    }
}
