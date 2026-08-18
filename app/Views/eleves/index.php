<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Élèves & inscriptions</title>

<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Arial;background:#f7f9f8;color:#18352e;font-size:12px}
button,input,select{font-family:inherit}

.header{height:60px;background:#fff;border-bottom:1px solid #e5ebe8;display:flex;justify-content:space-between;align-items:center;padding:0 32px}
.logo{font-size:12px;font-weight:bold;letter-spacing:1.5px;color:#82918c}
.header-right,.profil,.annee{display:flex;align-items:center;gap:12px}
.annee{border:1px solid #e1e8e5;border-radius:20px;padding:9px 14px}
.point{width:7px;height:7px;background:#087455;border-radius:50%}
.notif,.avatar{width:36px;height:36px;border:1px solid #e1e8e5;border-radius:10px;background:white}
.avatar{background:#e8f0ed;color:#176c54;display:flex;align-items:center;justify-content:center;font-weight:bold}
.profil-info strong,.profil-info span{display:block}
.profil-info strong{font-size:11px}
.profil-info span{font-size:9px;color:#9aa7a3}

.container{padding:38px 43px}
.entete{display:flex;justify-content:space-between;align-items:end;margin-bottom:34px}
.surtitre{font-size:10px;font-weight:bold;letter-spacing:1.3px;color:#087455;margin-bottom:8px}
h1{font-size:30px;margin-bottom:10px;color:#102f28}
.description{color:#71807b}
.btn{background:#076b50;color:white;border:0;border-radius:10px;padding:13px 18px;font-weight:bold;cursor:pointer;text-decoration:none}

.actions{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:16px}
.action{height:64px;background:white;border:1px solid #e3e9e7;border-radius:12px;display:flex;align-items:center;padding:10px;cursor:pointer}
.icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-right:10px}
.vert{background:#edf8f3;color:#087455}
.violet{background:#f2edfb;color:#8260bd}
.bleu{background:#edf5fc;color:#4284be}
.jaune{background:#fff8e9;color:#bc8a27}
.action div:nth-child(2){flex:1}
.action b{display:block;margin-bottom:5px}
.action small{color:#a0aaa6}
.arrow{color:#9ca9a5;font-size:17px}

.filtres{background:white;border:1px solid #e3e9e7;border-radius:12px;padding:11px;display:flex;gap:8px;margin-bottom:16px}
.search{height:40px;flex:1;border:1px solid #d9e2df;border-radius:9px;padding:0 12px;outline:0}
select{height:40px;border:1px solid #d9e2df;border-radius:9px;padding:0 10px;background:white}
.filtres .btn{height:40px;padding:0 16px}
.nombre{padding:12px 5px;white-space:nowrap;color:#52625c}

.table{background:white;border:1px solid #e1e8e5;border-radius:12px;overflow:hidden}
table{width:100%;border-collapse:collapse}
th{height:43px;text-align:left;padding:0 14px;background:#fafcfc;font-size:9px;color:#82918c;border-bottom:1px solid #dfe7e4}
td{height:59px;padding:0 14px;border-bottom:1px solid #e5ebe9;color:#53645e}
.eleve{display:flex;align-items:center;gap:10px}
.mini{width:38px;height:38px;border-radius:10px;background:#eef5f2;display:flex;align-items:center;justify-content:center;color:#387263;font-weight:bold}
.eleve strong,.resp strong,.classe strong{display:block;color:#30473f;margin-bottom:4px}
.eleve small,.resp small,.classe small{color:#9aa7a3}
.badge{padding:6px 10px;border-radius:20px;font-size:10px}
.inscrit{background:#ebf8f1;color:#24815e}
.attente{background:#fff8e8;color:#bc841b}
.non{background:#fff0ee;color:#c45143}
.voir{border:1px solid #e0e8e5;background:white;border-radius:9px;padding:8px;cursor:pointer}

.footer{height:60px;padding:0 14px;display:flex;justify-content:space-between;align-items:center;color:#82918c}
.pagination{display:flex;align-items:center;gap:5px}
.page-link{display:flex;align-items:center;justify-content:center;min-width:34px;height:34px;padding:0 9px;border:1px solid #e0e8e5;border-radius:9px;background:white;color:#52625c;text-decoration:none}
.page-link:hover{background:#f1f6f4}
.page-active{background:#076b50;color:white;border-color:#076b50}

@media(max-width:900px){
.actions{grid-template-columns:repeat(2,1fr)}
.container{padding:25px}
.table{overflow:auto}
table{min-width:950px}
}
@media(max-width:600px){
.header{padding:0 15px}
.profil-info{display:none}
.entete{display:block}
.btn{margin-top:20px}
.actions{grid-template-columns:1fr}
.filtres{flex-wrap:wrap}
.search{flex-basis:100%}
}
</style>
</head>
<body>
<header class="header">
    <div class="logo">ÉCOLE PRIMAIRE AL AMAL</div>
    <div class="header-right">
        <div class="annee">
            <span class="point"></span>
            2026-2027
        </div>
        <button class="notif">♧</button>
        <div class="profil">
            <div class="avatar">MF</div>
            <div class="profil-info">
                <strong>Mariama Faye</strong>
                <span>Administrateur établissement</span>
            </div>
        </div>
    </div>
</header>
<main class="container">
    <div class="entete">
        <div>
            <div class="surtitre">SCOLARITÉ</div>
            <h1>Élèves & inscriptions</h1>
            <p class="description">
                Gérez le dossier de l'élève de son admission jusqu'à sa sortie de l'établissement.
            </p>
        </div>

        <button class="btn" type="button">
            ＋ Inscrire un élève
        </button>
    </div>

    <div class="actions">

        <div class="action">
            <div class="icon vert">♧</div>
            <div>
                <b>Inscription</b>
                <small>Créer un nouveau dossier</small>
            </div>
            <span class="arrow">→</span>
        </div>

        <div class="action">
            <div class="icon violet">▣</div>
            <div>
                <b>Réinscription</b>
                <small>Passage à la nouvelle année</small>
            </div>
            <span class="arrow">→</span>
        </div>

        <div class="action">
            <div class="icon bleu">↓</div>
            <div>
                <b>Transfert entrant</b>
                <small>Élève venant d'une autre école</small>
            </div>
            <span class="arrow">→</span>
        </div>

        <div class="action">
            <div class="icon jaune">↑</div>
            <div>
                <b>Transfert sortant</b>
                <small>Archiver un départ</small>
            </div>
            <span class="arrow">→</span>
        </div>

    </div>
    <form method="GET" action="/eleves" class="filtres">
        <input
            class="search"
            type="text"
            name="search"
            placeholder="⌕ Nom, matricule ou responsable..."
            value="<?= htmlspecialchars($search) ?>"
        >
        <select name="classe">
            <option value="">Toutes les classes</option>

            <?php foreach ($classes as $nomClasse): ?>
                <option
                    value="<?= htmlspecialchars($nomClasse) ?>"
                    <?= $classe === $nomClasse ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($nomClasse) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="statut">
            <option value="">Tous les statuts</option>
            <?php foreach ($statuts as $nomStatut): ?>
                <option
                    value="<?= htmlspecialchars($nomStatut) ?>"
                    <?= $statut === $nomStatut ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($nomStatut) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn">Filtrer</button>
        <span class="nombre">
            <b><?= $total ?></b> élève(s)
        </span>

    </form>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ÉLÈVE</th>
                    <th>MATRICULE</th>
                    <th>CLASSE</th>
                    <th>ÉTABLISSEMENT</th>
                    <th>RESPONSABLE</th>
                    <th>STATUT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if (empty($eleves)): ?>
                <tr>
                    <td colspan="7" style="text-align:center;padding:30px;">
                        Aucun élève trouvé.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($eleves as $eleve): ?>
                    <?php
                    $initiales = strtoupper(
                        substr($eleve['eleve_prenom'], 0, 1) .
                        substr($eleve['eleve_nom'], 0, 1)
                    );

                    $couleur = 'non';
                    if ($eleve['statut'] === 'Inscrit') {
                        $couleur = 'inscrit';
                    }
                    if ($eleve['statut'] === 'En attente') {
                        $couleur = 'attente';
                    }
                    ?>
                    <tr>
                        <td>
                            <div class="eleve">
                                <div class="mini">
                                    <?= $initiales ?>
                                </div>
                                <div>
                                    <strong>
                                        <?= $eleve['eleve_prenom'] . ' ' . $eleve['eleve_nom'] ?>
                                    </strong>
                                    <small>
                                        <?= $eleve['matricule'] ?>
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $eleve['matricule'] ?>
                        </td>
                        <td>
                            <div class="classe">
                                <strong>
                                    <?= $eleve['classe']?>
                                </strong>
                                <small>
                                    <?= $eleve['annee_scolaire'] ?>
                                </small>
                            </div>
                        </td>
                        <td>
                            <?= $eleve['etablissement'] ?>
                        </td>
                        <td>
                            <div class="resp">
                                <strong><?= $eleve['responsable_prenom'] . ' ' . $eleve['responsable_nom']?>
                                </strong>
                                <small>
                                    <?= $eleve['responsable_numero'] ?>
                                </small>
                            </div>
                        </td>
                        <td>
                            <span class="badge <?= $couleur ?>">
                                <?= $eleve['statut'] ?>
                            </span>
                        </td>
                        <td>
                            <button class="voir" type="button">◉</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <?php
        $params = [
            'search' => $search,
            'classe' => $classe,
            'statut' => $statut
        ];
        ?>
        <div class="footer">
            <span>
                Dossiers synchronisés et sauvegardés
            </span>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <?php $params['page'] = $page - 1; ?>
                    <a
                        class="page-link"
                        href="?<?= http_build_query($params) ?>"
                    >
                        ‹
                    </a>
                <?php endif; ?>
                <?php for ($numeroPage = 1; $numeroPage <= $nombrePages; $numeroPage++): ?>
                    <?php $params['page'] = $numeroPage; ?>
                    <a
                        class="page-link <?= $page === $numeroPage ? 'page-active' : '' ?>"
                        href="?<?= http_build_query($params) ?>"
                    >
                        <?= $numeroPage ?>
                    </a>
                <?php endfor; ?>
                <?php if ($page < $nombrePages): ?>
                    <?php $params['page'] = $page + 1; ?>
                    <a
                        class="page-link"
                        href="?<?= http_build_query($params) ?>"
                    >
                        ›
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
</body>
</html>