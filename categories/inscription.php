<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

$all_data = [
    "Tome of the Clear Mind" => 141640,
    "Codex of the Tranquil Mind" => 141333,
    "Codex of the Clear Mind" => 141641,
    "Tome of the Tranquil Mind" => 141446,

    "Straszan Mark" => 136693,
    "Aqual Mark" => 136692,

    "Darkmoon Deck: Immortality" => 128711,
    "Darkmoon Deck: Dominion" => 128705,
    "Darkmoon Deck: Promises" => 128710,
    "Darkmoon Deck: Hellfire" => 128709,

    "Vantus Rune: Odyn" => 142101,
    "Vantus Rune: Gul'dan" => 129003,
    "Vantus Rune: Il'gynoth, The Heart of Corruption" => 128989,
    "Vantus Rune: Elerethe Renferal" => 128992,
    "Vantus Rune: Helya" => 142103,
    "Vantus Rune: Xavius" => 128991,
    "Vantus Rune: Chronomatic Anomaly" => 128995,
    "Vantus Rune: Trilliax" => 128996,
    "Vantus Rune: Ursoc" => 128987,
    "Vantus Rune: Cenarius" => 128993,
    "Vantus Rune: Tichondrius" => 128998,
    "Vantus Rune: Dragons of Nightmare" => 128990,
    "Vantus Rune: Guarm" => 142102,
    "Vantus Rune: Krosus" => 129000,
    "Vantus Rune: Star Augur Etraeus" => 129001,
    "Vantus Rune: Antorus, the Burning Throne" => 151610,
    "Vantus Rune: Skorpyron" => 128994,
    "Vantus Rune: High Botanist Tel'arn" => 128999,
    "Vantus Rune: Spellblade Aluriel" => 128997,
    "Vantus Rune: Nythendra" => 128988,
    "Vantus Rune: Grand Magistrix Elisande" => 129002,
    "Vantus Rune: Tomb of Sargeras" => 146406,

    "Songs of the Alliance" => 140568,
    "Songs of Peace" => 136856,
    "Songs of the Legion" => 136857,
    "Songs of the Horde" => 140567,
    "Songs of Battle" => 136852,

    "Unwritten Legend" => 128979,
    "Steamy Romance Novel Kit" => 129211,
    "Scroll of Forgotten Knowledge" => 128980,

    "Glyph of Flickering" => 137289,
    "Glyph of the Trusted Steed" => 143588,
    "Glyph of the Voidling" => 153033,
    "Glyph of Fel-Touched Shards" => 151542,
    "Glyph of the Forest Path" => 139278,
    "Glyph of Dark Absolution" => 153036,
    "Glyph of Burnout" => 139442,
    "Glyph of the Skullseye" => 137261,
    "Glyph of the Chilled Shell" => 139271,
    "Glyph of the Shadow Succubus" => 147119,
    "Glyph of the Observer" => 139312,
    "Glyph of the Headhunter" => 137240,
    "Glyph of Crackling Ox Lightning" => 129022,
    "Glyph of Shadow-Enemies" => 139438,
    "Glyph of Ember Shards" => 151538,
    "Glyph of the Blood Wraith" => 139272,
    "Glyph of Polymorphic Proportions" => 139352,
    "Glyph of Floating Shards" => 151540,
    "Glyph of Flash Bang" => 129020,
    "Glyph of the Goblin Anti-Grav Flare" => 137267,
    "Glyph of Fel-Enemies" => 139437,
    "Glyph of Angels" => 149755,
    "Glyph of Fel Wings" => 139435,
    "Glyph of the Inquisitor's Eye" => 137191,
    "Glyph of Fel Touched Souls" => 129028,
    "Glyph of Fel Imp" => 129018,
    "Glyph of the Hook" => 137239,
    "Glyph of Nesingwary's Nemeses" => 137250,
    "Glyph of the Trident" => 137238,
    "Glyph of Smolder" => 139348,
    "Glyph of Stellar Flare" => 137269,
    "Glyph of the Voidlord" => 139311,
    "Glyph of the Blazing Savior" => 137188,
    "Glyph of the Unholy Wraith" => 139273,
    "Glyph of the Bullseye" => 137194,
    "Glyph of the Dire Stable" => 139288,
    "Glyph of Arachnophobia" => 137249,
    "Glyph of Blackout" => 139358,
    "Glyph of Mana Touched Souls" => 139362,
    "Glyph of Pebbles" => 137288,
    "Glyph of Sparkles" => 129019,
    "Glyph of Critterhex" => 139289,
    "Glyph of Wrathguard" => 139315,
    "Glyph of the Spectral Raptor" => 137287,
    "Glyph of Yu'lon's Grace" => 139339,
    "Glyph of Autumnal Bloom" => 136826,
    "Glyph of the Feral Chameleon" => 136825,
    "Glyph of the Lightspawn" => 153031,
    "Glyph of Fallow Wings" => 139417,
    "Glyph of the Wraith Walker" => 139274,
    "Glyph of the Shivarra" => 139310,
    "Glyph of Tattered Wings" => 139436,
    "Glyph of Falling Thunder" => 141898,
    "Glyph of the Doe" => 140630,
    "Glyph of the Sentinel" => 129021,
    "Glyph of Twilight Bloom" => 143750,
    "Glyph of Crackling Flames" => 129029,
    "Glyph of the Queen" => 137293,
    "Glyph of the Crimson Shell" => 139270,
    "Glyph of Crackling Crane Lightning" => 139338,
    "Glyph of Cracked Ice" => 137274,
    "Glyph of Shadowy Friends" => 87392,
    "Glyph of Ghostly Fade" => 129017,
    "Glyph of Spirit Raptors" => 104126,
    "Glyph of Shadow" => 77101,
    "Glyph of Disguise" => 45768,
    "Glyph of the Cheetah" => 89868,
    "Glyph of Burning Anger" => 80588,
    "Glyph of Soulwell" => 43394,
    "Glyph of Stars" => 44922,
    "Glyph of the Heavens" => 79538,
    "Glyph of Crackling Tiger Lightning" => 87881,
    "Glyph of Gushing Wound" => 43398,
    "Glyph of the Spectral Wolf" => 43386,
    "Glyph of the Luminous Charger" => 41100,
    "Glyph of Shackle Undead" => 43373,
    "Glyph of Rising Tiger Kick" => 87885,
    "Glyph of the Blazing Trail" => 85221,
    "Glyph of the Ursol Chameleon" => 43334,
    "Glyph of Fire From the Heavens" => 43369,
    "Glyph of the Unbound Elemental" => 104104,
    "Glyph of Winged Vengeance" => 43366,
    "Glyph of the Geist" => 43535,
    "Glyph of Hawk Feast" => 80587,
    "Glyph of Felguard" => 42459,
    "Glyph of Thunder Strike" => 49084,
    "Glyph of Lesser Proportion" => 43350,
    "Glyph of the Orca" => 40919,
    "Glyph of the Sha" => 104120,
    "Glyph of the Weaponmaster" => 104138,
    "Glyph of the Sun" => 118061,
    "Glyph of Lingering Ancestors" => 104127,
    "Glyph of Foul Menagerie" => 43551,
    "Glyph of the Skeleton" => 104099,
    "Glyph of Fighting Pose" => 87888,
    "Glyph of Deluge" => 45775,
    "Glyph of Pillar of Light" => 104108,
    "Glyph of Inspired Hymns" => 104122,
    "Glyph of Crimson Banish" => 45789,
    "Glyph of the Val'kyr" => 87277,
    "Glyph of Honor" => 87883,
    "Glyph of Mighty Victory" => 43400,
    "Glyph of Evaporation" => 104105,
    "Glyph of Crittermorph" => 42751,

    "Royal Ink" => 43119,
    "Starlight Ink" => 79255,
    "Snowfall Ink" => 43127,
    "Fiery Ink" => 43121,
    "Volatile Crystal" => 113289,
    "Dawnstar Ink" => 43117,
    "Ink of the Sky" => 43123,
    "Hunter's Ink" => 43115,
    "Darkflame Ink" => 43125,

    "Moonglow Ink" => 39469,
    "Sallow Pigment" => 129034,
    "Jadefire Ink" => 43118,
    "Blackfallow Ink" => 61978,
    "Midnight Ink" => 39774,
    "Celestial Ink" => 43120,
    "Lion's Ink" => 43116,
    "Ethereal Ink" => 43124,
    "Shimmering Ink" => 43122,
    "Ink of the Sea" => 43126,
    "Ink of Dreams" => 79254,
    "Warbinder's Ink" => 113111,
    "Roseate Pigment" => 129032,
    "Cerulean Pigment" => 114931
  ];

