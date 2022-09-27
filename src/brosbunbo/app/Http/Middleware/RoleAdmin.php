<?php namespace BunBo\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RoleAdmin {

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            return redirect()->guest(route('admin.login'));
        } else {
            $user = $this->auth->user();

            if(!$user->hasRole('admin')&&!$user->can('admin_permission')) {
                $this->auth->logout();
                return redirect()->guest(route('admin.login'));
            }
        }

        return $next($request);
    }

}
