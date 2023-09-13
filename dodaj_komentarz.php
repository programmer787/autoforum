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

            <!-- Dodaj więcej pozycji nawigacji według potrzeb -->
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

// Obsługa dodawania komentarza - pobierz dane z formularza i zapisz je do bazy danych
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST['name'];
    $komentarz = $_POST['comment'];

    // Sprawdź, czy użytkownik już dodał komentarz
    $sql_check = "SELECT COUNT(*) as count FROM komentarze WHERE imie='$imie' AND komentarz='$komentarz'";
    $result_check = $mysqli->query($sql_check);

    if ($result_check->num_rows > 0) {
        $row = $result_check->fetch_assoc();
        if ($row['count'] == 0) {
            // Użytkownik nie dodał jeszcze tego komentarza, więc dodaj go
            $sql = "INSERT INTO komentarze (imie, komentarz) VALUES ('$imie', '$komentarz')";

            // Wykonaj zapytanie
            if ($mysqli->query($sql) === TRUE) {
                // Po dodaniu komentarza, przekieruj użytkownika na inną stronę
                header("Location: komentarze.php");
                exit; // Zakończ skrypt, aby uniknąć dodatkowego wykonywania kodu
            } else {
                echo "Błąd podczas dodawania komentarza: " . $mysqli->error;
            }
        } else {
            echo "Użytkownik już dodał ten komentarz.";
        }
    }
}

// Zamknij połączenie z bazą danych
$mysqli->close();
?>
   <footer>
        <p>&copy; 2023 Popularne Marki Samochodów. Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>