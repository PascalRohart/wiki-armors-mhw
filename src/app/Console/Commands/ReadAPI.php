<?php

namespace App\Console\Commands;

use App\Models\Armor;
use App\Models\Armorset;
use App\Models\ArmorsetPiece;
use App\Models\Asset;
use App\Models\Crafting;
use App\Models\Item;
use App\Models\ItemQuantityMapping;
use App\Models\MaterialsListToCraft;
use App\Models\Rank;
use App\Models\Resistance;
use App\Models\Skill;
use App\Models\Type;
use Illuminate\Console\Command;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Facades\Http;

class ReadAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:read-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = Http::get('https://mhw-db.com/armor');
            $datas = json_decode($response, true);
        } catch (HttpClientException $exception) {
            return $exception;
        }

        foreach ($datas as $data) {
            $armor = Armor::find($data['id']);
            if(!$armor) {
                $armor = new Armor();
                $armor->id = $data['id'];

                $type = Type::where('name', $data['type'])->first();
                if(!$type) {
                    $type = new Type();
                    $type->name = $data['type'];
                    $type->save();
                }
                $armor->id_type = $type->id;

                $rank = Rank::where('name', $data['rank'])->first();
                if (!$rank) {
                    $rank = new Rank();
                    $rank->name = $data['rank'];
                    $rank->save();
                }
                $armor->id_rank = $rank->id;

                $armor->rarity = $data['rarity'];

                $data_defense = $data['defense'];
                $armor->defense_base = $data_defense['base'];
                $armor->defense_max = $data_defense['augmented'];

                $data_resistances = $data['resistances'];
                $resistance = new Resistance();
                $resistance->fire = $data_resistances['fire'];
                $resistance->water = $data_resistances['water'];
                $resistance->ice = $data_resistances['ice'];
                $resistance->thunder = $data_resistances['thunder'];
                $resistance->dragon = $data_resistances['dragon'];
                //dd($resistance);
                $resistance->save();
                $armor->id_resistance = $resistance->id;

                $armor->name = $data['name'];
                $armor->slots = count($data['slots']);

                $data_skills = $data['skills'];
                foreach($data_skills as $data_skill) {
                    $skill = Skill::find($data_skill['id']);
                    if (!$skill) {
                        $skill = new Skill();
                        $skill->id = $data_skill['id'];
                        $skill->level = $data_skill['level'];
                        $skill->description = $data_skill['description'];
                        $skill->skillName = $data_skill['skillName'];
                        $skill->save();
                    }
                    $armor->id_skill = $skill->id;
                }

                $data_armorsets = $data['armorSet'];
                $armorSet = Armorset::find($data_armorsets['id']);
                if (!$armorSet) {
                    $armorSet = new Armorset();
                    $armorSet->id = $data_armorsets['id'];
                    $armorSet->id_rank = $armor->id_rank;
                    $armorSet->name = $data_armorsets['name'];
                    $data_armorset_pieces = $data_armorsets['pieces'];
                    $armorSet->save();
                    foreach ($data_armorset_pieces as $piece) {
                        $armorSetPiece = new ArmorsetPiece();
                        $armorSetPiece->id = $piece;
                        $armorSetPiece->id_armorset = $data_armorsets['id'];
                        $armorSetPiece->save();
                    }
                    $armorSet->bonus = $data_armorsets['bonus'];
                    $armorSet->save();
                }
                $armor->id_armorset = $armorSet->id;

                $data_assets = $data['assets'];
                $asset = new Asset();

                if ($data_assets != null) {
                    if($data_assets['imageMale'] != null) {
                        $asset->imageMale = $data_assets['imageMale'];
                    }
                    if($data_assets['imageFemale'] != null) {
                        $asset->imageFemale = $data_assets['imageFemale'];
                    }
                }

                $asset->save();
                $armor->id_asset = $asset->id;

                $data_crafting = $data['crafting'];
                $crafting = new Crafting();
                $crafting->save();
                $data_materials = $data_crafting['materials'];
                $materials_list_to_craft = new MaterialsListToCraft();
                $materials_list_to_craft->id_crafting = $crafting->id;
                //dd($materials_list_to_craft);
                $materials_list_to_craft->save();
                //dd('test');
                foreach($data_materials as $data_material) {
                    $item_quantity_mapping = new ItemQuantityMapping();
                    $item_quantity_mapping->id_materials_list_to_craft = $materials_list_to_craft->id;
                    $item_quantity_mapping->quantity_item = $data_material['quantity'];

                    $data_item = $data_material['item'];
                    $item = Item::find($data_item['id']);
                    if (!$item) {
                        $item = new Item();
                        $item->id = $data_item['id'];
                        $item->rarity = $data_item['rarity'];
                        $item->carryLimit = $data_item['carryLimit'];
                        $item->value = $data_item['value'];
                        $item->name = $data_item['name'];
                        $item->description = $data_item['description'];
                        $item->save();
                    }

                    $item_quantity_mapping->id_item = $item->id;
                    $item_quantity_mapping->save();
                }

                $materials_list_to_craft->save();
                $crafting->save();
                $armor->id_crafting = $crafting->id;
                $armor->save();
            }
        }
    }
}
