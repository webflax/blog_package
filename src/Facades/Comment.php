<?php
namespace Webflaxco\Blog\Facades;

use Illuminate\Support\Facades\Facade;

class Comment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'comment';
    }
}



?>
