<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'status' => 'リード顧客',
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'id' => '2',
            'status' => 'メール送信済'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'id' => '3',
            'status' => '日程調整済'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'id' => '4',
            'status' => '商談済'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'id' => '5',
            'status' => '契約済'
        ];
        DB::table('statuses')->insert($param);
    }
}
