<?php

use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site = \App\Models\Site::create([
            'user_id' => 1,
            'name' => '测试站点',
            'description' => '这是用来演示的测试站点，随时可以删除',
        ]);
        $site->user()->save(\App\User::find(1), ['role' => 'admin']);
    }
}
