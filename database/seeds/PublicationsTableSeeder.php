<?php

use Illuminate\Database\Seeder;
use App\Publications;
class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publication=new Publications();
        $publication->id=1;
        $publication->text="Babu Ram Dawadi, Danda B. Rawat, Shashidhar Ram Joshi and Martina Keitsch, \"Recommendations for Energy Efficient SoDIP6 Network Deployment at the Early Stage Rural ICT Expansion of Nepal,\" Proc. of the 2019 International Conference on Computing, Networking and Communications (ICNC): Green Computing, Networking, and Communications, February 18-21, 2019, Honolulu, Hawaii, USA.";
        $publication->save();
        $publication=new Publications();
        $publication->id=2;
        $publication->text="Babu Ram Dawadi, Danda B. Rawat, Shashidhar Ram Joshi and Martina Keitsch, \"Joint Cost Estimation Approach for Service Provider Legacy Network Migration to Unified Software Defined IPv6 Network,\" Proc. of the 2018 IEEE International Conference on Collaboration and Internet Computing (IEEE CIC 2018) and International Workshop on ​Technology Convergence for Smart Cities ​(TeC4C 2018), Oct 18 - 20, 2018, Philadelphia, Pennsylvania, USA.";
        $publication->save();
        $publication=new Publications();
        $publication->id=3;
        $publication->text="Dipak K.C., Babu Ram Dawadi, (2017). Packet Loss Recovery and Control for VoIP. International Journal of Science and Research (IJSR), Volume 6 Issue 5, May 2017, 1804 – 1808";
        $publication->save();
        $publication=new Publications();
        $publication->id=4;
        $publication->text="Ram Chandra Panday, Babu Ram Dawadi, Suman Sharma, Abinash Basnet (2017). Dictionary Based Nepali Word Recognition using Neural Network, International Journal of Scientific & Engineering Research, Volume 8, Issue 5, May-2017 ISSN 2229-5518";
        $publication->save();
        $publication=new Publications();
        $publication->id=5;
        $publication->text="Sanjeeb Prasad Panday: “A History of Amateur Radio in Nepal_and Lessons Learned from the Gorkha Earthquake”, GNPN Journal, a semi-annual publication, First Edition, January (2017).";
        $publication->save();
        $publication=new Publications();
        $publication->id=6;
        $publication->text="Babu Ram Dawadi, Daya Sagar Baral, (2017). Towards Automation in the Admission Process as a Tool to Enhance Quality of Engineering Education at Tribhuvan University. Journal of the Institute of Engineering, 13(1), Kathmandu, Nepal.";
        $publication->save();
        $publication=new Publications();
        $publication->id=7;
        $publication->text="Babu Ram Dawadi, Ram Chandra Sapkota, Triratna Bajracharya (2017). Restructuring Examination System of IOE for Establishing Center of Excellency in Engineering Education. Journal of the Institute of Engineering, 13(1), Kathmandu, Nepal";
        $publication->save();
    }
}
