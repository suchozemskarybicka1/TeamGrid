<?php

namespace Adrian\Task\Classes\Extend;

use RainLab\User\Models\User;
use \RainLab\User\Controllers\Users;
use Event;

class UserExtend {

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['tasks'] = ['Adrian\Task\Models\Task'];

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
