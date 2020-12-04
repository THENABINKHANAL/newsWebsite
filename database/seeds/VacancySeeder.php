<?php

use Illuminate\Database\Seeder;
use App\vacancy;
class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacancy=new vacancy();
        $vacancy->Title="Research Assistant";
        $responsibilities=[];
        $requirements=[];
        array_push($responsibilities,"Sint est sit dolore aliquip pariatur exercitation velit duis consequat.");
        array_push($responsibilities,"Ad officia non do nisi consectetur fugiat et incididunt.");
        array_push($responsibilities,"Clipa dolore commodo exercitation fugiat.");
        array_push($responsibilities,"Ex duis laborum consectetur excepteur est nlila enim magna cupidatat.");
        array_push($responsibilities,"Elit elit et et et occaecat consequat enim sit.");
        array_push($requirements,"Nulla qui elit ex anim excepteur voluptate aliquip do.");
        array_push($requirements,"Esse cupidatat pariatur consectetur excepteur quis minim dolor irure.");
        array_push($requirements,"Tempor tempor qui cillum anim incididunt ex commodo ad anim veniam nulla reprehenderit excepteur.");
        array_push($requirements,"Consectetur enim qui minim ex elit commodo tempor enim.");
        array_push($requirements,"Qui amet labore reprehenderit amet ex veniam sint.");
        $vacancy->Responsibilities=json_encode($responsibilities);
        $vacancy->Requirements=json_encode($requirements);
        $vacancy->save();
    }
}
