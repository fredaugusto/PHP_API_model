# API PHP com URLs Amigáveis

Este projeto é uma implementação simples de uma API em PHP que utiliza URLs amigáveis e suporte a requisições GET e POST. O sistema permite que os parâmetros sejam passados diretamente na URL, por exemplo: ``http://localhost/api/<param0>/<param1>/<param2>``.

## Estrutura do Projeto

- **``api.php``**: O arquivo principal que processa as requisições e lida com os parâmetros da URL.
- **``.htaccess``**: Arquivo de configuração do Apache que permite a criação de URLs amigáveis e redireciona todas as requisições para ``api.php``.

## Funcionalidades

### 1. Requisições GET
A API pode lidar com requisições GET que aceitam parâmetros diretamente na URL. Por exemplo:

``GET http://localhost/api/produto/123/detalhes``

Nesse caso, ``produto``, ``123`` e ``detalhes`` são os parâmetros (``param0``, ``param1`` e ``param2``, respectivamente) que serão processados pela API.

A resposta JSON para essa requisição pode ser algo como:

``json
{
    "status": "sucesso",
    "message": "Dados obtidos com sucesso",
    "data": {
        "param0": "produto",
        "param1": "123",
        "param2": "detalhes"
    }
}
``

### 2. Requisições POST
A API também aceita requisições POST com um corpo de dados em formato JSON. Por exemplo:

``POST http://localhost/api/produto/123``

Com o seguinte corpo JSON:

``json
{
    "nome": "João",
    "idade": 30
}
``

A resposta JSON pode ser:

``json
{
    "status": "sucesso",
    "message": "Dados recebidos com sucesso",
    "data": {
        "param0": "produto",
        "nome": "João",
        "idade": 30
    }
}
``

## Arquivo ``.htaccess``
O arquivo ``.htaccess`` é essencial para habilitar URLs amigáveis no Apache. Ele redireciona todas as requisições feitas no formato ``/api/<param0>/<param1>/<param2>`` para o arquivo ``api.php``, passando os parâmetros através da variável ``$_GET['params']``.

### Exemplo de ``.htaccess``:

``apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^api/(.*)$ api.php?params=$1 [QSA,L]
``

Esse código realiza as seguintes funções:
- **``RewriteEngine On``**: Habilita o mecanismo de reescrita de URL do Apache.
- **``RewriteCond %{REQUEST_FILENAME} !-f``**: Garante que a reescrita só ocorra se o arquivo requisitado não existir.
- **``RewriteCond %{REQUEST_FILENAME} !-d``**: Garante que a reescrita só ocorra se o diretório requisitado não existir.
- **``RewriteRule ^api/(.*)$ api.php?params=$1 [QSA,L]``**: Redireciona todas as URLs que começam com ``/api/`` para ``api.php``, passando o restante da URL como parâmetros.

## Estrutura de URLs Amigáveis

A API aceita URLs no formato:

``http://localhost/api/<param0>/<param1>/<param2>``

Esses parâmetros são capturados e processados no arquivo ``api.php``, onde você pode fazer o que quiser com eles, como buscar dados no banco de dados, processar informações, etc.

### Exemplo de Uso:

- URL: ``http://localhost/api/produto/123/detalhes``
    - ``param0``: produto
    - ``param1``: 123
    - ``param2``: detalhes

A URL será processada por ``api.php``, e os parâmetros serão extraídos e utilizados conforme a lógica definida.

## Conclusão

Este sistema de API em PHP com URLs amigáveis é uma solução simples e eficaz para criar uma interface de comunicação que utiliza GET e POST, além de proporcionar uma experiência de URL limpa e fácil de usar. O arquivo ``.htaccess`` é crucial para que o redirecionamento funcione corretamente, garantindo que todas as requisições sejam tratadas no formato amigável especificado.
