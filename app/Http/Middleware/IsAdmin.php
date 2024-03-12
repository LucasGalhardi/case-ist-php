<?php
//
//namespace App\Http\Middleware;
//
//use Closure;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class IsAdmin
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure  $next
//     * @return mixed
//     */
//    public function handle(Request $request, Closure $next)
//    {
//        if (Auth::check() && Auth::user()->is_admin) {
//            return $next($request);
//        }
//
//        // Se não for admin, redirecione para a página inicial ou mostre um erro
//        return redirect('/')->with('error', 'Você não tem permissão para acessar essa página.');
//    }
//}
