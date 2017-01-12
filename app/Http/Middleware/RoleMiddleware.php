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
       // $role = Role::find($request->user()->role_id);
       if ($request->user()->role->type != $rol) {
            switch ($request->user()->role->type) {
                case 'student':
                    return redirect('/student/home');   
                    break;
                case 'tutor':
                    return redirect('/teacher/groups');   
                    break;
                case 'department_manager':
                    return redirect('/jefe-departamento/alumnos');   
                    break;
                case 'coordinator':
                    return redirect('/coordinador/grupos');   
                    break;
                
                default:
                    # code...
                    break;
            }
        }
       /* else{
            //redireccionar al home de cada tipo de usuario
            return redirect('/home');  
        }*/
        return $next($request);
    }
}
