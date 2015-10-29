## Laravel Brasil Forum [WIP]

## Instalação utilizando Homestead

O fórum já possui o Homestead como dependência, mas ainda é necessário ajustar as configurações do projeto na máquina de desenvolvimento. Primeiramente devemos criar o arquivo `Homestead.yaml` com o comando:

```shell
php vendor/bin/homestead make
```

Por padrão o Laravel irá mapear a pasta atual para o domínio `homestead.app`. Caso deseje outro domínio basta alterar a sessão sites no arquivo `Homestead.yaml`, lembrando que ainda é necessário apontar o domínio para a máquina virtual no arquivo `/etc/hosts`. Por exemplo:

``` 
192.168.10.10    homestead.app
```

Feito isso basta iniciar a máquina virtual e rodar as migrações do projeto:

```shell
vagrant up
vagrant ssh
cd <project_dir>

composer install
npm install
bower install
gulp
cp .env.example .env
php artisan key:generate
php artisan migrate
```

### Instalação sem o Homestead

```shell
composer install
npm install
bower install
gulp
cp .env.example .env
php artisan key:generate
```

Para acessar o banco de dados é necessário possuir o mysql instalado na máquina e configurar o acesso no arquivo `.env`. Feito isso basta rodar as migrações e iniciar o servidor:

```shell
php artisan migrate --seed
php artisan serve
```

### Hangouts

#### Laravel Brasil - Hands on Code 01
https://www.youtube.com/watch?v=YhBCKiN1JGM

#### Laravel Brasil - Hands on Code 02  
https://www.youtube.com/watch?v=kHVW57TsjfI
