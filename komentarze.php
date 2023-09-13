<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Komentarze</title>
</head>
<body>
    <header>
        <h1>Komentarze</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="marki.php">Marki</a></li>
            <li><a href="dyskusje.php">Dyskusje</a></li>
            <li><a href="silniki.php">Silniki</a></li>
            <li><a href="pomoc.php">Pomoc</a></li>
        </ul>
    </nav>

    <?php
    // Dane do połączenia z bazą danych
    $host = 'localhost'; // Nazwa hosta bazy danych
    $db_user = 'root'; // Nazwa użytkownika bazy danych
    $db_password = 'root'; // Hasło użytkownika bazy danych
    $db_name = 'ksiegarnia'; // Nazwa twojej bazy danych

    // Utwórz połączenie z bazą danych
    $mysqli = new mysqli($host, $db_user, $db_password, $db_name);

    // Sprawdź połączenie z bazą danych
    if ($mysqli->connect_error) {
        die("Błąd połączenia z bazą danych: " . $mysqli->connect_error);
    }

    // Pobierz wszystkie komentarze z bazy danych
    $comments = array();
    $sql = "SELECT imie, komentarz FROM komentarze";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comments[] = array(
                'imie' => $row['imie'],
                'komentarz' => $row['komentarz']
            );
        }
    }

    // Zamknij połączenie z bazą danych PO zakończeniu wszystkich operacji na bazie danych
    $mysqli->close();

    // Wyświetl komentarze na stronie
    foreach ($comments as $comment) {
        echo "<p><strong>{$comment['imie']}:</strong> {$comment['komentarz']}</p>";
    }
    ?>

    <footer>
        <p>&copy; 2023 Popularne Marki Samochodów. Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>