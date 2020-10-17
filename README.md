<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Sobre a aplicação

Esta é uma aplicação laravel voltada para o Stack Back-End que exemplifica um sistema inicial de uma API
que realiza o sistema de autenticação via JWT e disponibiliza uma série de rotas que exemplifica um
CRUD de produtos.

Toda a documentação pode ser acessada publicamente no link abaixo.

<a href="https://documenter.getpostman.com/view/10068660/TVRrVjXE">Clique aqui</a>

## O que deve ser executado antes de acessar as rotas?

### Clonando o projeto

Vá até a pasta aonde deseja armazenar o projeto, abra um terminal com o caminho desta pasta e 
digite a seguinte linha de comando.

Atenção: Usuários de Windowns devem abrir o PowerShell para executar esta etapa.

Outra oção é baixar o git e abrir um terminal "git bash" na raiz da pasta desejada.

para saber como baixar o git acesse o seguinte link -> [Git Download](https://git-scm.com/downloads)

```
git clone https://github.com/DeyvissonLopes/test-back-end.git
```

### Instalando dependências

Execute o comando abaixo no mesmo terminal para instalar todas as dependências necessárias para o projeto.

```
composer install
```

### Criação do .env

Precisamos criar a pasta onde serão definidas nossas variáveis de ambiente.
###### Atenção! É aqui que você descreverá as variáveis de ambientes que fazem a conexão com o banco de dados, não se esqueça desse detalhe. Certifique-se que existe um banco de dados que possua as caracteristicas informadas no arquivo :)

```
composer install
```

### Gerando a chave de comunicação do banco de dados com o laravel

Esta chave é necessária para que o Laravel consiga a conexão correta com o banco de dados.

```
php artisan key:generate
```

## Publicação do Provider JWT

Precisamos publicar o provider JWT de autenticação na vendor do laravel, para que funções interligantes possam funcionar.

```
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

## Gerando a chave secreta JWT

Esta chave é necessária para todo o processo de autenticação JWT

```
php artisan jwt:secret
```

## Criando e populando o banco de dados

Por fim, criamos as tabelas do nosso banco de dados e as populamos.

```
php artisan migrate --seed
```

###### Tudo certo!
Agora sua aplicação deve funcionar normalmente :)

Toda e qualquer sugestão, bem como contatos podem ser feitos através do seguinte endereço de E-mail.

deyvissonlopes@outlook.com

Bons Estudos!

