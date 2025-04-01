<?php
// maka ny base de donnee ary amin'ny wamp
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produits";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération: les produits et leurs catégories
$sql = "SELECT p.id, p.nom, p.description, p.prix, p.image, c.nom AS categorie_nom FROM produit p JOIN categorie c ON p.categorie_id = c.id";

$result = $conn->query($sql);

if (!$result) {
    die("Erreur dans la requête : " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Place</title>
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1200px; 
            margin: 0 auto;
            padding: 20px; 
        }
        .product-info {
            display: none;
            position: absolute;
            background: rgba(0, 0, 0, 0.7);
            color: whitesmoke;
            padding: 10px;
            border-radius: 5px;
            top: 0;
            left: 0;
            right: 0;
        }
        .product-card {
            position: relative;
            margin-bottom: 20px;
            overflow: hidden;
            height: 200px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            transition: border-color 0.3s;
            
        }
        .product-card:hover {
            border-color: rgba(255, 255, 255, 0.5);
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:10px">
        <a class="navbar-brand" style="margin-left:10px" href="#">MARKET PLACE</a>
        <form class="form-inline">
            <input id="search-input" style="margin-left:850px" type="search" placeholder="Rechercher" aria-label="Search">
        </form>
    </nav>
    
        <!-- Mampiseho ilay categorie rehetra, mampiasa radiobutton afahana misafidy azy -->
        <div class="d-flex justify-content-start" style="margin-left:300px">
            <form>
                <label class="mr-3"><input type="radio" name="category" value="all" checked> Tous</label>
                <label class="mr-3"><input type="radio" name="category" value="Informatique"> Informatique</label>
                <label class="mr-3"><input type="radio" name="category" value="Electromenager"> Electromenager</label>
                <label class="mr-3"><input type="radio" name="category" value="Cuisine"> Cuisine</label>
                <label class="mr-3"><input type="radio" name="category" value="Mode"> Mode</label>
                <label class="mr-3"><input type="radio" name="category" value="Sport"> Sport</label>
                <label><input type="radio" name="category" value="Beaute"> Beauté</label>
            </form>
        </div>

    <div class="container mt-4" id="product-container">
        <div class="row">
            <?php
            // mampiseho ny information an'ilay produit sy ny sarin'ilay produit 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-3 product-card">';
                    echo '<div class="product-info">';
                    echo '<h5>' . htmlspecialchars($row['nom']) . '</h5>';
                    echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                    echo '<p>Prix : ' . htmlspecialchars($row['prix']) . ' €</p>';
                    echo '<p>Catégorie : ' . htmlspecialchars($row['categorie_nom']) . '</p>';
                    echo '</div>';
                    echo '<img src="' . htmlspecialchars($row['image']) . '" class="img-fluid" alt="Image" />';
                    echo '</div>';
                }
            } else {
                echo '<p>Aucun produit trouvé.</p>';
            }
            $conn->close();
            ?>
        </div>
    </div>

  
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script>
        // evt (pour montrer les informations des produits )
        $(document).ready(function() {
            $('.product-card').hover(
                function() {
                    $(this).find('.product-info').fadeIn();
                }, function() {
                    $(this).find('.product-info').fadeOut();
                }
            );

            // recherche
            $('#search-input').on('keyup', function() {
                let query = $(this).val();
                $.ajax({
                    url: 'recherche.php',
                    method: 'POST',
                    data: {query: query},
                    success: function(data) {
                        $('#product-container').html(data);
                    }
                });
            });

            // Fonction de filtrage par catégorie 
            $('input[name="category"]').on('change', function() {
                let categorie = $(this).val();
                if (categorie === 'all') {
                    // Recharge tous les produits (izay atao recherche)
                    $.ajax({
                        url: 'recherche.php',
                        method: 'POST',
                        data: {}, // filtre = 0
                        success: function(data) {
                            $('#product-container').html(data);
                        }
                    });
                } else {
                    // recherche : filtre par catégorie 
                    $.ajax({
                        url: 'recherche.php',
                        method: 'POST',
                        data: {categorie: categorie},
                        success: function(data) {
                            $('#product-container').html(data);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
