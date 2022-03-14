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
		"2022-03-12",
		"InteractiveResource",
		false
	); ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .header {
            padding-top: 1rem;
        }
        .card {
            width: 10rem;
        }
        .cards-parent {
            display: flex;
            flex-flow: row wrap;
            gap: 1rem;
        }
    </style>
</head>
<body>

<div class="header container-fluid">
    <h1>SamsungAppsPatcher</h1>
    <p>Samsung Apps Patcher for Samsung phones with custom ROMs.</p>
</div>

<?php
class SamsungApp {
    public string $displayName;
    public string $icon;
    public string $packageName;

    public function __construct(string $displayName, string $icon = null, string $packageName = null) {
        $this->displayName = $displayName;
        $this->icon = $icon ?? "Wear.png";
        $this->packageName = $packageName ?? "";
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
                <h5 class="card-title"><?=$app->displayName?></h5>
                <p class="card-text"><?=$app->packageName?></p>
                <a href="#" class="btn btn-primary">Download</a>
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
            new SamsungApp("SHealth"),
            new SamsungApp("Wearable"),
            new SamsungApp("Accessory Service")
    ]); ?>
</div>


</body>
</html>
