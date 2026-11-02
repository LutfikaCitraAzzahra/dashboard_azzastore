<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "dashboard";
}
$halaman = [
    "dashboard"   => "pages/dashboard.php",
    "products"    => "pages/products.php",
    "addproduct"  => "pages/addproduct.php",
    "editdata"    => "pages/editdata.php",
    "orders"      => "pages/orders.php",
    "customers"   => "pages/customers.php",
    "reports"     => "pages/reports.php",
    "integrations"=> "pages/integrations.php",
];

if (isset($halaman[$page])) {
    require $halaman[$page];
} else {
    echo "<h2>Halaman tidak ditemukan</h2>";
}

?>