<?php

namespace App\Http\Middleware;

use App\Exceptions\BaseException;
use App\Exceptions\Error;
use Closure;
use DB;

/* Exception */
use Illuminate\Validation\UnauthorizedException;

class ClientCredentialsVerification
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

        // Pre-Middleware Action
        $validate = $this->verifyClient($request);
        if (!$validate) throw new BaseException(Error::$UNAUTHRIZED);

        $response = $next($request);

        return $response;
    }

    private function verifyClient($request)
    {
        $client = DB::table('oauth_clients')->where('id', $request->headers->get('Client-ID'))->where('secret', $request->headers->get('Client-Secret'))->where('revoked', false)->where('password_client', true)->first();

        if (!empty($client))
            return true;

        return false;
    }
}
