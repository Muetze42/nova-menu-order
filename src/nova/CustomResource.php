<?php


namespace NormanHuth\NovaMenuOrder\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Resource;

abstract class CustomResource extends Resource
{
    public static $order = '';

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        $order = static::$order ? static::$order:9999;

        return '<span class="hidden">'.$order.'</span>'.htmlspecialchars(Str::plural(Str::title(Str::snake(class_basename(get_called_class()), ' '))));
    }

    /**
     * Get the logical group associated with the resource.
     *
     * @return string
     */
    public static function group()
    {
        return '<span class="hidden">'.sprintf("%04d", config('nova-group-order.'.static::$group, 9999)).'</span>'.htmlspecialchars(static::$group);
    }

    public static function singularLabel()
    {
        return preg_replace('/(<span.*\/span>)/u', '', Str::singular(static::label()));
    }
}
