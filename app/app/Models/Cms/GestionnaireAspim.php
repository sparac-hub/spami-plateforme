<?php

namespace App\Models\Cms;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Models\Traits\ButtonsTrait;

class GestionnaireAspim extends Authenticatable implements HasMedia
{
    use Notifiable, Translatable, HasRoles, LogsActivity, SoftDeletes, HasMediaTrait, ButtonsTrait;

    public $translatedAttributes = [
        'slug',
        'nom_abrege_institution',
        'nom_institution',
    ];
    //protected static $logAttributes = ['name', 'email'];
    protected $guard = "gestionnaire_aspim";
    protected $buttonsRouteNamePrefix = 'back.gestionnaire_aspim';
    protected $cascadeDeletes = ['translations'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'civilite',
        'name',
        'surname',
        'email',
        'email_verified_at',
        'other_email',
        'password',
        'is_active',
        'tel',
        'mobile',
        'fax',
        'langue',
        'other_langue',
        'adresse',
        'cite',
        'code_zip',
        'countrie_id',
        'menu_id',
        'position',
        'website',
        'skype',
        'facebook',
        'twitter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function countrie()
    {
        return $this->belongsTo(Country::class, 'countrie_id');
    }

    public function aspims()
    {
        return $this->belongsToMany(Aspim::class, 'aspims_gestionnaire_aspims', 'gestionnaire_aspim_id');
    }

    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)
            ->whereMenuId($menu_id);

        if ($request->countrie) {
            $query->where('countrie_id', $request->countrie);
        }

        if ($request->aspim) {
            $aspim = $request->aspim;

            $query->whereHas('aspims', function ($query) use ($aspim) {
                $query->where('aspim_id', $aspim);
            });
        }

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('name', config('cms.sql.like'), '%' . $keywords . '%')
                        ->orWhere('surname', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        return $query->paginate(config('cms.front_pagination.gestionnaire'));
    }

    public function getWebsiteLabelAttribute()
    {
        $label = '';
        if ($this->website) {
            $prefixes = array("https://", "http://", "www.");
            $label = str_replace($prefixes, "", $this->website);
        }
        return $label;

    }
}
