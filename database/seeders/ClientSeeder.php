<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
       $clients = [
    ['Adrian','Lim','12 Corrales Avenue, Divisoria, Cagayan de Oro','0917-501-0001'],
    ['Beatriz','Sarmiento','24 Capistrano Street, Divisoria, Cagayan de Oro','0917-501-0002'],
    ['Carlos','Neri','36 Burgos Street, Divisoria, Cagayan de Oro','0917-501-0003'],
    ['Diana','Mendoza','48 Rizal Street, Divisoria, Cagayan de Oro','0917-501-0004'],
    ['Emilio','Tagle','60 Tiano Brothers St, Divisoria, Cagayan de Oro','0917-501-0005'],

    ['Felicia','Uy','14 Quirino Avenue, Poblacion, Davao City','0918-502-0006'],
    ['Gilbert','Tan','28 Pelayo Street, Poblacion, Davao City','0918-502-0007'],
    ['Helena','Castillo','42 Ilustre Avenue, Poblacion, Davao City','0918-502-0008'],
    ['Ismael','Ramos','56 San Pedro Street, Poblacion, Davao City','0918-502-0009'],
    ['Jasmine','Velasco','68 Bangoy Street, Poblacion, Davao City','0918-502-0010'],

    ['Kenneth','Abdullah','11 Gov. Camins Avenue, Tetuan, Zamboanga City','0919-503-0011'],
    ['Lourdes','Macapagal','23 Pilar Street, Tetuan, Zamboanga City','0919-503-0012'],
    ['Mario','Dimatulac','35 Alvarez Street, Tetuan, Zamboanga City','0919-503-0013'],
    ['Nerissa','Salvador','47 Valderosa Street, Tetuan, Zamboanga City','0919-503-0014'],
    ['Orlando','Pendatun','59 San Jose Road, Tetuan, Zamboanga City','0919-503-0015'],

    ['Patricia','Lucero','10 Roxas Avenue, Mahayahay, Iligan City','0920-504-0016'],
    ['Quentin','Alog','22 Sabayle Street, Mahayahay, Iligan City','0920-504-0017'],
    ['Roselyn','Arenas','34 Quezon Avenue, Mahayahay, Iligan City','0920-504-0018'],
    ['Samuel','Balindong','46 Tibanga Highway, Mahayahay, Iligan City','0920-504-0019'],
    ['Theresa','Cabili','58 Badelles Street, Mahayahay, Iligan City','0920-504-0020'],

    ['Ulysses','Padua','10 National Highway, Lagao, General Santos','0921-505-0021'],
    ['Vanessa','Soriano','22 Pioneer Avenue, Lagao, General Santos','0921-505-0022'],
    ['Warren','Labrador','34 Roxas Avenue, Lagao, General Santos','0921-505-0023'],
    ['Xenia','Morales','46 Santiago Boulevard, Lagao, General Santos','0921-505-0024'],
    ['Yvette','Cabugao','58 Magsaysay Avenue, Lagao, General Santos','0921-505-0025'],

    ['Zandro','Flores','12 J.C. Aquino Avenue, Libertad, Butuan City','0922-506-0026'],
    ['Angela','Buenavista','24 San Jose Street, Libertad, Butuan City','0922-506-0027'],
    ['Benjie','Calo','36 Montilla Boulevard, Libertad, Butuan City','0922-506-0028'],
    ['Cherry','Magdadaro','48 Villanueva Street, Libertad, Butuan City','0922-506-0029'],
    ['Dennis','Obeso','60 Langihan Road, Libertad, Butuan City','0922-506-0030'],

    ['Elvira','Aguilar','12 Claro M. Recto Street, Cogon, Cagayan de Oro','0923-507-0031'],
    ['Francis','Pimentel','24 Gomez Street, Cogon, Cagayan de Oro','0923-507-0032'],
    ['Grace','Palamine','36 Mabini Street, Cogon, Cagayan de Oro','0923-507-0033'],
    ['Harold','Ladroma','48 Del Pilar Street, Cogon, Cagayan de Oro','0923-507-0034'],
    ['Ivy','Andam','60 Velez Street, Cogon, Cagayan de Oro','0923-507-0035'],

    ['Jerome','Cabahug','10 Colon Street, Parian, Cebu City','0924-508-0036'],
    ['Kristine','Tejada','22 Pelaez Street, Parian, Cebu City','0924-508-0037'],
    ['Leonardo','Maribojoc','34 Manalili Street, Parian, Cebu City','0924-508-0038'],
    ['Marjorie','Ouano','46 Sanciangko Street, Parian, Cebu City','0924-508-0039'],
    ['Nathaniel','Abellanosa','58 Urgello Street, Parian, Cebu City','0924-508-0040'],

    ['Olivia','Javellana','10 Valeria Street, City Proper, Iloilo City','0925-509-0041'],
    ['Paolo','Locsin','22 Delgado Street, City Proper, Iloilo City','0925-509-0042'],
    ['Queenie','Montinola','34 Aldeguer Street, City Proper, Iloilo City','0925-509-0043'],

    ['Rafael','Ledesma','46 Rizal Street, City Proper, Iloilo City','0925-509-0044'],
    ['Sabrina','Jaro','58 General Luna Street, City Proper, Iloilo City','0925-509-0045'],
    ['Tomas','Gustilo','10 Araneta Street, Bacolod Proper, Bacolod City','0926-510-0046'],
    ['Ursina','Lizares','22 Burgos Street, Bacolod Proper, Bacolod City','0926-510-0047'],
    ['Victor','Benedicto','34 San Juan Street, Bacolod Proper, Bacolod City','0926-510-0048'],
    ['Wendy','Montelibano','46 Gonzaga Street, Bacolod Proper, Bacolod City','0926-510-0049'],
    ['Xandro','Javelosa','58 Lacson Street, Bacolod Proper, Bacolod City','0926-510-0050'],

    ['Yasmin','Fortich','18 Corrales Avenue, Divisoria, Cagayan de Oro','0917-511-0051'],
    ['Zoren','Cadano','29 Capistrano Street, Divisoria, Cagayan de Oro','0917-511-0052'],
    ['Aileen','Paloma','41 Mortola Street, Divisoria, Cagayan de Oro','0917-511-0053'],
    ['Bryan','Dadores','53 Burgos Street, Divisoria, Cagayan de Oro','0917-511-0054'],
    ['Celine','Abrera','65 Rizal Street, Divisoria, Cagayan de Oro','0917-511-0055'],

    ['Daryl','Tagud','18 San Pedro Street, Poblacion, Davao City','0918-512-0056'],
    ['Eunice','Cordova','30 Pelayo Street, Poblacion, Davao City','0918-512-0057'],
    ['Ferdinand','Sicat','42 Ponciano Reyes Street, Poblacion, Davao City','0918-512-0058'],
    ['Gina','Estacio','54 Bangoy Street, Poblacion, Davao City','0918-512-0059'],
    ['Harvey','Delfin','66 Quirino Avenue, Poblacion, Davao City','0918-512-0060'],

    ['Imelda','Hadji','18 Pilar Street, Tetuan, Zamboanga City','0919-513-0061'],
    ['Jonas','Abubakar','30 Mayor Jaldon Street, Tetuan, Zamboanga City','0919-513-0062'],
    ['Karen','Jakosalem','42 Alvarez Street, Tetuan, Zamboanga City','0919-513-0063'],
    ['Lawrence','Dimaporo','54 San Jose Road, Tetuan, Zamboanga City','0919-513-0064'],
    ['Mylene','Aquino','66 Valderosa Street, Tetuan, Zamboanga City','0919-513-0065'],

    ['Nolan','Eligan','18 Tibanga Highway, Mahayahay, Iligan City','0920-514-0066'],
    ['Olga','Balt','30 Roxas Avenue, Mahayahay, Iligan City','0920-514-0067'],
    ['Patrick','Camad','42 Sabayle Street, Mahayahay, Iligan City','0920-514-0068'],
    ['Queena','Dinapo','54 Badelles Street, Mahayahay, Iligan City','0920-514-0069'],
    ['Roderick','Alonto','66 Quezon Avenue, Mahayahay, Iligan City','0920-514-0070'],

    ['Sheila','Fuentes','18 National Highway, Lagao, General Santos','0921-515-0071'],
    ['Tristan','Espada','30 Pioneer Avenue, Lagao, General Santos','0921-515-0072'],
    ['Ulyana','Caballero','42 Magsaysay Avenue, Lagao, General Santos','0921-515-0073'],
    ['Vince','Dula','54 Santiago Boulevard, Lagao, General Santos','0921-515-0074'],
    ['Wilma','Padilla','66 National Highway, Lagao, General Santos','0921-515-0075'],

    ['Xavier','Betonio','18 Villanueva Street, Libertad, Butuan City','0922-516-0076'],
    ['Yvonne','Buenaflor','30 J.C. Aquino Avenue, Libertad, Butuan City','0922-516-0077'],
    ['Zaldy','Magdadaro','42 San Francisco Street, Libertad, Butuan City','0922-516-0078'],
    ['Alma','Calo','54 Montilla Boulevard, Libertad, Butuan City','0922-516-0079'],
    ['Bernard','Flores','66 Langihan Road, Libertad, Butuan City','0922-516-0080'],

    ['Clarissa','Ouano','18 Colon Street, Parian, Cebu City','0924-518-0081'],
    ['Dominic','Tejada','30 Pelaez Street, Parian, Cebu City','0924-518-0082'],
    ['Estrella','Cabahug','42 Jakosalem Street, Parian, Cebu City','0924-518-0083'],
    ['Felix','Maribojoc','54 Manalili Street, Parian, Cebu City','0924-518-0084'],
    ['Gemma','Abellanosa','66 Urgello Street, Parian, Cebu City','0924-518-0085'],
];
        foreach ($clients as $index => $c) {

            $email = strtolower($c[0].'.'.$c[1]).'@client.local';

            $user = User::create([
                'name' => $c[0] . ' ' . $c[1],
                'email' => $email,
                'password' => Hash::make('12345678'),
                'role' => 'client',
            ]);

            Client::create([
                'user_id' => $user->id,
                'first_name' => $c[0],
                'last_name'  => $c[1],
                'address'    => $c[2],
                'phone'      => $c[3],
                'email'      => $email,
            ]);
        }
    }
}