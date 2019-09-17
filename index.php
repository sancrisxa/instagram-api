<?php 

session_start();

require 'src/Instagram.php';
require 'inconfig.php';


if (isset($_SESSION['in_access_token']) && !empty($_SESSION['in_access_token'])) {
    $instagram->setAccessToken($_SESSION['in_access_token']);

    $r = $instagram->getUserMedia('self', 4);
    
    foreach ($r->data as $foto) {
        $link = $foto->link;
        $img = $foto->image->low_resolution->url;
        $legenda = $foto->caption->text;

        echo '<a href="' . $link . '"><img src="' . $img . '" border="0">' . $legenda . '<br></a><br><br>';
    }

} else {
    $loginUrl = $instagram->getLoginUrl();
    echo '<a href="' . $loginUrl . '">Login com Instagram</a>';
}