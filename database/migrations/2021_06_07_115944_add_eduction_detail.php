<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEductionDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ssc_board_name')->nullable()->after('dob');
            $table->char('ssc_year',100)->nullable()->after('ssc_board_name');
            $table->double('ssc_percentage', 8, 2)->nullable()->after('ssc_year');
            $table->string('hsc_board_name')->nullable()->after('ssc_percentage');
            $table->char('hsc_year',100)->nullable()->after('hsc_board_name');
            $table->double('hsc_percentage', 8, 2)->nullable()->after('hsc_year');
            $table->string('degree_course_name')->nullable()->after('hsc_percentage');
            $table->string('degree_university')->nullable()->after('degree_course_name');
            $table->char('degree_year',100)->nullable()->after('degree_university');
            $table->double('degree_percentage', 8, 2)->nullable()->after('degree_year');
            $table->string('mdegree_course_name')->nullable()->after('degree_percentage');
            $table->string('mdegree_university')->nullable()->after('mdegree_course_name');
            $table->char('mdegree_year',100)->nullable()->after('mdegree_university');
            $table->double('mdegree_percentage', 8, 2)->nullable()->after('mdegree_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
