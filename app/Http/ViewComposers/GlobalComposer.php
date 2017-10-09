<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\View\View;

class GlobalComposer
{
    /**
     * An array of global data to share with all views
     *
     * @var array
     */
    protected $globalComposer;

    /**
     * Create a new profile composer.
     *
     * @param  Illuminate\Http\Request  $request;
     * @return void
     */
    public function __construct(Request $r)
    {
        $this->globalComposer = [
            'routePrefix' => $r->route()->getPrefix(),
            'routeSegments' => $r->segments(),
            'routeName' => $r->route()->getName(),
            'routeNameArray' => explode('.', $r->route()->getName() )
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('globalComposer', $this->globalComposer);
    }
}
