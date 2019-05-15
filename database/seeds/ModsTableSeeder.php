<?php

use Illuminate\Database\Seeder;
use App\Mod;

class ModsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $mods = [
            ['Immersive Armors', 'Immersive Armors seeks to drastically enhance the variety of armors in the world of Skyrim in a lore friendly way. The goal of every set is to blend into the lore, balance, and feel of the game for the most immersive experience possible.', 'https://staticdelivery.nexusmods.com/mods/110/images/19733/19733-1522342050-348069392.png', 'https://www.nexusmods.com/skyrim/mods/19733', 'Hothtrooper44', '1', '1'],

            ['Immersive Weapons', 'Immersive Weapons seeks to drastically enhance the variety of weapons in the world of Skyrim in a lore friendly way. The goal of every addition is to blend into the lore, balance and feel of the game for the most immersive experience possible.', 'https://staticdelivery.nexusmods.com/mods/110/images/27644/27644-1524636946-454923041.png', 'https://www.nexusmods.com/skyrim/mods/27644', 'Hothtrooper44', '18', '2'],

            ['Skyrim HD - 2K Textures', 'The most downloaded high resolution texture mod for skyrim.', 'https://staticdelivery.nexusmods.com/mods/110/images/607-1-1430764261.jpg', 'https://www.nexusmods.com/skyrim/mods/607', 'NebuLa from AHBmods', '10', '1'],

            ['Static Mesh Improvement Mod - SMIM', 'A massive project to greatly improve the appearance of countless static 3D models in Skyrim. Basically, this is my attempt to make the Skyrim architecture, clutter, furniture, and landscaping much nicer.', 'https://staticdelivery.nexusmods.com/mods/110/images/8655-1-1344844621.jpg', 'https://www.nexusmods.com/skyrim/mods/8655', 'Brumbek', '9', '2'],

            ['Apocalypse - Magic of Skyrim', 'Apocalypse is the most popular Skyrim spell pack, adding 155 new spells that are unique, balanced, lore friendly, use high quality custom visuals and blend seamlessly into the vanilla magic system. Also includes scrolls and staves for the new spells.', 'https://staticdelivery.nexusmods.com/mods/110/images/16225-0-1468717885.jpg', 'https://www.nexusmods.com/skyrim/mods/16225', 'EnaiSiaion', '16', '1'],

            ['Realistic Water Two', 'New water surface textures were carefully crafted in an attempt to imitate the fluid motion of water. Lake, pond, river and ocean water are now visually and aurally distinct from each other. Various water effects have also been modified.', 'https://staticdelivery.nexusmods.com/mods/110/images/41076-1-1377598514.jpg', 'https://www.nexusmods.com/skyrim/mods/41076', 'isoku', '10', '2'],

            ['Krazak - Bandit Island', 'Krazak is an mod that adds a new land with a fortress and a cave that features enemies wildlife and many more. Through out the island there are animels beatifull landscape and of course enemies. This mod offers no story line or quest to follow it is strictly a mod that offers a challange with a reward.', 'https://staticdelivery.nexusmods.com/mods/110/images/92324/92324-1530725958-1198093077.png', 'https://www.nexusmods.com/skyrim/mods/92324', 'skydoctor47', '13', '1'],

            ['Dreams and Nightmares Music Mod', 'The aim of this mod is to create more variety to the Soundtrack of TES V Skyrim. But not just by simply adding random tracks to it, but by adding tracks with various moods. For example an Exploration track with a dark/melancholic mood, or a combat track that is less dramatic, but makes you feel more like a badass (Especially at a high level).', 'https://staticdelivery.nexusmods.com/mods/110/images/97486/97486-1556467293-412828079.png', 'https://www.nexusmods.com/skyrim/mods/97486','Nyghttones', '2', '2'],

            ['The Great Forest of Whiterun Hold', 'It creates a giant forest Falkreath-style in the desolated tundra of Whiterun Hold.', 'https://staticdelivery.nexusmods.com/mods/110/images/67063-0-1434748360.png', 'https://www.nexusmods.com/skyrim/mods/67063', 'Ro84', '17' ,'1'],

            ['Usable Lantern', 'Junk lantern change to the usable lantern. It\'s no torch replacer . You can use both the torch and the lantern .', 'https://staticdelivery.nexusmods.com/mods/110/images/8835-1-1328954095.jpg', 'https://www.nexusmods.com/skyrim/mods/8835', 'Higeyosi', '9' ,'2'],

        ];

        foreach ($mods as $modData) {
            $mod = new Mod();
            $mod->name = $modData[0];
            $mod->description = $modData[1];
            $mod->picture_url = $modData[2];
            $mod->mod_url = $modData[3];
            $mod->mod_author = $modData[4];
            $mod->section_id = $modData[5];
            $mod->user_id = $modData[6];

            $mod->save();
        }
    }
}
