<?php

use Illuminate\Database\Seeder;
use App\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections=[
            'Armor/Clothing',
            'Weapons',
            'Audio',
            'Character',
            'New Lands',
            'Towns/Cities',
            'Creatures',
            'Crafting',
            'Dungeons',
            'Followers',
            'Items/Objects',
            'Player Homes',
            'Skills/Leveling',
            'Mounts',
            'Models/Textures',
            'NPCs',
            'Immersion',
            'Quests'
        ];

        sort($sections);
        foreach($sections as $sectionName){
            $section = new Section();
            $section->name = $sectionName;
            $section->save();
        }

    }
}
