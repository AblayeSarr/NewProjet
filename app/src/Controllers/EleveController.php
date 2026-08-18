<?php

namespace App\Controllers;

require_once __DIR__ . "/../Core/Database.php";
require_once __DIR__ . "/../Models/Repository/InscriptionRepository.php";

use App\Core\Database;
use App\Models\Repository\InscriptionRepository;

class EleveController
{
    public function index(): void
    {
        $db = Database::getInstance();

        if ($db === null) {
            die("Connexion à la base de données impossible.");
        }

        $stmt = $db->prepare(
            "SELECT id FROM anneeScolaires WHERE annee = :annee"
        );
        $stmt->execute([':annee' => '2026-2027']);

        $anneeScolaireId = $stmt->fetchColumn();

        if (!$anneeScolaireId) {
            die("Année scolaire 2026-2027 introuvable.");
        }

        $search = trim($_GET['search'] ?? '');
        $classe = trim($_GET['classe'] ?? '');
        $statut = trim($_GET['statut'] ?? '');

        $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        $page = (!$page || $page < 1) ? 1 : $page;

        $parPage = 5;

        $total = InscriptionRepository::countInscriptions(
            (int) $anneeScolaireId,
            $search,
            $classe,
            $statut
        );

        $nombrePages = max(1, (int) ceil($total / $parPage));

        if ($page > $nombrePages) {
            $page = $nombrePages;
        }

        $eleves = InscriptionRepository::getAllInscriptionsAndEleves(
            (int) $anneeScolaireId,
            $search,
            $classe,
            $statut,
            $page,
            $parPage
        );

        $classes = InscriptionRepository::getClasses(
            (int) $anneeScolaireId
        );

        $statuts = InscriptionRepository::getStatuts();

        require_once __DIR__ . "/../../Views/eleves/index.php";
    }
}