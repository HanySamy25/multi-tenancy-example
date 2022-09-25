<?php

namespace App\Listeners;

use App\Events\CreateDBEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CreateDbListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CreateDBEvent $event)
    {

        try {
            //code...

        $user = $event->user;

        $dbname = "store_" . $user->id;// define db name

        // create db in mysql
        DB::statement("CREATE DATABASE `{$dbname}`;");

        // holde old mysql connection
        $oldConn=Config::get('database.connections.mysql.database');

        // set mysql connection to new created database
        config()->set('database.connections.mysql.database', $dbname);

        // flash connection and reconnect to update db name
        DB::purge();
        DB::reconnect();

        // run migration to the new database
        Artisan::call('migrate', [
            '--path' => 'database/migrations/tenance',
            '--force' => true
        ]);

        // reconnect to the old mysql connection
        Config::set('database.connections.mysql.database',$oldConn);
        DB::purge();
        DB::reconnect();
    } catch (\Throwable $th) {
        throw $th;
    }
    }
}
