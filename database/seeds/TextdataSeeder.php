<?php

use Illuminate\Database\Seeder;
use App\TextData;
class TextdataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dean=new TextData();
        $dean->id="Dean";
        $dean->Name="Prof. Ram Chandra Sapkota";
        $dean->Post="Dean";
        //$deanimgs=[];
        //array_push($deanimgs,"dean.jpg");
        //$dean->imgloc=json_encode($deanimgs);
        $deanmsg=[];
        array_push($deanmsg,"This is my great pleasure to establish the research lab viz. Laboratory for ICT Research and Development (LICT) in our institute. The socio-economic development of the country starts with the level of Excellency in its education system. Institute of Engineering at Tribhuvan University is the one prominent institute which was established in 1984 with the initial motto to produce highly skilled technical human resources for the nation. Now the institute’s objective is added to develop the nation through research and innovation and establish as top ranked university via research, innovation and development. IOE is providing engineering education on several streams via bachelor, masters and Ph.D. program. IOE products are worldwide recognized and working in the top national and international institutions. I am convinced that the establishment of this research and innovation LAB (#LICT) will make our institute more prestigious for the nation and the world.");
        array_push($deanmsg,"Looking into the geographical and demographic condition of our country, Access Network, Electricity and ICT/Automation are the three main pillars of developing the nation. ICT helps to maintain the transparency, efficient public service delivery and the better governance. Nepal is a developing country, where there is several potentials of development by the use of Information and Communication Technologies. Localization of the modern technologies by research and innovation is required for better implementation for our nation. ICT drives the potential development areas like agriculture, mountain engineering, climate change, hydropower etc. for the nation. Hence this lab is established to carry out all the relevant research and development on ICT that are suitable to drive the country’s development and collaborate with national/international research agencies to carry out the world class research.");
        array_push($deanmsg,"I WISH BEST OF LUCK! to the research team led by Prof. Dr. Shashidhar Ram Joshi for their future endeavor.");
        array_push($deanmsg,"Dean, Institute of Engineering, Tribhuvan University, Nepal");
        $dean->text=json_encode($deanmsg);
        $dean->save();
        $chairman=new TextData();
        $chairman->id="Chairman";
        $chairman->Name="Prof. Dr. Shashidhar Ram Joshi.";
        $chairman->Post="Chairman";
        $chimgs=[];
        array_push($chimgs,"chairman.jpg");
        $chairman->imgloc=json_encode($chimgs);
        $chmsg=[];
        array_push($chmsg,"This is my pleasure to announce researchers at IOE and outside that we are running the research lab viz: Laboratory for ICT Research and Development (LICT) with the objective to enhance ICT sectors of Nepal and the worldwide through university research and development. Among several research centers established in IOE, this LAB is effectively the most important one for us to be a step towards excellence and build the nation through ICT & automation. ");
        array_push($chmsg,"Nepal is the world’s most beautiful country by its natural beauty, Himalayas with diverse territory like division of land mostly into three regions as Himal, Pahad and Terai. With the reform of the constitution and entered the Nepal government into federalism, Localized ICT research toward smart villages and the cities are the important steps to be taken towards the development process of the country. ICT is the major backbone for the development of any sector of the nation for which highly efficient technical manpower production, unique research and development towards matching culture, costumes and geographical distributions are the current requirement of our nation. As being the citizens of developing nation, the major challenges for us is to transform the global ICT research into local one suitable as per our requirements. Adaptation towards the rapid change in ICT paradigm like Language Processing & Machine Learning, Next Generation Networking (SDN, IPv6), Wireless Communication, Big Data Technologies, Cloud Computing and Virtualizations, Network and Information Security, Image Processing etc are the requirements of our nation and these are the major focused areas that are being set into priority of LICT. ");
        array_push($chmsg,"I welcome the national and international research communities, individual researchers and professors to have fruitful collaboration with us for any kind of ICT research that leads to Excellency in global ICT research and development. ");
        array_push($chmsg,"Thank You! ");
        array_push($chmsg,"Prof. Dr. Shashidhar Ram Joshi.");
        $chairman->text=json_encode($chmsg);
        $chairman->save();
    }
}
