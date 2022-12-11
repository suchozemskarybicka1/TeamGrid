<?php

namespace Adrian\Task\Classes\Extend;

use RainLab\User\Models\User;
use Event;

class UserExtend {

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['tasks'] = ['Adrian\Task\Models\Task'];

        });
    }

    public static function extendUser_AddColumns() {
        
        Event::listen('backend.list.extendColumns', function ($listWidget) {
            // Only for the User controller
            if (!$listWidget->getController() instanceof \RainLab\User\Controllers\Users) {
                return;
            }
        
            // Only for the User model
            if (!$listWidget->model instanceof \RainLab\User\Models\User) {
                return;
            }
        
            // Add an extra tasks column
            $listWidget->addColumns([
                'tasks' => [
                    'label' => 'Tasks',
                    'relation' => 'tasks',
                    'type' => 'text'
                ]
            ]);
        });
    }

    public static function extendUser_AddFields() {

        Event::listen('backend.form.extendFields', function ($widget) {
            // Only for the User controller
            if (!$widget->getController() instanceof \RainLab\User\Controllers\Users) {
                return;
            }
        
            // Only for the User model
            if (!$widget->model instanceof \RainLab\User\Models\User) {
                return;
            }
        
            // Add an extra tasks field
            $widget->addFields([
                'tasks' => [
                    'label'   => 'Tasks',
                    'comment' => 'Select the users tasks',
                    'type'    => 'checkboxlist'
                ]
            ]);
        });
    }

}
