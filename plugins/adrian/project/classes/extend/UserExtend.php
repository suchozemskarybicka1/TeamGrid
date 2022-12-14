<?php

namespace Adrian\Project\Classes\Extend;

use RainLab\User\Models\User;
use \RainLab\User\Controllers\Users;
use Event;

class UserExtend {

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['projects'] = ['Adrian\Project\Models\Project'];
            $model->hasMany['tasks'] = ['Adrian\Task\Models\Task'];
            $model->hasMany['time_entries'] = ['Adrian\TimeEntry\Models\TimeEntry'];

        });
    }

    public static function extendUser_AddFields() {

        Event::listen('backend.form.extendFields', function ($widget) {
            // Only for the User controller
            if (!$widget->getController() instanceof Users) {
                return;
            }

            // Only for the User model
            if (!$widget->model instanceof User) {
                return;
            }

            // Add an extra projects field
            $widget->addFields([
                'projects' => [
                    'label'   => 'Projects',
                    'comment' => 'Select the users projects',
                    'type'    => 'checkboxlist',
                ],
                'tasks' => [
                    'label'   => 'Tasks',
                    'comment' => 'Select the users tasks',
                    'type'    => 'checkboxlist'
                ],
                'time entries' => [
                    'label'   => 'time entries',
                    'comment' => 'Select the users time entries',
                    'type'    => 'checkboxlist'
                ]
            ]);
        });
    }


    public static function extendUser_AddScopes() {

        User::extend(function($model) {
            
            $model->addDynamicMethod('scopeHasCustomerGroup', function($query)  { //use ($model)

                return $query->whereHas('groups', function ($query) {
                    $query->where('name', 'Customers');   
                });
            
            });
        });

        User::extend(function($model) {
            
            $model->addDynamicMethod('scopeHasProjectManagerGroup', function($query)  { //use ($model)

                return $query->whereHas('groups', function ($query) {
                    $query->where('name', 'Project managers');   
                });
            
            });
        });
    }
}
