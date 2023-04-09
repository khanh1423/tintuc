<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Route;
 
class SidebarComposer
{
    /**
     * Create a new profile composer.
     *
     * @param 
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $route = Route::currentRouteName();

        $view->with('route', $route);
    }
}