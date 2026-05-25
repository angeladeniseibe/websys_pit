<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // ============================================================
        // MANAGERS
        // ============================================================
        User::updateOrCreate(
            ['email' => 'jose.reyes@test.com'],
            ['name' => 'Jose Reyes Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B001', 'staff_id' => 'ST006']
        );
        User::updateOrCreate(
            ['email' => 'maria.santos@test.com'],
            ['name' => 'Maria Santos Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B002', 'staff_id' => 'ST013']
        );
        User::updateOrCreate(
            ['email' => 'ricardo.cruz@test.com'],
            ['name' => 'Ricardo Cruz Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B003', 'staff_id' => 'ST019']
        );
        User::updateOrCreate(
            ['email' => 'lorna.garcia@test.com'],
            ['name' => 'Lorna Garcia Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B004', 'staff_id' => 'ST025']
        );
        User::updateOrCreate(
            ['email' => 'eduardo.mendoza@test.com'],
            ['name' => 'Eduardo Mendoza Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B005', 'staff_id' => 'ST031']
        );
        User::updateOrCreate(
            ['email' => 'rosario.delacruz@test.com'],
            ['name' => 'Rosario Dela Cruz Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B006', 'staff_id' => 'ST037']
        );
        User::updateOrCreate(
            ['email' => 'antonio.villanueva@test.com'],
            ['name' => 'Antonio Villanueva Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B007', 'staff_id' => 'ST043']
        );
        User::updateOrCreate(
            ['email' => 'caridad.fernandez@test.com'],
            ['name' => 'Caridad Fernandez Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B008', 'staff_id' => 'ST049']
        );
        User::updateOrCreate(
            ['email' => 'domingo.bautista@test.com'],
            ['name' => 'Domingo Bautista Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B009', 'staff_id' => 'ST055']
        );
        User::updateOrCreate(
            ['email' => 'natividad.ramos@test.com'],
            ['name' => 'Natividad Ramos Manager', 'password' => ('12345678'), 'role' => 'manager', 'branch_no' => 'B010', 'staff_id' => 'ST061']
        );

        // ============================================================
        // SUPERVISORS
        // ============================================================
        User::updateOrCreate(
            ['email' => 'ana.macaraeg@test.com'],
            ['name' => 'Ana Macaraeg Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B001', 'staff_id' => 'ST007']
        );
        User::updateOrCreate(
            ['email' => 'ramon.abad@test.com'],
            ['name' => 'Ramon Abad Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B002', 'staff_id' => 'ST062']
        );
        User::updateOrCreate(
            ['email' => 'corazon.tan@test.com'],
            ['name' => 'Corazon Tan Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B003', 'staff_id' => 'ST063']
        );
        User::updateOrCreate(
            ['email' => 'rolando.pascual@test.com'],
            ['name' => 'Rolando Pascual Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B004', 'staff_id' => 'ST064']
        );
        User::updateOrCreate(
            ['email' => 'luzviminda.ocampo@test.com'],
            ['name' => 'Luzviminda Ocampo Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B005', 'staff_id' => 'ST065']
        );
        User::updateOrCreate(
            ['email' => 'bernardo.flores@test.com'],
            ['name' => 'Bernardo Flores Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B006', 'staff_id' => 'ST066']
        );
        User::updateOrCreate(
            ['email' => 'milagros.aguilar@test.com'],
            ['name' => 'Milagros Aguilar Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B007', 'staff_id' => 'ST067']
        );
        User::updateOrCreate(
            ['email' => 'teofilo.navarro@test.com'],
            ['name' => 'Teofilo Navarro Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B008', 'staff_id' => 'ST068']
        );
        User::updateOrCreate(
            ['email' => 'salvacion.peralta@test.com'],
            ['name' => 'Salvacion Peralta Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B009', 'staff_id' => 'ST069']
        );
        User::updateOrCreate(
            ['email' => 'florencio.espinosa@test.com'],
            ['name' => 'Florencio Espinosa Supervisor', 'password' => ('12345678'), 'role' => 'supervisor', 'branch_no' => 'B010', 'staff_id' => 'ST070']
        );

        // ============================================================
        // SECRETARIES
        // ============================================================

        // B001
        User::updateOrCreate(
            ['email' => 'carmen.ilustre@test.com'],
            ['name' => 'Carmen Ilustre Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B001', 'staff_id' => 'ST003']
        );
        User::updateOrCreate(
            ['email' => 'fe.abrera@test.com'],
            ['name' => 'Fe Abrera Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B001', 'staff_id' => 'ST005']
        );

        // B002
        User::updateOrCreate(
            ['email' => 'herminia.teves@test.com'],
            ['name' => 'Herminia Teves Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B002', 'staff_id' => 'ST009']
        );
        User::updateOrCreate(
            ['email' => 'julieta.manalang@test.com'],
            ['name' => 'Julieta Manalang Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B002', 'staff_id' => 'ST011']
        );

        // B003
        User::updateOrCreate(
            ['email' => 'norma.estrada@test.com'],
            ['name' => 'Norma Estrada Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B003', 'staff_id' => 'ST016']
        );
        User::updateOrCreate(
            ['email' => 'pacita.aquino@test.com'],
            ['name' => 'Pacita Aquino Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B003', 'staff_id' => 'ST018']
        );

        // B004
        User::updateOrCreate(
            ['email' => 'rosalinda.bacarro@test.com'],
            ['name' => 'Rosalinda Bacarro Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B004', 'staff_id' => 'ST021']
        );
        User::updateOrCreate(
            ['email' => 'teresita.cabili@test.com'],
            ['name' => 'Teresita Cabili Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B004', 'staff_id' => 'ST023']
        );

        // B005
        User::updateOrCreate(
            ['email' => 'veronica.sorongon@test.com'],
            ['name' => 'Veronica Sorongon Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B005', 'staff_id' => 'ST026']
        );
        User::updateOrCreate(
            ['email' => 'ximena.labrador@test.com'],
            ['name' => 'Ximena Labrador Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B005', 'staff_id' => 'ST028']
        );

        // B006
        User::updateOrCreate(
            ['email' => 'belinda.magdadaro@test.com'],
            ['name' => 'Belinda Magdadaro Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B006', 'staff_id' => 'ST033']
        );
        User::updateOrCreate(
            ['email' => 'divina.betonio@test.com'],
            ['name' => 'Divina Betonio Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B006', 'staff_id' => 'ST035']
        );

        // B007
        User::updateOrCreate(
            ['email' => 'honoria.deiparine@test.com'],
            ['name' => 'Honoria Deiparine Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B007', 'staff_id' => 'ST040']
        );
        User::updateOrCreate(
            ['email' => 'jovita.ladroma@test.com'],
            ['name' => 'Jovita Ladroma Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B007', 'staff_id' => 'ST042']
        );

        // B008
        User::updateOrCreate(
            ['email' => 'lolita.maribojoc@test.com'],
            ['name' => 'Lolita Maribojoc Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B008', 'staff_id' => 'ST045']
        );
        User::updateOrCreate(
            ['email' => 'nena.ouano@test.com'],
            ['name' => 'Nena Ouano Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B008', 'staff_id' => 'ST047']
        );

        // B009
        User::updateOrCreate(
            ['email' => 'remedios.ledesma@test.com'],
            ['name' => 'Remedios Ledesma Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B009', 'staff_id' => 'ST052']
        );
        User::updateOrCreate(
            ['email' => 'teofania.locsin@test.com'],
            ['name' => 'Teofania Locsin Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B009', 'staff_id' => 'ST054']
        );

        // B010
        User::updateOrCreate(
            ['email' => 'wenifreda.lizares@test.com'],
            ['name' => 'Wenifreda Lizares Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B010', 'staff_id' => 'ST058']
        );
        User::updateOrCreate(
            ['email' => 'yolanda.montelibano@test.com'],
            ['name' => 'Yolanda Montelibano Secretary', 'password' => ('12345678'), 'role' => 'secretary', 'branch_no' => 'B010', 'staff_id' => 'ST060']
        );

        // ============================================================
        // STAFF
        // ============================================================

        // B001
        User::updateOrCreate(
            ['email' => 'alicia.magno@test.com'],
            ['name' => 'Alicia Magno Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B001', 'staff_id' => 'ST001']
        );
        User::updateOrCreate(
            ['email' => 'bruno.salazar@test.com'],
            ['name' => 'Bruno Salazar Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B001', 'staff_id' => 'ST002']
        );
        User::updateOrCreate(
            ['email' => 'danilo.lumapas@test.com'],
            ['name' => 'Danilo Lumapas Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B001', 'staff_id' => 'ST004']
        );
        User::updateOrCreate(
            ['email' => 'gerry.paloma@test.com'],
            ['name' => 'Gerry Paloma Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B001', 'staff_id' => 'ST071']
        );
        User::updateOrCreate(
            ['email' => 'helen.dadores@test.com'],
            ['name' => 'Helen Dadores Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B001', 'staff_id' => 'ST072']
        );
        User::updateOrCreate(
            ['email' => 'ignacio.cadano@test.com'],
            ['name' => 'Ignacio Cadano Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B001', 'staff_id' => 'ST073']
        );
        User::updateOrCreate(
            ['email' => 'josefa.fortich@test.com'],
            ['name' => 'Josefa Fortich Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B001', 'staff_id' => 'ST074']
        );

        // B002
        User::updateOrCreate(
            ['email' => 'gregorio.enriquez@test.com'],
            ['name' => 'Gregorio Enriquez Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B002', 'staff_id' => 'ST008']
        );
        User::updateOrCreate(
            ['email' => 'ireneo.gabutan@test.com'],
            ['name' => 'Ireneo Gabutan Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B002', 'staff_id' => 'ST010']
        );
        User::updateOrCreate(
            ['email' => 'karlos.delfin@test.com'],
            ['name' => 'Karlos Delfin Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B002', 'staff_id' => 'ST012']
        );
        User::updateOrCreate(
            ['email' => 'leona.sicat@test.com'],
            ['name' => 'Leona Sicat Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B002', 'staff_id' => 'ST075']
        );
        User::updateOrCreate(
            ['email' => 'manuel.estacio@test.com'],
            ['name' => 'Manuel Estacio Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B002', 'staff_id' => 'ST076']
        );
        User::updateOrCreate(
            ['email' => 'nida.cordova@test.com'],
            ['name' => 'Nida Cordova Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B002', 'staff_id' => 'ST077']
        );
        User::updateOrCreate(
            ['email' => 'oscar.tagud@test.com'],
            ['name' => 'Oscar Tagud Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B002', 'staff_id' => 'ST078']
        );

        // B003
        User::updateOrCreate(
            ['email' => 'ligaya.suarez@test.com'],
            ['name' => 'Ligaya Suarez Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B003', 'staff_id' => 'ST014']
        );
        User::updateOrCreate(
            ['email' => 'marcelo.abdurahim@test.com'],
            ['name' => 'Marcelo Abdurahim Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B003', 'staff_id' => 'ST015']
        );
        User::updateOrCreate(
            ['email' => 'onofre.jakosalem@test.com'],
            ['name' => 'Onofre Jakosalem Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B003', 'staff_id' => 'ST017']
        );
        User::updateOrCreate(
            ['email' => 'quintin.abubakar@test.com'],
            ['name' => 'Quintin Abubakar Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B003', 'staff_id' => 'ST079']
        );
        User::updateOrCreate(
            ['email' => 'rizalina.hadji@test.com'],
            ['name' => 'Rizalina Hadji Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B003', 'staff_id' => 'ST080']
        );
        User::updateOrCreate(
            ['email' => 'salome.pendatun@test.com'],
            ['name' => 'Salome Pendatun Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B003', 'staff_id' => 'ST081']
        );
        User::updateOrCreate(
            ['email' => 'tomas.dimaporo@test.com'],
            ['name' => 'Tomas Dimaporo Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B003', 'staff_id' => 'ST082']
        );

        // B004
        User::updateOrCreate(
            ['email' => 'quirino.lucasan@test.com'],
            ['name' => 'Quirino Lucasan Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B004', 'staff_id' => 'ST020']
        );
        User::updateOrCreate(
            ['email' => 'severino.palmagil@test.com'],
            ['name' => 'Severino Palma Gil Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B004', 'staff_id' => 'ST022']
        );
        User::updateOrCreate(
            ['email' => 'urbano.alonto@test.com'],
            ['name' => 'Urbano Alonto Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B004', 'staff_id' => 'ST024']
        );
        User::updateOrCreate(
            ['email' => 'vivencia.balt@test.com'],
            ['name' => 'Vivencia Balt Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B004', 'staff_id' => 'ST083']
        );
        User::updateOrCreate(
            ['email' => 'wilson.camad@test.com'],
            ['name' => 'Wilson Camad Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B004', 'staff_id' => 'ST084']
        );
        User::updateOrCreate(
            ['email' => 'xyza.dinapo@test.com'],
            ['name' => 'Xyza Dinapo Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B004', 'staff_id' => 'ST085']
        );
        User::updateOrCreate(
            ['email' => 'ysmael.eligan@test.com'],
            ['name' => 'Ysmael Eligan Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B004', 'staff_id' => 'ST086']
        );

        // B005
        User::updateOrCreate(
            ['email' => 'wilfredo.tamayo@test.com'],
            ['name' => 'Wilfredo Tamayo Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B005', 'staff_id' => 'ST027']
        );
        User::updateOrCreate(
            ['email' => 'yusop.alano@test.com'],
            ['name' => 'Yusop Alano Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B005', 'staff_id' => 'ST029']
        );
        User::updateOrCreate(
            ['email' => 'zenaida.padilla@test.com'],
            ['name' => 'Zenaida Padilla Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B005', 'staff_id' => 'ST030']
        );
        User::updateOrCreate(
            ['email' => 'arsenio.caballero@test.com'],
            ['name' => 'Arsenio Caballero Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B005', 'staff_id' => 'ST087']
        );
        User::updateOrCreate(
            ['email' => 'belen.dula@test.com'],
            ['name' => 'Belen Dula Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B005', 'staff_id' => 'ST088']
        );
        User::updateOrCreate(
            ['email' => 'calixto.espada@test.com'],
            ['name' => 'Calixto Espada Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B005', 'staff_id' => 'ST089']
        );
        User::updateOrCreate(
            ['email' => 'diwata.fuentes@test.com'],
            ['name' => 'Diwata Fuentes Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B005', 'staff_id' => 'ST090']
        );

        // B006
        User::updateOrCreate(
            ['email' => 'alfredo.calo@test.com'],
            ['name' => 'Alfredo Calo Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B006', 'staff_id' => 'ST032']
        );
        User::updateOrCreate(
            ['email' => 'crisanto.obeso@test.com'],
            ['name' => 'Crisanto Obeso Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B006', 'staff_id' => 'ST034']
        );
        User::updateOrCreate(
            ['email' => 'eliseo.buenaflor@test.com'],
            ['name' => 'Eliseo Buenaflor Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B006', 'staff_id' => 'ST036']
        );

        // B007
        User::updateOrCreate(
            ['email' => 'florinda.palamine@test.com'],
            ['name' => 'Florinda Palamine Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B007', 'staff_id' => 'ST038']
        );
        User::updateOrCreate(
            ['email' => 'gaudencio.andam@test.com'],
            ['name' => 'Gaudencio Andam Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B007', 'staff_id' => 'ST039']
        );
        User::updateOrCreate(
            ['email' => 'isidro.pimentel@test.com'],
            ['name' => 'Isidro Pimentel Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B007', 'staff_id' => 'ST041']
        );

        // B008
        User::updateOrCreate(
            ['email' => 'karlo.tejada@test.com'],
            ['name' => 'Karlo Tejada Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B008', 'staff_id' => 'ST044']
        );
        User::updateOrCreate(
            ['email' => 'macario.abellanosa@test.com'],
            ['name' => 'Macario Abellanosa Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B008', 'staff_id' => 'ST046']
        );
        User::updateOrCreate(
            ['email' => 'olimpio.cabahug@test.com'],
            ['name' => 'Olimpio Cabahug Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B008', 'staff_id' => 'ST048']
        );

        // B009
        User::updateOrCreate(
            ['email' => 'pilar.javellana@test.com'],
            ['name' => 'Pilar Javellana Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B009', 'staff_id' => 'ST050']
        );
        User::updateOrCreate(
            ['email' => 'quirico.montinola@test.com'],
            ['name' => 'Quirico Montinola Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B009', 'staff_id' => 'ST051']
        );
        User::updateOrCreate(
            ['email' => 'salvador.jaro@test.com'],
            ['name' => 'Salvador Jaro Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B009', 'staff_id' => 'ST053']
        );

        // B010
        User::updateOrCreate(
            ['email' => 'ursula.javelosa@test.com'],
            ['name' => 'Ursula Javelosa Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B010', 'staff_id' => 'ST056']
        );
        User::updateOrCreate(
            ['email' => 'vicente.benedicto@test.com'],
            ['name' => 'Vicente Benedicto Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B010', 'staff_id' => 'ST057']
        );
        User::updateOrCreate(
            ['email' => 'xyrus.gustilo@test.com'],
            ['name' => 'Xyrus Gustilo Staff', 'password' => ('12345678'), 'role' => 'staff', 'branch_no' => 'B010', 'staff_id' => 'ST059']
        );
    }
}