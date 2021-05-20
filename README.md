# Evaluation Symfony

- Clonez le git.
- Dans le dossier lancez la commande ***symfony server:start -d***.
- Configurez le ***.env*** avec vos identifiants de BDD.
- Démarrez votre service MySql.
- Faites la commande ***symfony console doctrine:database:create***.
- Puis ***symfony console make:migration***.
- Puis ***symfony console doctrine:migrations:migrate***.
- Finissez par la commande ***symfony console doctrine:fixtures:load***.
- Rendez vous sur ***localhost:8000***
- Le projet devrais s'afficher