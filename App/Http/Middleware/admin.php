<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;

use App\AssignedRoles;



class admin
{
    
/**
*@var Guard
*
*/
protected $auth;

/**
*@var Response factory
*
*/
protected $response;


/**
     * Create a new filter instance
     *
     * @param  Guard $auth
     * @param  ResonseFactory $response
     * @return void
     */
public function __construct(Guard $auth, ResonseFactory $response){

 $this->auth = $auth;
 $this->response = $response;

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
    if($this->auth->check())
    {
        $admin=0;
    
    if($this->auth->user()->admin==1){
       
       $admin=1;

     }

     if($this->auth->user()->admin==0){
        return $this->response->redirectTo('/');
     }
        return $next($request);

     }
    
    return $this->response->redirectTo('/');
    
    }
}
