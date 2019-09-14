<?php

namespace Wdl\DatabaseMigration\Services;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class DatabaseMigrationService
{
    /**
     * Verify if install or update is needed.
     *
     * @return void
     */
    public static function installOrUpdate(): void
    {
        if (!self::install()) {
            self::update();
        }
    }

    /**
     * Proceed with the install migrations
     *
     * @return void
     */
    public static function install()
    {
        $canInstall = !Schema::hasTable('migrations');
        if ($canInstall) {
            Artisan::call('migrate', [
                '--seed' => true,
            ]);
        }
        return $canInstall;
    }

    /**
     * Proceed with the update migrations
     *
     * @return void
     */
    public static function update()
    {
        Artisan::call('migrate');
    }
}
