<?php

namespace Modules\Setting\Database\Seeders\V1;

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $settings = collect([
            'version'              =>  'Your version',
            'site_name'            =>  'Your Site Name',
            'site_description'     =>  'Your Site Description',
            'notification_email'   =>  'notification@example.com',
            'pagination_limit'     =>  '10',
            'default_timezone'     =>  'UTC',
            'default_currency'     =>  'USD',
            'contact_email'        =>  'contact@example.com',
            'allow_registration'   =>  '1',
            'max_file_upload_size' =>  '10MB',
            'default_language'     =>  'en'
        ]);

        // Insert the data into the database
        $settings->map(fn($key ,$value) => setting()->create(['key' => $key, 'value' => $value]));
    }
}
