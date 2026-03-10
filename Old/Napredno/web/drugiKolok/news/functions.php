<?php
require_once 'config.php';

/**
 * Funkcija za konekciju sa bazom podataka preko PDO.
 *
 * @param array $params - niz sa host, dbname, user, password
 * @return PDO
 */
function connectToDatabase(array $params): PDO
{
    $dsn = "mysql:host={$params['host']};dbname={$params['dbname']};charset=utf8mb4";
    try {
        $pdo = new PDO($dsn, $params['user'], $params['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

/**
 * Funkcija za filtriranje komentara
 * Zamenjuje loše reči šablonom: prvo slovo + zvezdice + poslednje slovo
 *
 * @param string $comment Komentar koji treba filtrirati
 * @return string Filtrirani komentar
 */
function filterComment(string $comment): string
{
    global $badWords;

    // Podeli komentar na reči
    $words = explode(' ', $comment);

    // Iteriraj kroz sve reči
    for ($i = 0; $i < count($words); $i++) {
        // Ukloni interpunkciju sa strane radi poređenja
        $cleanWord = trim($words[$i], ".,!?;:()[]{}\"'");

        // Proveri da li je loša reč
        foreach ($badWords as $bad) {
            if (strtolower($cleanWord) === strtolower($bad)) {
                $len = strlen($cleanWord);
                // Ako je kratka reč
                if ($len <= 2) {
                    $replacement = $cleanWord[0] . '*';
                } else {
                    // Maskiraj srednje karaktere
                    $replacement = $cleanWord[0] . str_repeat('*', $len - 2) . $cleanWord[$len - 1];
                }

                // Zadrži originalnu interpunkciju
                $words[$i] = str_replace($cleanWord, $replacement, $words[$i]);
                break; // reč je zamenjena, nema potrebe dalje proveravati
            }
        }
    }

    // Vrati spojeni komentar
    return implode(' ', $words);
}