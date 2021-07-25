<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsInfluencerSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissions=[
            //
            [
                'name'=>'Influencer دیدن  ',
                'code'=>'show_Influencer',
                'type'=>'influenser'
            ] ,
            [
                'name'=>' دیدن تعداد بار استفاده از کد ',
                'code'=>'show_NumberCodeUse',
                'type'=>'influenser'
            ] ,
        ];
        foreach ($Permissions as $Permission){
            Permission::updateOrCreate(
                ['code'=>$Permission['code'],'type'=>$Permission['type']],
                ['code'=>$Permission['code'],'type'=>$Permission['type'],'name'=>$Permission['name']],
            );
        }
        $Permissions=Permission::query()->where('type','influenser')->select('id')->get()->pluck('id');
        $user=\App\Models\User::find(4);
        $user->permissions()->sync($Permissions);

    }
}
