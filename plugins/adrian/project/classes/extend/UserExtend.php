<?php

namespace Adrian\Project\Classes\Extend;

use RainLab\User\Models\User;
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
        
            // Add an extra projects field
            $widget->addFields([
                'projects' => [
                    'label'   => 'Projects',
                    'comment' => 'Select the users projects',
                    'type'    => 'checkboxlist'
                ]
            ]);
        });
    }
}
