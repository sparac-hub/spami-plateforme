<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {
    /**
     * App\Models\BaseModel
     *
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel query()
     */
    class BaseModel extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Appointment
     *
     * @property int $id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Appointment onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Appointment whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Appointment withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Appointment withoutTrashed()
     */
    class Appointment extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\AppointmentRecipient
     *
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\AppointmentRecipient newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\AppointmentRecipient newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\AppointmentRecipient onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\AppointmentRecipient query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\AppointmentRecipient whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\AppointmentRecipient whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\AppointmentRecipient whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\AppointmentRecipient whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\AppointmentRecipient withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\AppointmentRecipient withoutTrashed()
     */
    class AppointmentRecipient extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Banner
     *
     * @property int $id
     * @property string|null $image_filepath
     * @property string|null $video_filepath
     * @property string|null $script
     * @property string|null $http_protocol
     * @property string|null $link_type
     * @property string $link_target
     * @property string|null $external_link
     * @property string|null $internal_link
     * @property int|null $width
     * @property int|null $height
     * @property string $type
     * @property string|null $thumb
     * @property string|null $css_class
     * @property bool $is_for_mobile
     * @property bool $is_active
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\BannerTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Banner onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereCssClass($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereExternalLink($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereHeight($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereHttpProtocol($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereImageFilepath($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereInternalLink($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereIsForMobile($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereLinkTarget($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereLinkType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereScript($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereThumb($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereVideoFilepath($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner whereWidth($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Banner withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Banner withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Banner withoutTrashed()
     */
    class Banner extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\BannerTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $banner_id
     * @property string $back_office_title
     * @property string|null $title
     * @property string|null $title_2
     * @property string|null $description
     * @property string|null $meta_title
     * @property string|null $meta_description
     * @property string|null $button_title
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\Banner $banner
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\BannerTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereBackOfficeTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereBannerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereButtonTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereMetaDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereMetaTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereTitle2($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\BannerTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\BannerTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\BannerTranslation withoutTrashed()
     */
    class BannerTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\City
     *
     * @property int $id
     * @property int|null $country_id
     * @property int $governorate_id
     * @property bool $is_active
     * @property int|null $order
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\CityTranslation[] $city_translations
     * @property-read \App\Models\Cms\Country|null $country
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Governorate $governorate
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\CityTranslation[] $translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Zone[] $zones
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\City onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereCountryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereGovernorateId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\City withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\City withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\City withoutTrashed()
     */
    class City extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\CityTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $city_id
     * @property string $name
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\City $city
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\CityTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation whereCityId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CityTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\CityTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\CityTranslation withoutTrashed()
     */
    class CityTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ContactMessage
     *
     * @property int $id
     * @property int|null $menu_id
     * @property string|null $first_name
     * @property string|null $last_name
     * @property string|null $phone
     * @property string|null $fax
     * @property string|null $address
     * @property int|null $governorate_id
     * @property string $email
     * @property string|null $read_at
     * @property string|null $subject
     * @property string $message
     * @property string|null $name
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ContactMessage onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereFax($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereFirstName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereGovernorateId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereLastName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereMessage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage wherePhone($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereReadAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereSubject($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactMessage whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ContactMessage withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ContactMessage withoutTrashed()
     */
    class ContactMessage extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ContactRecipient
     *
     * @property int $id
     * @property int|null $menu_id
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ContactRecipient onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ContactRecipient whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ContactRecipient withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ContactRecipient withoutTrashed()
     */
    class ContactRecipient extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Country
     *
     * @property int $id
     * @property int|null $order
     * @property bool $is_active
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\City[] $cities
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\CountryTranslation[] $country_translations
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Governorate[] $governorates
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\CountryTranslation[] $translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Zone[] $zones
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Country onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Country withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Country withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Country withoutTrashed()
     */
    class Country extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\CountryTranslation
     *
     * @property int $id
     * @property string $name
     * @property string|null $nationality
     * @property string $locale
     * @property int $country_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\Country $country
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\CountryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation whereCountryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation whereNationality($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\CountryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\CountryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\CountryTranslation withoutTrashed()
     */
    class CountryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Document
     *
     * @property int $id
     * @property string $Parent
     * @property string $ParentID
     * @property string $AuthorID
     * @property string|null $dateModified
     * @property string|null $datePublished
     * @property int $documentType
     * @property int $format
     * @property string $url
     * @property string $language
     * @property string|null $title_ar
     * @property string|null $title_fr
     * @property string|null $title_en
     * @property string|null $description_ar
     * @property string|null $description_fr
     * @property string|null $description_en
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\DocumentTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Document onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereAuthorID($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereDateModified($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereDatePublished($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereDescriptionAr($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereDescriptionEn($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereDescriptionFr($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereDocumentType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereFormat($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereLanguage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereParent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereParentID($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereTitleAr($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereTitleEn($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereTitleFr($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document whereUrl($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Document withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Document withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Document withoutTrashed()
     */
    class Document extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\DocumentCategory
     *
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\DocumentCategoryTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategory withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentCategory withoutTrashed()
     */
    class DocumentCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\DocumentCategoryTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $document_category_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentCategoryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation whereDocumentCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentCategoryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentCategoryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentCategoryTranslation withoutTrashed()
     */
    class DocumentCategoryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\DocumentTranslation
     *
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\DocumentTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\DocumentTranslation withoutTrashed()
     */
    class DocumentTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Event
     *
     * @property int $id
     * @property bool $is_active
     * @property string|null $start_date
     * @property string|null $end_date
     * @property int|null $menu_id
     * @property int|null $event_category_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\EventCategory|null $category
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read mixed $slug_for_url
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\EventTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Event onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereEndDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereEventCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereStartDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Event withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Event withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Event withoutTrashed()
     */
    class Event extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\EventCategory
     *
     * @property int $id
     * @property int|null $menu_id
     * @property bool $is_active
     * @property int|null $order
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\EventCategoryTranslation[] $event_category_translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Event[] $events
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\EventCategoryTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategory withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventCategory withoutTrashed()
     */
    class EventCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\EventCategoryTranslation
     *
     * @property int $id
     * @property int $event_category_id
     * @property string $locale
     * @property string $slug
     * @property string $name
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\EventCategory $event_category
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventCategoryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereEventCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventCategoryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventCategoryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventCategoryTranslation withoutTrashed()
     */
    class EventCategoryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\EventTranslation
     *
     * @property int $id
     * @property int $event_id
     * @property string $locale
     * @property string $slug
     * @property string $name
     * @property string $description
     * @property string|null $image
     * @property string|null $content
     * @property string|null $meta_title
     * @property string|null $meta_description
     * @property string|null $tmb
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\Event $event
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereEventId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereMetaDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereMetaTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereTmb($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\EventTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\EventTranslation withoutTrashed()
     */
    class EventTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\FaqCategory
     *
     * @property int $id
     * @property int|null $menu_id
     * @property int|null $order
     * @property bool $is_active
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\FaqItem[] $faq_items
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\FaqCategoryTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategory withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqCategory withoutTrashed()
     */
    class FaqCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\FaqCategoryTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $faq_category_id
     * @property string $slug
     * @property string $name
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqCategoryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereFaqCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqCategoryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqCategoryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqCategoryTranslation withoutTrashed()
     */
    class FaqCategoryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\FaqItem
     *
     * @property int $id
     * @property int|null $menu_id
     * @property int|null $order
     * @property bool $is_active
     * @property int $faq_category_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\FaqCategory $category
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\FaqItemTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem inCategory($faq_item)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem nextItem($faq_item)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqItem onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem previewsItem($faq_item)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereFaqCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItem withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqItem withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqItem withoutTrashed()
     */
    class FaqItem extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\FaqItemTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $faq_item_id
     * @property string|null $question
     * @property string|null $answer
     * @property string|null $image
     * @property string|null $thumb
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqItemTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereAnswer($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereFaqItemId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereQuestion($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereThumb($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FaqItemTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqItemTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FaqItemTranslation withoutTrashed()
     */
    class FaqItemTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\File
     *
     * @property int $id
     * @property bool $is_active
     * @property int $order
     * @property int $file_category_id
     * @property string|null $path
     * @property string|null $extension
     * @property string|null $size
     * @property string|null $publication_date
     * @property string|null $data
     * @property int|null $menu_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\FileCategory $category
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Media[] $media
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\FileTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File inCategory($file)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File nextItem($file)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\File onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File previewsItem($file)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereData($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereExtension($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereFileCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File wherePath($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File wherePublicationDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereSize($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\File withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\File withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\File withoutTrashed()
     */
    class File extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\FileCategory
     *
     * @property int $id
     * @property int|null $menu_id
     * @property bool $is_active
     * @property int $order
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\File[] $files
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\FileCategoryTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategory withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileCategory withoutTrashed()
     */
    class FileCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\FileCategoryTranslation
     *
     * @property int $id
     * @property int $file_category_id
     * @property string $locale
     * @property string $slug
     * @property string $name
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileCategoryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereFileCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileCategoryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileCategoryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileCategoryTranslation withoutTrashed()
     */
    class FileCategoryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\FileTranslation
     *
     * @property int $id
     * @property int $file_id
     * @property string $locale
     * @property string $name
     * @property string|null $description
     * @property string|null $image
     * @property string|null $content
     * @property string|null $meta_title
     * @property string|null $meta_description
     * @property string|null $tmb
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereFileId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereMetaDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereMetaTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereTmb($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\FileTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\FileTranslation withoutTrashed()
     */
    class FileTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Gallery
     *
     * @property int $id
     * @property bool $is_active
     * @property int|null $order
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\GalleryImage[] $images
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\GalleryTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Gallery onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Gallery withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Gallery withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Gallery withoutTrashed()
     */
    class Gallery extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\GalleryImage
     *
     * @property int $id
     * @property string $file_path
     * @property int $gallery_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\GalleryImageTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryImage onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereFilePath($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereGalleryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImage withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryImage withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryImage withoutTrashed()
     */
    class GalleryImage extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\GalleryImageTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $gallery_image_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryImageTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation whereGalleryImageId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryImageTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryImageTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryImageTranslation withoutTrashed()
     */
    class GalleryImageTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\GalleryTranslation
     *
     * @property int $id
     * @property string $name
     * @property string|null $description
     * @property string $locale
     * @property int $gallery_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation whereGalleryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GalleryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GalleryTranslation withoutTrashed()
     */
    class GalleryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Governorate
     *
     * @property int $id
     * @property int $country_id
     * @property bool $is_active
     * @property int|null $order
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\City[] $cities
     * @property-read \App\Models\Cms\Country $country
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\GovernorateTranslation[] $governorate_translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\GovernorateTranslation[] $translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Zone[] $zones
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Governorate onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereCountryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Governorate withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Governorate withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Governorate withoutTrashed()
     */
    class Governorate extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\GovernorateTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $governorate_id
     * @property string $name
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Governorate $governorate
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GovernorateTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation whereGovernorateId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\GovernorateTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GovernorateTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\GovernorateTranslation withoutTrashed()
     */
    class GovernorateTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\HomeSection
     *
     * @property int $id
     * @property string $name
     * @property string $reference
     * @property string|null $value
     * @property int $parameter_group_id
     * @property int|null $module_id
     * @property int|null $menu_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \App\Models\Cms\Module|null $module
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\HomeSection onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereModuleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereParameterGroupId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereReference($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\HomeSection whereValue($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\HomeSection withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\HomeSection withoutTrashed()
     */
    class HomeSection extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Keyword
     *
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\KeywordTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Keyword onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Keyword withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Keyword withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Keyword withoutTrashed()
     */
    class Keyword extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\KeywordTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $keyword_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\KeywordTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation whereKeywordId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\KeywordTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\KeywordTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\KeywordTranslation withoutTrashed()
     */
    class KeywordTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Language
     *
     * @property int $id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Language onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Language whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Language withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Language withoutTrashed()
     */
    class Language extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\LanguageLine
     *
     * @property int $id
     * @property string $group
     * @property string $key
     * @property array $text
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine whereGroup($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine whereKey($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine whereText($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LanguageLine whereUpdatedAt($value)
     */
    class LanguageLine extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\LinkType
     *
     * @property int $id
     * @property string $reference
     * @property string $name
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Menu[] $menus
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\LinkType onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType whereReference($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\LinkType whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\LinkType withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\LinkType withoutTrashed()
     */
    class LinkType extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Locale
     *
     * @property int $id
     * @property string $reference
     * @property string $name
     * @property bool $is_default
     * @property bool $is_active
     * @property bool $is_rtl
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Locale onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereIsDefault($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereIsRtl($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereReference($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Locale whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Locale withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Locale withoutTrashed()
     */
    class Locale extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Mediatheque
     *
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\MediathequeTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Mediatheque onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Mediatheque withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Mediatheque withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Mediatheque withoutTrashed()
     */
    class Mediatheque extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\MediathequeTranslation
     *
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Mediatheque $mediatheque
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MediathequeTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MediathequeTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MediathequeTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MediathequeTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MediathequeTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MediathequeTranslation withoutTrashed()
     */
    class MediathequeTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Menu
     *
     * @property int $id
     * @property int $menu_group_id
     * @property int|null $module_id
     * @property string|null $route_name
     * @property string|null $route_parameters
     * @property int|null $parent_id
     * @property int|null $link_type_id
     * @property string|null $http_protocol
     * @property string|null $external_link
     * @property string|null $internal_link
     * @property string|null $link_target
     * @property bool $is_active
     * @property string|null $icon
     * @property int|null $order
     * @property string|null $css_class
     * @property string|null $image1
     * @property string|null $tmb1
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read \App\Models\Cms\Event $event
     * @property-read mixed $backend_link
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read mixed $frontend_link
     * @property-read mixed $is_active_html
     * @property-read string $show_button
     * @property-read \App\Models\Cms\LinkType|null $link_type
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \App\Models\Cms\MenuGroup $menu_group
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Menu[] $menus
     * @property-read \App\Models\Cms\Module|null $module
     * @property-read \App\Models\Cms\Page $page
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\MenuTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Menu onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereCssClass($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereExternalLink($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereHttpProtocol($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereIcon($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereImage1($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereInternalLink($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereLinkTarget($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereLinkTypeId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereMenuGroupId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereModuleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereParentId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereRouteName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereRouteParameters($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereTmb1($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Menu withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Menu withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Menu withoutTrashed()
     */
    class Menu extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\MenuBanner
     *
     * @property int $id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MenuBanner onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuBanner whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MenuBanner withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MenuBanner withoutTrashed()
     */
    class MenuBanner extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\MenuGroup
     *
     * @property int $id
     * @property string $name
     * @property string $reference
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Menu[] $menus
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuGroup newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuGroup newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuGroup query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuGroup whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuGroup whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuGroup whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuGroup whereReference($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuGroup whereUpdatedAt($value)
     */
    class MenuGroup extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\MenuTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $menu_id
     * @property string $label
     * @property string $slug
     * @property string|null $meta_title
     * @property string|null $meta_description
     * @property string|null $content
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu $menu
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MenuTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereLabel($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereMetaDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereMetaTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\MenuTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MenuTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\MenuTranslation withoutTrashed()
     */
    class MenuTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Module
     *
     * @property int $id
     * @property string $reference
     * @property string|null $main_model
     * @property bool $is_active
     * @property bool $is_menu_module
     * @property int|null $order
     * @property string|null $icon
     * @property string|null $backend_route
     * @property string|null $frontend_route
     * @property string|null $front_namespace
     * @property string|null $front_controller
     * @property bool $is_on_backend_sidebar
     * @property int|null $parent_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read mixed $front_controller_with_namespace
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Menu[] $menus
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Module[] $modules
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\ModuleTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Module onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereBackendRoute($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereFrontController($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereFrontNamespace($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereFrontendRoute($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereIcon($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereIsMenuModule($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereIsOnBackendSidebar($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereMainModel($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereParentId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereReference($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Module withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Module withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Module withoutTrashed()
     */
    class Module extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ModuleTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $module_id
     * @property string $name
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ModuleTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation whereModuleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ModuleTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ModuleTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ModuleTranslation withoutTrashed()
     */
    class ModuleTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\News
     *
     * @property int $id
     * @property bool $is_active
     * @property string|null $start_date
     * @property string|null $end_date
     * @property int|null $menu_id
     * @property int|null $news_category_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\NewsCategory|null $category
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read mixed $slug_for_url
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\NewsTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\News onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereEndDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereNewsCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereStartDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\News withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\News withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\News withoutTrashed()
     */
    class News extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\NewsCategory
     *
     * @property int $id
     * @property int|null $menu_id
     * @property bool $is_active
     * @property int|null $order
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\NewsCategoryTranslation[] $event_category_translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Event[] $events
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\NewsCategoryTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategory withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsCategory withoutTrashed()
     */
    class NewsCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\NewsCategoryTranslation
     *
     * @property int $id
     * @property int $event_category_id
     * @property string $locale
     * @property string $slug
     * @property string $name
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\NewsCategory $news_category
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsCategoryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereEventCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsCategoryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsCategoryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsCategoryTranslation withoutTrashed()
     */
    class NewsCategoryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\NewsletterSubscription
     *
     * @property int $id
     * @property string $email
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsletterSubscription onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsletterSubscription whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsletterSubscription withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsletterSubscription withoutTrashed()
     */
    class NewsletterSubscription extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\NewsTranslation
     *
     * @property int $id
     * @property int $news_id
     * @property string $locale
     * @property string $slug
     * @property string $name
     * @property string|null $description
     * @property string|null $image
     * @property string|null $content
     * @property string|null $meta_title
     * @property string|null $meta_description
     * @property string|null $tmb
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\News $news
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereMetaDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereMetaTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereNewsId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereTmb($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\NewsTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\NewsTranslation withoutTrashed()
     */
    class NewsTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Page
     *
     * @property int $id
     * @property int $menu_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\PageTranslation[] $translations
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page active()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page createForMenuId($menu_id)
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Page onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Page withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Page withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Page withoutTrashed()
     */
    class Page extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\PageTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $page_id
     * @property string|null $title
     * @property string|null $content
     * @property string|null $meta_title
     * @property string|null $meta_description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PageTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereMetaDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereMetaTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation wherePageId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PageTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PageTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PageTranslation withoutTrashed()
     */
    class PageTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Parameter
     *
     * @property int $id
     * @property string $name
     * @property string $reference
     * @property string|null $value
     * @property int $parameter_group_id
     * @property int|null $module_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Module|null $module
     * @property-read \App\Models\Cms\ParameterGroup $parameter_group
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Parameter onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereModuleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereParameterGroupId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereReference($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Parameter whereValue($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Parameter withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Parameter withoutTrashed()
     */
    class Parameter extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ParameterGroup
     *
     * @property int $id
     * @property string $reference
     * @property string $name
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Parameter[] $parameters
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ParameterGroup onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereReference($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ParameterGroup whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ParameterGroup withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ParameterGroup withoutTrashed()
     */
    class ParameterGroup extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Partner
     *
     * @property int $id
     * @property int|null $menu_id
     * @property bool $is_active
     * @property int|null $order
     * @property int|null $partner_category_id
     * @property string $protocol
     * @property string $url
     * @property string|null $image
     * @property string|null $tmb
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\PartnerCategory|null $category
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read mixed $full_url
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\PartnerTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Partner onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner wherePartnerCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereProtocol($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereTmb($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner whereUrl($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Partner withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Partner withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Partner withoutTrashed()
     */
    class Partner extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\PartnerCategory
     *
     * @property int $id
     * @property int|null $menu_id
     * @property int|null $order
     * @property bool $is_active
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read mixed $link
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\PartnerCategoryTranslation[] $partner_category_translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Partner[] $partners
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\PartnerCategoryTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategory withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerCategory withoutTrashed()
     */
    class PartnerCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\PartnerCategoryTranslation
     *
     * @property int $id
     * @property int $partner_category_id
     * @property string $locale
     * @property string $slug
     * @property string $title
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\PartnerCategory $partner_category
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerCategoryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation wherePartnerCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerCategoryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerCategoryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerCategoryTranslation withoutTrashed()
     */
    class PartnerCategoryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\PartnerTranslation
     *
     * @property int $id
     * @property int $partner_id
     * @property string $locale
     * @property string $title
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Partner $partner
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation wherePartnerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PartnerTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PartnerTranslation withoutTrashed()
     */
    class PartnerTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Permission
     *
     * @property int $id
     * @property string $name
     * @property string $guard_name
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property int|null $module_id
     * @property-read \App\Models\Cms\Module|null $module
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Permission[] $permissions
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Role[] $roles
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission query()
     * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission whereGuardName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission whereModuleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Permission whereUpdatedAt($value)
     */
    class Permission extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\PermissionRouteName
     *
     * @property int $id
     * @property string $route_name
     * @property int|null $permission_id
     * @property int|null $module_id
     * @property bool|null $is_active
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Permission|null $permission
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName whereModuleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName wherePermissionId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName whereRouteName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PermissionRouteName whereUpdatedAt($value)
     */
    class PermissionRouteName extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Post
     *
     * @property int $id
     * @property int $post_category_id
     * @property int|null $order
     * @property bool $is_active
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\PostCategory $post_category
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\PostTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Post onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post wherePostCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Post withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Post withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Post withoutTrashed()
     */
    class Post extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\PostCategory
     *
     * @property int $id
     * @property int|null $menu_id
     * @property int|null $order
     * @property bool $is_active
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Post[] $posts
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\PostCategoryTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategory withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostCategory withoutTrashed()
     */
    class PostCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\PostCategoryTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $post_category_id
     * @property string $name
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostCategoryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation wherePostCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostCategoryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostCategoryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostCategoryTranslation withoutTrashed()
     */
    class PostCategoryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\PostTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $post_id
     * @property string $title
     * @property string $slug
     * @property string $content
     * @property string $meta_title
     * @property string $meta_description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereMetaDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereMetaTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation wherePostId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\PostTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\PostTranslation withoutTrashed()
     */
    class PostTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Product
     *
     * @property int $id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\ProductTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Product onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Product withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Product withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Product withoutTrashed()
     */
    class Product extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ProductBrand
     *
     * @property int $id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\ProductBrandTranslation[] $translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductBrand onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrand withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductBrand withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductBrand withoutTrashed()
     */
    class ProductBrand extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ProductBrandTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $product_brand_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductBrandTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation whereProductBrandId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductBrandTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductBrandTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductBrandTranslation withoutTrashed()
     */
    class ProductBrandTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ProductCategory
     *
     * @property int $id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategory whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductCategory withoutTrashed()
     */
    class ProductCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ProductCategoryTransaltion
     *
     * @property int $id
     * @property string $locale
     * @property int $product_category_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductCategoryTransaltion onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereProductCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductCategoryTransaltion whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductCategoryTransaltion withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductCategoryTransaltion withoutTrashed()
     */
    class ProductCategoryTransaltion extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ProductTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $product_id
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereProductId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ProductTranslation whereUpdatedBy($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ProductTranslation withoutTrashed()
     */
    class ProductTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Quotation
     *
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Quotation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Quotation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Quotation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Quotation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Quotation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Quotation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Quotation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Quotation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Quotation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Quotation withoutTrashed()
     */
    class Quotation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\QuotationRecipient
     *
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\QuotationRecipient newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\QuotationRecipient newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\QuotationRecipient onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\QuotationRecipient query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\QuotationRecipient whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\QuotationRecipient whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\QuotationRecipient whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\QuotationRecipient whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\QuotationRecipient withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\QuotationRecipient withoutTrashed()
     */
    class QuotationRecipient extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Role
     *
     * @property int $id
     * @property string $name
     * @property string $guard_name
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property bool $is_custom_app_role
     * @property bool $is_haicop_role
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Permission[] $permissions
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role whereGuardName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role whereIsCustomAppRole($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role whereIsHaicopRole($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Role whereUpdatedAt($value)
     */
    class Role extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\UsefulLink
     *
     * @property int $id
     * @property int|null $menu_id
     * @property bool $is_active
     * @property int|null $order
     * @property int|null $useful_link_category_id
     * @property string $protocol
     * @property string $url
     * @property string|null $image
     * @property string|null $tmb
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\UsefulLinkCategory|null $category
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read mixed $full_url
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\UsefulLinkTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLink onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereProtocol($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereTmb($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereUrl($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink whereUsefulLinkCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLink withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLink withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLink withoutTrashed()
     */
    class UsefulLink extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\UsefulLinkCategory
     *
     * @property int $id
     * @property int|null $menu_id
     * @property int|null $order
     * @property bool $is_active
     * @property int|null $deleted_by
     * @property int|null $created_by
     * @property int|null $updated_by
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\User|null $created_by_user
     * @property-read \App\User|null $deleted_by_user
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read mixed $link
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Menu|null $menu
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\UsefulLinkCategoryTranslation[] $translations
     * @property-read \App\User|null $updated_by_user
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\UsefulLinkCategoryTranslation[] $useful_link_category_translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\UsefulLink[] $useful_links
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkCategory onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereCreatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereDeletedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereMenuId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory whereUpdatedBy($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategory withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkCategory withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkCategory withoutTrashed()
     */
    class UsefulLinkCategory extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\UsefulLinkCategoryTranslation
     *
     * @property int $id
     * @property int $useful_link_category_id
     * @property string $locale
     * @property string $slug
     * @property string $title
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\UsefulLinkCategory $useful_link_category
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation whereUsefulLinkCategoryId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkCategoryTranslation withoutTrashed()
     */
    class UsefulLinkCategoryTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\UsefulLinkTranslation
     *
     * @property int $id
     * @property int $useful_link_id
     * @property string $locale
     * @property string $title
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\UsefulLink $useful_link
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\UsefulLinkTranslation whereUsefulLinkId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\UsefulLinkTranslation withoutTrashed()
     */
    class UsefulLinkTranslation extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\Zone
     *
     * @property int $id
     * @property int|null $postal_code
     * @property int $city_id
     * @property int $governorate_id
     * @property int $country_id
     * @property bool $is_active
     * @property int|null $order
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Cms\City $city
     * @property-read \App\Models\Cms\Country $country
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Governorate $governorate
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\ZoneTranslation[] $translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\ZoneTranslation[] $zone_translations
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone listsTranslations($translationField)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone notTranslatedIn($locale = null)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Zone onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone orWhereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone orWhereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone translated()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone translatedIn($locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereCityId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereCountryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereGovernorateId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereIsActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereOrder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone wherePostalCode($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereTranslation($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereTranslationLike($key, $value, $locale = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\Zone withTranslation()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Zone withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\Zone withoutTrashed()
     */
    class Zone extends \Eloquent
    {
    }
}

namespace App\Models\Cms {
    /**
     * App\Models\Cms\ZoneTranslation
     *
     * @property int $id
     * @property string $locale
     * @property int $zone_id
     * @property string $name
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read string $delete_button
     * @property-read string $edit_button
     * @property-read string $enable_button
     * @property-read string $show_button
     * @property-read \App\Models\Cms\Zone $zone
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ZoneTranslation onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation whereLocale($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cms\ZoneTranslation whereZoneId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ZoneTranslation withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Cms\ZoneTranslation withoutTrashed()
     */
    class ZoneTranslation extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property string $password
     * @property string|null $remember_token
     * @property string|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property string|null $organization_id
     * @property bool $is_organization_admin
     * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Permission[] $permissions
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cms\Role[] $roles
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsOrganizationAdmin($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOrganizationId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
     */
    class User extends \Eloquent
    {
    }
}

