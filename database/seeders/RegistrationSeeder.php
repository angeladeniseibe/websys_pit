<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;
use App\Models\Client;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $registrations = [

[1,'ST007','B001','2025-01-05','Apartment',12000,'Near downtown area'],
[2,'ST007','B001','2025-01-08','Studio',10000,'Walking distance to school'],
[3,'ST001','B001','2025-01-12','House',18000,'Family of four'],
[4,'ST002','B001','2025-01-18','Condo',22000,'Prefers furnished'],
[5,'ST003','B001','2025-01-25','Apartment',15000,'Near transport terminal'],

[6,'ST062','B002','2025-02-02','Condo',25000,'City center preferred'],
[7,'ST008','B002','2025-02-04','Apartment',14000,'Working professional'],
[8,'ST009','B002','2025-02-08','Studio',9000,'Single occupant'],
[9,'ST010','B002','2025-02-11','House',30000,'With parking'],
[10,'ST011','B002','2025-02-16','Commercial Space',35000,'Small business'],

[11,'ST063','B003','2025-02-20','Apartment',13000,'Near workplace'],
[12,'ST014','B003','2025-02-23','Studio',8500,'Budget rental'],
[13,'ST015','B003','2025-03-01','House',20000,'Two-bedroom minimum'],
[14,'ST016','B003','2025-03-04','Apartment',14500,'Pet allowed'],
[15,'ST017','B003','2025-03-09','Condo',21000,'Modern unit'],

[16,'ST064','B004','2025-03-12','House',23000,'Near school'],
[17,'ST020','B004','2025-03-15','Apartment',12500,'Public transport nearby'],
[18,'ST021','B004','2025-03-18','Studio',9500,'Single professional'],
[19,'ST022','B004','2025-03-22','House',26000,'Large family'],
[20,'ST023','B004','2025-03-25','Commercial Space',40000,'Retail use'],

[21,'ST065','B005','2025-03-30','Apartment',13500,'Accessible location'],
[22,'ST026','B005','2025-04-02','Condo',24000,'Secure building'],
[23,'ST027','B005','2025-04-05','House',22000,'Near market'],
[24,'ST028','B005','2025-04-08','Studio',9000,'Budget option'],
[25,'ST029','B005','2025-04-10','Apartment',15500,'Quiet neighborhood'],

[26,'ST066','B006','2025-04-13','Apartment',12000,'Near branch office'],
[27,'ST032','B006','2025-04-15','Studio',8500,'Solo tenant'],
[28,'ST033','B006','2025-04-18','House',18000,'With small yard'],
[29,'ST034','B006','2025-04-20','Condo',20000,'Modern amenities'],
[30,'ST035','B006','2025-04-23','Apartment',14000,'Two occupants'],

[31,'ST067','B007','2025-04-26','Apartment',15000,'Close to city center'],
[32,'ST038','B007','2025-04-28','Studio',9500,'Affordable rent'],
[33,'ST039','B007','2025-05-01','House',21000,'Family residence'],
[34,'ST040','B007','2025-05-04','Apartment',13500,'Near workplace'],
[35,'ST041','B007','2025-05-06','Condo',25000,'Furnished preferred'],

[36,'ST068','B008','2025-05-08','Condo',28000,'Near business district'],
[37,'ST044','B008','2025-05-10','Apartment',14500,'Working couple'],
[38,'ST045','B008','2025-05-12','Studio',10000,'Short commute'],
[39,'ST046','B008','2025-05-14','Commercial Space',45000,'Cafe operation'],
[40,'ST047','B008','2025-05-16','House',32000,'With garage'],

[41,'ST069','B009','2025-05-18','Apartment',13000,'Close to schools'],
[42,'ST050','B009','2025-05-20','Studio',8500,'Single renter'],
[43,'ST051','B009','2025-05-22','House',21000,'Family use'],
[44,'ST052','B009','2025-05-24','Condo',23000,'Modern facilities'],
[45,'ST053','B009','2025-05-26','Apartment',14000,'Near public market'],

[46,'ST070','B010','2025-05-28','Apartment',15000,'Good neighborhood'],
[47,'ST056','B010','2025-05-30','Studio',9500,'Budget-conscious'],
[48,'ST057','B010','2025-06-02','House',25000,'Needs parking'],
[49,'ST058','B010','2025-06-04','Condo',27000,'Secure location'],
[50,'ST059','B010','2025-06-07','Commercial Space',38000,'Office setup'],

[51,'ST007','B001','2025-06-10','Apartment',12500,'Near university'],
[52,'ST001','B001','2025-06-12','Studio',9500,'Budget rental'],
[53,'ST002','B001','2025-06-14','House',20000,'Family use'],
[54,'ST003','B001','2025-06-16','Apartment',14500,'Accessible location'],
[55,'ST004','B001','2025-06-18','Condo',24000,'Furnished preferred'],

[56,'ST062','B002','2025-06-20','Apartment',15500,'Near downtown'],
[57,'ST008','B002','2025-06-22','House',26000,'Three bedrooms'],
[58,'ST009','B002','2025-06-24','Studio',8500,'Single tenant'],
[59,'ST010','B002','2025-06-26','Commercial Space',42000,'Retail shop'],
[60,'ST011','B002','2025-06-28','Apartment',15000,'Close to office'],

[61,'ST063','B003','2025-07-01','Condo',23000,'Modern unit'],
[62,'ST014','B003','2025-07-03','Apartment',13000,'Near transport'],
[63,'ST015','B003','2025-07-05','House',22000,'With parking'],
[64,'ST016','B003','2025-07-07','Studio',9000,'Budget-friendly'],
[65,'ST017','B003','2025-07-09','Apartment',14500,'Pet allowed'],

[66,'ST064','B004','2025-07-12','House',25000,'Near schools'],
[67,'ST020','B004','2025-07-14','Apartment',13500,'Public transport'],
[68,'ST021','B004','2025-07-16','Studio',9500,'Solo tenant'],
[69,'ST022','B004','2025-07-18','Condo',22000,'Secure building'],
[70,'ST023','B004','2025-07-20','Commercial Space',39000,'Small office'],

[71,'ST065','B005','2025-07-22','Apartment',14500,'Near market'],
[72,'ST026','B005','2025-07-24','Studio',8500,'Low budget'],
[73,'ST027','B005','2025-07-26','House',21000,'Family residence'],
[74,'ST028','B005','2025-07-28','Apartment',15000,'Quiet area'],
[75,'ST029','B005','2025-07-30','Condo',23500,'Modern amenities'],

[76,'ST066','B006','2025-08-02','Apartment',13500,'Near workplace'],
[77,'ST032','B006','2025-08-04','Studio',9000,'Single occupant'],
[78,'ST033','B006','2025-08-06','House',19000,'With yard'],
[79,'ST034','B006','2025-08-08','Apartment',14500,'Accessible location'],
[80,'ST035','B006','2025-08-10','Condo',21500,'Furnished'],

[81,'ST068','B008','2025-08-12','Apartment',16000,'Near city center'],
[82,'ST044','B008','2025-08-14','Studio',9500,'Affordable'],
[83,'ST045','B008','2025-08-16','House',30000,'Family use'],
[84,'ST046','B008','2025-08-18','Commercial Space',47000,'Business operation'],
[85,'ST047','B008','2025-08-20','Condo',26000,'Secure complex'],

[3,'ST007','B001','2025-08-22','Condo',26000,'Updated preference'],
[7,'ST062','B002','2025-08-24','House',28000,'Larger property needed'],
[10,'ST011','B002','2025-08-26','Commercial Space',50000,'Expanded business'],
[14,'ST016','B003','2025-08-28','Apartment',16000,'Closer to work'],
[18,'ST021','B004','2025-08-30','Studio',10000,'Renewed search'],

[22,'ST026','B005','2025-09-02','Condo',26000,'Higher budget'],
[27,'ST032','B006','2025-09-04','Apartment',14500,'Changed preference'],
[31,'ST067','B007','2025-09-06','House',23000,'Family relocation'],
[36,'ST068','B008','2025-09-08','Condo',32000,'Luxury unit'],
[41,'ST069','B009','2025-09-10','Apartment',15000,'Near workplace'],

[45,'ST053','B009','2025-09-12','House',26000,'Additional rooms'],
[50,'ST059','B010','2025-09-14','Commercial Space',45000,'Office expansion'],
[55,'ST004','B001','2025-09-16','Apartment',17000,'Different location'],
[60,'ST011','B002','2025-09-18','Condo',25000,'Secure condo preferred'],
[65,'ST017','B003','2025-09-20','Apartment',15500,'Updated rental range'],
];

        foreach ($registrations as $r) {
            Registration::create([
                'client_id' => $r[0],
                'staff_id'  => $r[1],
                'branch_no' => $r[2],
                'date_registered' => $r[3],
                'preferred_property_type' => $r[4],
                'max_rent' => $r[5],
                'comments' => $r[6],
            ]);
        }
    }
}