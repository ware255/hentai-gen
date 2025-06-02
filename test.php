<!DOCTYPE html>
<html>
    <head>
    	<title>Hentai Gen</title>
    	<meta charset="UTF-8">
    </head>
    <body>
    	<?php
            $url = 'https://pixiv.perennialte.ch/users/6049901/illustrations?mode=show&page=1';

            $html = file_get_contents($url);

            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($html);
            libxml_clear_errors();

            $images = [];

            foreach ($dom->getElementsByTagName('img') as $img) {
                $src = $img->getAttribute('src');
                if ($src) {
                    $images[] = $src;
                }
            }

            header('Content-Type: application/json');
            echo json_encode($images);
    	?>
    </body>
</html>
