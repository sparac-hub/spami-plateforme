<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ContactRecipient extends BaseModel
{
    use SoftDeletes, Notifiable;

    // Todo: Notifiable? maybe he can have an account later so he can read messages on the CMS

    protected $buttonsRouteNamePrefix = 'back.contact_recipients';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'email',
    ];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
