<?php
/** @noinspection PhpIllegalPsrClassPathInspection */

include_once "../global_tools.php";
?>
<!doctype html>
<html lang="en">
<head>
	<?php createHead(
		"SamsungAppsPatcher",
		"Samsung Apps Patcher for Samsung phones with custom ROMs.",
		null, // todo: add image
		null,
		"2022-03-14",
		"Software"
	); ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="SamsungAppsPatcher.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="header container-fluid">
    <div class="header-row">
        <h1>SamsungAppsPatcher</h1>
        <a href="https://github.com/adil192/SamsungAppsPatcher">
            <img class="github-icon" src="../assets/images/logos/GitHub-Mark.svg" alt="GitHub icon link">
        </a>
    </div>
    <p>Samsung Apps Patcher for Samsung phones with custom ROMs.</p>
</div>

<?php
class SamsungApp {
    public string $displayName;
    public string $dl;
    public string $icon;
    public string $date;

    public function __construct(string $displayName, string $dl = null, string $icon = null, $date = null) {
        $this->displayName = $displayName;
        $this->dl = $dl ?? "";
        $this->icon = $icon ?? "Wear.png";
        $this->date = $date ?? "";
    }
}
function genApps(array $samsungApps) {
    ?><div class="cards-parent"><?php
    for ($i = 0; $i < count($samsungApps); ++$i) {
        $app = $samsungApps[$i];
        ?>
        <div class="card">
            <img src="icons/<?=$app->icon?>" class="card-img-top" alt="<?=$app->displayName?> app icon">
            <div class="card-body">
                <h3 class="card-title"><?=$app->displayName?></h3>
                <p class="card-text"><?=$app->date?></p>
                <?php if (!empty($app->dl)) { ?>
                    <a href="dl/<?=$app->dl?>" class="btn btn-primary">Download</a>
                <?php } ?>
            </div>
        </div>
        <?php
    }
    ?></div><?php
}
?>

<div class="container">
    <h2>Core Apps</h2>
	<?php genApps([
		new SamsungApp("Samsung Health", "shealth.apk", null, "14 February 2022"),
		new SamsungApp("Samsung Wearable", "wearable.apk", null, "8 January 2022"),
		new SamsungApp("Accessory Service", "accessoryservice.apk", null, "29 December 2021"),
	]); ?>

    <hr>
</div>

<div class="container">
    <h2>Watch plugins</h2>
	<?php genApps([
		new SamsungApp("Galaxy Watch Plugin", "watchplugin.apk", null, "14 February 2022"),
		new SamsungApp("Galaxy Watch3 Plugin", "watch3plugin.apk", null, "14 February 2022"),
		new SamsungApp("Galaxy Watch4 Plugin", "watch4plugin.apk", null, "9 January 2022"),
		new SamsungApp("Watch Active Plugin", "activeplugin.apk", null, "14 February 2022"),
		new SamsungApp("Watch Active2 Plugin", "active2plugin.apk", null, "14 February 2022"),
		new SamsungApp("Gear Fit2 Plugin", "gearfit2plugin.apk", null, "7 January 2022"),
		new SamsungApp("Gear S Plugin", "gearsportplugin.apk", null, "14 February 2022"),
	]); ?>

    <hr>
</div>

<div class="container">
    <h2>Other plugins</h2>
	<?php genApps([
		new SamsungApp("Galaxy Buds Manager", "budsplugin.apk", null, "16 January 2022"),
		new SamsungApp("Galaxy Buds Pro Manage", "budsproplugin.apk", null, "30 January 2022"),
		new SamsungApp("Galaxy Buds2 Manager", "buds2plugin.apk", null, "30 January 2022"),
		new SamsungApp("Galaxy Buds+ Manager", "budsplusplugin.apk", null, "16 January 2022"),
		new SamsungApp("Galaxy Buds Live Manager", "budsliveplugin.apk", null, "16 January 2022"),
	]); ?>
</div>


</body>
</html>
