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
                'name' => 'view-backend',
                'display_name' => 'View backend',
                'description' => 'User can view backend',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()

            ],
            [
                'name' => 'manage-Courses',
                'display_name' => 'Manage Courses',
                'description' => 'User can manage Courses',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],

        ];
        foreach ($permissions as $key=>$value){
            Permission::create($value);
        }
    }
}
