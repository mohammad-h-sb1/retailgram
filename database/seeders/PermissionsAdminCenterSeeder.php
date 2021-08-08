<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsAdminCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissions=[
            //shop
            [
                'name'=>'مشاهده همه فروشگاه ها',
                'code'=>'index_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد کردن فروشگاه',
                'code'=>'store_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن فروشگاه',
                'code'=>'show_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش فروشگاه',
                'code'=>'edit_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت فروشگاه',
                'code'=>'update_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف فروشگاه',
                'code'=>'delete_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'وضعیت فروشگاه',
                'code'=>'status_shop_user',
                'type'=>'admin_center'
            ] ,

            //size
            [
                'name'=>'دیدن  همه سایز محصول',
                'code'=>'index_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد سایز محصول',
                'code'=>'store_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن سایز محصول',
                'code'=>'show_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش سایز محصول',
                'code'=>'edit_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت سایز محصول',
                'code'=>'update_shop_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف سایز محصول',
                'code'=>'delete_shop_admin_center',
                'type'=>'admin_center'
            ] ,

            //size log
            [
                'name'=>'دیدن  همه size log',
                'code'=>'index_size_log_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد size log',
                'code'=>'store_size_log_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن size log',
                'code'=>'show_size_log_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش size log',
                'code'=>'edit_size_log_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت size log',
                'code'=>'update_size_log_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف size log',
                'code'=>'delete_size_log_center',
                'type'=>'admin_center'
            ] ,


            //product sold
            [
                'name'=>'دیدن  همه محصولات فروخته شده',
                'code'=>'index_product_sold_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد محصوله فروخته شده',
                'code'=>'store_product_sold_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن محصول فروخته شده',
                'code'=>'show_product_sold_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش محصوله فروخته شده',
                'code'=>'edit_product_sold_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت محصوله فروخته شده',
                'code'=>'update_product_sold_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف محصوله فروخته شده',
                'code'=>'delete_product_sold_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ضعیت محصوله فروخته شده',
                'code'=>'status_product_sold_center',
                'type'=>'admin_center'
            ] ,

            //tag
            [
                'name'=>'دیدن  همه tag',
                'code'=>'index_tag_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد tag',
                'code'=>'store_tag_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن tag',
                'code'=>'show_tag_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش tag',
                'code'=>'edit_tag_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت tag',
                'code'=>'update_tag_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف tag',
                'code'=>'delete_tag_admin_center',
                'type'=>'admin_center'
            ] ,

            //property
            [
                'name'=>'دیدن  همه property',
                'code'=>'index_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد property',
                'code'=>'store_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن property',
                'code'=>'show_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش property',
                'code'=>'edit_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت property',
                'code'=>'update_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف property',
                'code'=>'delete_property_admin_center',
                'type'=>'admin_center'
            ] ,

            //product
            [
                'name'=>'دیدن  همه اجناس',
                'code'=>'index_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد مجصول',
                'code'=>'store_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن محصول',
                'code'=>'show_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش محصول',
                'code'=>'edit_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت محصول',
                'code'=>'update_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف محصول',
                'code'=>'delete_property_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'وضعیت محصول',
                'code'=>'status_property_admin_center',
                'type'=>'admin_center'
            ] ,

            //img
            [
                'name'=>'دیدن  همه عکسا',
                'code'=>'index_img_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد عکس',
                'code'=>'store_img_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن عکس',
                'code'=>'show_img_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش عکس',
                'code'=>'edit_img_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت عکس',
                'code'=>'update_img_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف عکس',
                'code'=>'delete_img_admin_center',
                'type'=>'admin_center'
            ] ,

            //product Rating
            [
                'name'=>'دیدن  همه امتیاز',
                'code'=>'index_product_rating_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ایجاد product Rating',
                'code'=>'store_product_rating_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'دیدن product Rating',
                'code'=>'show_product_rating_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'ویرایش product Rating',
                'code'=>'edit_product_rating_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'اپدیت product Rating',
                'code'=>'update_product_rating_admin_center',
                'type'=>'admin_center'
            ] ,
            [
                'name'=>'حذف product Rating',
                'code'=>'delete_product_rating_admin_center',
                'type'=>'admin_center'
            ] ,
        ];
        foreach ($Permissions as $Permission){
            Permission::updateOrCreate(
                ['code'=>$Permission['code'],'type'=>$Permission['type']],
                ['code'=>$Permission['code'],'type'=>$Permission['type'],'name'=>$Permission['name']],
            );
        }
        $Permissions=Permission::query()->where('type','admin_center')->select('id')->get()->pluck('id');
        $user=\App\Models\User::find(2);
        $user->permissions()->sync($Permissions);

    }
}
