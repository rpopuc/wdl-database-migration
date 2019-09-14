<?php

namespace Wdl\DatabaseMigration\Middleware;

use Closure;
use Wdl\DatabaseMigration\Services\DatabaseMigrationService;

class DatabaseMigration
{
    /**
     * Check if install or update migrations is needed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        DatabaseMigrationService::installOrUpdate();

        return $next($request);
    }
}
