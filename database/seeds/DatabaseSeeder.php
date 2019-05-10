<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedUsers();
//         $this->call(UsersTableSeeder::class);
    }

    public function seedUsers()
    {
        $groups = [
            "Matemáticas discretas",
            "Taller de sistemas operativos",
            "Taller de investigación",
            "Lenguajes autómatas",
            "Desarrollo web",
            "Contabilidad",
            "Bases de datos",
            "Administración de bases de datos",
            "Lenguajes de interfaz",
            "Calculo Integral",
            "Calculo diferencial",
            "Calculo vectorial",
        ];

        DB::table('permission')->insert([
            ['name' => "Profesor"],
            ['name' => "Alumno"]
        ]);

        DB::table('rol')->insert([
            ['name' => "Profesor"],
            ['name' => "Alumno"]
        ]);

        DB::table('day')->insert([
            ['name' => "Lunes"],
            ['name' => "Martes"],
            ['name' => "Miercoles"],
            ['name' => "Jueves"],
            ['name' => "Viernes"]
        ]);
        for ($i = 0; $i < 20; $i++) {
            $userId = DB::table('user')->insertGetId(
                [
                    'name' => \Faker\Factory::create()->name,
                    'username' => "1428048" . $i,
                    'rfid' => "1428048" . $i,
                    'last_name' => \Faker\Factory::create()->lastName,
                    'password' => bcrypt("pw0000"),
                    'email' => \Faker\Factory::create()->email,
                    'fk_id_rol' => 1,
                ]
            );

            for ($j = 0; $j < 10; $j++) {
                $groupId = DB::table('group')->insertGetId(
                    [
                        "name" => $groups[rand(0, 11)],
                        "start_hour" => rand(7, 9) . ":00:00",
                        "end_hour" => rand(10, 15) . ":00:00",
                    ]
                );
                for ($k = 0; $k < 4; $k++) {
                    DB::table('group_has_day')->insert(
                        [
                            'fk_id_group' => $groupId,
                            'fk_id_day' => rand(1, 5)
                        ]);
                }

                DB::table('user_has_group')->insertGetId(
                    [
                        'fk_id_user' => $userId,
                        'fk_id_group' => $groupId,
                        'fk_id_permission' => 1,
                    ]
                );
            }
        }
    }
}
