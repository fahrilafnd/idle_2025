<?php

namespace App\Http\Middleware;

use App\Ormawa;
use App\Kategori;
use Closure;
use Illuminate\Support\Facades\Auth;

class OrmawaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $kategoris = Kategori::select('kategori')->where('id_ormawa', Auth::user()->id_ormawa)->get();

        $allow = false;

        foreach ($kategoris as $kategori){
            if($kategori->kategori == $request->route()->parameter('kategori')){
                $allow = true;
            }
        }

        if($allow){
            return $next($request);
        } else {
//            return $next($request);
            return redirect()->route('admin.dashboard');
        }

    }
}
