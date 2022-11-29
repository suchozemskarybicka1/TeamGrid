<?php namespace Adrian\Task;

use Backend;
use System\Classes\PluginBase;

/**
 * Task Plugin Information File
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
            'name'        => 'Task',
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
        User::extend($model){
            $model->hasMany['tasks'] = ['Adrian\Task\Models\Task']
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
            'task' => [
                'label'       => 'Task',
                'url'         => Backend::url('adrian/task/tasks'),
                'icon'        => 'icon-leaf',
                'permissions' => ['adrian.task.*'],
                'order'       => 500,
            ],
        ];
    }
}
