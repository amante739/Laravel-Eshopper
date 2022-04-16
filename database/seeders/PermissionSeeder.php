<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            // Dashboard policy
            [
                'name' => 'dashboard-list',
                'type' => 'dashboard'
            ],
            [
                'name' => 'dashboard-create',
                'type' => 'dashboard'
            ],
            [
                'name' => 'dashboard-view',
                'type' => 'dashboard'
            ],
            [
                'name' => 'dashboard-edit',
                'type' => 'dashboard'
            ],
            [
                'name' => 'dashboard-delete',
                'type' => 'dashboard'
            ],

            // Role policy
            [
                'name' => 'role-list',
                'type' => 'role'
            ],
            [
                'name' => 'role-create',
                'type' => 'role'
            ],
            [
                'name' => 'role-view',
                'type' => 'role'
            ],
            [
                'name' => 'role-edit',
                'type' => 'role'
            ],
            [
                'name' => 'role-delete',
                'type' => 'role'
            ],

            // User policy
            [
                'name' => 'user-list',
                'type' => 'user'
            ],
            [
                'name' => 'user-create',
                'type' => 'user'
            ],
            [
                'name' => 'user-view',
                'type' => 'user'
            ],
            [
                'name' => 'user-edit',
                'type' => 'user'
            ],
            [
                'name' => 'user-delete',
                'type' => 'user'
            ],

            // Category policy
            [
                'name' => 'category-list',
                'type' => 'category'
            ],
            [
                'name' => 'category-create',
                'type' => 'category'
            ],
            [
                'name' => 'category-view',
                'type' => 'category'
            ],
            [
                'name' => 'category-edit',
                'type' => 'category'
            ],
            [
                'name' => 'category-delete',
                'type' => 'category'
            ],

            // Sub Category policy
            [
                'name' => 'subcategory-list',
                'type' => 'subcategory'
            ],
            [
                'name' => 'subcategory-create',
                'type' => 'subcategory'
            ],
            [
                'name' => 'subcategory-view',
                'type' => 'subcategory'
            ],
            [
                'name' => 'subcategory-edit',
                'type' => 'subcategory'
            ],
            [
                'name' => 'subcategory-delete',
                'type' => 'subcategory'
            ],

            // Sub Category policy
            [
                'name' => 'brand-list',
                'type' => 'brand'
            ],
            [
                'name' => 'brand-create',
                'type' => 'brand'
            ],
            [
                'name' => 'brand-view',
                'type' => 'brand'
            ],
            [
                'name' => 'brand-edit',
                'type' => 'brand'
            ],
            [
                'name' => 'brand-delete',
                'type' => 'brand'
            ],

            // Sub Category policy
            [
                'name' => 'attribute-list',
                'type' => 'attribute'
            ],
            [
                'name' => 'attribute-create',
                'type' => 'attribute'
            ],
            [
                'name' => 'attribute-view',
                'type' => 'attribute'
            ],
            [
                'name' => 'attribute-edit',
                'type' => 'attribute'
            ],
            [
                'name' => 'attribute-delete',
                'type' => 'attribute'
            ],

            // Sub Category policy
            [
                'name' => 'product-list',
                'type' => 'product'
            ],
            [
                'name' => 'product-create',
                'type' => 'product'
            ],
            [
                'name' => 'product-view',
                'type' => 'product'
            ],
            [
                'name' => 'product-edit',
                'type' => 'product'
            ],
            [
                'name' => 'product-delete',
                'type' => 'product'
            ],

            // Order policy
            [
                'name' => 'order-list',
                'type' => 'order'
            ],
            [
                'name' => 'order-create',
                'type' => 'order'
            ],
            [
                'name' => 'order-view',
                'type' => 'order'
            ],
            [
                'name' => 'order-edit',
                'type' => 'order'
            ],
            [
                'name' => 'order-delete',
                'type' => 'order'
            ],

            // Settings policy
            [
                'name' => 'settings-list',
                'type' => 'settings'
            ],
            [
                'name' => 'settings-create',
                'type' => 'settings'
            ],
            [
                'name' => 'settings-view',
                'type' => 'settings'
            ],
            [
                'name' => 'settings-edit',
                'type' => 'settings'
            ],
            [
                'name' => 'settings-delete',
                'type' => 'settings'
            ],

            // Banner policy
            [
                'name' => 'banner-list',
                'type' => 'banner'
            ],
            [
                'name' => 'banner-create',
                'type' => 'banner'
            ],
            [
                'name' => 'banner-view',
                'type' => 'banner'
            ],
            [
                'name' => 'banner-edit',
                'type' => 'banner'
            ],
            [
                'name' => 'banner-delete',
                'type' => 'banner'
            ],

            // Faq policy
            [
                'name' => 'faq-list',
                'type' => 'faq'
            ],
            [
                'name' => 'faq-create',
                'type' => 'faq'
            ],
            [
                'name' => 'faq-view',
                'type' => 'faq'
            ],
            [
                'name' => 'faq-edit',
                'type' => 'faq'
            ],
            [
                'name' => 'faq-delete',
                'type' => 'faq'
            ],

            // Policy policy
            [
                'name' => 'policy-list',
                'type' => 'policy'
            ],
            [
                'name' => 'policy-create',
                'type' => 'policy'
            ],
            [
                'name' => 'policy-view',
                'type' => 'policy'
            ],
            [
                'name' => 'policy-edit',
                'type' => 'policy'
            ],
            [
                'name' => 'policy-delete',
                'type' => 'policy'
            ],

            // Term policy
            [
                'name' => 'term-list',
                'type' => 'term'
            ],
            [
                'name' => 'term-create',
                'type' => 'term'
            ],
            [
                'name' => 'term-view',
                'type' => 'term'
            ],
            [
                'name' => 'term-edit',
                'type' => 'term'
            ],
            [
                'name' => 'term-delete',
                'type' => 'term'
            ],

            // Tag policy
            [
                'name' => 'tag-list',
                'type' => 'tag'
            ],
            [
                'name' => 'tag-create',
                'type' => 'tag'
            ],
            [
                'name' => 'tag-view',
                'type' => 'tag'
            ],
            [
                'name' => 'tag-edit',
                'type' => 'tag'
            ],
            [
                'name' => 'tag-delete',
                'type' => 'tag'
            ],

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission['name'],
                'type' => $permission['type']
            ]);
        }
    }
}
