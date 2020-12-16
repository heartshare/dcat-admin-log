<?php


namespace Dcat\Admin\Satan\Admin\Log\Http\Middleware;

use Dcat\Admin\Admin;
use Dcat\Admin\Satan\Admin\Log\DcatAdminLogServiceProvider;
use Dcat\Admin\Satan\Admin\Log\Models\SatanLog;
use Illuminate\Http\Request;

/**
 * 日志中间件
 * Class LogOperation
 * @package Dcat\Admin\Satan\Admin\Log\Http\Middleware
 */
class LogOperation
{
    public function handle(Request $request,$next)
    {
        $response= $next($request);
        $except = DcatAdminLogServiceProvider::setting('except');
        $baseurl = $request->path();
        $controller = admin_controller_name();
            $user_id = Admin::user()?Admin::user()->id:0;
            $data = [
                'user_id'=>$user_id,
                'param'=>$request->input(),
                'headers'=>$request->headers,
                'method'=>$request->method(),
                'url'=>$baseurl,
                'ip'=>$request->ip()
            ];
            SatanLog::query()->create($data);
        return $response;
    }
}