$all = item_array($all_data, $conn);

$tomes = [
	$all["Tome of the Clear Mind"],
	$all["Codex of the Tranquil Mind"],
	$all["Codex of the Clear Mind"],
	$all["Tome of the Tranquil Mind"]
];

$relics = [
	$all["Straszan Mark"],
	$all["Aqual Mark"]
];

$decks = [
	$all["Darkmoon Deck: Immortality"],
	$all["Darkmoon Deck: Dominion"],
	$all["Darkmoon Deck: Promises"],
	$all["Darkmoon Deck: Hellfire"]
];

$vantus = [
	$all["Vantus Rune: Odyn"],
	$all["Vantus Rune: Gul'dan"],
	$all["Vantus Rune: Il'gynoth, The Heart of Corruption"],
	$all["Vantus Rune: Elerethe Renferal"],
	$all["Vantus Rune: Helya"],
	$all["Vantus Rune: Xavius"],
	$all["Vantus Rune: Chronomatic Anomaly"],
	$all["Vantus Rune: Trilliax"],
	$all["Vantus Rune: Ursoc"],
	$all["Vantus Rune: Cenarius"],
	$all["Vantus Rune: Tichondrius"],
	$all["Vantus Rune: Dragons of Nightmare"],
	$all["Vantus Rune: Guarm"],
	$all["Vantus Rune: Krosus"],
	$all["Vantus Rune: Star Augur Etraeus"],
	$all["Vantus Rune: Antorus, the Burning Throne"],
	$all["Vantus Rune: Skorpyron"],
	$all["Vantus Rune: High Botanist Tel'arn"],
	$all["Vantus Rune: Spellblade Aluriel"],
	$all["Vantus Rune: Nythendra"],
	$all["Vantus Rune: Grand Magistrix Elisande"],
	$all["Vantus Rune: Tomb of Sargeras"]
];

