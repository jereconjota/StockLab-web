<?php

use Illuminate\Database\Seeder;
use StockLab\Role;
use StockLab\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user->name = "User";
        $user->username = "user";
        $user->email = "user@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = "Admin";
        $user->username = "adm";
        $user->email = "admin@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_admin);
        
        $user = new User(); 3;
		$user->name = "FiGo";
		$user->username = "figo";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('$admin'); 
		$user->save();
        $user->roles()->attach($role_user);

		$user = new User(); 4;
		$user->name = "Claudia Torrero";
		$user->username = "claudiat";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 5;
		$user->name = "Ernesto Dahinten";
		$user->username = "edahinten";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('3050..');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 6;
		$user->name = "Claudia Ligo";
		$user->username = "claudial";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos'); 
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 7;
		$user->name = "Mabel Correa";
		$user->username = "mabelc";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos'); 
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 8;
		$user->name = "Susana Iturrioz";
		$user->username = "susanai";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 9;
		 $user->name = "Alejandra Rodriguez";
		$user->username = "alejandrar";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);

		$user = new User(); 10;
		$user->name = "Angela Garcia";
		$user->username = "angelag";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 11;
		 $user->name = "Celia Dominguez";
		$user->username = "celiad";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 12;
		$user->name = "Karina Esnoz";
		$user->username = "karinae";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 13;
		$user->name = "Fernanda Macias";
		$user->username = "fernandam";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos'); 
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 14;
		 $user->name = "Brenda Valverdi";
		$user->username = "brendav";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 15;
		 $user->name = "Ariel Chalub";
		$user->username = "arielc";
		$user->email = "figo.desarrollos@gmail.com";
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 16;
		 $user->name = "Soledad Carril";
		$user->username = "soledadc";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "soledadc";
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 17;
		 $user->name = "Sabina Main ";
		$user->username = "sabinam";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 18;
		 $user->name = "Camila Gerace";
		$user->username = "camilag";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 19;
		 $user->name = "Tania Simunovich";
		$user->username = "tanias";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "diagnos17";
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 20;
		 $user->name = "Rocio Toledo";
		$user->username = "rociot";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 21;
		 $user->name = "Maia Contreras";
		$user->username = "maiac";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 22;
		 $user->name = "Mauro Tudesco";
		$user->username = "maurot";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "eduT..";
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 23;
		 $user->name = "Jesica Pico";
		$user->username = "jesicap";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "diagnos19";
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 24;
		 $user->name = "Marcela Martinez";
		$user->username = "marcelam";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 25;
		 $user->name = "Gabriel Ceballos";
		$user->username = "gabrielc";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 26;
		 $user->name = "David Laszeski";
		$user->username = "davidl";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "34363314";
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 27;
		 $user->name = "Agostina Sanchez";
		$user->username = "agostinas";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 28;
		 $user->name = "Micaela Arratia";
		$user->username = "micaa";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "arratia";
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 29;
		 $user->name = "Cecilia Fernandez";
		$user->username = "ceciliaf";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 30;
		 $user->name = "Jonatan Pappalardo";
		$user->username = "jonatanp";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 31;
		 $user->name = "Matias Pujana";
		$user->username = "matiasp";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 32;
		 $user->name = "Lara Asenie";
		$user->username = "laraa";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 33;
		 $user->name = "Brenda Cardenas";
		$user->username = "brendac";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 34;
		 $user->name = "Florencia Oviedo";
		$user->username = "florenciao";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 35;
		 $user->name = "Alain Golovko";
		$user->username = "alaing";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "ALAIN.";
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 36;
		 $user->name = "Juan Ignacio Madronal";
		$user->username = "juanm";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "38517291";
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 37;
		 $user->name = "Francesca Vallega";
		$user->username = "francescav";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt('diagnos');
		$user->save();
        $user->roles()->attach($role_user);
		
		$user = new User(); 38;
		 $user->name = "Arian Didonato";
		$user->username = "ariand";
		$user->email = "figo.desarrollos@gmail.com";
		
		$user->password = bcrypt(''); "123456";
		$user->save();
        $user->roles()->attach($role_user);
		
    }
}
