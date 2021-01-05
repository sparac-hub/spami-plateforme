<?php

namespace App\Providers;

use App\Models\Cms\Parameter;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Config;
use Schema;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable((new Parameter)->getTable())) {

            $smtp_parameters = get_cached_parameter_group('smtp');

            if (!$smtp_parameters->isEmpty()) //checking if table is not empty
            {
                $config = array(
                    'driver' => $smtp_parameters['mail_driver'],
                    'host' => $smtp_parameters['mail_host'],
                    'port' => $smtp_parameters['mail_port'],
                    'from' => array(
                        'address' => $smtp_parameters['mail_from_address'] ?? 'contact@medianet.test',
                        'name' => $smtp_parameters['mail_from_name'] ?? 'Contact',
                    ),
                    'encryption' => $smtp_parameters['mail_encryption'],
                    'username' => $smtp_parameters['mail_username'],
                    'password' => $smtp_parameters['mail_password'],
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false,
                );
                Config::set('mail', $config);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
