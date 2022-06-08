<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'id' => 1,
            'name' => 'Luz Salvador',
            'ci' => 3728615,
            'email' => 'koihuddesseiba-4156@gmail.com',            
        ]);
        Customer::create([
            'id' => 2,
            'name' => 'Angel Martinez',
            'ci' => 5870374,
            'email' => 'dattodammoura-3539@hotmail.com',            
        ]);
        Customer::create([
            'id' => 3,
            'name' => 'Augusto Cañizares',
            'ci' => 6054849,
            'email' => 'hahaheyogru-1532@gmail.com',            
        ]);
        Customer::create([
            'id' => 4,
            'name' => 'Luz Salvador',
            'ci' => 4584378,
            'email' => 'goigrauxikeulli-8254@gmail.com',            
        ]);
        Customer::create([
            'id' => 5,
            'name' => 'Jose Enriquez',
            'ci' => 9465764,
            'email' => 'tarehequihe-4077@hotmail.com',            
        ]);
        Customer::create([
            'id' => 6,
            'name' => 'Andrea Veiga',
            'ci' => 7158565,
            'email' => 'sonidaquese-5172@gmail.com',            
        ]);
        Customer::create([
            'id' => 7,
            'name' => 'Fran Redondo',
            'ci' => 2722291,
            'email' => 'trammugokoussu-9625@gmail.com',            
        ]);
        Customer::create([
            'id' => 8,
            'name' => 'Myriam Zabala',
            'ci' => 6149046,
            'email' => 'mappocracroxa-2666@gmail.com',            
        ]);
        Customer::create([
            'id' => 9,
            'name' => 'Raimundo Real',
            'ci' => 9401779,
            'email' => 'diroiteugresso-4718@gmail.com',            
        ]);
        Customer::create([
            'id' => 10,
            'name' => 'Anastasia Morera',
            'ci' => 9813435,
            'email' => 'leiyogoubroile-6562@gmail.com',            
        ]);
        Customer::create([
            'id' => 11,
            'name' => 'Delfina Morales',
            'ci' => 6352280,
            'email' => 'xedoseirave-7549@gmail.com',            
        ]);
        Customer::create([
            'id' => 12,
            'name' => 'Eugenia Toledo',
            'ci' => 2528170,
            'email' => 'waufrefrirappo-5380@gmail.com',            
        ]);
        Customer::create([
            'id' => 13,
            'name' => 'Pedro Pablo Camara',
            'ci' => 2270565,
            'email' => 'trauffagrafrecau-9497@gmail.com',            
        ]);
        Customer::create([
            'id' => 14,
            'name' => 'Piedad de La Cruz',
            'ci' => 1578568,
            'email' => 'yatroifalliza-4145@gmail.com',            
        ]);
        Customer::create([
            'id' => 15,
            'name' => 'Francisco Manuel Quero',
            'ci' => 2526277,
            'email' => 'grouhuranoibra-5116@gmail.com',            
        ]);
        Customer::create([
            'id' => 16,
            'name' => 'Felisa Arellano',
            'ci' => 6629271,
            'email' => 'trobroilauzeti-1969@gmail.com',            
        ]);
        Customer::create([
            'id' => 17,
            'name' => 'Catalina Tudela',
            'ci' => 9545343,
            'email' => 'fixeipredasa-3780@hotmail.com',            
        ]);
        Customer::create([
            'id' => 18,
            'name' => 'Jose Vicente Montero',
            'ci' => 6800088,
            'email' => 'gresageikoye-2106@gmail.com',            
        ]);
        Customer::create([
            'id' => 19,
            'name' => 'Gael Vallejo',
            'ci' => 2216876,
            'email' => 'zogrogatreka-1086@gmail.com',            
        ]);
        Customer::create([
            'id' => 20,
            'name' => 'Constantin Casas',
            'ci' => 2123437,
            'email' => 'frutulleuwita-3772@gmail.com',            
        ]);
        /* Customer::factory(50)->create(); */
    }
}
