<?php

/**
 * الوحدات النشطة في نظام H.Z Medical Supplies ERP
 *
 * تم تعطيل الوحدات غير المطلوبة للنظام الطبي:
 * - Blog (المدونة)
 * - Website (الموقع الإلكتروني)
 * - Recruitment (التوظيف)
 * - Project (المشاريع)
 * - TimeOff (الإجازات)
 * - Timesheet (سجل الدوام)
 * - FullCalendar (التقويم)
 */
return [
    // --- الوحدات المالية والمحاسبية ---
    Webkul\Accounting\AccountingPlugin::class,
    Webkul\Account\AccountPlugin::class,
    Webkul\Invoice\InvoicePlugin::class,
    Webkul\Payment\PaymentPlugin::class,

    // --- وحدة المخزون والمنتجات ---
    Webkul\Inventory\InventoryPlugin::class,
    Webkul\Product\ProductPlugin::class,

    // --- وحدة المبيعات والمشتريات ---
    Webkul\Sale\SalePlugin::class,
    Webkul\Purchase\PurchasePlugin::class,

    // --- وحدة الشركاء وجهات الاتصال ---
    Webkul\Partner\PartnerPlugin::class,
    Webkul\Contact\ContactPlugin::class,

    // --- وحدة الموظفين والموارد البشرية ---
    Webkul\Employee\EmployeePlugin::class,

    // --- وحدات الدعم والنظام الأساسية ---
    Webkul\Support\SupportPlugin::class,
    Webkul\Security\SecurityPlugin::class,
    Webkul\Field\FieldsPlugin::class,
    Webkul\Chatter\ChatterPlugin::class,
    Webkul\PluginManager\PluginManagerPlugin::class,
];
