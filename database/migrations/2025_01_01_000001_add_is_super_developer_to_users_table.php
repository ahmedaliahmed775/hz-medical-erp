<?php

/**
 * إضافة حقل المطور الأعلى (is_super_developer) لجدول المستخدمين
 *
 * هذا الحقل يُستخدم لتمييز حساب المطور الذي يملك صلاحية مطلقة
 * على النظام بالكامل (God Mode) ويكون مخفياً عن باقي المستخدمين.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل الترحيل - إضافة حقل المطور الأعلى
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_super_developer')->default(false)->after('is_default');
        });
    }

    /**
     * التراجع عن الترحيل - حذف حقل المطور الأعلى
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_super_developer');
        });
    }
};
