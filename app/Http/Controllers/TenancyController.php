<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;

class TenancyController extends Controller
{



    public function setUp(Request $request)
    {


        // this for test
    //     try {


    //     $dbname="adb_".$request->dbname;
    //     $oldConn=Config::get('database.connections.mysql.database');
    //     DB::statement("CREATE DATABASE `{$dbname}` ;");
    //     Config::set('database.connections.mysql.database',$dbname);
    //     DB::purge();
    //     DB::reconnect();
    //     Artisan::call('migrate',[
    //         '--path'=>'database/migrations/tenance',
    //         '--force'=>true
    //     ]);

    //     Config::set('database.connections.mysql.database',$oldConn);
    //     DB::purge();
    //     DB::reconnect();
    //     //  $users = DB::select('select * from users');
    //     // echo "<pre>";
    //     // print_r($users);
    //     // echo "</pre>";
    //     // exit;
    // } catch (\Throwable $th) {
    //     dd($th->getMessage());
    //     throw $th;
    // }
        return back();
    }
}
