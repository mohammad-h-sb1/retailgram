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
                'code'=>'index_product_stylist_center',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'ایجاد product stylist',
                'code'=>'store_product_stylist_center',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'دیدن product stylist',
                'code'=>'show_product_stylist_center',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'ویرایش product stylist',
                'code'=>'edit_product_stylist_center',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'اپدیت product stylist',
                'code'=>'update_product_stylist_center',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'حذف product stylist',
                'code'=>'delete_product_stylist_center',
                'type'=>'stylist'
            ] ,

            //edit
            [
                'name'=>'دیدن  stylist',
                'code'=>'show_stylist_center',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'ویرایش stylist',
                'code'=>'edit_stylist_center',
                'type'=>'stylist'
            ] ,
            [
                'name'=>'اپدیت  stylist',
                'code'=>'update_stylist_center',
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
