<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

use Illuminate\Support\Facades\DB;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_user()
    {
        //usersテーブルに2件レコード追加
        DB::table('users')->insert([
            ['name' => 'A', 'email' => '1@test.com', 'password' => 'aaa'],
            ['name' => 'B', 'email' => '2@test.com', 'password' => 'aaa']
        ]);

        //検証用 usersテーブルにselect文流して$getValに代入
        $getVal = DB::table('users')->select('name')->get();

        //検証用 ログ(src/storage/logs/laravel.log)に$getValの値を書き込み
        Log::info($getVal);

        //usersテーブルの件数が2件であればテストOK
        $this->assertDatabaseCount(table: 'users', count: 2);
    }
}