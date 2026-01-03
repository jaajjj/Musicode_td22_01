# Musicode_td22_01
Projet Web PHP Musicode

## Installation

1. **Installer Composer** : Si vous n'avez pas Composer installé, téléchargez-le depuis [getcomposer.org](https://getcomposer.org/) et suivez les instructions d'installation.

2. **Installer les dépendances** : Dans le répertoire du projet, exécutez la commande suivante pour installer les dépendances PHP :
   ```
   composer install
   ```

3. **Créer le fichier .env** : Créez un fichier `.env` à la racine du projet avec la structure suivante (adaptez les valeurs selon votre configuration) :
   ```
   DB_HOST=localhost
   DB_NAME=musicode_db
   DB_USER=votre_utilisateur_db
   DB_PASSWORD=votre_mot_de_passe_db
   BASE_URL=http://localhost/Musicode_td22_01
   ```
   - `DB_HOST` : L'adresse de votre serveur de base de données (généralement `localhost`).
   - `DB_NAME` : Le nom de votre base de données.
   - `DB_USER` : Votre nom d'utilisateur de base de données.
   - `DB_PASSWORD` : Votre mot de passe de base de données.
   - `BASE_URL` : L'URL de base de votre application (par exemple, `http://localhost/Musicode_td22_01` si vous utilisez XAMPP).
