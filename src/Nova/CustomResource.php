<?php


namespace NormanHuth\NovaMenuOrder\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Resource;

abstract class CustomResource extends Resource
{
    public static $order         = '';

    /**
     * @return null
     */
    public static function SetLabel()
    {
        return null;
    }

    /**
     * @return null
     */
    public static function SetSingularLabel()
    {
        return null;
    }

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        $order = static::$order ? static::$order:9999;

        if (static::SetLabel()) {
            return '<span class="hidden">'.$order.'</span>'.htmlspecialchars(static::SetLabel());
        }

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
        if (static::SetSingularLabel()) {
            return preg_replace('/(<span.*\/span>)/u', '', static::SetSingularLabel());
        }
        return preg_replace('/(<span.*\/span>)/u', '', Str::singular(static::label()));
    }
}
