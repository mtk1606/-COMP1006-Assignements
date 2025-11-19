<?php
// Mohamed El khoudimi - COMP1006 Assignment 1 
//Student ID: 200630733


require_once 'config.php';

$pageTitle = "Random Cats Gallery";

// get cats from api
$apiUrl = "https://api.thecatapi.com/v1/images/search?limit=6&api_key=" . API_KEY;

$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $apiUrl);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curlHandle);
curl_close($curlHandle);

$catImages = json_decode($response, true);

// check if api worked
if(!$catImages) {
    $errorMsg = "couldnt load cats";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Random cat images from The Cat API">
    <meta name="author" content="Mohamed El khoudimi">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1> Random Cats Gallery</h1>
            <p>powered by The Cat API</p>
        </div>
    </header>

    <main>
        <div class="container">
            <?php if(isset($errorMsg)): ?>
                <p class="error"><?php echo $errorMsg; ?></p>
            <?php else: ?>
                <div class="gallery">
                    <?php foreach($catImages as $cat): ?>
                        <div class="catCard">
                            <img src="<?php echo $cat['url']; ?>" alt="random cat image">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <!-- reload for more cats -->
            <div class="reloadSection">
                <form method="post" action="">
                    <button type="submit">Load More Cats</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Mohamed El khoudimi | COMP1006 Assignment One</p>
        </div>
    </footer>
</body>
</html>