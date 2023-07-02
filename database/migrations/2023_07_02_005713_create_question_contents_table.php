<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateQuestionContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('question_id');
            $table->string('image_path');
            $table->string('desc');
            $table->string('q1');
            $table->string('q1_marks')->nullable();
            $table->string('q2');
            $table->string('q2_marks')->nullable();
            $table->string('q3');
            $table->string('q3_marks')->nullable();
            $table->string('q4');
            $table->string('q4_marks')->nullable();
        });

        DB::table('question_contents')->insert(
            array(
                'question_id' => '1',
                'image_path' => 'q1.fw.png',
                'desc' => '您平常喜歡睡怎樣的床?',
                'q1' => '最喜歡軟的床',
                'q2' => '不軟不硬',
                'q3' => '軟中偏硬一點',
                'q4' => '喜歡硬的床'
            )
        );
        DB::table('question_contents')->insert(
            array(
                'question_id' => '2',
                'image_path' => 'q2.fw.png',
                'desc' => '您最喜歡怎樣的睡姿?',
                'q1' => '趴著睡',
                'q2' => '側面睡',
                'q3' => '我直接仰睡',
                'q4' => '我怎樣睡都行'
            )
        );
        DB::table('question_contents')->insert(
            array(
                'question_id' => '3',
                'image_path' => 'q3.fw.png',
                'desc' => '身體是否有受過傷影響睡眠?',
                'q1' => '有受過傷',
                'q2' => '肩頸不易鬆',
                'q3' => '我有瘠椎側彎',
                'q4' => '沒受過傷影響睡眠'
            )
        );
        DB::table('question_contents')->insert(
            array(
                'question_id' => '4',
                'image_path' => 'q4.fw.png',
                'desc' => '請問您的身高體重是?',
                'q1' => '低於170公分,60公斤',
                'q2' => '高於170公分,低於60公斤',
                'q3' => '低於170公分,高於60公斤',
                'q4' => '高於170公分,60公斤'
            )
        );
        DB::table('question_contents')->insert(
            array(
                'question_id' => '5',
                'image_path' => 'q5.fw.png',
                'desc' => '請問您現在的年齡是?',
                'q1' => '小於20歲',
                'q2' => '21歲~40歲',
                'q3' => '41歲~64歲',
                'q4' => '大於65歲'
            )
        );
        DB::table('question_contents')->insert(
            array(
                'question_id' => '6',
                'image_path' => 'q6.fw.png',
                'desc' => '請問有認床的習慣嗎?',
                'q1' => '只要軟的就好',
                'q2' => '不會認床',
                'q3' => '很會認床',
                'q4' => '只要硬的就好'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_contents');
    }
}
