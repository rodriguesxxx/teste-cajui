### Pré-requisitos:

-   [PHP 8+](https://www.php.net/)
-   [Composer](https://getcomposer.org/)
-   [Node.js](https://nodejs.org/en/)
-   [NPM](https://www.npmjs.com/)
-   [Emulador Android](https://developer-android-com.translate.goog/studio/run/emulator?_x_tr_sl=en&_x_tr_tl=pt&_x_tr_hl=pt&_x_tr_pto=tc)

### Configuração(Backend):

1. Clone o repositório

```bash
git clone https://github.com/rodriguesxxx/teste-cajui.git
```

2. Navegue até o backend

```bash
cd teste-cajui && cd backend
```

3. Instale as dependências

```bash
composer install && npm install
```

4. Copie o arquivo .env.example para .env

```bash
cp .env.example .env #configure o banco
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cajui
DB_USERNAME=<seu_usuario>
DB_PASSWORD=<sua_senha>
```

5. Gere uma nova chave para a aplicação

```bash
php artisan key:generate
```

6. Gerar chave para JWT

```bash
php artisan jwt:secret
```

7. Rode o banco de dados

```bash
php artisan migrate --seed
```

8. Verifique o IP da sua máquina

```bash
ifconfig #linux
ipconfig #windows

#ex: 192.168.1.3
```

9. Inicie o servidor

```bash
php artisan serve --host=<IP_DA_SUA_MAQUINA>
```

[Assista o tutorial do backend](tutoriais/backend.mp4)

### Configuração(App):

1. Navegue até o app

```bash
cd teste-cajui && cd app

#caso esteja ./backend
cd ../app
```

2. Instale as dependências

```bash
npm install
```

3. Copie o arquivo .env.example para .env

```bash
cp .env.example .env
```

4. Em .env informe o IP da sua máquina

```bash
EXPO_PUBLIC_API_URL=http://<IP>:8000

#ex: http://192.168.1.3:8000
```

5. Inicie o servidor

```bash
npx expo start
```

[Assista o tutorial do frontend](tutoriais/frontend.mp4)
