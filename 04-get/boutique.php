<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>04 - GET - Boutique</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">04 - GET - Boutique</h1>

        <div id="boutique" class="d-flex justify-content-around">

            <div class="col-2 d-flex flex-column align-items-center border border-dark">
                <img src="https://picsum.photos/id/237/214/300" alt="">

                <!-- <a href="url_destination?indice=valeur&indice=valeur&indice=valeur"></a> -->
                <!-- le ? permet de délimiter l'url de destination et les paramètres transmit dans l'URL -->
                <!-- le signe & permet d'ajouter des paramètres les uns à la suite des autres dans l'URL -->
                <a href="fiche_produit.php?id=1&article=pull&couleur=noir&prix=15" class="alert-link text-dark my-3">Produit 1</a>

            </div>

            <div class="col-2 d-flex flex-column align-items-center border border-dark">
                <img src="https://picsum.photos/id/238/214/300" alt="">

                <a href="fiche_produit.php?id=2&article=jean&couleur=bleu&prix=35" class="alert-link text-dark my-3">Produit 2</a>
            </div>

            <div class="col-2 d-flex flex-column align-items-center border border-dark">
                <img src="https://picsum.photos/id/239/214/300" alt="">

                <a href="fiche_produit.php?id=3&article=tee-shirt&couleur=jaune&prix=25" class="alert-link text-dark my-3">Produit 3</a>
            </div>

            <div class="col-2 d-flex flex-column align-items-center border border-dark">
                <img src="https://picsum.photos/id/240/214/300" alt="">

                <a href="fiche_produit.php?id=4&article=chapeau&couleur=vert&prix=20" class="alert-link text-dark my-3">Produit 4</a>
            </div>

        </div>

    </div>
</body>
</html>