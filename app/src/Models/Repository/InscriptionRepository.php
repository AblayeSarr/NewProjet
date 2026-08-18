<?php

namespace App\Models\Repository;

require_once __DIR__ . '/../../Core/Database.php';

use App\Core\Database;

class InscriptionRepository {
    
    public static function getAllInscriptionsAndEleves(
        int $anneeScolaireId,
        string $search = '',
        string $classe = '',
        string $statut = '',
        int $page = 1,
        int $parPage = 5
    ): array {
        $offset = ($page - 1) * $parPage;

        $sql = "SELECT i.id,
                       e.prenom AS eleve_prenom,
                       e.nom AS eleve_nom,
                       e.matricule,
                       c.nom AS classe,
                       et.nom AS etablissement,
                       r.prenom AS responsable_prenom,
                       r.nom AS responsable_nom,
                       r.numero AS responsable_numero,
                       s.nom AS statut,
                       a.annee AS annee_scolaire
                FROM inscriptions i
                INNER JOIN eleves e ON e.id = i.id_eleve
                INNER JOIN classes c ON c.id = i.id_classe
                INNER JOIN etablissements et ON et.id = c.id_etablissement
                INNER JOIN responsables r ON r.id = e.id_responsable
                INNER JOIN statuts s ON s.id = e.id_statut
                INNER JOIN anneeScolaires a ON a.id = i.id_annee
                WHERE i.id_annee = :annee";

        $params = [':annee' => $anneeScolaireId];

        if ($search !== '') {
            $sql .= " AND (
                LOWER(e.prenom || ' ' || e.nom) LIKE LOWER(:search)
                OR LOWER(e.matricule) LIKE LOWER(:search)
                OR LOWER(r.prenom || ' ' || r.nom) LIKE LOWER(:search)
            )";
            $params[':search'] = "%$search%";
        }

        if ($classe !== '') {
            $sql .= " AND c.nom = :classe";
            $params[':classe'] = $classe;
        }

        if ($statut !== '') {
            $sql .= " AND s.nom = :statut";
            $params[':statut'] = $statut;
        }

        $sql .= " ORDER BY e.nom ASC, e.prenom ASC LIMIT :limit OFFSET :offset";

        $stmt = Database::getInstance()->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->bindValue(':limit', $parPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function countInscriptions(
        int $anneeScolaireId,
        string $search = '',
        string $classe = '',
        string $statut = ''
    ): int {
        $sql = "SELECT COUNT(*)
                FROM inscriptions i
                INNER JOIN eleves e ON e.id = i.id_eleve
                INNER JOIN classes c ON c.id = i.id_classe
                INNER JOIN responsables r ON r.id = e.id_responsable
                INNER JOIN statuts s ON s.id = e.id_statut
                WHERE i.id_annee = :annee";

        $params = [':annee' => $anneeScolaireId];

        if ($search !== '') {
            $sql .= " AND (
                LOWER(e.prenom || ' ' || e.nom) LIKE LOWER(:search)
                OR LOWER(e.matricule) LIKE LOWER(:search)
                OR LOWER(r.prenom || ' ' || r.nom) LIKE LOWER(:search)
            )";
            $params[':search'] = "%$search%";
        }

        if ($classe !== '') {
            $sql .= " AND c.nom = :classe";
            $params[':classe'] = $classe;
        }

        if ($statut !== '') {
            $sql .= " AND s.nom = :statut";
            $params[':statut'] = $statut;
        }

        $stmt = Database::getInstance()->prepare($sql);
        $stmt->execute($params);

        return (int) $stmt->fetchColumn();
    }

    public static function getClasses(int $anneeScolaireId): array
    {
        $stmt = Database::getInstance()->prepare(
            "SELECT DISTINCT c.nom
             FROM inscriptions i
             INNER JOIN classes c ON c.id = i.id_classe
             WHERE i.id_annee = :annee
             ORDER BY c.nom"
        );

        $stmt->execute([':annee' => $anneeScolaireId]);

        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public static function getStatuts(): array
    {
        $stmt = Database::getInstance()->query(
            "SELECT nom FROM statuts ORDER BY nom"
        );

        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
}