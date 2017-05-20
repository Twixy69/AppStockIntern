<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

      $this->call('UserTableSeeder');
      $this->command->info('User table seeded!');

      $this->call('AdressTableSeeder');
      $this->command->info('Adress table seeded!');

      $this->call('AffaireTableSeeder');
      $this->command->info('Affaire table seeded!');

      $this->call('LotTableSeeder');
      $this->command->info('Lot table seeded!');

      $this->call('BLTableSeeder');
      $this->command->info('BL table seeded!');

      $this->call('ColisTableSeeder');
      $this->command->info('Colis table seeded!');

      $this->call('PieceTableSeeder');
      $this->command->info('Piece table seeded!');

      $this->call('ColisPieceTableSeeder');
      $this->command->info('RelColPie table seeded!');


      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
      DB::table('users')->truncate();
      DB::table('users')->insert([
        'name' => 'User_1',
        'email'=> 'user@user.com',
        'password' => bcrypt('azerty')
        ]);

    }
}

class AdressTableSeeder extends Seeder {

    public function run()
    {
      DB::table('adresses')->truncate();

      DB::table('adresses')->insert([
        'name' => 'Chantier_1',
        'type' => 'Chantier',
        'number' => '938',
        'street' => 'Boulevard des Tests'
      ]);

      DB::table('adresses')->insert([
        'name' => 'Chantier_2',
        'type' => 'Chantier',
        'number' => '12',
        'street' => 'Boulevard des Idees',
        'postal_code' => '91000',
        'city' => 'Evry Ghetto'
      ]);
    }
}

class AffaireTableSeeder extends Seeder {

    public function run()
    {
      DB::table('affaires')->truncate();
      DB::table('affaires')->insert([
        'ref_affaire' => '6528',
        'created_by' => '1',
        'id_address' => '1'
      ]);

      DB::table('affaires')->insert([
        'ref_affaire' => '6529',
        'created_by' => '1',
        'id_address' => '2'
      ]);
    }
}

class LotTableSeeder extends Seeder {

    public function run()
    {
      DB::table('lots')->truncate();
      DB::table('lots')->insert([
        'id_affaire' => '1',
        'ref_lot'=> 'A',
        'manufactured_weight' => '893',
        'mounted_weight' => '1000',
        'painted_weight' => '1200',
        'sent_selled_weight' => '0',
        'sent_weight' => '500',
        'theorical_weight' => '7500',
        ]);
      DB::table('lots')->insert([
        'id_affaire' => '1',
        'ref_lot'=> 'B',
        'manufactured_weight' => '300',
        'mounted_weight' => '656',
        'painted_weight' => '200',
        'sent_selled_weight' => '0',
        'sent_weight' => '1787',
        'theorical_weight' => '4000',
        ]);
    }
}

class BLTableSeeder extends Seeder {

    public function run()
    {
      DB::table('b_ls')->truncate();
      DB::table('b_ls')->insert([
        'ref' => 'First BL',
      ]);
      DB::table('b_ls')->insert([
        'ref' => 'Second BL',
      ]);
    }
}

class ColisTableSeeder extends Seeder {

    public function run()
    {
      DB::table('colis')->truncate();
      DB::table('colis')->insert([
        'color' => 'green',
        'number' => '6001',
        'state' => 'boxed',
        'weight' => '0',
        'id_b_l' => '1',
        'id_address' => '1'
      ]);

      DB::table('colis')->insert([
        'color' => 'green',
        'number' => '6002',
        'state' => 'boxed',
        'weight' => '0',
        'id_b_l' => '1',
        'id_address' => '1'
      ]);

      DB::table('colis')->insert([
        'color' => 'red',
        'number' => '3291',
        'state' => 'boxed',
        'weight' => '0',
        'id_b_l' => '2',
        'id_address' => '2'
      ]);
    }
}

class PieceTableSeeder extends Seeder {

    public function run()
    {
      DB::table('pieces')->truncate();
      DB::table('pieces')->insert([
        'id_lot' => '1',
        'ref_piece' => '1023',
        'quantity' => '10',
        'unit_weight' => '2',
        'description' => 'Description of piece 1023',
        'created_by' => '1'
      ]);
      DB::table('pieces')->insert([
        'id_lot' => '1',
        'ref_piece' => '1024',
        'quantity' => '2',
        'unit_weight' => '50',
        'description' => 'Description of piece 1024',
        'created_by' => '1'
      ]);
      DB::table('pieces')->insert([
        'id_lot' => '1',
        'ref_piece' => '1025',
        'quantity' => '5',
        'unit_weight' => '125',
        'description' => 'Description of piece 1025',
        'created_by' => '1'
      ]);
      DB::table('pieces')->insert([
        'id_lot' => '2',
        'ref_piece' => '2012',
        'quantity' => '23',
        'unit_weight' => '7',
        'description' => 'Description of piece 2012',
        'created_by' => '1'
      ]);
    }
}


class ColisPieceTableSeeder extends Seeder {

    public function run()
    {
      DB::table('colis_piece')->truncate();

      DB::table('colis_piece')->insert([
        'id_colis' => '1',
        'id_piece'=> '1',
        'quantity' => '3'
      ]);

      DB::table('colis_piece')->insert([
        'id_colis' => '1',
        'id_piece'=> '2',
        'quantity' => '1'
      ]);

      DB::table('colis_piece')->insert([
        'id_colis' => '1',
        'id_piece'=> '3',
        'quantity' => '1'
      ]);

      DB::table('colis_piece')->insert([
        'id_colis' => '2',
        'id_piece'=> '1',
        'quantity' => '5'
      ]);


    }
}