$songs = [
	$all["Songs of the Alliance"],
	$all["Songs of Peace"],
	$all["Songs of the Legion"],
	$all["Songs of the Horde"],
	$all["Songs of Battle"]
];

$toys = [
	$all["Unwritten Legend"],
	$all["Steamy Romance Novel Kit"],
	$all["Scroll of Forgotten Knowledge"]
];

$glyphs = [
	$all["Glyph of Flickering"],
	$all["Glyph of the Trusted Steed"],
	$all["Glyph of the Voidling"],
	$all["Glyph of Fel-Touched Shards"],
	$all["Glyph of the Forest Path"],
	$all["Glyph of Dark Absolution"],
	$all["Glyph of Burnout"],
	$all["Glyph of the Skullseye"],
	$all["Glyph of the Chilled Shell"],
	$all["Glyph of the Shadow Succubus"],
	$all["Glyph of the Observer"],
	$all["Glyph of the Headhunter"],
	$all["Glyph of Crackling Ox Lightning"],
	$all["Glyph of Shadow-Enemies"],
	$all["Glyph of Ember Shards"],
	$all["Glyph of the Blood Wraith"],
	$all["Glyph of Polymorphic Proportions"],
	$all["Glyph of Floating Shards"],
	$all["Glyph of Flash Bang"],
	$all["Glyph of the Goblin Anti-Grav Flare"],
	$all["Glyph of Fel-Enemies"],
	$all["Glyph of Angels"],
	$all["Glyph of Fel Wings"],
	$all["Glyph of the Inquisitor's Eye"],
	$all["Glyph of Fel Touched Souls"],
	$all["Glyph of Fel Imp"],
	$all["Glyph of the Hook"],
	$all["Glyph of Nesingwary's Nemeses"],
	$all["Glyph of the Trident"],
	$all["Glyph of Smolder"],
	$all["Glyph of Stellar Flare"],
	$all["Glyph of the Voidlord"],
	$all["Glyph of the Blazing Savior"],
	$all["Glyph of the Unholy Wraith"],
	$all["Glyph of the Bullseye"],
	$all["Glyph of the Dire Stable"],
	$all["Glyph of Arachnophobia"],
	$all["Glyph of Blackout"],
	$all["Glyph of Mana Touched Souls"],
	$all["Glyph of Pebbles"],
	$all["Glyph of Sparkles"],
	$all["Glyph of Critterhex"],
	$all["Glyph of Wrathguard"],
	$all["Glyph of the Spectral Raptor"],
	$all["Glyph of Yu'lon's Grace"],
	$all["Glyph of Autumnal Bloom"],
	$all["Glyph of the Feral Chameleon"],
	$all["Glyph of the Lightspawn"],
	$all["Glyph of Fallow Wings"],
	$all["Glyph of the Wraith Walker"],
	$all["Glyph of the Shivarra"],
	$all["Glyph of Tattered Wings"],
	$all["Glyph of Falling Thunder"],
	$all["Glyph of the Doe"],
	$all["Glyph of the Sentinel"],
	$all["Glyph of Twilight Bloom"],
	$all["Glyph of Crackling Flames"],
	$all["Glyph of the Queen"],
	$all["Glyph of the Crimson Shell"],
	$all["Glyph of Crackling Crane Lightning"],
	$all["Glyph of Cracked Ice"],
	$all["Glyph of Shadowy Friends"],
	$all["Glyph of Ghostly Fade"],
	$all["Glyph of Spirit Raptors"],
	$all["Glyph of Shadow"],
	$all["Glyph of Disguise"],
	$all["Glyph of the Cheetah"],
	$all["Glyph of Burning Anger"],
	$all["Glyph of Soulwell"],
	$all["Glyph of Stars"],
	$all["Glyph of the Heavens"],
	$all["Glyph of Crackling Tiger Lightning"],
	$all["Glyph of Gushing Wound"],
	$all["Glyph of the Spectral Wolf"],
	$all["Glyph of the Luminous Charger"],
	$all["Glyph of Shackle Undead"],
	$all["Glyph of Rising Tiger Kick"],
	$all["Glyph of the Blazing Trail"],
	$all["Glyph of the Ursol Chameleon"],
	$all["Glyph of Fire From the Heavens"],
	$all["Glyph of the Unbound Elemental"],
	$all["Glyph of Winged Vengeance"],
	$all["Glyph of the Geist"],
	$all["Glyph of Hawk Feast"],
	$all["Glyph of Felguard"],
	$all["Glyph of Thunder Strike"],
	$all["Glyph of Lesser Proportion"],
	$all["Glyph of the Orca"],
	$all["Glyph of the Sha"],
	$all["Glyph of the Weaponmaster"],
	$all["Glyph of the Sun"],
	$all["Glyph of Lingering Ancestors"],
	$all["Glyph of Foul Menagerie"],
	$all["Glyph of the Skeleton"],
	$all["Glyph of Fighting Pose"],
	$all["Glyph of Deluge"],
	$all["Glyph of Pillar of Light"],
	$all["Glyph of Inspired Hymns"],
	$all["Glyph of Crimson Banish"],
	$all["Glyph of the Val'kyr"],
	$all["Glyph of Honor"],
	$all["Glyph of Mighty Victory"],
	$all["Glyph of Evaporation"],
	$all["Glyph of Crittermorph"]
];

