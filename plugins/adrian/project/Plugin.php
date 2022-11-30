<?php namespace Adrian\Project;

use Backend;
use System\Classes\PluginBase;

/**
 * Project Plugin Information File
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
            'name'        => 'Project',
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
     *
     * Boot method, called right before the request route.
     * @return array
     */
    public function boot()
    {
            User::extend($model){
                $model->hasMany['projects'] = ['Adrian\Project\Models\Project']
            }
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
            'project' => [
                'label'       => 'Project',
                'url'         => Backend::url('adrian/project/projects'),
                'icon'        => 'icon-leaf',
                'permissions' => ['adrian.project.*'],
                'order'       => 500,
            ],
        ];
    }
}
