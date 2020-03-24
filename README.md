Sort the Nova resources and resource groups in the menu.

Install:  
`composer require normanhuth/nova-menu-order`

Now publish the config file:  
`php artisan vendor:publish --provider="NormanHuth\NovaMenuOrder\NovaMenuOrderServiceProvider" --tag=config`

After publish this, You find the file config/nova-group-order.php, where You can sort the resources groups:
```php
 return [
     'Other'     => 10,
     'Archives'  => 20,
 ];
```
___

If the file resources/views/vendor/nova/resources/navigation.blade.php **not exists**, You can publish this file:  
`php artisan vendor:publish --provider="NormanHuth\NovaMenuOrder\NovaMenuOrderServiceProvider" --tag=view`

If this file already exist, You have 2 Options.  
Option 1:  
Overwrite the file with:  
`php artisan vendor:publish --provider="NormanHuth\NovaMenuOrder\NovaMenuOrderServiceProvider" --tag=view --force`

Option 2:  
Edit the file and change `{{ $group }}` to `{!! $group !!}` and `{{ $resource::label() }}` to `{!! $resource::label() !!}`
___
Use this package in the Nova resources:
```php
use NormanHuth\NovaMenuOrder\Nova\CustomResource;

class Contact extends CustomResource
```

And to order the resources:
```php
use NormanHuth\NovaMenuOrder\Nova\CustomResource;

class Contact extends CustomResource
{
    public static $order = 20;
```


Localize Labels - use alternative method
```php
    public static function SetLabel()
    {
        return __('Contact');
    }
    public static function SetSingularLabel()
    {
        return __('Contact');
    }
```
___
If You use [klepak/nova-dynamic-page-title](https://github.com/klepak/nova-dynamic-page-title), You find in the folder nova-dynamic-page-title a custom JS-asset to override, change, edit this package. 
