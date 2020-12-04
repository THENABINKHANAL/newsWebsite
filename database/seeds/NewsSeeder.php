<?php

use Illuminate\Database\Seeder;
use App\News;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $anews=new News();
        $anews->id=1;
        $anews->newsTitle="New LICT Website";
        $anews->addedviewfiles=1;
        $anews->Mainimg="../../news/news1-1.jpg";
        $anews->newsDetails="<h1 style='text-align:center'>New LICT Website</h1>

        <p><img alt='' src='../../news/news1-1.jpg' style='height:80%; width:100%' /></p>
        
        <p>New LICT website built by team one is being deployed.</p>";
        $anews->save();
    }
}
