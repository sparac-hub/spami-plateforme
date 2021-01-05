<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'program_id',
        'locale',
        'title',
        'description',
    ];

    // belongsTo Relationships

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
