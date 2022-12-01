<?php namespace Adrian\Project\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectUserTable extends Migration
{
    public function up()
    {
        Schema::create('adrian_project_user', function(Blueprint $table)
        {
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->primary(['project_id', 'user_id']);
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('adrian_project_user');
    }
}