<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin only roles
        Permission::create(['guard_name' => 'web','name' => 'create-vendors']);
        Permission::create(['guard_name' => 'web','name' => 'edit-vendors']);
        Permission::create(['guard_name' => 'web','name' => 'delete-vendors']);
        Permission::create(['guard_name' => 'web','name' => 'approve-product-reviews']);
        Permission::create(['guard_name' => 'web','name' => 'view-vendors']);
        Permission::create(['guard_name' => 'web','name' => 'suspend-vendors']);
        Permission::create(['guard_name' => 'web','name' => 'create-categories']);
        Permission::create(['guard_name' => 'web','name' => 'approve-category']);


        // admin and vendor roles
        //product permissions
        Permission::create(['guard_name' => 'web','name' => 'view-products']);
        Permission::create(['guard_name' => 'web','name' => 'create-product']);
        Permission::create(['guard_name' => 'web','name' => 'edit-product']);
        Permission::create(['guard_name' => 'web','name' => 'delete-product']);
        Permission::create(['guard_name' => 'web','name' => 'view-product-reviews']);
        //orders permissions
        Permission::create(['guard_name' => 'web','name' => 'view-orders']);
        Permission::create(['guard_name' => 'web','name' => 'view-canceled-orders']);
        Permission::create(['guard_name' => 'web','name' => 'view-returned-products']);
        Permission::create(['guard_name' => 'web','name' => 'edit-returned-products']);
        // accounting permissions
        Permission::create(['guard_name' => 'web','name' => 'view-payments']);
        // categories permissions
        Permission::create(['guard_name' => 'web','name' => 'request-category']);
        Permission::create(['guard_name' => 'web','name' => 'view-categories']);
        // promotion permissions
        Permission::create(['guard_name' => 'web','name' => 'view-promotions']);
        Permission::create(['guard_name' => 'web','name' => 'create-offer']);
        Permission::create(['guard_name' => 'web','name' => 'delete-offer']);
        Permission::create(['guard_name' => 'web','name' => 'stop-offer']);
        // coupon permissions
        Permission::create(['guard_name' => 'web','name' => 'create-coupon']);
        Permission::create(['guard_name' => 'web','name' => 'delete-coupon']);
        Permission::create(['guard_name' => 'web','name' => 'stop-coupon']);
        // blogs permissions
        Permission::create(['guard_name' => 'web','name' => 'create-blog']);
        Permission::create(['guard_name' => 'web','name' => 'delete-blog']);
        Permission::create(['guard_name' => 'web','name' => 'stop-blog']);
        // ads permissions
        Permission::create(['guard_name' => 'web','name' => 'create-ads']);
        Permission::create(['guard_name' => 'web','name' => 'delete-ads']);
        // upselling permissions
        Permission::create(['guard_name' => 'web','name' => 'create-upselling']);
        Permission::create(['guard_name' => 'web','name' => 'delete-upselling']);
        // push notifications permissions
        Permission::create(['guard_name' => 'web','name' => 'create-push-notification']);
        // customers permissions
        Permission::create(['guard_name' => 'web','name' => 'view-customers']);
        Permission::create(['guard_name' => 'web','name' => 'view-vip-customers']);
        // data analysis permissions
        Permission::create(['guard_name' => 'web','name' => 'view-data-analysis']);
        Permission::create(['guard_name' => 'web','name' => 'data-analysis-most-viewed-products']);
        Permission::create(['guard_name' => 'web','name' => 'data-analysis-most-sold-products']);
        Permission::create(['guard_name' => 'web','name' => 'data-analysis-most-viewed-blogs']);
        Permission::create(['guard_name' => 'web','name' => 'data-analysis-vip-vendors']);
        // complaints permissions
        Permission::create(['guard_name' => 'web','name' => 'view-complaint']);
        //localize permissions
        Permission::create(['guard_name' => 'web','name' => 'view-localize']);
        // support tickets permissions
        Permission::create(['guard_name' => 'web','name' => 'view-support-tickets']);
        // reports permissions
        Permission::create(['guard_name' => 'web','name' => 'view-reports']);
        // settings permissions
        Permission::create(['guard_name' => 'web','name' => 'view-settings']);


        $adminRole = Role::create(['name' => 'Admin']);
        $vendorRole = Role::create(['name' => 'Vendor']);

        $adminRole->givePermissionTo([
            'create-vendors',
            'edit-vendors',
            'delete-vendors',
            'view-products',
            'edit-product',
            'delete-product',
            'view-product-reviews',
            'view-product-reviews',
            'view-orders',
            'view-canceled-orders',
            'view-returned-products',
            'edit-returned-products',
            'view-payments',
            'view-vendors',
            'suspend-vendors',
            'create-categories',
            'approve-category',
            'view-categories',
            'view-promotions',
            'create-offer',
            'delete-offer',
            'stop-offer',
            'create-coupon',
            'delete-coupon',
            'stop-coupon',
            'create-blog',
            'delete-blog',
            'stop-blog',
            'create-ads',
            'delete-ads',
            'create-upselling',
            'delete-upselling',
            'create-push-notification',
            'view-data-analysis',
            'data-analysis-most-viewed-products',
            'data-analysis-most-sold-products',
            'data-analysis-most-viewed-blogs',
            'data-analysis-vip-vendors',
            'view-localize',
            'view-complaint',
            'view-support-tickets',
            'view-settings',
            'view-reports',
        ]);

        $vendorRole->givePermissionTo([
            'view-products',
            'create-product',
            'edit-product',
            'delete-product',
            'view-product-reviews',
            'view-product-reviews',
            'view-orders',
            'view-returned-products',
            'view-canceled-orders',
            'edit-returned-products',
            'view-payments',
            'request-category',
            'view-categories',
            'view-promotions',
            'create-offer',
            'delete-offer',
            'stop-offer',
            'create-coupon',
            'delete-coupon',
            'stop-coupon',
            'create-blog',
            'delete-blog',
            'stop-blog',
            'create-upselling',
            'delete-upselling',
            'view-customers',
            'view-vip-customers',
            'view-data-analysis',
            'data-analysis-most-viewed-products',
            'data-analysis-most-sold-products',
            'data-analysis-most-viewed-blogs',
            'view-complaint',
            'view-reports',

        ]);
    }
}
