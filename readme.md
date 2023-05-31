# Liste des fonctionnalités

- ouvrir la modale
- unscroll le body
- ajouter des champs de form
- push les champs en base de données // ou créer un tableau dans l'admin // ou laisser le gestionnaire de formulaire gérer la donnée
- lancer une action si tout est bon
- une autre action si erreur
- fermer la modale si validation
- fermer si clic en dehors de la fenetre
- créer un scenario une fois que le formulaire est validé

## Renommer le dossier au nom du projet

## WP-hook to get the content of different folders

---bash
https://developer.wordpress.org/plugins/plugin-basics/determining-plugin-and-content-directories/
---bash

Modification

V1. Pour la modale : tu ajoutes le shortcode [first-modal]

V2.Tu peux maintenant ajouter une couleur en background. En utilisant
[first-modal color=""]
Un attribut qui personnalise la modale, j'ai fait 3 classes css "modale1", "modale2", "modale3". Par défault si tu ne met rien ça sera modale1 qio s'affiche.
Tu peux tester [first-modal color="modale2"] pour voir la différence.

V3. J'ai simulé un shortcode venant d'une base de données et ayant un ID. Si tu passe un identifiant ça change la couleur et la font size. Tu as deux modèles différents
[first-modal id="1"] [first-modal id="2"]

WARNING : POUR POUVOIR UTILISER BULMA SUR LES MODALES IL FAUDRAIT QUE TU REGARDES CETTE PAGE https://bulma.io/documentation/components/modal/ PARCE QUE QUAND ON IMPORTE BULMA DANS LA FEUILLE DE STYLE CA CREE UN CONFLIT ET LA MODALE NE FONCTIONNE PLUS





28/05/2023
J'ai fait une partie du formulaire dans des nouveaux dossier dans la partie admin puis post type.
Ajout d'un message d'erreur si le titre existe déjà, et un message d'erreur si le titre est vide.

A mon avis s'il clique sur afficher sur toutes les pages ça ouvre le menu exclure. Sil désactive ça ouvre inclure.
Pareil pour les articles ?

29/05/2023
Ajout des custom field pour le logo. Il n'est pas encore actif dans le formulaire perso mais visible et quasi fonctionnel dans le formulaire admin.


31/05 il manque un bouton pour les fichiers dans visuel et les min height ne sont pas les bons