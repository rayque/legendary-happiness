# Search Recipes

Sistema de pesquisa de receitas

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