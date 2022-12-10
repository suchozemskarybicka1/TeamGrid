<?php

namespace Adrian\Project\Classes\Extend;

use RainLab\User\Models\User;
use Adrian\Project\Models\Project;
use Adrian\Project\Http\Resources\ProjectsResource;
use Event;

class UserExtend {

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['projects'] = ['Adrian\Project\Models\Project'];

        });
    }

    public static function extendUser_AddColumns() {
        
        Event::listen('backend.list.extendColumns', function ($listWidget) {
            // Only for the User controller
            if (!$listWidget->getController() instanceof \Backend\Controllers\Users) {
                return;
            }
        
            // Only for the User model
            if (!$listWidget->model instanceof \Backend\Models\User) {
                return;
            }
        
            // Add an extra projects column
            $listWidget->addColumns([
                'projects' => [
                    'label' => 'Projects',
                    'relation' => 'projects',
                    'select' => 'name'
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
