<?php
//use Illuminate\Routing\Route;
//use Illuminate\Support\Facades\Route;
//use Symfony\Component\Routing\Route;
//use Symfony\Component\Routing\Annotation\Route;

// 把路由名中的 . 换成 - , 用于类名
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

// 生成内容摘要
function make_excerpt($text, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($text)));
    return str_limit($excerpt, $length);
}
