<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutilGestionTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'outil_gestion_id',
        'locale',
        'slug',
        'name',
        'meta_title',
        'meta_description',
        'type',
        'url_video',
        'url_lien',
    ];


    // belongsTo Relationships

    public function outil_gestion()
    {
        return $this->belongsTo(OutilGestion::class, 'outil_gestion_id');
    }
}
