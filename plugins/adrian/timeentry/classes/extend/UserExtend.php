<?php

namespace Adrian\TimeEntry\Classes\Extend;

use RainLab\User\Models\User;
use \RainLab\User\Controllers\Users;

class UserExtend {

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
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
        
            // Add an extra time entries field
            $widget->addFields([
                'time entries' => [
                    'label'   => 'time entries',
                    'comment' => 'Select the users time entries',
                    'type'    => 'checkboxlist'
                ]
            ]);
        });
    }
}
