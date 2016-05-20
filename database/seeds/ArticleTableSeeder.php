<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        for($i=0;$i<100;$i++){
        	$temp['title'] = str_random(20);
        	$temp['content'] = str_random(100);
        	$temp['descr'] = str_random(10);
        	$temp['user_id'] = rand(1,10);
        	$temp['cate_id'] = rand(1,5);
        	$temp['pic'] = str_random(10);
        	$temp['created_at'] = date('Y-m-d H:i:s');
        	$data[] = $temp;
        }
        \DB::table('article')->insert($data);
    }
}

