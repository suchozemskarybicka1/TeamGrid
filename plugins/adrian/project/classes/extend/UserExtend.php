<?php

namespace Adrian\Project\Classes\Extend;

use RainLab\User\Models\User;
use \RainLab\User\Controllers\Users;
use Adrian\Project\Models\Project;
use Adrian\Project\Http\Resources\ProjectsResource;
use Event;

class UserExtend {

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['projects'] = ['Adrian\Project\Models\Project'];

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

            var_dump(Project::getProjectsOptions());
            // Add an extra projects field
            $widget->addFields([
                'projects' => [
                    'label'   => 'Projects',
                    'comment' => 'Select the users projects',
                    'type'    => 'checkboxlist',
                    'options' => Project::getProjectsOptions()
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
