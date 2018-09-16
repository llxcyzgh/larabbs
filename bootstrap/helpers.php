<?php
//use Illuminate\Routing\Route;
//use Illuminate\Support\Facades\Route;
//use Symfony\Component\Routing\Route;
//use Symfony\Component\Routing\Annotation\Route;


function route_class(){
    return str_replace('.','-',Route::currentRouteName());
}
