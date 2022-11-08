<?php namespace Adrian\Tasks;

use Backend;
use System\Classes\PluginBase;

/**
 * Tasks Plugin Information File
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
            'name'        => 'Tasks',
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
            'tasks' => [
                'label'       => 'Tasks',
                'url'         => Backend::url('adrian/tasks/task'),
                'icon'        => 'icon-leaf',
                'permissions' => ['adrian.tasks.*'],
                'order'       => 500,
            ],
        ];
    }
}
