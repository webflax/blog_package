<?php
namespace Webflaxco\Blog\Facades;

use Illuminate\Support\Facades\Facade;

class Post extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'post';
    }
}



?>
