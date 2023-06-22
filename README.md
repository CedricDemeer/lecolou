# lecolou

## Description
Presentation de l'Asso + Affichage des Events créer sur HelloAsso


## Techno
HTML / CSS / Javascript / PHP<br>
-TailWindCSS

## API HelloAsso
Connexion à l'API avec OAuth 2.0

##### authentification OAuth
Lors de l'authentification, vous recevrez un access_tokenqui est de courte durée (30 minutes), et un refresh_tokenqui vous permettra d'en obtenir un nouveau access_tokenpendant un mois. Lorsque vous avez un access_tokenet un refresh_token, vous DEVEZ obtenir un nouveau access_tokenen utilisant le qui refresh_tokenvous est délivré (avec le grant_type=refresh_token), et NE DEVEZ PAS obtenir un nouveau access_tokenen utilisant le client . Lors du rafraichissement, vous obtiendrez un nouveau access_tokenvalable 30 minutes, et un nouveau refresh_tokenvalable encore un mois. Si vous continuez à utiliser chacun refresh_tokenque vous recevez, vous pourrez rester authentifié pour toujours, sans avoir à saisir à nouveau votre secret client ni à demander à l'utilisateur son identifiant et son mot de passe.

##### helloasso.php
- 1er co pour récup un token + écriture dans un fichier
- vérif le timer de validité du token dans le fichier
- récup un refresh token si plus valide
- si retour vide, supp du fichier pour regenérer une demande du 1er token