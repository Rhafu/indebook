<?php

namespace Blog\Infra\Middleware;

use Blog\Infra\Presenter\ApiOutputFactory;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PostReadMiddlewareValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');

        $validator = Validator::make(['id' => $id], [
            'id' => ['numeric'],
        ],
        [
            'id.numeric'  => 'O recurso \'post/{:attribute}\' só pode ser acessado por um id numerico válido',
        ]);

        if ($validator->fails()) {
            return new JsonResponse(ApiOutputFactory::validatorErrorsResponse($validator->errors()), 400);
        }

        return $next($request);
    }
}
