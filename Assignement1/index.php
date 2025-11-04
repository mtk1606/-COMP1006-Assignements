<?php
// Mohamed El khoudimi - COMP1006 Assignment 1 
//Student ID: 200630733
// Getting the config file with all my API stuff
include 'config.php';

// Let's get some cat data from the APIs
$catImage = makeApiCall(CAT_IMAGE_API);
$catFact = makeApiCall(CAT_FACT_API);

// Just making sure we have something to show if the API doesn't work
$imageUrl = isset($catImage[0]['url']) ? $catImage[0]['url'] : 'https://via.placeholder.com/400x300?text=Oops+No+Cat';
$factText = isset($catFact['fact']) ? $catFact['fact'] : 'Cats are awesome!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A cool website showing random cats and cat facts">
    <meta name="author" content="Mohamed El khoudimi">
    <title>Random Cats - By Mohamed El khoudimi</title>
    
    <!-- I'm using Bootstrap to make it look nice without too much work -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- My custom CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Adding some icons because they look cool -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Main header section -->
    <header class="main-header">
        <div class="container text-center">
            <h1><i class="fas fa-cat"></i> Cat World</h1>
            <p class="lead">Random cats and cool facts about them!</p>
        </div>
    </header>

    <!-- The main content area -->
    <main class="container my-5">
        <div class="row">
            <!-- Left side - Cat Image -->
            <section class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4"><i class="fas fa-image"></i> Random Cat Photo</h2>
                    </div>
                    <div class="card-body text-center">
                        <!-- This is where the cat picture shows up -->
                        <img src="<?php echo $imageUrl; ?>" alt="A cute cat" class="cat-photo img-fluid">
                    </div>
                    <div class="card-footer">
                        <!-- Refresh button to get a new cat -->
                        <a href="index.php" class="btn btn-primary w-100">
                            <i class="fas fa-sync"></i> Get Another Cat!
                        </a>
                    </div>
                </div>
            </section>

            <!-- Right side - Cat Fact -->
            <section class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h2 class="h4"><i class="fas fa-brain"></i> Did You Know?</h2>
                    </div>
                    <div class="card-body">
                        <!-- This shows the random cat fact -->
                        <p class="fact-text"><?php echo $factText; ?></p>
                    </div>
                    <div class="card-footer">
                        <!-- Another refresh button -->
                        <a href="index.php" class="btn btn-success w-100">
                            <i class="fas fa-sync"></i> New Fact!
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- Info section about the project -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card info-card">
                    <div class="card-body text-center">
                        <h3>About This Website</h3>
                        <p>Hi! I'm Mohamed El khoudimi and I built this for my web programming class. 
                           It uses The Cat API to show random cat pictures and cat facts. 
                           Pretty cool right? Just refresh to see different cats!</p>
                        <div class="tech-badges">
                            <span class="badge bg-warning">PHP</span>
                            <span class="badge bg-info">Bootstrap</span>
                            <span class="badge bg-danger">CSS</span>
                            <span class="badge bg-secondary">APIs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container text-center">
            <p>&copy; 2024 Mohamed El khoudimi - COMP1006 Assignment</p>
            <p class="small">Made with <i class="fas fa-heart text-danger"></i> and lots of coffee!</p>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>