<?php

namespace Webkul\Security\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * بذر قاعدة البيانات لوحدة الأمان
     * يتضمن إنشاء حساب المطور الأعلى وأدواره الافتراضية
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        $this->call([
            SuperDeveloperSeeder::class,
        ]);
    }
}
