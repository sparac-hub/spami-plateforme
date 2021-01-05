<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class GestionnaireAspimTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'gestionnaire_aspim_id',
        'locale',
        'slug',
        'nom_abrege_institution',
        'nom_institution',
        'meta_title',
        'meta_description',
    ];


    // belongsTo Relationships

    public function gestionnaireAspim()
    {
        return $this->belongsTo(GestionnaireAspim::class, 'gestionnaire_aspim_id');
    }
}
