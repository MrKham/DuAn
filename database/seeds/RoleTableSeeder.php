<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Admin', 'code' => 'admin'],
            ['name' => 'Mod dự án', 'code' => 'project_mod'],
            ['name' => 'Mod bài viết', 'code' => 'post_mod'],
            ['name' => 'Người dùng', 'code' => 'user']
        ];
        foreach ($data as $d) {
            $role = new \App\Models\Role();
            $role->name = $d['name'];
            $role->code = $d['code'];
            $role->save();
        }
    }
}
