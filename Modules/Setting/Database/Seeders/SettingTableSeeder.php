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
                'key'         => 'site_name',
                'title'       => 'Site Name',
                'description' => 'The name of your website or application',
                'value'       => 'Your Site Name',
                'status'      => 1,
            ],
            [
                'key'         => 'site_description',
                'title'       => 'Site Description',
                'description' => 'A brief description or tagline for your website or application',
                'value'       => 'Your Site Description',
                'status'      => 1,
            ],
            [
                'key'         => 'notification_email',
                'title'       => 'Notification Email',
                'description' => 'The email address where you want to receive system notifications',
                'value'       => 'notification@example.com',
                'status'      => 1,
            ],
            [
                'key'         => 'pagination_limit',
                'title'       => 'Pagination Limit',
                'description' => 'The number of items to display per page in paginated lists',
                'value'       => '10',
                'status'      => 1,
            ],
            [
                'key'         => 'default_timezone',
                'title'       => 'Default Timezone',
                'description' => 'The default timezone for your application',
                'value'       => 'UTC',
                'status'      => 1,
            ],
            [
                'key'         => 'default_currency',
                'title'       => 'Default Currency',
                'description' => 'The default currency used in your application',
                'value'       => 'USD',
                'status'      => 1,
            ],
            [
                'key'         => 'contact_email',
                'title'       => 'Contact Email',
                'description' => 'The email address for contacting your business or organization',
                'value'       => 'contact@example.com',
                'status'      => 1,
            ],
            [
                'key'         => 'allow_registration',
                'title'       => 'Allow Registration',
                'description' => 'Enable or disable user registration',
                'value'       => '1',
                'status'      => 1,
            ],
            [
                'key'         => 'max_file_upload_size',
                'title'       => 'Max File Upload Size',
                'description' => 'The maximum allowed file size for uploads',
                'value'       => '10MB',
                'status'      => 1,
            ],
            [
                'key'         => 'default_language',
                'title'       => 'Default Language',
                'description' => 'The default language for your application',
                'value'       => 'en',
                'status'      => 1,
            ],
        ];

        // Insert the data into the database
        foreach ($settings as $setting) {
            setting()->create($setting);
        }
    }
}
