<?php
namespace Webflaxco\Blog\Facades;

use Illuminate\Support\Facades\Facade;

class Category extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'category';
    }
}



?>
