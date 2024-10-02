<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckError
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 요청된 URL이 /posts/{id} 형식인지 확인
        if ($request->route('id') && !is_numeric($request->route('id'))) {
            abort(404); // ID가 숫자가 아닐 경우 404 페이지로 리다이렉트
        }

        return $next($request);
    }
}
