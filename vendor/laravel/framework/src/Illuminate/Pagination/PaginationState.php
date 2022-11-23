<?php

namespace Illuminate\Pagination;

class PaginationState
{
    /**
     * Bind the pagination state resolvers using the given application container as a base.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public static function resolveUsing($app)
    {
<<<<<<< HEAD
        Paginator::viewFactoryResolver(function () use ($app) {
            return $app['view'];
        });

        Paginator::currentPathResolver(function () use ($app) {
            return $app['request']->url();
        });
=======
        Paginator::viewFactoryResolver(fn () => $app['view']);

        Paginator::currentPathResolver(fn () => $app['request']->url());
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        Paginator::currentPageResolver(function ($pageName = 'page') use ($app) {
            $page = $app['request']->input($pageName);

            if (filter_var($page, FILTER_VALIDATE_INT) !== false && (int) $page >= 1) {
                return (int) $page;
            }

            return 1;
        });

<<<<<<< HEAD
        Paginator::queryStringResolver(function () use ($app) {
            return $app['request']->query();
        });
=======
        Paginator::queryStringResolver(fn () => $app['request']->query());
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        CursorPaginator::currentCursorResolver(function ($cursorName = 'cursor') use ($app) {
            return Cursor::fromEncoded($app['request']->input($cursorName));
        });
    }
}
