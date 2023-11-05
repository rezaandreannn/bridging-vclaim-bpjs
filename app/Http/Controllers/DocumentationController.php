<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DocumentationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $routeCollection = Route::getRoutes();
        // dd($routeCollection);
        // foreach ($routeCollection as $route) {
        //     // Get route properties
        //     $uri = $route->uri();
        //     $methods = $route->methods();
        //     $name = $route->getName();
        
        //     // Do something with the route properties
        //     // For example, you can store them in an array or print them
        //     echo "URI: $uri<br>";
        //     echo "Methods: " . implode(', ', $methods) . "<br>";
        //     echo "Name: $name<br>";
        // }

        return view('dokumentasi', \compact('routeCollection'));
    }
}
