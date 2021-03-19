# Sistema de pesquisa de receitas

## ✋🏻 Pré-requisitos
- [docker](https://www.docker.com/)
- [docker-compose](https://docs.docker.com/compose/install/)


## Features
Para o desenvolvimento do projeto foi utilizada a stack com as seguintes tecnologias:

- **Laravel** — Laravel is a web application framework with expressive, elegant syntax.Web framework que permite utilizar javascript tanto no frontend quanto no backend;
- **Vue Js** —Vue (pronounced /vjuː/, like view) is a progressive framework for building user interfaces.;

## 🚀  Tecnologias
Backend:
-   [Laravel 8](https://laravel.com/)

Frontend:
-   [Vuejs](https://vuejs.org/)
-   [Axios](https://github.com/axios/axios)
-   [Vue Router](https://router.vuejs.org/)
-   [Vuetifyjs](https://vuetifyjs.com/en/)

## Instalação

Baixe o repositório e entre no diretório do projeto
```bash
git clone https://github.com/rayque/legendary-happiness
cd  legendary-happiness
```

Suba os containers das aplicações 
```bash
docker-compose up
```
Conatiners
- dm-frontend, porta  8080
- dm-nginx, porta 8000
- dm-backend

Instale as dependencias do laravel
```bash
docker-compose exec dm-backend composer install
```

Crie o arquivo .env e gere a key
```bash
docker-compose exec dm-backend cp .env.example .env
docker-compose exec dm-backend php artisan key:generate

```

Coloque a chave da api Giphy no arquivo .env. Path: legendary-happiness/backend/.env 


```bash
GIPHY_KEY=<sua-chave>
```

## Rotas

http://localhost:8000/recipies/?i=onion


## License
[MIT](https://choosealicense.com/licenses/mit/)