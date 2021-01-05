<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


use App\Models\Cms\NewsletterSubscription;

class CreateNewsletterSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if (!Schema::hasTable((new NewsletterSubscription)->getTable())) {
            Schema::create((new NewsletterSubscription)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('email');
                $table->unique(['email', 'deleted_at']);
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
        if (Schema::hasTable((new NewsletterSubscription)->getTable())) {
            // Schema::drop((new NewsletterSubscription)->getTable());
        }
    }
}
