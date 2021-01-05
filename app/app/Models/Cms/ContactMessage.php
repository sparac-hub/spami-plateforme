<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactMessage extends BaseModel
{
    use SoftDeletes;

    protected $buttonsRouteNamePrefix = 'back.contact_messages';

    protected $dates = [
        'deleted_at',
        'read_at',
    ];

    protected $fillable = [
        'menu_id',
        'email',
        'subject',
        'message',
        'name',
        'is_company',
        'fiscal_code',
        'domain',
        'first_name',
        'last_name',
        'phone',
        'fax',
        'address',
        'postal_code',
        'nationality_str',
        'governorate_str',
        'governorate_id',
        'type',
        'other_type',
        'read_at',
    ];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
