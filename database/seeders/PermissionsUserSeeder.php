<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $Permissions=[

            //user comment
            [
                'name'=>'دیدن کامنت ها',
                'code'=>'index_comment_user',
                'type'=>'user'
            ],
            [
                'name'=>'اضافه کردن کامنت',
                'code'=>'add_comment_user',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن کامنت',
                'code'=>'show_comment_user',
                'type'=>'user'
            ],
            [
                'name'=>'ادیت کامنت ',
                'code'=>'edit_comment_user',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت کامنت',
                'code'=>'update_comment_user',
                'type'=>'user'
            ],
            [
                'name'=>'دلیت کامنت',
                'code'=>'delete_comment_user',
                'type'=>'user'
            ],

            //add to level club
            [
            'name'=>'فتن به لول بالا تر',
            'code'=>'add_to_level_club',
            'type'=>'user'
            ],

            //show tag product
            [
                'name'=>'دیدن سایز ها',
                'code'=>'index_tag',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن سایز',
                'code'=>'show_tag',
                'type'=>'user'
            ],
            [
                'name'=>' دیدن ویژگی ها',
                'code'=>'index_properties',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن ویژگی',
                'code'=>'show_properties',
                'type'=>'user'
            ],

            //like user
            [
                'name'=>'دیدن لایک ها',
                'code'=>'index_like',
                'type'=>'user'
            ],
            [
                'name'=>'لایک کردن',
                'code'=>'add_like',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن لایک',
                'code'=>'show_like',
                'type'=>'user'
            ],
            [
                'name'=>'ویرایش لایک',
                'code'=>'edit_like',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت لایک',
                'code'=>'update_like',
                'type'=>'user'
            ],
            [
                'name'=>'دلیت لایک',
                'code'=>'delete_like',
                'type'=>'user'
            ],

            //user products sold
            [
                'name'=>' محصولاته فروخته شده',
                'code'=>'index_productsSold',
                'type'=>'user'
            ],
            [
                'name'=>'اضافه کردن محصوله فروخته شده',
                'code'=>'add_productsSold',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن لیست فرئخته شده',
                'code'=>'show_productsSold',
                'type'=>'user'
            ],
            [
                'name'=>'دلیت محصل فروخته شده',
                'code'=>'delete_productsSold',
                'type'=>'user'
            ],

            //user profile
            [
                'name'=>'ایجاد پروفایل',
                'code'=>'add_profile',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن پروفایل',
                'code'=>'show_profile',
                'type'=>'user'
            ],
            [
                'name'=>'ویرایش پروفایل',
                'code'=>'edit_profile',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت پروفایل',
                'code'=>'update_profile',
                'type'=>'user'
            ],
            [
                'name'=>'حذف پروفایل',
                'code'=>'delete_profile',
                'type'=>'user'
            ],

            //user customer club
            [
                'name'=>'دیدن باشگاه های مشتریان',
                'code'=>'index_customer_club_user',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن باشگاه مشتریان',
                'code'=>'show_customer_club_user',
                'type'=>'user'
            ] ,

            //img admin
            [
                'name'=>'دیدن عکس ها',
                'code'=>'index_img',
                'type'=>'user'
            ],
            [
                'name'=>'افزودن عکس',
                'code'=>'add_img',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن عکس',
                'code'=>'show_img',
                'type'=>'user'
            ],
            [
                'name'=>'ویرایش عکس',
                'code'=>'edit_img',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت عکس',
                'code'=>'update_img',
                'type'=>'user'
            ],
            [
                'name'=>'دلیت عکس',
                'code'=>'delete_delete',
                'type'=>'user'
            ],

            //user product rating log
            [
                'name'=>'دیدن امتیاز ها',
                'code'=>'rating_index',
                'type'=>'user'
            ],
            [
                'name'=>'امتیاز دادن',
                'code'=>'rating_store',
                'type'=>'user'
            ],

            //cart user
            [
                'name'=>'دیدن سبد خرید ها',
                'code'=>'cart_index',
                'type'=>'user'
            ],
            [
                'name'=>'ایجاد سبد خرید',
                'code'=>'cart_store',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن سبد خرید',
                'code'=>'cart_show',
                'type'=>'user'
            ],
            [
                'name'=>'ویرایش سبد خرید',
                'code'=>'cart_edit',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت سبد خرید',
                'code'=>'cart_update',
                'type'=>'user'
            ],
            [
                'name'=>'پاک کردن سبد خرید',
                'code'=>'cart_delete',
                'type'=>'user'
            ],

            //data user
            [
                'name'=>'دیدن دیتا ها',
                'code'=>'data_index',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن دیتا',
                'code'=>'data_show',
                'type'=>'user'
            ],

            //about retilgram
            [
                'name'=>'دیدن همه اطلاعات',
                'code'=>'index_about',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن اطلاعات',
                'code'=>'show_about',
                'type'=>'user'
            ],

            //brand
            [
                'name'=>'دیدن همه برند ها',
                'code'=>'index_brand',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن برند',
                'code'=>'show_brand',
                'type'=>'user'
            ],

            //payment
            [
                'name'=>'دیدن همه payment',
                'code'=>'payment_index',
                'type'=>'user'
            ],
            [
                'name'=>'ایجاد payment',
                'code'=>'payment_store',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن payment',
                'code'=>'payment_show',
                'type'=>'user'
            ],
            [
                'name'=>'ویرایش payment',
                'code'=>'payment_edit',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت payment',
                'code'=>'payment_update',
                'type'=>'user'
            ],
            [
                'name'=>'پاک کردن payment',
                'code'=>'payment_delete',
                'type'=>'user'
            ],
            [
                'name'=>'وضعیت payment',
                'code'=>'payment_status',
                'type'=>'user'
            ],

            //payment log
            [
                'name'=>'دیدن همه payment log',
                'code'=>'payment_log_index',
                'type'=>'user'
            ],
            [
                'name'=>'ایجاد payment log',
                'code'=>'payment_log_store',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن payment log',
                'code'=>'payment_log_show',
                'type'=>'user'
            ],
            [
                'name'=>'ویرایش payment log',
                'code'=>'payment_log_edit',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت payment log',
                'code'=>'payment_log_update',
                'type'=>'user'
            ],
            [
                'name'=>'پاک کردن payment log',
                'code'=>'payment_log_delete',
                'type'=>'user'
            ],

            //permission
            [
                'name'=>'دیدن دسترسی یوزر',
                'code'=>'permission_show',
                'type'=>'user'
            ],

            //product
            [
                'name'=>'دیدن همه محصولات',
                'code'=>'product_index',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن محصول',
                'code'=>'product_show',
                'type'=>'user'
            ],

            //favoriteList
            [
                'name'=>'دیدن همه favoriteList',
                'code'=>'favoriteList_index',
                'type'=>'user'
            ],
            [
                'name'=>'ایجاد favoriteList',
                'code'=>'favoriteList_store',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن favoriteList',
                'code'=>'favoriteList_show',
                'type'=>'user'
            ],
            [
                'name'=>'حذف از  favoriteList',
                'code'=>'favoriteList_delete',
                'type'=>'user'
            ],

            //brand add
            [
                'name'=>'دیدن برند ها',
                'code'=>'index_brand',
                'type'=>'user'
            ],
            [
                'name'=>'اضافه برند ',
                'code'=>'add_brand',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن برند',
                'code'=>'show_brand',
                'type'=>'user'
            ],
            [
                'name'=>'ویرایش برند',
                'code'=>'edit_brand',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت برند',
                'code'=>'update_brand',
                'type'=>'user'
            ],
            [
                'name'=>'حذف برند',
                'code'=>'delete_brand',
                'type'=>'user'
            ],

            //order
            [
                'name'=>'دیدن همه سفارشات',
                'code'=>'index_order',
                'type'=>'user'
            ],
            [
                'name'=>'اضافه سافارش ',
                'code'=>'add_order',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن سفارش',
                'code'=>'show_order',
                'type'=>'user'
            ],
            [
                'name'=>'ویرایش سفارش',
                'code'=>'edit_order',
                'type'=>'user'
            ],
            [
                'name'=>'اپدیت سفارش',
                'code'=>'update_order',
                'type'=>'user'
            ],
            [
                'name'=>'حذف سفارش',
                'code'=>'delete_order',
                'type'=>'user'
            ],

            //rating
            [
                'name'=>'اضافه کردن امتیاز ',
                'code'=>'add_rating',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن امتیاز',
                'code'=>'show_rating',
                'type'=>'user'
            ],

            //stylist
            [
                'name'=>'stylistدیدن همه ',
                'code'=>'index_stylist',
                'type'=>'user'
            ],
            [
                'name'=>'دیدن stylist',
                'code'=>'show_stylist',
                'type'=>'user'
            ],


        ];

        foreach ($Permissions as $Permission){
            Permission::updateOrCreate(
                ['code'=>$Permission['code'],'type'=>$Permission['type']],
                ['code'=>$Permission['code'],'type'=>$Permission['type'],'name'=>$Permission['name']],
            );
        }
        $Permissions=Permission::query()->where('type','user')->select('id')->get()->pluck('id');
        $user=\App\Models\User::find(8);
        $user->permissions()->sync($Permissions);



    }
}
