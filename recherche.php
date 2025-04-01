<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produits";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les produits selon la recherche ou la catégorie
$query = isset($_POST['query']) ? $_POST['query'] : '';
$categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';

$sql = "SELECT p.id, p.nom, p.description, p.prix, p.image, c.nom AS categorie_nom
        FROM produit p
        JOIN categorie c ON p.categorie_id = c.id
        WHERE p.nom LIKE '%$query%'";

if ($categorie) {
    $sql .= " AND c.nom = '$categorie'";
}

$result = $conn->query($sql);

// Afficher les résultats de recherche
echo '<style>
    .product-info {
        display: none;
        position: absolute;
        background: rgba(0, 0, 0, 0.7);
        color: white;
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
        height: 300px;
        border: 2px solid rgba(255, 255, 255, 0.2);
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
</style>';

// mampiseho ny information an'ilay produit sy ny sarin'ilay produit 
echo '<div class="row" id="product-row">';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
    for ($i = 0; $i < 4; $i++) {
        echo '<div class="col-md-3 product-card"></div>';
    }
    echo '<p>Aucun produit trouvé.</p>';
}
echo '</div>'; 

$conn->close();
?>

<script>
    //meme evt pour l'info 
$(document).ready(function() {
    $('#product-row').on('mouseenter', '.product-card', function() {
        $(this).find('.product-info').fadeIn();
    }).on('mouseleave', '.product-card', function() {
        $(this).find('.product-info').fadeOut();
    });
});
</script>
