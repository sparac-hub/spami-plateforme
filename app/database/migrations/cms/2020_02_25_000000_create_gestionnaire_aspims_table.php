<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Cms\GestionnaireAspim;
use App\Models\Cms\GestionnaireAspimTranslation;

class CreateGestionnaireAspimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable((new GestionnaireAspim)->getTable())) {
            Schema::create((new GestionnaireAspim)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned()->nullable();
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->string('civilite')->nullable();
                $table->boolean('is_active')->default(0);
                $table->text('name')->nullable();
                $table->text('surname');
                $table->string('email');
                $table->string('other_email')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->unique(['email', 'deleted_at']);
                $table->string('password');
                $table->string('tel');
                $table->string('mobile')->nullable();
                $table->string('fax')->nullable();
                $table->string('langue')->nullable();
                $table->string('other_langue')->nullable();
                $table->text('adresse')->nullable();
                $table->text('cite')->nullable();
                $table->string('code_zip')->nullable();
                $table->integer('countrie_id')->unsigned()->nullable();
                $table->foreign('countrie_id')->references('id')->on('countries');
                $table->text('position')->nullable();
                $table->string('website')->nullable();
                $table->string('skype')->nullable();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
                $table->rememberToken();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable((new GestionnaireAspimTranslation)->getTable())) {
            Schema::create((new GestionnaireAspimTranslation)->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('gestionnaire_aspim_id')->unsigned();
                $table->foreign('gestionnaire_aspim_id')->references('id')->on((new GestionnaireAspim)->getTable());
                $table->string('locale');
                $table->string('slug');
                $table->string('nom_abrege_institution');
                $table->string('nom_institution');
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
                $table->unique(['slug', 'locale', 'deleted_at']);
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable((new GestionnaireAspimTranslation)->getTable())) {
            Schema::drop((new GestionnaireAspimTranslation)->getTable());
        }
        if (Schema::hasTable((new GestionnaireAspim)->getTable())) {
            Schema::drop((new GestionnaireAspim)->getTable());
        }
    }
}
