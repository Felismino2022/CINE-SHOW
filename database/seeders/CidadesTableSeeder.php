<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidades = [
            // Municípios de Angola - Província do Bengo
            ['nome' => 'Ambriz', 'provincia_id' => 1],
            ['nome' => 'Bula Atumba', 'provincia_id' => 1],
            ['nome' => 'Dande', 'provincia_id' => 1],
            ['nome' => 'Nambuangongo', 'provincia_id' => 1],
            ['nome' => 'Pango Aluquém', 'provincia_id' => 1],
            ['nome' => 'Dembos', 'provincia_id' => 1],
            //fim

            // Municípios de Angola - Província de Benguela
            ['nome' => 'Benguela', 'provincia_id' => 2],
            ['nome' => 'Lobito', 'provincia_id' => 2],
            ['nome' => 'Baía Farta', 'provincia_id' => 2],
            ['nome' => 'Balombo', 'provincia_id' => 2],
            ['nome' => 'Bocoio', 'provincia_id' => 2],
            ['nome' => 'Caimbambo', 'provincia_id' => 2],
            ['nome' => 'Catumbela', 'provincia_id' => 2],
            ['nome' => 'Chongoroi', 'provincia_id' => 2],
            ['nome' => 'Cubal', 'provincia_id' => 2],
            ['nome' => 'Ganda', 'provincia_id' => 2],
            //fim

            // Municípios de Angola - Província de Bie
            ['nome' => 'Andulo', 'provincia_id' => 3],
            ['nome' => 'Camacupa', 'provincia_id' => 3],
            ['nome' => 'Catabola', 'provincia_id' => 3],
            ['nome' => 'Chinguar', 'provincia_id' => 3],
            ['nome' => 'Chitembo', 'provincia_id' => 3],
            ['nome' => 'Cuemba', 'provincia_id' => 3],
            ['nome' => 'Cunhinga', 'provincia_id' => 3],
            ['nome' => 'Kuito', 'provincia_id' => 3],
            ['nome' => 'Nharea', 'provincia_id' => 3],
            //fim

            //Cabinda
            ['nome' => 'Belize', 'provincia_id' => 4],
            ['nome' => 'Cabinda', 'provincia_id' => 4],
            ['nome' => 'Cacongo', 'provincia_id' => 4],
            ['nome' => 'Buco Zau', 'provincia_id' => 4],
            //fim

            //Cuando Kubango
            ['nome' => 'Calai', 'provincia_id' => 5],
            ['nome' => 'Cuangar', 'provincia_id' => 5],
            ['nome' => 'Cuchi', 'provincia_id' => 5],
            ['nome' => 'Cuito Cuanavale', 'provincia_id' => 5],
            ['nome' => 'Dirico', 'provincia_id' => 5],
            ['nome' => 'Menongue', 'provincia_id' => 5],
            ['nome' => 'Nancova', 'provincia_id' => 5],
            ['nome' => 'Mavinga', 'provincia_id' => 5],
            ['nome' => 'Rivungo', 'provincia_id' => 5],
            //fim

              //Cuanza Norte
              ['nome' => 'Ambaca', 'provincia_id' => 6],
              ['nome' => 'Banga', 'provincia_id' => 6],
              ['nome' => 'Bolongongo', 'provincia_id' => 6],
              ['nome' => 'Cambambe', 'provincia_id' => 6],
              ['nome' => 'Golungo Alto', 'provincia_id' => 6],
              ['nome' => 'Lucala', 'provincia_id' => 6],
              ['nome' => 'Quiculungo', 'provincia_id' => 6],
              ['nome' => 'Samba Caju', 'provincia_id' => 6],
              ['nome' => 'Cazengo', 'provincia_id' => 6],
              ['nome' => 'Ngonguembo', 'provincia_id' => 6],
              //fim

            //Cuanza Sul
            ['nome' => 'Amboim', 'provincia_id' => 7],
            ['nome' => 'Cela', 'provincia_id' => 7],
            ['nome' => 'Conda', 'provincia_id' => 7],
            ['nome' => 'Ebo', 'provincia_id' => 7],
            ['nome' => 'Libolo ', 'provincia_id' => 7],
            ['nome' => 'Mussende', 'provincia_id' => 7],
            ['nome' => 'Porto Amboim', 'provincia_id' => 7],
            ['nome' => 'Quibala', 'provincia_id' => 7],
            ['nome' => 'Quilenda', 'provincia_id' => 7],
            ['nome' => 'Seles', 'provincia_id' => 7],
            ['nome' => 'Cassongue', 'provincia_id' => 7],
            ['nome' => 'Sumbe', 'provincia_id' => 7],
            //fim

            //Cunene
            ['nome' => 'Cahama', 'provincia_id' => 8],
            ['nome' => 'Curoca', 'provincia_id' => 8],
            ['nome' => 'Cuvelai', 'provincia_id' => 8],
            ['nome' => 'Namacunde', 'provincia_id' => 8],
            ['nome' => 'Ombadja ', 'provincia_id' => 8],
            ['nome' => 'Cuanhama', 'provincia_id' => 8],
            //fim

            //Huambo
            ['nome' => 'Bailundo', 'provincia_id' => 9],
            ['nome' => 'Cachiungo', 'provincia_id' => 9],
            ['nome' => 'Caála', 'provincia_id' => 9],
            ['nome' => 'Ecunha', 'provincia_id' => 9],
            ['nome' => 'Longonjo ', 'provincia_id' => 9],
            ['nome' => 'Mungo', 'provincia_id' => 9],
            ['nome' => 'chicala-Cholohanga', 'provincia_id' => 9],
            ['nome' => 'Ucuma', 'provincia_id' => 9],
            ['nome' => 'Chinjenje', 'provincia_id' => 9],
            ['nome' => 'Huambo ', 'provincia_id' => 9],
            ['nome' => 'Londuimbali', 'provincia_id' => 9],
            //fim

             //Huila
             ['nome' => 'Caconda', 'provincia_id' => 10],
             ['nome' => 'Cacula', 'provincia_id' => 10],
             ['nome' => 'Caluquembe', 'provincia_id' => 10],
             ['nome' => 'Chicomba', 'provincia_id' => 10],
             ['nome' => 'Chipindo ', 'provincia_id' => 10],
             ['nome' => 'Humpata', 'provincia_id' => 10],
             ['nome' => 'Lubango', 'provincia_id' => 10],
             ['nome' => 'Matala', 'provincia_id' => 10],
             ['nome' => 'Quilengues', 'provincia_id' => 10],
             ['nome' => 'Quipungo ', 'provincia_id' => 10],
             ['nome' => 'Lubango', 'provincia_id' => 10],
             ['nome' => 'Jamba', 'provincia_id' => 10],
             ['nome' => 'Cuvango ', 'provincia_id' => 10],
             ['nome' => 'Gambos', 'provincia_id' => 10],
             //fim

             //Luanda
             ['nome' => 'Belas', 'provincia_id' => 11],
             ['nome' => 'Cacuaco', 'provincia_id' => 11],
             ['nome' => 'Cazenga', 'provincia_id' => 11],
             ['nome' => 'Ícolo e Bengo', 'provincia_id' => 11],
             ['nome' => 'Luanda ', 'provincia_id' => 11],
             ['nome' => 'Quiçama', 'provincia_id' => 11],
             ['nome' => 'Viana', 'provincia_id' => 11],
             ['nome' => 'Talatona', 'provincia_id' => 11],
             ['nome' => 'Kilamba Kiaxi', 'provincia_id' => 11],
             //fim

             //Lunda Norte
             ['nome' => 'Capenda Camulemba', 'provincia_id' => 12],
             ['nome' => 'Caungula', 'provincia_id' => 12],
             ['nome' => 'Chitato', 'provincia_id' => 12],
             ['nome' => 'Cuango', 'provincia_id' => 12],
             ['nome' => 'Lubalo ', 'provincia_id' => 12],
             ['nome' => 'Cambulo', 'provincia_id' => 12],
             ['nome' => 'Lucapa', 'provincia_id' => 12],
             ['nome' => 'Cuilo', 'provincia_id' => 12],
             ['nome' => 'Lóvua', 'provincia_id' => 12],
             ['nome' => 'Xá Muteba', 'provincia_id' => 12],
             //fim

             //Lunda Sul
             ['nome' => 'Cacolo', 'provincia_id' => 13],
             ['nome' => 'Dala', 'provincia_id' => 13],
             ['nome' => 'Muconda', 'provincia_id' => 13],
             ['nome' => 'Saurimo', 'provincia_id' => 13],
             //fim

             //Malanje
             ['nome' => 'Cacuso', 'provincia_id' => 14],
             ['nome' => 'Calandula', 'provincia_id' => 14],
             ['nome' => 'Kiwaba Nzoji', 'provincia_id' => 14],
             ['nome' => 'Malanje', 'provincia_id' => 14],
             ['nome' => 'Marimba', 'provincia_id' => 14],
             ['nome' => 'Massango', 'provincia_id' => 14],
             ['nome' => 'Mucari', 'provincia_id' => 14],
             ['nome' => 'Quirima', 'provincia_id' => 14],
             ['nome' => 'Cambundi Catembo', 'provincia_id' => 14],
             ['nome' => 'Quela', 'provincia_id' => 14],
             ['nome' => 'Cangandala', 'provincia_id' => 14],
             ['nome' => 'Cahombo', 'provincia_id' => 14],
             ['nome' => 'Kunda dya Baze', 'provincia_id' => 14],
             ['nome' => 'Luquembo', 'provincia_id' => 14],
             //fim

             //Moxico
             ['nome' => 'Alto Zambeze', 'provincia_id' => 15],
             ['nome' => 'Bundas', 'provincia_id' => 15],
             ['nome' => 'Camanongue', 'provincia_id' => 15],
             ['nome' => 'Luau', 'provincia_id' => 15],
             ['nome' => 'Luchazes', 'provincia_id' => 15],
             ['nome' => 'Léua', 'provincia_id' => 15],
             ['nome' => 'Moxico', 'provincia_id' => 15],
             ['nome' => 'Cameia', 'provincia_id' => 15],
             //fim

            //Namibe
            ['nome' => 'Bibala', 'provincia_id' => 16],
            ['nome' => 'Camacuio', 'provincia_id' => 16],
            ['nome' => 'Moçâmedes', 'provincia_id' => 16],
            ['nome' => 'Tômbwa', 'provincia_id' => 16],
            ['nome' => 'Virei', 'provincia_id' => 16],
            //fim

             //Uige
             ['nome' => 'Ambuila', 'provincia_id' => 17],
             ['nome' => 'Bembe', 'provincia_id' => 17],
             ['nome' => 'Buengas', 'provincia_id' => 17],
             ['nome' => 'Maquela do Zombo', 'provincia_id' => 17],
             ['nome' => 'Milunga', 'provincia_id' => 17],
             ['nome' => 'Mucaba', 'provincia_id' => 17],
             ['nome' => 'Negage', 'provincia_id' => 17],
             ['nome' => 'Puri', 'provincia_id' => 17],
             ['nome' => 'Quimbele', 'provincia_id' => 17],
             ['nome' => 'Uíge', 'provincia_id' => 17],
             ['nome' => 'Bungo', 'provincia_id' => 17],
             ['nome' => 'Dange-Quitexe', 'provincia_id' => 17],
             ['nome' => 'Pombo', 'provincia_id' => 17],
             ['nome' => 'Alto Cauale', 'provincia_id' => 17],
             ['nome' => 'Damba', 'provincia_id' => 17],
             ['nome' => 'Songo', 'provincia_id' => 17],
            //fim

            //Zaire
            ['nome' => 'Cuimba', 'provincia_id' => 18],
            ['nome' => "M'banza-Kongo", 'provincia_id' => 18],
            ['nome' => 'Nóqui', 'provincia_id' => 18],
            ['nome' => 'Nzeto', 'provincia_id' => 18],
            ['nome' => 'Soyo', 'provincia_id' => 18],
            ['nome' => 'Tomboco', 'provincia_id' => 18],
            //fim

            // Adicione mais cidades conforme necessário
        ];
        
        DB::table('cidades')->insert($cidades);
        
    }

}



