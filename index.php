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

    <link href="/assets/ext/bootstrap.5.1.3.min.css" rel="stylesheet">

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
    <iframe src="https://ghbtns.com/github-btn.html?user=adil192&repo=SamsungAppsPatcher&type=star&count=true&size=large" frameborder="0" scrolling="0" width="170" height="30" title="GitHub"></iframe>
</div>

<hr>

<?php
class Ratings {
    static string $NotWorking = "☆☆☆ Not working";
    static string $NotTested = "★☆☆ Not tested (please tell me if it works)";
    static string $PartiallyWorking = "★★☆ Partially working (YMMV)";
    static string $Working = "★★★ Working";
}
class SamsungApp {
    public string $displayName;
    public array $dls;
    public string $icon;
    public string $date;
    public string $rating;
    public string $extraText;

    public function __construct(string $displayName, string $icon = null, string $date = null,
                                array $dls = null, string $rating = null, string $extraText = null) {
        $this->displayName = $displayName;
        $this->dls = $dls ?? [];
        $this->icon = $icon ?? "fallback.webp";
        $this->date = $date ?? "";
        $this->rating = $rating ?? Ratings::$NotTested;
        $this->extraText = $extraText ?? "";
    }
}
function genApps(array $samsungApps) {
    ?><div class="cards-parent"><?php
    for ($i = 0; $i < count($samsungApps); ++$i) {
        $app = $samsungApps[$i];
        ?>
        <div class="card">
            <img src="icons/<?=$app->icon?>" class="card-img-top" alt="<?=$app->displayName?> app icon" width="158" height="158">
            <div class="card-body">
                <h3 class="card-title"><?=$app->displayName?></h3>
                <div class="card-text-group">
                    <p class="card-text"><?=$app->date?></p>
                    <p class="card-text"><?=$app->rating?></p>
                </div>
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
		], Ratings::$Working),
		new SamsungApp("Galaxy Wearable", "Wear.webp", "18 April 2022", [
			["2.2.48.22033061", "wearable.2.2.48.22033061.apk"],
			["2.2.47.21122061", "wearable.apk"],
		], Ratings::$Working),
		new SamsungApp("Accessory Service", "SamsungAccessoryService.webp", "8 April 2022", [
			["3.1.96.30104", "accessoryservice.3.1.96.30104.apk"],
			["3.1.95.21123", "accessoryservice.apk"]
		], Ratings::$Working),
	]); ?>
</div>

<hr>