$ucInks = [
	$all["Royal Ink"],
	$all["Starlight Ink"],
	$all["Snowfall Ink"],
	$all["Fiery Ink"],
	$all["Volatile Crystal"],
	$all["Dawnstar Ink"],
	$all["Ink of the Sky"],
	$all["Hunter's Ink"],
	$all["Darkflame Ink"]
];

$cInks = [
	$all["Moonglow Ink"],
	$all["Sallow Pigment"],
	$all["Jadefire Ink"],
	$all["Blackfallow Ink"],
	$all["Midnight Ink"],
	$all["Celestial Ink"],
	$all["Lion's Ink"],
	$all["Ethereal Ink"],
	$all["Shimmering Ink"],
	$all["Ink of the Sea"],
	$all["Ink of Dreams"],
	$all["Warbinder's Ink"],
	$all["Roseate Pigment"],
	$all["Cerulean Pigment"]
];

?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Inscription</h2>

<?php 

table($tomes, "Tomes"); 
table($relics, "Relics");
table($decks, "Decks");
table($vantus, "Vantus Runes");
table($songs, "Songs");
table($toys, "Toys");
table($glyphs, "Glyphs");
table($ucInks, "Uncommon Inks");
table($cInks, "Common Inks");


?>



<?php include_once($path . "/inc/footer.inc.php"); ?>