<?php namespace Adrian\Projects;

use Backend;
use System\Classes\PluginBase;

/**
 * Projects Plugin Information File
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
            'name'        => 'Projects',
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
            'projects' => [
                'label'       => 'Projects',
                'url'         => Backend::url('adrian/projects/project'),
                'icon'        => 'icon-leaf',
                'permissions' => ['adrian.projects.*'],
                'order'       => 500,
            ],
        ];
    }
}
