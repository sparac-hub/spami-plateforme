<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Cms\Aspim;
use App\Models\Cms\Program;

class ProgramAspim extends BaseModel
{

    protected $fillable = ['program_id', 'aspim_id'];

    public function aspim()
    {
        return $this->belongsTo(Aspim::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
