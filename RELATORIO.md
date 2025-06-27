## Análise de Requisitos

### Requisitos Funcionais

| Requisito                                                            | Observações                                                |
| -------------------------------------------------------------------- | ---------------------------------------------------------- |
| Login e Logout do usuário                                            | Autenticação via tela de login, com feedback de erro       |
| Listagem de todas as disciplinas em que o aluno está matriculado     | Exibida na tela principal após login                       |
| Listagem de todas as avaliações do aluno, organizadas por disciplina | Mostrada ao acessar detalhes da disciplina                 |
| Exibição do nome, semestre e ementa da disciplina                    | Detalhes disponíveis na tela/modal da disciplina           |
| Exibição das notas atribuídas por avaliação                          | Listadas junto às avaliações                               |
| Exibição da média aritmética das notas por disciplina                | Calculada no backend e exibida na tela/modal da disciplina |
| Validação e manipulação de CPF                                       | Funções auxiliares no backend                              |

### Requisitos Técnicos

| Requisito                             | Observações                                            |
| ------------------------------------- | ------------------------------------------------------ |
| Backend desenvolvido em Laravel       | Utilizado Eloquent ORM e arquitetura MVC               |
| API RESTful com autenticação JWT      | Rotas protegidas por middleware e JWT                  |
| Frontend em React Native              | Interface mobile responsiva para Android/iOS           |
| Comunicação via API RESTful (Axios)   | Axios utilizado para requisições HTTP                  |
| Armazenamento seguro do token JWT     | Utilizado AsyncStorage no frontend                     |
| Padronização de respostas da API      | ResponseBuilder no backend                             |
| Tratamento centralizado de exceções   | Handler.php no backend                                 |
| Documentação das rotas em `/docs/api` | Todas as rotas documentadas com exemplos               |
| Interface intuitiva e feedback visual | Mensagens de sucesso/erro e carregamento implementados |

### Decisões Técnicas

-   **Laravel como backend:** Escolhido pela robustez, produtividade e integração nativa com Eloquent ORM, facilitando a modelagem e manipulação dos dados.
-   **React Native como frontend:** Permite desenvolvimento multiplataforma (Android/iOS) com uma única base de código, acelerando entregas e manutenção.
-   **JWT para autenticação:** Garante segurança e escalabilidade na autenticação de usuários, com tokens armazenados de forma segura no frontend.
-   **Padronização de respostas:** Implementada via ResponseBuilder para garantir consistência e facilitar o consumo das APIs pelo frontend.
-   **Tratamento centralizado de exceções:** Uso do Handler.php para capturar e tratar erros de forma uniforme, melhorando a experiência do usuário e a manutenção do código.
-   **Documentação automática das rotas:** Todas as rotas da API são documentadas e acessíveis em `/docs/api`, facilitando integração e testes.
-   **AsyncStorage para tokens:** Armazenamento seguro do token JWT no dispositivo do usuário, garantindo persistência entre sessões.
-   **Axios para comunicação HTTP:** Biblioteca consolidada para requisições HTTP, facilitando o consumo da API e o tratamento de respostas/erros.
-   **Uso de middlewares e policies:** Controle de acesso refinado nas rotas, garantindo que apenas usuários autorizados acessem determinados recursos.

## Backend (Laravel)

### Builders

-   **ResponseBuilder.php**: Responsável por padronizar e construir as respostas das requisições HTTP, facilitando o retorno consistente de dados e mensagens para o frontend.
-   **UploadBuilder.php**: Gerencia e abstrai o processo de upload de arquivos, incluindo validações, armazenamento e tratamento de erros.

### Facades

-   **Response.php**: Facade para facilitar o uso do ResponseBuilder em toda a aplicação.
-   **Upload.php**: Facade para simplificar o acesso ao UploadBuilder.

### Helpers

-   **cpf.php**: Funções auxiliares para validação e manipulação de números de CPF, garantindo integridade dos dados dos usuários.

### Exceptions

-   **Handler.php**: Centraliza o tratamento de todas as exceções lançadas na aplicação, garantindo respostas padronizadas e apropriadas para cada tipo de erro.

### Rotas

#### Autenticação (`/auth`)

