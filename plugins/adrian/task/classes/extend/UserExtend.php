<?php

namespace Adrian\Task\Classes\Extend;

use RainLab\User\Models\User;

class UserExtend {

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['tasks'] = ['Adrian\Task\Models\Task'];

        });
    }
}
