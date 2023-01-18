## Chat GPT avec Symfony

### Description

Ce projet est un chatbot qui utilise OpenAI GPT-3 pour raconter des histoires en fonction d'un thème donné.

### Installation

1. Cloner le projet
2. Installer les dépendances avec `composer install`
3. Créer une clé API sur [https://openai.com/](https://openai.com/)
4. Créer un fichier `.env.local` et y ajouter la clé API
```dotenv
OPENAI_API_KEY=sk-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

### Utilisation

1. Lancer le serveur avec `symfony serve`
2. Ouvrir [http://localhost:8000/](http://localhost:8000/)
3. Entrer un thème de votre choix
4. Cliquer sur "Raconter une histoire"
5. Attendre quelques secondes
6. Lire l'histoire générée par GPT-3
