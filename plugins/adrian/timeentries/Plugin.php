<?php namespace Adrian\TimeEntries;

use Backend;
use System\Classes\PluginBase;

/**
 * TimeEntries Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'TimeEntries',
            'description' => 'No description provided yet...',
            'author'      => 'Adrian',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        // return []; // Remove this line to activate

        return [
            'timeentries' => [
                'label'       => 'TimeEntries',
                'url'         => Backend::url('adrian/timeentries/timeentry'),
                'icon'        => 'icon-leaf',
                'permissions' => ['adrian.timeentries.*'],
                'order'       => 500,
            ],
        ];
    }
}
