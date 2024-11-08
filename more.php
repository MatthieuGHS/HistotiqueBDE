<?php
$data = [
    ['Aquila', 'Astro', 'Atlas', 'Naga', 'Kraken', 'Spectre', 'Raven', 'Apocalyse', 'Phoenix', 'Pandore'],
    [
        ["Un Aquila en pleine campagne s'en allant imprimer des documents sur le campus, tomba nez à nez avec la carte d'un Skyfall. Pris d'une fougue sans pareille il décida d'imprimer le dernier document disponnible via cette carte. Quelle ne fut pas sa surprise lorsqu'il sortie le dossier de campagne Skyfall de l'imprimante."], 
        ["Kessel D., alors VP Astro a, au Fablab, cassé une machine à laser de soirée.Par chance il pu s'en sorti avec un \"Wallah c'est pas moi\".", "Pendant le WEP AstrAquila, Zack Astro et Lillan Astro ont balancé des matelas dans une rivière et pendant le WEP AtlAstro, Victor Saunal a pissé sur les pierres chaudes d'un sauna.", "La première réunion d'Asto s'est faite dans un parking et elle a été crée dedans. Les réunions parking était la norme chez eux, si bien que la police les ont engueulé car ils squattaient  le second sous sol du U6, qui est le parking du commissariat.
", "Julia, présidente, s'est pétée la jambe à l'apéro Mintech x Astro en faisant un saute mouton."],
        ["Batiste M. (B2M), alors respo. prev. Atlas, a uriné dans la fontaine de l'administration, un sarcophage (s/o Horus), et à un autre endroit inavouable.", "Pendant le WEP AtlAstro, Victor Saunal a pissé sur les pierres chaudes d'un sauna."], 
        ["Grégory était défoncé et s’est réveillé dans une chambre avec des gens à moitié à poil, il était pas très à l'aise.", "Jeremy a pissé sur la poignée de la Nagamobile pour la dégeler."], 
        ["Quelqu'un s'est cassé la cheville en défendant le stand au dépot", "Le pole voyage ne quitte jamais l'école (déjà 6ans sur le campus)", "Ils balancaient directement leur prémix depuis les fenêtre du U1."], 
        [], 
        ["Organigramme : <a href='https://www.facebook.com/watch/?v=1902278060101295'>ICI</a>", "Les Strattons ont cassé le plafond de la  cuisine du u5, c'est pour ça qu'ils ont gagné.", "Après avoir gardé les vêtements perdus pendant la soirée au local BDE un certain temps, ils ont décidé de ranger. C'est alors qu'ils ont trouvé un chat mort sous les vêtements.", "Le président s'est rasé un sourcil pour la liste."], 
        [], 
        [], 
        ["Pandore a été élu BDE au premier tour à la majorité absolue avec 344 voix (trois listes de 35 personnes à l'époque). Comme personne n'avait pensé à cette possibilité nous avons du dépêcher pour aller chercher des premix. Ils sont rentrés dans le Forum avec un caddie rempli juste au moment de la victoire. C'en est suivit une destruction méticuleuse du local BDE. (Ancienne tradition)", "La seule survivante était une imprimante sur laquelle le BDE payait des frais de location depuis des années;", "Ce BDE était composé quasi uniquement d'étudiant IMT-BS."]
    ]
];

$n = $_GET['BDE'];
$images = glob('./img/carousel/*');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anecdotes <?=$data[0][$n] ?></title>
    <link rel="icon" href="./img/bdeLogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="more.css">
</head>
<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php">
                <img src="./img/bdeLogo.png" alt="Logo" height="50">
                Anecdotes - <?=$data[0][$n] ?>
            </a>
            <div class="d-flex ms-auto"> 
                <a href="index.php" class="btn btn-outline-light">Retour</a>
            </div>
        </div>
    </nav>

    <div id="carousel">
        <div id="carousel-left">
            <img src="./img/organigramme/<?=$n?>.jpg" alt="Fixed Image" class="img-fluid">
        </div>
        <div id="carousel-right">
            <div id="carousel-text">
                <?php
                    foreach ($data[1][$n] as $elt) {
                        echo "<p>{$elt}</p><hr>";
                    }
                ?>
            </div>
        </div>
    </div>

    <script>
        const images = <?php echo json_encode($images); ?>;
        let currentIndex = 0;
        const carousel = document.getElementById('carousel');

        function changeImage() {
            currentIndex = (currentIndex + 1) % images.length;
            carousel.style.backgroundImage = `url(${images[currentIndex]})`;
        }

        carousel.style.backgroundImage = `url(${images[currentIndex]})`;
        setInterval(changeImage, 3000);
    </script>
</body>
</html>
