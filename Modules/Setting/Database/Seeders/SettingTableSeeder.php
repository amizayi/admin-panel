<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $settings = [
            [
                'key'         => 'version',
                'value'       => 'Your version',
            ],
            [
                'key'         => 'site_name',
                'value'       => 'Your Site Name',
            ],
            [
                'key'         => 'site_description',
                'value'       => 'Your Site Description',
            ],
            [
                'key'         => 'notification_email',
                'value'       => 'notification@example.com',
            ],
            [
                'key'         => 'pagination_limit',
                'value'       => '10',
            ],
            [
                'key'         => 'default_timezone',
                'value'       => 'UTC',
            ],
            [
                'key'         => 'default_currency',
                'value'       => 'USD',
            ],
            [
                'key'         => 'contact_email',
                'value'       => 'contact@example.com',
            ],
            [
                'key'         => 'allow_registration',
                'value'       => '1',
            ],
            [
                'key'         => 'max_file_upload_size',
                'value'       => '10MB',
            ],
            [
                'key'         => 'default_language',
                'value'       => 'en',
            ],
        ];

        // Insert the data into the database
        foreach ($settings as $setting) {
            setting()->create($setting);
        }
    }
}
