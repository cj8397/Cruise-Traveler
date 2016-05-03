<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SailingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sailings')->delete();

        $string = 'Radiance of the Seas,05-08-2016,12-08-2016,Anchorage (Seward)- AK,Vancouver- BC,Alaska
Celebrity Infinity,07-08-2016,14-08-2016,Vancouver- BC,Vancouver- BC,Alaska
Celebrity Solstice,12-08-2016,19-08-2016,Seattle- WA,Seattle- WA,Alaska
Star Princess,13-08-2016,20-08-2016,Vancouver- BC,Anchorage (Whittier)- AK,Alaska
Zaandam,14-08-2016,21-08-2016,Vancouver- BC,Anchorage (Seward)- AK,Alaska
Norwegian Sun,15-08-2016,29-08-2016,Anchorage (Seward)- AK,Anchorage (Seward)- AK,Alaska
Carnival Legend,16-08-2016,23-08-2016,Seattle- WA,Seattle- WA,Alaska
Celebrity Solstice,19-08-2016,26-08-2016,Seattle- WA,Seattle- WA,Alaska
Norwegian Pearl,21-08-2016,28-08-2016,Seattle- WA,Seattle- WA,Alaska
Grand Princess,29-08-2016,08-09-2016,San Francisco- CA,San Francisco- CA,Alaska
Harmony of the Seas,04-08-2016,11-08-2016,Rome (Civitavecchia)- Italy,Rome (Civitavecchia)- Italy,Europe/Mediterranean
Harmony of the Seas,25-08-2016,01-09-2016,Rome (Civitavecchia)- Italy,Rome (Civitavecchia)- Italy,Europe/Mediterranean
Independence of the Seas,27-08-2016,09-09-2016,London (Southampton)- England,London (Southampton)- England,Europe/Mediterranean
Queen Victoria,03-09-2016,17-09-2016,Athens (Piraeus)- Greece,Rome (Civitavecchia)- Italy,Europe/Mediterranean
Norwegian Jade,10-09-2016,24-09-2016,Venice- Italy,Venice- Italy,Europe/Mediterranean
Norwegian Spirit,18-09-2016,30-09-2016,Venice- Italy,Barcelona- Spain,Europe/Mediterranean
Carnival Vista,23-09-2016,01-10-2016,Barcelona- Spain,Barcelona- Spain,Europe/Mediterranean
Queen Victoria,24-09-2016,15-10-2016,Rome (Civitavecchia)- Italy,Rome (Civitavecchia)- Italy,Europe/Mediterranean
Pacific Princess,04-10-2016,16-10-2016,Venice- Italy,Barcelona- Spain,Europe/Mediterranean
Queen Victoria,01-10-2016,15-10-2016,Venice- Italy,Rome (Civitavecchia)- Italy,Europe/Mediterranean
MSC Musica,02-10-2016,13-10-2016,Rome (Civitavecchia)- Italy,Rome (Civitavecchia)- Italy,Europe/Mediterranean
Costa Diadema,03-10-2016,10-10-2016,Barcelona- Spain,Barcelona- Spain,Europe/Mediterranean
MSC Splendida,05-10-2016,12-10-2016,London (Southampton)- England,Genoa- Italy,Europe/Mediterranean
MSC Fantasia,12-10-2016,19-10-2016,Barcelona- Spain,Barcelona- Spain,Europe/Mediterranean
Costa neoRiviera,17-10-2016,24-10-2016,Venice- Italy,Athens (Piraeus)- Greece,Europe/Mediterranean
MSC Splendida,23-10-2016,01-11-2016,Marseille- France,Marseille- France,Europe/Mediterranean
Harmony of the Seas,20-10-2016,23-10-2016,Rome (Civitavecchia)- Italy, Barcelona- Spain,Europe/Mediterranean
Costa neoClassica,22-10-2016,03-11-2016,Savona- Italy,Savona- Italy,Europe/Mediterranean
Pacific Princess,21-11-2016,20-12-2016,Venice- Italy,Fort Lauderdale- FL,Europe/Mediterranean
Pacific Princess,21-11-2016,03-12-2016,Venice- Italy,Rome (Civitavecchia)- Italy,Europe/Mediterranean
Carnival Sunshine,01-08-2016,09-08-2016,New York (Manhattan)- NY,New York (Manhattan)- NY,Caribbean
Carnival Fascination,03-08-2016,10-08-2016,Barbados,Barbados,Caribbean
Oasis of the Seas,20-08-2016,27-08-2016,Fort Lauderdale- FL,Fort Lauderdale- FL,Caribbean
Norwegian Escape,20-08-2016,03-09-2016,Miami- FL,Miami- FL,Caribbean
Carnival Glory,27-08-2016,03-09-2016,Miami- FL,Miami- FL,Caribbean
Norwegian Escape,28-08-2016,10-09-2016,Miami- FL,Miami- FL,Caribbean
Oasis of the Seas,10-09-2016,17-09-2016,Fort Lauderdale- FL,Fort Lauderdale- FL,Caribbean
Norwegian Escape,17-09-2016,24-09-2016,Miami- FL,Miami- FL,Caribbean
Allure of the Seas,18-09-2016,25-09-2016,Fort Lauderdale- FL,Fort Lauderdale- FL,Caribbean
Carnival Magic,24-09-2016,01-10-2016, Port Canaveral- FL, Port Canaveral- FL,Caribbean
Carnival Dream,25-09-2016,02-10-2016,New Orleans- LA,New Orleans- LA,Caribbean
Carnival Breeze,25-09-2016,02-10-2016,Galveston- TX,Galveston- TX,Caribbean
Allure of the Seas,25-09-2016,02-10-2016,Fort Lauderdale- FL,Fort Lauderdale- FL,Caribbean
Oasis of the Seas,01-10-2016,08-10-2016,Fort Lauderdale- FL,Fort Lauderdale- FL,Caribbean
Allure of the Seas,09-10-2016,16-10-2016,Fort Lauderdale- FL,Fort Lauderdale- FL,Caribbean
Norwegian Dawn,28-10-2016,11-11-2016,Boston- MA,New Orleans- LA,Caribbean
Allure of the Seas,30-10-2016,06-11-2016,Fort Lauderdale- FL,Fort Lauderdale- FL,Caribbean
Norwegian Gem,06-11-2016,20-11-2016,San Juan- Puerto Rico,San Juan- Puerto Rico,Caribbean
Norwegian Epic,19-11-2016,03-12-2016,Port Canaveral- FL,Port Canaveral- FL,Caribbean
Norwegian Gem,20-11-2016,04-12-2016,San Juan- Puerto Rico,San Juan- Puerto Rico,Caribbean';

        $data = str_getcsv($string, "\n");
        // dd($data);
        foreach($data as $row) {
            $sailingInfo = explode(",", $row);
            // [0]cruiseline [1]start_date [2]end_date [3]port_org [4]port_dest [5]desination
            // var_dump($sailingInfo[0]);
            DB::table('sailings')->insert([
                'cruise_line' => $sailingInfo[0],
                'start_date' => new DateTime($sailingInfo[1]),
                'end_date' => new DateTime($sailingInfo[2]),
                'port_org' => $sailingInfo[3],
                'port_dest' => $sailingInfo[4],
                'destination' => $sailingInfo[5],
            ]);
        }
//        $cruiselines = ['Seabreeze', 'Starboard', 'Bluestar'];
//        $faker = Faker::create();
//        foreach (range(1, 50) as $i) {
//            DB::table('sailings')->insert([
//                'cruise_line' => $cruiselines[($i % 3)],
//                'start_date' => $faker->dateTimeBetween($startDate = '+30 days', $endDate='+60 days'),
//                'end_date' => $faker->dateTimeBetween($startDate = '+60 days', $endDate='+90 days'),
//                'port_org' => 'Vancouver',
//                'port_dest' => $faker->city(),
//                'destination' => 'Vacation',
//            ]);
//        }
    }
}
