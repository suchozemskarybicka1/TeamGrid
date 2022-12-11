<?php namespace Adrian\Project\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('adrian_project_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 100);
            $table->string('slug')->index();
            $table->string('customer_id');
            $table->integer('rate');
            $table->integer('budget');
            $table->boolean('is_completed')->default(false);
            $table->integer('project_manager_id');
        });
    }

    public function down()
    { 
        Schema::dropIfExists('adrian_project_projects');
    }
}
