<?php

namespace iLzx\AdminStarter\Middleware;

use Closure;
use Illuminate\Http\Request;
use iLzx\AdminStarter\Models\ApiLogger;

class ApiLoggerMiddleware
{
    private $enabled;

    public function __construct()
    {
        $this->enabled = config('avue.api_log_enabled', false);
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }


    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response $response
     * @return void
     */
    public function terminate($request, $response)
    {
        if ($this->enabled && $request->wantsJson()) {
            ApiLogger::create([
                'api_url'              => method_exists($request, 'route') ? $request->route()->uri() : null,
                'request_full_url'     => method_exists($request, 'fullUrl') ? $request->fullUrl() : null,
                'request_method'       => method_exists($request, 'method') ? $request->method() : null,
                'request_body'         => method_exists($request, 'all') ? json_encode($request->all()) : null,
                'request_ip'           => method_exists($request, 'ip') ? $request->ip() : null,
                'request_header'       => method_exists($request, 'header') ? json_encode($request->header()) : null,
                'request_agent'        => method_exists($request, 'header') ? $request->header('User-Agent') : null,
                'response_content'     => method_exists($response, 'content') ? $response->content() : null,
                'response_status_code' => method_exists($response, 'getStatusCode') ? $response->getStatusCode() : null,
                'admin_id'             => get_user_info()['id'] ?? null,
            ]);
        }
    }

}
