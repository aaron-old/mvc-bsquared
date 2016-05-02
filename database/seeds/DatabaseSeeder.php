<?php

use Illuminate\Database\Seeder;
use App\PortfolioMember;
use App\FilePathLookup;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(PortfolioMember::class, 11)->create();
        factor

        $filePaths = [
            ['destination_id'=> '1', 'destination' => 'skills_label_1'],
            ['destination_id'=> '2', 'destination' => 'skills_label_2'],
            ['destination_id'=> '3', 'destination' => 'skills_label_3'],
            ['destination_id'=> '4', 'destination' => 'skills_column_1'],
            ['destination_id'=> '5', 'destination' => 'skills_column_2'],
            ['destination_id'=> '6', 'destination' => 'skills_column_3'],
            ['destination_id'=> '7', 'destination' => 'about_column_1'],
            ['destination_id'=> '8', 'destination' => 'about_column_2'],
            ['destination_id'=> '9', 'destination' => 'about_column_3'],
            ['destination_id'=> '10', 'destination' => 'works_thumb_1'],
            ['destination_id'=> '11', 'destination' => 'works_thumb_2'],
            ['destination_id'=> '12', 'destination' => 'works_thumb_3'],
            ['destination_id'=> '13', 'destination' => 'works_thumb_4'],
            ['destination_id'=> '14', 'destination' => 'works_thumb_5'],
            ['destination_id'=> '15', 'destination' => 'works_thumb_6'],
            ['destination_id'=> '16', 'destination' => 'works_thumb_7'],
            ['destination_id'=> '17', 'destination' => 'works_thumb_8'],
            ['destination_id'=> '18', 'destination' => 'works_thumb_9'],
            ['destination_id'=> '19', 'destination' => 'profile'],
            ['destination_id'=> '20', 'destination' => 'about'],
            ['destination_id'=> '21', 'destination' => 'statement'],
            ['destination_id'=> '22', 'destination' => 'about_label_1'],
            ['destination_id'=> '23', 'destination' => 'about_label_2'],
            ['destination_id'=> '24', 'destination' => 'about_label_3'],
            ['destination_id'=> '25', 'destination' => 'works_preview_1'],
            ['destination_id'=> '26', 'destination' => 'works_preview_2'],
            ['destination_id'=> '27', 'destination' => 'works_preview_3'],
            ['destination_id'=> '28', 'destination' => 'works_preview_4'],
            ['destination_id'=> '29', 'destination' => 'works_preview_5'],
            ['destination_id'=> '30', 'destination' => 'works_preview_6'],
            ['destination_id'=> '31', 'destination' => 'works_preview_7'],
            ['destination_id'=> '32', 'destination' => 'works_preview_8'],
            ['destination_id'=> '33', 'destination' => 'works_preview_9'],
            ['destination_id'=> '35', 'destination' => 'resume'],
            ['destination_id'=> '36', 'destination' => 'portfolio_pictures']
        ];

        foreach($filePaths as $filePath){
            FilePathLookup::create($filePath);
        }
    }
}