<div class="container">
    <h2>Watch plugins</h2>
	<?php genApps([
		new SamsungApp("Galaxy Watch Plugin", "Wear.webp", "2 May 2022", [
			["2.2.05.22042841N", "watchplugin.2.2.05.22042841N.apk"],
			["2.2.05.22041541N", "watchplugin.2.2.05.22041541N.apk"],
			["2.2.05.22040441N", "watchplugin.2.2.05.22040441N.apk"],
			["2.2.05.22031041N", "watchplugin.2.2.05.22031041.apk"],
			["2.2.05.22012741N", "watchplugin.apk"]
		], Ratings::$Working, "This is for the Galaxy Watch ONLY. Blame Samsung's naming scheme for the confusion."),
		new SamsungApp("Galaxy Watch3 Plugin", "Wear.webp", "2 May 2022", [
			["2.2.09.22042841N", "watch3plugin.2.2.09.22042841N.apk"],
			["2.2.09.22041541N", "watch3plugin.2.2.09.22041541N.apk"],
			["2.2.09.22040441N", "watch3plugin.2.2.09.22040441N.apk"],
			["2.2.09.22012741N", "watch3plugin.apk"]
		], Ratings::$Working),
		new SamsungApp("Galaxy Watch4 Plugin", "Wear.webp", "8 December 2021", [
			["2.2.11.21120251", "watch4plugin.apk"]
		], Ratings::$NotWorking,
            '<a href="https://forum.xda-developers.com/t/restrictions-removed-samsung-health-monitor-wearos-1-1-1-191-root-age-country-device-restriction-removed-23rd-march-2022.4322527/">This xda post</a> seems to have some information about getting the Watch4 working.'),
		new SamsungApp("Watch Active Plugin", "Wear.webp", "2 May 2022", [
			["2.2.07.22042841N", "activeplugin.2.2.07.22042841N.apk"],
			["2.2.07.22041541N", "activeplugin.2.2.07.22041541N.apk"],
			["2.2.07.22040441N", "activeplugin.2.2.07.22040441N.apk"],
			["2.2.07.22031041N", "activeplugin.2.2.07.22031041.apk"],
			["2.2.07.22012741N", "activeplugin.apk"]
		], Ratings::$Working),
		new SamsungApp("Watch Active2 Plugin", "Wear.webp", "3 May 2022", [
			["2.2.08.22042851", "active2plugin.2.2.08.22042851.apk"],
			["2.2.08.22042841N", "active2plugin.2.2.08.22042841N.apk"],
			["2.2.08.22041551", "active2plugin.2.2.08.22041551.apk"],
			["2.2.08.22041541N", "active2plugin.2.2.08.22041541N.apk"],
			["2.2.08.22040451", "active2plugin.2.2.08.22040451.apk"],
			["2.2.08.22040441N", "active2plugin.2.2.08.22040441N.apk"],
			["2.2.08.22012751", "active2plugin.apk"]
		], Ratings::$NotWorking),
		new SamsungApp("Gear Fit2 Plugin", "Wear.webp", "30 March 2021", [
			["2.2.04.22032341N", "gearfit2plugin.2.2.04.22032341N.apk"],
			["2.2.04.21111241N", "gearfit2plugin.apk"]
		], Ratings::$Working),
		new SamsungApp("Gear S Plugin", "Wear.webp", "2 May 2022", [
			["2.2.03.22041541N", "gearsplugin.2.2.03.22042841N.apk"],
			["2.2.03.22041541N", "gearsplugin.2.2.03.22041541N.apk"],
			["2.2.03.22040441N", "gearsplugin.2.2.03.22040441N.apk"],
			["2.2.03.22012741N", "gearsportplugin.apk"]
		], Ratings::$Working),
	]); ?>
</div>

<hr>

<div class="container">
    <h2>Other plugins</h2>
	<?php genApps([
		new SamsungApp("Galaxy Buds Manager", null, "17 April 2022", [
			["2.1.22040181", "budsplugin.2.1.22040181.apk"],
			["2.1.21121751", "budsplugin.apk"]
		], Ratings::$Working),
		new SamsungApp("Galaxy Buds Pro Manager", "Buds.webp", "16 May 2022", [
			["4.1.22051251", "budsproplugin.4.1.22051251.apk"],
			["4.1.22042651", "budsproplugin.4.1.22042651.apk"],
			["4.1.22031451", "budsproplugin.4.1.22031451.apk"],
			["4.0.22012051", "budsproplugin.apk"]
		], Ratings::$Working),
		new SamsungApp("Galaxy Buds2 Manager", "Buds.webp", "16 May 2022", [
			["4.1.22051251", "buds2plugin.4.1.22051251.apk"],
			["4.1.22042651", "buds2plugin.4.1.22042651.apk"],
			["4.1.22031451", "buds2plugin.4.1.22031451.apk"],
			["4.0.22012051", "buds2plugin.apk"]
		], Ratings::$Working),
		new SamsungApp("Galaxy Buds+ Manager", "Buds.webp", "28 April 2022", [
			["4.1.22041351", "budsplusplugin.4.1.22041351.apk"],
			["4.1.22031451", "budsplusplugin.4.1.22031451.apk"],
			["4.0.22010451", "budsplusplugin.apk"]
		], Ratings::$Working),
		new SamsungApp("Galaxy Buds Live Manager", "Buds.webp", "16 May 2022", [
			["4.1.22051251", "budsliveplugin.4.1.22051251.apk"],
			["4.1.22042651", "budsliveplugin.4.1.22042651.apk"],
			["4.1.22032351", "budsliveplugin.4.1.22032351.apk"],
			["4.0.22010451", "budsliveplugin.apk"]
		], Ratings::$Working),
	]); ?>
</div>

<hr>

<div class="container-fluid">
    <h2>Archive</h2>
    <p>You can find older versions of these apps, as well as a platform-tools zip,
        in <a href="https://mega.nz/folder/sUFj2C5b#M4zEP-c9ylY-ENxPw7qCUQ">this MEGA drive</a>.</p>
</div>

<script src="/assets/ext/bootstrap.bundle.5.1.3.min.js"></script>

</body>
</html>
