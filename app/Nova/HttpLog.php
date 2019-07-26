<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class HttpLog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\HttpLog';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'request_url';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'request_url',
    ];

    public static $group = 'Logs';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable()->onlyOnIndex(),
            BelongsTo::make('User', 'actor', User::class) ->exceptOnForms(),
            DateTime::make('At', 'created_at')->exceptOnForms(),
            Text::make('URL', 'request_url')->onlyOnDetail(),
            Text::make('Environment', 'agent_environment')->exceptOnForms(),
            Text::make('IP Address', 'agent_ip')->onlyOnDetail(),
            Text::make('Browser', 'agent_browser')->onlyOnDetail(),
            Text::make('Device', 'agent_device')->onlyOnDetail(),
            Text::make('Platform', 'agent_platform')->onlyOnDetail(),
            Boolean::make('Is Phone?', 'agent_is_phone')->onlyOnDetail(),
            Boolean::make('Is Desktop?', 'agent_is_desktop')->onlyOnDetail(),
            Boolean::make('Is Robot?', 'agent_is_robot')->onlyOnDetail(),
            Text::make('Robot Name', 'agent_robot_name')->onlyOnDetail(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
