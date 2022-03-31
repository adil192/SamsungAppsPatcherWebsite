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

<hr>

<?php
class SamsungApp {
    public string $displayName;
    public array $dls;
    public string $icon;
    public string $date;
    public string $extraText;

    public function __construct(string $displayName, string $icon = null, string $date = null,
                                array $dls = null, string $extraText = null) {
        $this->displayName = $displayName;
        $this->dls = $dls ?? [];
        $this->icon = $icon ?? "fallback.webp";
        $this->date = $date ?? "";
        $this->extraText = $extraText ?? "";
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
                <p class="card-text"><?=$app->extraText?></p>
                <?php
                $count = count($app->dls);
                if ($count > 0) {
                    ?>
                    <div class="btn-group dropdown">
                        <a class="btn btn-primary" href="dl/<?=$app->dls[0][1]?>">
                            Download
                        </a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">View alternate downloads</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="dl/<?=$app->dls[0][1]?>"><?=$app->dls[0][0]?></a></li>
                            <?php if ($count > 1) { ?><li><hr class="dropdown-divider"></li><?php } ?>
                            <?php for ($d = 1; $d < $count; ++$d) { ?>
                                <li><a class="dropdown-item" href="dl/<?=$app->dls[$d][1]?>"><?=$app->dls[$d][0]?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
    ?></div><?php
}
?>

<div class="container">
    <h2>Core apps</h2>
	<?php genApps([
		new SamsungApp("Samsung Health", "SamsungHealth.webp", "30 March 2022", [
			["6.21.2.007", "shealth.6.21.2.007.apk"],
			["6.21.1.031", "shealth.6.21.1.031.apk"],
			["6.21.0.049", "shealth.apk"],
            ["6.19.5.017", "shealth.6.19.5.017.apk"]
		]),
		new SamsungApp("Samsung Wearable", "Wear.webp", "31 December 2021", [
			["2.2.47.21122061", "wearable.apk"],
			["HUAWEI", "wearable-huawei.apk"],
			["HUAWEI-old", "wearable-huawei-old.apk"],
		]),
		new SamsungApp("Accessory Service", "SamsungAccessoryService.webp", "29 December 2021", [
			["3.1.95.21123", "accessoryservice.apk"]
		]),
	]); ?>
</div>

<hr>

<div class="container">
    <h2>Watch plugins</h2>
	<?php genApps([
		new SamsungApp("Galaxy Watch Plugin", "Wear.webp", "23 March 2022", [
			["2.2.05.22031041N", "watchplugin.2.2.05.22031041.apk"],
			["2.2.05.22012741N", "watchplugin.apk"]
		], "This is for the Galaxy Watch ONLY. Blame Samsung's naming scheme for the confusion."),
		new SamsungApp("Galaxy Watch3 Plugin", "Wear.webp", "11 February 2022", [
			["2.2.09.22012741N", "watch3plugin.apk"]
		]),
		new SamsungApp("Galaxy Watch4 Plugin", "Wear.webp", "8 December 2021", [
			["2.2.11.21120251", "watch4plugin.apk"]
		]),
		new SamsungApp("Watch Active Plugin", "Wear.webp", "23 March 2022", [
			["2.2.07.22031041N", "activeplugin.2.2.07.22031041.apk"],
			["2.2.07.22012741N", "activeplugin.apk"]
		]),
		new SamsungApp("Watch Active2 Plugin", "Wear.webp", "14 February 2022", [
			["2.2.08.22012751", "active2plugin.apk"]
		]),
		new SamsungApp("Gear Fit2 Plugin", "Wear.webp", "22 November 2021", [
			["2.2.04.21111241N", "gearfit2plugin.apk"]
		]),
		new SamsungApp("Gear S Plugin", "Wear.webp", "11 February 2022", [
			["2.2.03.22012741N", "gearsportplugin.apk"]
		]),
	]); ?>
</div>

<hr>

<div class="container">
    <h2>Other plugins</h2>
	<?php genApps([
		new SamsungApp("Galaxy Buds Manager", null, "6 January 2022", [
			["2.1.21121751", "budsplugin.apk"]
		]),
		new SamsungApp("Galaxy Buds Pro Manager", "Buds.webp", "27 January 2022", [
			["4.1.22031451", "budsproplugin.4.1.22031451.apk"],
			["4.0.22012051", "budsproplugin.apk"]
		]),
		new SamsungApp("Galaxy Buds2 Manager", "Buds.webp", "27 January 2022", [
			["4.0.22012051", "buds2plugin.apk"]
		]),
		new SamsungApp("Galaxy Buds+ Manager", "Buds.webp", "11 January 2022", [
			["4.1.22031451", "budsplusplugin.4.1.22031451.apk"],
			["4.0.22010451", "budsplusplugin.apk"]
		]),
		new SamsungApp("Galaxy Buds Live Manager", "Buds.webp", "11 January 2022", [
			["4.0.22010451", "budsliveplugin.apk"]
		]),
	]); ?>
</div>

<hr>

<div class="container-fluid">
    <h2>Archive</h2>
    <p>You can find older versions of these apps, as well as a platform-tools zip,
        in <a href="https://mega.nz/folder/sUFj2C5b#M4zEP-c9ylY-ENxPw7qCUQ">this MEGA drive</a>.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
