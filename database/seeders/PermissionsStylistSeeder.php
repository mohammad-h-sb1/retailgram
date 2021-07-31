<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsStylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissions=[
            //product stylist
            [
                'name'=>'دیدن  همه product stylist',
                'code'=>'index_product_stylist',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'ایجاد product stylist',
                'code'=>'store_product_stylist',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'دیدن product stylist',
                'code'=>'show_product_stylist',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'ویرایش product stylist',
                'code'=>'edit_product_stylist',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'اپدیت product stylist',
                'code'=>'update_product_stylist',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'حذف product stylist',
                'code'=>'delete_product_stylist',
                'type'=>'stylist'
            ] ,

            //edit
            [
                'name'=>'دیدن  stylist',
                'code'=>'show_stylist',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'ویرایش stylist',
                'code'=>'edit_stylist',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'اپدیت  stylist',
                'code'=>'update_stylist',
                'type'=>'stylist'
            ] ,

            //profile
            [
                'name'=>'ایجاد profile_img',
                'code'=>'add_profile_img_stylist',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'دیدن profile_img',
                'code'=>'edit_profile_img_stylist',
                'type'=>'stylist'
            ] ,
//            [
//                'name'=>'ویرایش profile_img',
//                'code'=>'edit_profile_stylist',
//                'type'=>'stylist'
//            ] ,
//            [
//                'name'=>'اپدیت profile',
//                'code'=>'update_profile_stylist',
//                'type'=>'stylist'
//            ] ,
            [
                'name'=>'حذف profile_img',
                'code'=>'delete_profile_img_stylist',
                'type'=>'stylist'
            ] ,
            //count_the_number_of_comments
            [
                'name'=>'شمارش تعداد نظرات',
                'code'=>'count_the_number_of_comments_stylist',
                'type'=>'stylist'
            ] ,

        ];

        foreach ($Permissions as $Permission){
            Permission::updateOrCreate(
                ['code'=>$Permission['code'],'type'=>$Permission['type']],
                ['code'=>$Permission['code'],'type'=>$Permission['type'],'name'=>$Permission['name']],
            );
        }
        $Permissions=Permission::query()->where('type','stylist')->select('id')->get()->pluck('id');
        $user=\App\Models\User::find(3);
        $user->permissions()->sync($Permissions);

    }

}
