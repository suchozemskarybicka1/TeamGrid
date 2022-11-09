<?php namespace Adrian\TimeEntry;

use Backend;
use System\Classes\PluginBase;

/**
 * TimeEntry Plugin Information File
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
            'name'        => 'TimeEntry',
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
            'timeentry' => [
                'label'       => 'TimeEntry',
                'url'         => Backend::url('adrian/timeentry/timeentries'),
                'icon'        => 'icon-leaf',
                'permissions' => ['adrian.timeentry.*'],
                'order'       => 500,
            ],
        ];
    }
}
