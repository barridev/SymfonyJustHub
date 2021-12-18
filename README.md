### Getting started

```bash
docker-compose build --pull --no-cache
docker-compose up -d
```

```
# URL
http://127.0.0.1

# Env DB (à mettre dans .env, si pas déjà présent)
DATABASE_URL="postgresql://postgres:password@db:5432/db?serverVersion=13&charset=utf8"
```

### Commandes utiles
```
# Lister l'ensemble des commandes existances 
docker-compose exec php bin/console

# Création d'un controller vierge
docker-compose exec php bin/console make:controller
```

### Gestion de base de données

#### Commandes de création d'entité
```
docker-compose exec php bin/console make:entity
```

#### Mise à jour de la base de données
```
# Voir les requètes qui seront jouer avec force
docker-compose exec php bin/console doctrine:schema:update --dump-sql

# Executer les requètes en DB
docker-compose exec php bin/console doctrine:schema:update --force
```

### Gestion des formulaires 
https://symfony.com/doc/current/reference/forms/types.html

### Gestion de l'auth
https://symfony.com/doc/current/components/security/authentication.html

#### Commande pour générer l'auth
```
docker-compose exec php bin/console make:user
docker-compose exec php bin/console doctrine:schema:update --force
docker-compose exec php bin/console make:auth

// Puis aller dans votre le fichier "custom authenticator" pour choisir la route de redirection après connexion (ligne 54).
```

### Gestion de la securité 
https://symfony.com/doc/current/security.html#securing-controllers-and-other-code
https://symfony.com/doc/current/validation.html