<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forum Motoryzacyjne</title>
    <style>
        /* Dodaj stylizację dla komentarzy */
        .comments {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Forum Motoryzacyjne</h1>
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
    <main>
        <section class="car-brand">
            <h2>Samochody które polecamy</h2>
            <!-- Formularz do dodawania komentarzy -->
            <form id="commentForm" action="dodaj_komentarz.php" method="POST">
                <label for="name">Twoje imię:</label>
                <input type="text" id="name" name="name" required>
                <label for="comment">Twój komentarz:</label>
                <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>
                <button type="submit">Dodaj komentarz</button>
            </form>

            <!-- Wyświetlanie komentarzy jako pokaz slajdów -->
            <div class="comments">
                <?php
                // Pobierz komentarze z bazy danych lub innej lokalizacji
                $comments = array(
                    array("name" => "Jan", "comment" => "Komentarz 1"),
                    array("name" => "Anna", "comment" => "Komentarz 2"),
                    array("name" => "Michał", "comment" => "Komentarz 3"),
                    // Dodaj więcej komentarzy według potrzeb
                );

                foreach ($comments as $comment) {
                    echo "<div class='comment'><strong>{$comment['name']}:</strong> {$comment['comment']}</div>";
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Forum Motoryzacyjne. Wszelkie prawa zastrzeżone.</p>
    </footer>
    <script>
        // Skrypt JavaScript do obsługi pokazu slajdów
        let currentSlide = 0;
        const comments = document.querySelectorAll('.comment');

        function showSlide(index) {
            comments.forEach(comment => {
                comment.style.display = 'none';
            });
            comments[index].style.display = 'block';
        }

        function nextSlide() {
            currentSlide++;
            if (currentSlide >= comments.length) {
                currentSlide = 0;
            }
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide--;
            if (currentSlide < 0) {
                currentSlide = comments.length - 1;
            }
            showSlide(currentSlide);
        }

        // Wyświetl pierwszy komentarz
        showSlide(currentSlide);

        // Ustaw interwał dla pokazu slajdów
        setInterval(nextSlide, 5000); // Zmieniaj co 5 sekund, dostosuj czas według potrzeb
    </script>
</body>
</html>