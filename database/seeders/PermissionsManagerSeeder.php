<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Permissions=[
            //manager comment
            [
                'name'=>'دیدن کامنت ها',
                'code'=>'index_comment_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'اضافه کردن کامنت',
                'code'=>'add_comment_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'ویرایش کامنت',
                'code'=>'edit_comment_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'دیدن کامنت',
                'code'=>'show_comment_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'اپدیت کامنت',
                'code'=>'update_comment_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'دلیت کامنت',
                'code'=>'delete_comment_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'وضعیت کامنت',
                'code'=>'status_comment_manager',
                'type'=>'manager'
            ],

            //question
            [
                'name'=>'دیدن سوال ها',
                'code'=>'index_question_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'اضافه کردن سوال',
                'code'=>'add_question_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'ویرایش سوال',
                'code'=>'edit_question_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'دیدن سوال',
                'code'=>'show_question_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'اپدیت سوال',
                'code'=>'update_question_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'دلیت سوال',
                'code'=>'delete_question_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'پاسخ سوال',
                'code'=>'answer',
                'type'=>'manager'
            ],

            //data
            [
                'name'=>'دیدن دیتا ها',
                'code'=>'index_data_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'ایجاد دیتا',
                'code'=>'add_data_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'دیدن دیتا',
                'code'=>'show_data_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'ادیت دیتا',
                'code'=>'edit_data_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'اپدیت دیتا',
                'code'=>'update_data_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'حذف دیتا',
                'code'=>'delete_data_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'وضعیت دیتا',
                'code'=>'status_data_manager',
                'type'=>'manager'
            ],

            //about retilgram
            [
                'name'=>'دیدن همه اطلاعات',
                'code'=>'index_about_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'درست کردت اطلاعات',
                'code'=>'add_about_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'دیدن اطلاعات',
                'code'=>'show_about_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'ویرایش اطلاعات',
                'code'=>'edit_about_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'اپدیت اطلاعات',
                'code'=>'update_about_manager',
                'type'=>'manager'
            ],
            [
                'name'=>'حذف اطلاعات',
                'code'=>'delete_about_manager',
                'type'=>'manager'
            ],

            //status shop
            [
                'name'=>'وضعیت فروشگاه ',
                'code'=>'status_customer_club_user_manager',
                'type'=>'manager'
            ]

        ];
        foreach ($Permissions as $Permission){
            Permission::updateOrCreate(
                ['code'=>$Permission['code'],'type'=>$Permission['type']],
                ['code'=>$Permission['code'],'type'=>$Permission['type'],'name'=>$Permission['name']],
            );
        }
        $Permissions=Permission::query()->where('type','manager')->select('id')->get()->pluck('id');
        $user=\App\Models\User::find(5);
        $user->permissions()->sync($Permissions);


    }
}
