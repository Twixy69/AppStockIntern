<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
      $this->call('UserTableSeeder');
      $this->command->info('User table seeded!');

      $this->call('AdressTableSeeder');
      $this->command->info('Adress table seeded!');

      $this->call('AffaireTableSeeder');
      $this->command->info('Affaire table seeded!');

      $this->call('BLTableSeeder');
      $this->command->info('BL table seeded!');

      $this->call('ColisTableSeeder');
      $this->command->info('Colis table seeded!');

      $this->call('PieceTableSeeder');
      $this->command->info('Piece table seeded!');

      /*$this->call('RelColPieTableSeeder');
      $this->command->info('RelColPie table seeded!');*/

    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
      DB::table('users')->delete();
      DB::table('users')->insert([
        'name' => 'User_1',
        'email'=> 'user1@user.com',
        'password' => bcrypt('azerty')
        ]);

    }
}

class AdressTableSeeder extends Seeder {

    public function run()
    {
      //DB::table('users')->delete();

      //User::create(['email' => 'foo@bar.com']);
    }
}

class AffaireTableSeeder extends Seeder {

    public function run()
    {
      //DB::table('users')->delete();

      //User::create(['email' => 'foo@bar.com']);
    }
}

class BLTableSeeder extends Seeder {

    public function run()
    {
      //DB::table('users')->delete();

      //User::create(['email' => 'foo@bar.com']);
    }
}

class ColisTableSeeder extends Seeder {

    public function run()
    {
      //DB::table('users')->delete();

      //User::create(['email' => 'foo@bar.com']);
    }
}

class PieceTableSeeder extends Seeder {

    public function run()
    {
      //DB::table('users')->delete();

      //User::create(['email' => 'foo@bar.com']);
    }
}
