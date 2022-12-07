<?php

namespace Adrian\TimeEntry\Classes\Extend;

use RainLab\User\Models\User;

class UserExtend {

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['time_entries'] = ['Adrian\TimeEntry\Models\TimeEntry'];

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
        
            // Add an extra time entries column
            $listWidget->addColumns([
                'time entries' => [
                    'label' => 'Time entries',
                    'relation' => 'time entries',
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
