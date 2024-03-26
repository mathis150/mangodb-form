# mangodb-form

Le projet "MangoDB Form" est développé en PHP. Il est nécessaire d'avoir la version 8.1.X ou au-dessus.

## Installation

Pour permettre un fonctionnement maximum, il vous faudra installer PHP avec Apache, et ensuite suivre la vidéo suivante pour installer MongoDB pour PHP:

https://www.youtube.com/watch?v=9gEPiIoAHo8&list=PLC3y8-rFHvwiXX1maB5o-CZAIHy4I_ILv


## Construction de la base de donnée:

La base de donnée à un total de 4 tables:
- users
- sessions
- forms
- answers

> "Users" stocke les utilisateurs et leurs identifiants

> "Sessions" stocke les sessions des utilisateurs et permet de les identifier quand ils sont connecté.

> "Forms" stocke les questionnaires.

> "Answers" stocke les réponses.

## Important !

Il est important de créer un fichier "env.php" en respectant le fichier "env.example.php" dans le dossier "/php", il sera central pour la connection à la base de donnée.