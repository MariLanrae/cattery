<?
if ($_SERVER["REQUEST_URI"] == '/') $page = 'home';
else {
    $page       =   substr($_SERVER["REQUEST_URI"], 1);
    $page_mas   =   explode("&", "$page");
    $page       =   $page_mas[0];
    unset($page_mas);

    //if (!preg_match('/^[A-z0-9]{3,15}$/', $page)) not_found();
}

if (file_exists("page/$page.php")) {
    require_once("page/$page.php");
} else {
    http_response_code(404);
    not_found();
}