-   **POST `/auth/login`**  
    Controlador: `AuthController@login`  
    Descrição: Realiza o login do usuário e retorna o token de autenticação.

-   **POST `/auth/logout`**  
    Controlador: `AuthController@logout`  
    Middleware: `JwtMiddleware`  
    Descrição: Realiza o logout do usuário autenticado, invalidando o token.

#### Perfil (`/perfil`)

-   **GET `/perfil/`**  
    Controlador: `PerfilController@me`  
    Middleware: `JwtMiddleware`  
    Descrição: Retorna os dados do perfil do usuário autenticado.

#### Disciplinas (`/disciplinas`)

-   **GET `/disciplinas`**  
    Controlador: `DisciplinaController@indexDisciplinasAluno`  
    Middleware: `JwtMiddleware`  
    Política: `can:listarDisciplinasAluno`  
    Descrição: Lista todas as disciplinas em que o aluno está matriculado.

-   **GET `/disciplinas/{disciplina}`**  
    Controlador: `DisciplinaController@showDisciplinaAluno`  
    Middleware: `JwtMiddleware`  
    Política: `can:getDisciplinaAluno`  
    Descrição: Exibe detalhes de uma disciplina específica do aluno.

-   **GET `/disciplinas/{disciplina}/avaliacoes`**  
    Controlador: `DisciplinaController@showAvaliacoesAluno`  
    Middleware: `JwtMiddleware`  
    Política: `can:getDisciplinaAluno`  
    Descrição: Lista todas as avaliações do aluno em uma disciplina.

-   **GET `/disciplinas/{disciplina}/media`**  
     Controlador: `DisciplinaController@showMediaAluno`  
     Middleware: `JwtMiddleware`  
     Política: `can:getDisciplinaAluno`  
     Descrição: Retorna a média aritmética das notas do aluno na disciplina.

> **Observação:** Todas as rotas da API foram devidamente documentadas e podem ser consultadas em `/docs/api` para mais detalhes sobre parâmetros, exemplos de requisição e resposta.

### Modelagem de dados

-   **Aluno**

    -   Relacionamentos:
        -   Pertence a: **User**
        -   Possui muitas: **Nota**
        -   Participa de muitas: **Disciplina** (tabela pivô: `disciplinas_alunos`)

-   **Professor**

    -   Relacionamentos:
        -   Pertence a: **User**
        -   Possui muitas: **Disciplina**

-   **Curso**

    -   Relacionamentos:
        -   Possui muitas: **Disciplina**

-   **Disciplina**

    -   Relacionamentos:
        -   Pertence a: **Curso**
        -   Pertence a: **Professor**
        -   Possui muitas: **Avaliacao**
        -   Possui muitos: **Aluno** (tabela pivô: `disciplinas_alunos`)

-   **DisciplinaAluno** (tabela pivô)

    -   Relacionamentos:
        -   Pertence a: **Disciplina**
        -   Pertence a: **Aluno**

-   **Avaliacao**

    -   Relacionamentos:
        -   Pertence a: **Disciplina**
        -   Possui muitas: **Nota**

-   **Nota**
    -   Relacionamentos:
        -   Pertence a: **Aluno**
        -   Pertence a: **Avaliacao**

## Frontend (React Native)

O frontend do sistema foi desenvolvido utilizando **React Native**, proporcionando uma experiência mobile moderna, responsiva e multiplataforma (Android/iOS). Abaixo estão as principais características e estrutura do frontend:

### Estrutura de Telas

-   **Tela de Login**
    -   Permite ao usuário autenticar-se no sistema.
    -   Validação de campos e exibição de mensagens de erro.
-   **Tela Principal**
    -   Exibe as disciplinas em que o aluno está matriculado.
    -   Navegação para detalhes de cada disciplina.

### Integração com Backend

-   Consome a API RESTful desenvolvida em Laravel.
-   Utiliza JWT para autenticação e autorização nas requisições.
-   Exibe mensagens de sucesso e erro conforme respostas padronizadas do backend.

### Principais Tecnologias e Bibliotecas

-   **React Navigation**: Gerenciamento de rotas e navegação entre telas.
-   **Axios**: Requisições HTTP para a API.
-   **AsyncStorage**: Armazenamento seguro do token JWT no dispositivo.
