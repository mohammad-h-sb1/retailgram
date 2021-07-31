<?php

namespace Database\Seeders;

use App\Models\Permission;
use http\Client\Curl\User;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissions=[
            //admin category
            [
            'name'=>'دیدن دسته بندی ها',
            'code'=>'index_category_admin',
            'type'=>'admin'
            ],
            [
                'name'=>'دیدن دسته بندی ها',
                'code'=>'index_category_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن دسته بندی',
                'code'=>'show_category_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش دسته بندی',
                'code'=>'edit_category_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت دسته بندی ها',
                'code'=>'update_category_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف دسته بندی ها',
                'code'=>'delete_category_admin',
                'type'=>'admin'
            ],

            //admin brand
            [
                'name'=>'دیدن برند ها',
                'code'=>'index_brand_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اضافه برند ',
                'code'=>'add_brand_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن برند',
                'code'=>'show_brand_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش برند',
                'code'=>'edit_brand_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت برند',
                'code'=>'update_brand_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف برند',
                'code'=>'delete_brand_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'وضعیت برند',
                'code'=>'status_brand_admin',
                'type'=>'admin'
            ],

            //admin discount
            [
                'name'=>'دیدن تخفیف ها',
                'code'=>'index_discount_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اضافه کردن تخفیف ',
                'code'=>'add_discount_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن تخفیف',
                'code'=>'show_discount_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش تخفیف',
                'code'=>'edit_discount_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت تخفیف',
                'code'=>'update_discount_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف تخفیف',
                'code'=>'delete_discount_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'وضعیت تخفیف',
                'code'=>'status_discount_admin',
                'type'=>'admin'
            ],

            //admin customer
            [
                'name'=>'دیدن باشگاه',
                'code'=>'index_customer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اضافه کردن باشگاه ',
                'code'=>'add_customer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن باشگاه',
                'code'=>'show_customer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن باشگاه',
                'code'=>'show_customer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش باشگاه',
                'code'=>'edit_customer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت باشگاه',
                'code'=>'update_customer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف باشگاه',
                'code'=>'delete_customer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'افزودن افراد',
                'code'=>'addToLevelClub_customer_admin',
                'type'=>'admin'
            ],

            //admin permission
            [
                'name'=>'دیدن دسترسی ها',
                'code'=>'index_permission_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اضافه دسترسی',
                'code'=>'add_permission_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن دسترسی',
                'code'=>'show_permission_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش دسترسی',
                'code'=>'edit_permission_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت دسترسی',
                'code'=>'update_permission_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف دسترسی',
                'code'=>'delete_permission_admin',
                'type'=>'admin'
            ],

            //profile  admin
            [
                'name'=>'دیدن تمام پروفیل',
                'code'=>'index_profile_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اضافه کردن پروفایل ادمین',
                'code'=>'add_profile_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن پروفایل ادمین',
                'code'=>'show_profile_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش پروفایل ادمین',
                'code'=>'edit_profile_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت پروفایل ادمین',
                'code'=>'update_profile_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف پروفایل ادمین',
                'code'=>'delete_profile_admin',
                'type'=>'admin'
            ],

            //img admin
            [
                'name'=>'دیدن عکس ها',
                'code'=>'index_img_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'افزودن عکس',
                'code'=>'add_img_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن عکس',
                'code'=>'show_img_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش عکس',
                'code'=>'edit_img_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت عکس',
                'code'=>'update_img_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دلیت عکس',
                'code'=>'delete_delete_admin',
                'type'=>'admin'
            ],

            //add user
            [
                'name'=>'دیدن یوزر ها',
                'code'=>'index_user_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ایجاد یوز',
                'code'=>'store_user_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن یوزر',
                'code'=>'show_user_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ادیت یوزر',
                'code'=>'edit_user_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش یوزر',
                'code'=>'update_user_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت یوزر',
                'code'=>'delete_user_admin',
                'type'=>'admin'
            ],

            //add influencer
            [
                'name'=>'دیدن همه influencer',
                'code'=>'index_influencer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ایجاد influencer',
                'code'=>'store_influencer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن influencer',
                'code'=>'show_influencer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ویرایش influencer',
                'code'=>'edit_influencer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت influencer',
                'code'=>'update_influencer_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف influencer',
                'code'=>'delete_influencer_admin',
                'type'=>'admin'
            ],

            //admin permission Log
            [
                'name'=>'دیدنه همه  permission Log',
                'code'=>'index_permission_log_admin',
                'type'=>'admin'
            ],
            [
                'name'=>' ایجاد کردن permission Log',
                'code'=>'store_permission_log_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن permission_log',
                'code'=>'show_permission_log_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'ادیت permission_log',
                'code'=>'edit_permission_log_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'اپدیت permission_log',
                'code'=>'update_permission_log_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف permission_log',
                'code'=>'delete_permission_log_admin',
                'type'=>'admin'
            ],

            //add stylist
            [
                'name'=>'دیدنه همه  stylist',
                'code'=>'index_stylist_admin',
                'type'=>'admin'
            ],
            [
                'name'=>' ایجاد کردن stylist ',
                'code'=>'store_stylist_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن stylist',
                'code'=>'show_stylist_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف stylist',
                'code'=>'delete_stylist_admin',
                'type'=>'admin'
            ],

            //admin product
            [
                'name'=>'دیدنه همه  product',
                'code'=>'index_product_admin',
                'type'=>'admin'
            ],
            [
                'name'=>' ایجاد کردن product ',
                'code'=>'store_product_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن product',
                'code'=>'show_product_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن product',
                'code'=>'edit_product_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن product',
                'code'=>'update_product_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف product',
                'code'=>'delete_product_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'status product',
                'code'=>'status_product_admin',
                'type'=>'admin'
            ],

            //admin shop
            [
                'name'=>'دیدنه همه shop',
                'code'=>'index_shop_admin',
                'type'=>'admin'
            ],
            [
                'name'=>' ایجاد کردن shop ',
                'code'=>'store_shop_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن shop',
                'code'=>'show_shop_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن shop',
                'code'=>'edit_shop_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن shop',
                'code'=>'update_shop_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف shop',
                'code'=>'delete_shop_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'status shop',
                'code'=>'status_shop_admin',
                'type'=>'admin'
            ],

            //admin product Sold
            [
                'name'=>'دیدنه همه product_Sold',
                'code'=>'index_product_Sold_admin',
                'type'=>'admin'
            ],
            [
                'name'=>' ایجاد کردن shop ',
                'code'=>'store_product_sold_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن shop',
                'code'=>'show_product_sold_center',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن shop',
                'code'=>'edit_product_sold_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'دیدن shop',
                'code'=>'update_product_sold_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'حذف shop',
                'code'=>'delete_product_sold_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'status shop',
                'code'=>'status_product_sold_admin',
                'type'=>'admin'
            ],

            //admin city
            [
                'name'=>'دیدنه همه شهر ها',
                'code'=>'index_city_admin',
                'type'=>'admin'
            ],
            [
                'name'=>'status شهر',
                'code'=>'status_city_admin',
                'type'=>'admin'
            ],
        ];
        foreach ($Permissions as $Permission){
            Permission::updateOrCreate(
                ['code'=>$Permission['code'],'type'=>$Permission['type']],
                ['code'=>$Permission['code'],'type'=>$Permission['type'],'name'=>$Permission['name']],
            );
        }
        $Permissions=Permission::query()->where('type','admin')->select('id')->get()->pluck('id');
        $user=\App\Models\User::find(1);
        $user->permissions()->sync($Permissions);

    }
}
