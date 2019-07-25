<?php

namespace App\Http\Middleware;

use App\HttpLog;
use Closure;
use Illuminate\Support\Facades\App;
use Jenssegers\Agent\Agent;
use Illuminate\Contracts\Auth\Guard;

class LogRequest
{
    protected $auth;

    /**
     * LogRequest constructor.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $agent = new Agent();

        HttpLog::create([
            'actor_id' => $this->auth->check() ? $this->auth->id() : 0,
            'request_url' => substr($request->fullUrl(), 0, 255),
            'agent_environment' => App::environment(),
            'agent_ip' => $request->ip(),
            'agent_device' => $agent->device(),
            'agent_platform' => $agent->platform(),
            'agent_browser' => $agent->browser(),
            'agent_robot_name' => $agent->robot(),
            'agent_is_robot' => $agent->isRobot() ? 1 : 0,
            'agent_is_phone' => $agent->isPhone() ? 1 : 0,
            'agent_is_desktop' => $agent->isDesktop() ? 1 : 0,
        ]);

        return $next($request);
    }
}
