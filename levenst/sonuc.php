<!DOCTYPE html>
<html>
<head>
    <title>Sonuç Sayfası</title>
</head>
<body>
    <?php
    // Kullanıcının arama sorgusu
    $userQuery = isset($_POST['userQuery']) ? $_POST['userQuery'] : '';

    // Veritabanındaki kategoriler
    $categories = array(
        "giyim",
        "ev eşyaları",
        "mücevherat",
        "elektronik",
        "kitaplar",
        // Diğer kategoriler buraya eklenir
    );

    // En yakın kategoriyi ve Levenshtein mesafesini başlangıçta boş bir değer olarak ayarlayın
    $closestCategory = "";
    $closestDistance = PHP_INT_MAX;

    // Kategorileri dolaşarak en yakın kategoriyi bulun
    foreach ($categories as $category) {
        $distance = levenshtein($userQuery, $category);

        // Daha küçük bir mesafe bulunduysa güncelle
        if ($distance < $closestDistance) {
            $closestCategory = $category;
            $closestDistance = $distance;
        }
    }

    // En yakın kategoriyi kullanıcıya gösterin
    echo "En yakın kategori: " . $closestCategory;
    ?>
</body>
</html>
