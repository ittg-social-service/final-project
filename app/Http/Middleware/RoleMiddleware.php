<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        if ($request->user()->hasRole($rol)) {
            return $next($request);
        }else{
            foreach ($request->user()->roles as $role) {
                switch ($role->type) {
                    case 'department_manager':
                        return redirect('/jefe-departamento/alumnos');   
                        break;
                    case 'coordinator':
                        return redirect('/coordinador/grupos');   
                        break;
                    case 'student':
                        return redirect('/student/home');   
                        break;
                    case 'tutor':
                        return redirect('/teacher/groups');   
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
        }

    }
}
