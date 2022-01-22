<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'الخدمات',
            'المناقشة',
            'المستخدمين ',
            'الأعدادت',
            'قائمة الخدمات  ',
            ' رسائل الاستفسار',
            'قائمة المستخدم',
            'صلاحية المستخدمين',
            
    
    
            'اضافة سليدر',
            'تواصل معنا ',
            ' لماذا تختار محامينا',
            'من نحن ',
            'مرحبا بكم',
            'إضافة خدمة',
            'عرض الخدمة',
            'حذف الخدمة',
            'حذف الرسالة',
    
            'عرض الرسالة',
            'تعديل مستخدم',
            'حذف مستخدم',
    
            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
            'الاشعارات',
];
    
    
    
    foreach($permissions as $permission) {
    
    Permission::create(['name' => $permission]);
    }
    
    }
}
