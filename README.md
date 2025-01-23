<p align="center">
  <img src="https://kucdinteractive.com/lgreger/business/images/logo.png" alt="Descrição da imagem" width="400"/>
</p>

# Dragonfly Inn

A Dragonfly Inn é uma pousada encantadora e acolhedora, localizada em um ambiente tranquilo. É um lugar pequeno, com uma atmosfera rústica e charmosa, um refúgio ideal para quem busca descanso e conforto. A decoração é simples, mas aconchegante, e a pousada tem um restaurante que serve pratos caseiros e deliciosos, criando um ambiente acolhedor tanto para os hóspedes quanto para os moradores locais.

## Índice

- [Sobre](#sobre)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Como Instalar](#como-instalar)
- [Como Usar](#como-usar)
- [Consideracoes](#consideracoes)

## Sobre

Uma API simples que realiza as mais frequentes ações de uma pequena pousada. Verifica disponibilidade de quartos, consulta, cria, atualiza e deleta reservas.
A aplicação foi construída de seguindo as diretrizes de uma API Restful e portanto, funciona de forma independente do [front-end](https://github.com/ulcas/dragonflyinn-hotel-front).
(é recomendado a utilização do front-end e caso queira utilizar ele está disponível aqui: https://github.com/ulcas/dragonflyinn-hotel-front)

## Funcionalidades

- [ ] Verifica os quartos disponiveis
- [ ] Atualiza a disponibilidade do quarto
- [ ] Cria uma reserva para um determinado quarto
- [ ] Atualiza a reserva do quarto informado
- [ ] Consulta a reserva do quarto informado
- [ ] Remove a reserva do quarto informado

## Tecnologias Utilizadas

- [PHP 8.1](https://www.php.net/)
- [Laravel 11.x](https://laravel.com/)
- [SQLite](https://sqlite.org/)
- [Git](https://git-scm.com/)
- [API Restful](https://aws.amazon.com/pt/what-is/restful-api/)
- [Postman](https://www.postman.com/)
- [SQLite Studio](https://sqlitestudio.pl/)

## Como Instalar

Siga os passos abaixo para instalar o projeto em sua máquina local! .

1. Clone o repositório:
    ```bash
    git clone https://github.com/ulcas/dragonflyinn-hotel
    ```
2. Acesse o diretório do projeto:
    ```bash
    cd dragonflyinn-hotel
    ```
3. Instale as dependências:
    ```bash
    php composer install
    ```

## Como Usar

Por ser uma API Restful, a aplicação não é dependente do front-end, portanto, pode ser executada diretamente de uma plataforma de API como [Postman](https://www.postman.com/) ou [Insomnia](https://insomnia.rest/download).
Para a utilização com o front-end não existe diferença no modo de executar o programa.

Explique como os usuários podem executar e interagir com o projeto após a instalação. Exemplos de comandos ou passos necessários.

1. Na raiz do projeto, duplique o arquivo `.env.example` e renomeie para `.env` 
2. Execute o comando:
    ```bash
    php artisan migrate
    php artisan db:seed
    php artisan serve
    ```
3. Acesse a URI por alguma plataforma de API com o método GET ou através do browser `http://localhost:8000/api`.
    - Um texto escrito `welcome` deve aparecer, isso significa que a aplicação está funcionando corretamente :) 
4. Segue uma tabela dos end-points disponíveis através da API e seus respectivos métodos HTTP:

| Método    | end-point | Tipo de campo | Descrição |
| -------   | ----- | ------------- | ----------- |
| GET       | / |   asdas | Welcome |
| GET       | api/quarto | nenhum | Retorna os quartos disponiveis |
| PUT/PATCH | api/quarto/{id} | boolean | Atualiza a disponibilidade do quarto |
| GET       | api/quarto/{id} | int | Retorna o quarto |
| GET       | api/reserva | nenhum | Retorna todas as reservas |
| GET       | api/reserva/{email} | string | Retorna a reserva |
| POST      | api/reserva | body | Cria uma reserva |
| PUT/PATCH | api/reserva/{id} | id:int/body | Atualiza a reserva |
| DELETE    | api/reserva/{id} | int | Remove a reserva |

## Consideracoes

Algumas considerações importantes para o melhor uso da aplicação:

- Não é possível alterar/remover os quartos, eles são mockados
- O e-mail é uma chave única
- Este projeto é para uso local e para teste, portanto, a segurança não foi uma preocupação aqui
- Algumas regras foram deixadas de lado pela complexidade e o pouco tempo de desenvolvimento, como as regras de data
- Nem todas as funcionalidades da API estão no front-end, pois o briefing desta atividade deixava claro quais eram as ações que deveriam ser executadas.
- Caso queira resetar o projeto, basta realizar o comando: `php artisan migrate:refresh --seed`
