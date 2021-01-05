<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiLog;

class ApiLogEvent
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

        $request->start_time = microtime(true); //store start time in request object to calculate processing duration

        $response = $next($request); //forward request and get response

        $this->logEvent($request, $response); // call log to store every thing in database

        return $response; // return response to client
    }

    private function logEvent($request, $response)
    {

        $log = new ApiLog(); //create an object for your database to store data
        $log->ip = $request->getClientIp(); // get client ip address from request object
        $log->method = strtoupper($request->getMethod()); // get client request method from request object
        $log->url = $request->fullUrl(); // get client full url from reuqest object
        $log->header = (is_array($request->header())) ? serialize($request->header()) : $request->header(); // if header is array encode in into string
        $log->request = $this->requestValidator($request->all()); //store complete request in string
        $log->response = $response->getContent(); // store response in string
        $log->bound = strtoupper('in'); //if API is internal then bound will be in else out
        $log->duration = microtime(true) - $request->start_time; //calculate and store total duration of processing code,
        $log->save(); // save log in databse

    }

    private function requestValidator(array $request)
    {
        $hiddenKeys = ['password', 'password_confirmation'];

        foreach ($hiddenKeys as $value) {
            if (array_key_exists($value, $request)) {
                $request[$value] = '******';
            }
        }

        return serialize($request);
    }
}
