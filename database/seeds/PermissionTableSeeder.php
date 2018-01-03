<?php

use App\Permission;
use Carbon\Carbon;
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
            [
                'name' => 'view-admin',
                'display_name' => 'View admin',
                'description' => 'User can view admin',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()

            ],
            [
                'name' => 'manage-Course',
                'display_name' => 'Manage Course',
                'description' => 'User can manage Course',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],

        ];
        foreach ($permissions as $key=>$value){
            Permission::create($value);
        }
    }
}
