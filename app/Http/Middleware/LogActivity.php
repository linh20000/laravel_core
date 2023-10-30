<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;

class LogActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        switch ($request->getMethod()) {
            case 'PUT':
                $this->update();
                return $next($request);
            case 'PATCH':
                $this->update();
                return $next($request);
            case 'POST':
                if (!empty($request->id) || $request->route()->parameter('id')) {
                    $this->update();
                }
                else if($request->route()->action['as'] == 'login.post') {
                    $this->loginUserHandler();
                }
                else if ($request->route()->action['as'] == 'register.post') {
                    $this->registerUserHandler();
                }
                else if ($request->route()->action['as'] == 'password.update') {
                    $this->resetUserHandler();
                }
                else {
                    $this->store();
                }
                return $next($request);
            case 'DELETE':
                $this->destroy();
                return $next($request);
            default:
                return $next($request);
        }

        return $next($request);
    }


    public function loginUserHandler()
    {
        activity()
            ->withProperties(['action' => 'Đăng nhập'])
            ->log('login');
    }

    public function registerUserHandler()
    {
        activity()
            ->withProperties(['action' => 'Đăng ký'])
            ->log('login');
    }

    public function resetUserHandler()
    {
        activity()
            ->withProperties(['action' => 'Lấy lại mật khẩu'])
            ->log('login');
    }

    public function store()
    {
        activity()
            ->withProperties(['action' => 'Tạo mới'])
            ->withProperties(['actor_email' => auth::user()->email])
            ->withProperties(['actor_id' => auth::user()->id])
            ->log('create');
    }

    public function update()
    {
        activity()
            ->withProperties(['action' => 'cập nhật'])
            ->withProperties(['actor_email' => auth::user()->email])
            ->withProperties(['actor_id' => auth::user()->id])
            ->log('update');
    }

    public function destroy()
    {
        activity()
            ->withProperties(['action' => 'xoá bản ghi'])
            ->withProperties(['actor_email' => auth::user()->email])
            ->withProperties(['actor_id' => auth::user()->id])
            ->log('delete');
    }

}
