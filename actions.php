<?
include_once('Phone.php');
include_once('Monitor.php');
include_once('PhoneCategory.php');
include_once('MonitorCategory.php');

$categories = ['PhoneCategory', 'MonitorCategory'];
$catProducts = [];

$products = [
    new Phone('IPhone7', '$1000', 'Phone', 'Apple', 'A9', '1Gb', 1, '128Gb', 'IOS'),
    new Monitor('S24E650', '$100', 'Monitor', 'Samsung', "21'", '60Hz', 'VGA, HDMI, DisplayPort'),
    new Phone('Galaxy', '$1000', 'Phone', 'Samsung', 'Snapdragon 860', '3Gb', 1, '128Gb', 'Android'),
    new Monitor('Apple Cinema Display', '$10000', 'Monitor', 'Apple', "24'", '144Hz', 'HDMI, DisplayPort'),
    new Phone('Limia 720', '$350', 'Phone', 'Nokia', 'Snapdragon 300', '500Mb', 2, '32Gb', 'Windows Phone')
];

// Заполнение массива по категориям
foreach ($products as $product) {
    if ($product->description == 'Phone') {
        $elem = new PhoneCategory($product->name, $product->price, $product->os, $product->countSim, $product->hdd, $product->ram);
        $elem->listProducts = $categories[0];
        $catProducts[] = $elem;
    }

    if ($product->description == 'Monitor') {
        $elem = new MonitorCategory($product->name, $product->price, $product->diagonal, $product->frequency);
        $elem->listProducts = $categories[1];
        $catProducts[] = $elem;
    }
}

// Вывод товаров категории "Телефоны"
if ($_GET['category'] == 'Phones') {
    $price = [];
    $ram = [];
    $sims = [];
    $hdd = [];
    foreach ($products as $product) {
        if ($product->description == 'Phone') {
            array_push($price, (int)substr($product->price, 1));
            if (substr($product->ram, -2) == 'Gb') {
                array_push($ram, (int)$product->ram * 1024);
            } else {
                array_push($ram, (int)$product->ram);
            }
            array_push($sims, (int)$product->countSim);
            array_push($hdd, (int)$product->hdd);
        }
    }
?>
    <div id="Phones" style="margin-bottom:40px">
        <label for="price"><strong>Price:</strong></label>
        <input type="text" name="price" placeholder="<? echo 'min: ' . min($price) . '   max: ' . max($price) ?>">
        <label for="ram"><strong>RAM:</strong></label>
        <input type="text" name="ram" placeholder="<? echo 'min: ' . min($ram) . '   max: ' . max($ram) ?>">
        <label for="sims"><strong>SIMs:</strong></label>
        <input type="text" name="sims" placeholder="<? echo 'min: ' . min($sims) . '   max: ' . max($sims) ?>">
        <label for="hdd"><strong>HDD:</strong></label>
        <input type="text" name="hdd" placeholder="<? echo 'min: ' . min($hdd) . '   max: ' . max($hdd) ?>">
    </div>
    <?

    // Сортировка
    if ($_GET['price'] || $_GET['ram'] || $_GET['sims'] || $_GET['hdd']) {

        $price = $_GET['price'] == '' ? 0 : $_GET['price'];
        $ram = $_GET['ram'] == '' ? 0 : $_GET['ram'];
        $sims = $_GET['sims'] == '' ? 0 : $_GET['sims'];
        $hdd = $_GET['hdd'] == '' ? 0 : $_GET['hdd'];

        foreach ($products as $product) {
            if (substr($product->ram, -2) == 'Gb') {
                $ramProduct = (int)$product->ram * 1024;
            } else {
                $ramProduct = (int)$product->ram;
            }

            if ($product->description == 'Phone' && (int)substr($product->price, 1) >= $price && $ramProduct >= $ram  && (int)$product->countSim >= $sims && (int)$product->hdd >= $hdd) {
                echo '<h2>' . $product->getProduct() . '</h2>';
            }
        }

    } else {
        foreach ($products as $product) {
            if ($product->description == 'Phone') {
                echo '<h2>' . $product->getProduct() . '</h2>';
            }
        }
    }
}

// Выводтоваров категории "Мониторы"
if ($_GET['category'] == 'Monitors') {
    $price = [];
    $diagonal = [];
    $frequency = [];

    foreach ($products as $product) {
        if ($product->description == 'Monitor') {
            array_push($price, (int)substr($product->price, 1));
            array_push($diagonal, (int)$product->diagonal);
            array_push($frequency, (int)$product->frequency);
        }
    }
    ?>

    <div id="Monitors" style="margin-bottom:40px">
        <label for="price"><strong>Price:</strong></label>
        <input type="text" name="price" placeholder="<? echo 'min: ' . min($price) . '   max: ' . max($price) ?>">
        <label for="diagonal"><strong>Diagonal:</strong></label>
        <input type="text" name="diagonal" placeholder="<? echo 'min: ' . min($diagonal) . '   max: ' . max($diagonal) ?>">
        <label for="frequency"><strong>Frequency:</strong></label>
        <input type="text" name="frequency" placeholder="<? echo 'min: ' . min($frequency) . '   max: ' . max($frequency) ?>">
    </div>
<?
    // Сортировка
    if ($_GET['price'] || $_GET['diagonal'] || $_GET['frequency']) {

        $price = $_GET['price'] == '' ? 0 : $_GET['price'];
        $diagonal = $_GET['diagonal'] == '' ? 0 : $_GET['diagonal'];
        $frequency = $_GET['frequency'] == '' ? 0 : $_GET['frequency'];

        foreach ($products as $product) {
            if ($product->description == 'Monitor' && (int)substr($product->price, 1) >= $price && (int)$product->diagonal >= $diagonal  && (int)$product->frequency >= $frequency) {
                echo '<h2>' . $product->getProduct() . '</h2>';
            }
        }
    } else {
        foreach ($products as $product) {
            if ($product->description == 'Monitor') {
                echo '<h2>' . $product->getProduct() . '</h2>';
            }
        }
    }
}
