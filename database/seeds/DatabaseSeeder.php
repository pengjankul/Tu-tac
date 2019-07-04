<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'pengjankul@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        //
        DB::table('account_chart_group')->insert([
            [
                'grp_chart_name' => 'หมวดสินทรัพย์',
                'grp_chart_detail' => '-',
                'datetime_add' => date('Y-m-d H:i:s'),
                'user_add' => 1,
                'datetime_update' => date('Y-m-d H:i:s'),
                'user_update' => 1,
                'fag_allow' => 'ปกติ',
            ],
            [
                'grp_chart_name' => 'หมวดหนี้สิน',
                'grp_chart_detail' => '-',
                'datetime_add' => date('Y-m-d H:i:s'),
                'user_add' => 1,
                'datetime_update' => date('Y-m-d H:i:s'),
                'user_update' => 1,
                'fag_allow' => 'ปกติ',
            ],
            [
                'grp_chart_name' => 'หมวดส่วนของ ผู้ถือหุ้นและทุน',
                'grp_chart_detail' => '-',
                'datetime_add' => date('Y-m-d H:i:s'),
                'user_add' => 1,
                'datetime_update' => date('Y-m-d H:i:s'),
                'user_update' => 1,
                'fag_allow' => 'ปกติ',
            ],
            [
                'grp_chart_name' => 'หมวดบัญชีรายได้',
                'grp_chart_detail' => '-',
                'datetime_add' => date('Y-m-d H:i:s'),
                'user_add' => 1,
                'datetime_update' => date('Y-m-d H:i:s'),
                'user_update' => 1,
                'fag_allow' => 'ปกติ',
            ],
            [
                'grp_chart_name' => 'หมวดบัญชีค่าใช้จ่าย',
                'grp_chart_detail' => '-',
                'datetime_add' => date('Y-m-d H:i:s'),
                'user_add' => 1,
                'datetime_update' => date('Y-m-d H:i:s'),
                'user_update' => 1,
                'fag_allow' => 'ปกติ',
            ],
            [
                'grp_chart_name' => 'หมวดอื่น ๆ',
                'grp_chart_detail' => '-',
                'datetime_add' => date('Y-m-d H:i:s'),
                'user_add' => 1,
                'datetime_update' => date('Y-m-d H:i:s'),
                'user_update' => 1,
                'fag_allow' => 'ปกติ',
            ],
        ]);
    }
}
