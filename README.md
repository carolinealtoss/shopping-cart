# Shopping Cart System

Este é um projeto de sistema de carrinho de compras online desenvolvido com Laravel 11. Ele permite que os clientes adicionem itens ao carrinho, escolham a forma de pagamento e visualizem o valor final da compra. A camada de regras de negócio foi implementada para calcular o valor final da compra com base nos itens adicionados ao carrinho e na forma de pagamento escolhida.

## Requisitos

- PHP >= 8.1
- Composer

## Instalação

1. **Clone o repositório:**

    ```bash
    git clone https://github.com/carolinealtoss/shopping-cart.git
    cd shopping-cart
    ```

2. **Instale as dependências do Composer:**

    ```bash
    composer install
    ```

3. **Copie o arquivo de exemplo `.env` e configure seu ambiente:**

    ```bash
    cp .env.example .env
    ```

4. **Gere a chave da aplicação:**

    ```bash
    php artisan key:generate
    ```

## Estrutura do Projeto

O projeto segue a Arquitetura Limpa/Hexagonal, dividindo as responsabilidades em diferentes camadas. Abaixo está uma breve descrição das pastas principais:

- **app/Domain**: Contém as entidades, serviços e objetos de valor da camada de domínio.
- **app/Application**: Contém os casos de uso do projeto.
- **tests/Unit**: Contém os testes unitários.

## Executando o Projeto

1. **Inicie o servidor local:**

    ```bash
    php artisan serve
    ```

## Testes

Este projeto utiliza PHPUnit para testes unitários. Para executar os testes, use o seguinte comando:

    ```bash
    vendor/bin/phpunit
    ```

Ou utilize o seguinte comando:

    ```bash
    php artisan test
    ```
