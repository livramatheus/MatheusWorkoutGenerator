<h1 align="center">⛅ Matheus' Workout Generator</h1>

- [English documentation](#english-documentation)
- [Documentação em português](#documentação-em-português)

____
# English Documentation
<h2>📜 Table of content</h2>

<!--ts-->
- [About the project](#about-the-project)
- [Features](#features)
- [Front-end](#front-end)
	- [Layout](#layout)
	- [Technologies](#technologies-front)
- [Back-end](#back-end)
	- [Technologies](#technologies-back)
- [Database](#database)
- [How to set up](#how-to-set-up)
- [Live demo](#live-demo)
- [Author](#author)
<!--te-->
 
<h2 id="about-the-project">💻 About the project</h2>

**Matheus' Workout Generator (MWG)**, is a workout generator developed with PHP, JavaScript, CSS and MySql.

This project was developed with the intention of **dealing with different technologies and launching a complete product**: from planning, development to hosting. 

By developing this application, I was able to learn new concepts and face various types of problems along the way. 

As I'm very connected to the sport, I didn't hesitate when choosing the topic: workout generator.

<h2 id="features">🔎 Features</h2>

The user is greeted by the home page, where he must inform which physical level he fits into: amateur, casual, athlete or professional.

Depending on the level selected, the system will generate a number of repetitions, number of sets and a specific number of exercises for that type of user. Also, the higher the athlete's level, the greater the chance of generating an exercise with an advanced stimulus.

The second field on the home page refers to the muscle groups the user wants to train.

After selecting the user level and groups, the workout will be generated.

At the top of the exercise list there is a unique code for the generated workout, this code can be copied and shared with another user so that they can view it.

With the workout code in hand, you can get back to it later by searching the home page.

All workouts have a view counter, the newly created ones are presented as "Brand New". The view count only increases when unique users view the training.

<h2 id="front-end">Front-end</h2>

The client-side of **MWG** was built with HTML, CSS and JavaScript, using no particular framework.
Every page change is performed through requests, preventing the entire page from being loaded from scratch.

The app's client side is can be summarized in the following layout:

<h3 id="layout">📐 Layout</h3>

#### Mobile
<div style="display: flex; gap: 1rem;">
	<img alt="Mobile 1" title="#1_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/1_m.PNG" height="280"/>
	<img alt="Mobile 2" title="#2_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/2_m.PNG" height="280"/>
	<img alt="Mobile 3" title="#3_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/3_m.PNG" height="280"/>
</div>

#### Desktop
<div style="display: flex; gap: 1rem;">
	<img alt="Desktop 1" title="#1_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/1_d.PNG" height="250"/>
	<img alt="Desktop 2" title="#2_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/2_d.PNG" height="250"/>
	<img alt="Desktop 3" title="#3_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/3_d.PNG" height="250"/>
</div>

<h3 id="technologies-front">🔨 Technologies</h3>

The following techlogies were used to build MWG's front-end:
- **HTML**: Good and old HTML
- **JavaScript (jQuery)**: All validations and async requests were performed with jQuery. (I am fully aware that this is an outdated technology, however, I chose this library because as I was already used to the syntax and it is still eventually used in my workplace in legacy code).
- **CSS**: General CSS styling using Bootstrap.

Third party plugins:
- [Bootstrap Select](https://www.npmjs.com/package/bootstrap-select)

<h2 id="back-end">Back-end</h2>

The back-end was developed with PHP, where every class was built from the ground up.
Check some of the back-end key points:

- All class inclusions were made with composer's autoloader through namespaces.
- Elegantly architectured via Model View Controller.
- Class and folder naming are structured in the psr-4 pattern, required by the autoloader.
- Friendly urls were created with the help of .htaccess to avoid ugly _querystrings_.
- A cookie system was developed to track workout view counts: the view count of a given workout will only increase when a unique user visualizes it.
 
<h3 id="technologies-back">🔨 Technologies</h3>

The following techlogies were used to build MWG's server:
- **PHP**: All communication with the database and the training generation logic were performed with PHP.

<h2 id="database">Database</h2>

MWG's database of choice was [MySql](https://www.mysql.com). Check out a brief description of the tables:
- **tbexercise:** stores a wide set of available exercies;
- **tbgroup:** stores muscle group divisions;
- **tblevel:** stores possible user's level;
- **tbstimulus:** stores advanced variations for a exercise;
- **tbworkout:** stores generated workouts basic info;
- **tbworkoutexercise:** sotres relations between a workout and exercise. Many-to-many table.

<h3 id="how-to-set-up">❓ How to set up</h3>

If you wish to fork this project, start by running the [SQL provided](https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/mwg.sql) in the root directory into your MySql database.

Also, you'll need to set up the following environment variables in your code:

#### Server-side:
- **CLEARDB_DATABASE_URL** (MySql database url)

<h3 id="live-demo">🌐 Live demo</h3>

Check out this project running on [Heroku](https://matheus-workout-generator.herokuapp.com/)

<h3 id="author">👩‍🦲 Author</h3>

Full stack developed by **Matheus do Livramento**.

[GitHub](https://github.com/livramatheus) | [LinkedIn](https://www.linkedin.com/in/livramatheus)

____
# Documentação em português
<h2>📜 Tabela de conteúdo</h2>

<!--ts-->
- [Sobre o projeto](#about-the-project-br)
- [Funcionalidades](#features-br)
- [Front-end](#front-end-br)
	- [Layout](#layout-br)
	- [Tecnologias](#technologies-front-br)
- [Back-end](#back-end-br)
	- [Tecnologias](#technologies-back-br)
- [Banco de dados](#database-br)
- [Como configurar](#how-to-set-up-br)
- [Live demo](#live-demo-br)
- [Autor](#autor-br)
<!--te-->

<h2 id="about-the-project-br">💻 Sobre o projeto</h2>

**Matheus' Workout Generator (MWG)**, é um gerador de treinos desenvolvido em PHP, JavaScript, CSS e MySql.

Este projeto foi desenvolvido com a intenção de **lidar com diferentes tecnologias e lançar um produto completo**: do planejamento, desenvolvimento à hospedagem.

Ao desenvolver esta aplicação, fui capaz de aprender novos conceitos e enfrentar vários tipos de problemas ao longo do caminho.

Como sou muito ligado ao esporte, não hesitei na escolha do tema: gerador de treino.

<h2 id="features-br">🔎 Funcionalidades</h2>

O usuário é saudado pela página inicial, onde deve informar em qual nível físico se enquadra: amador, casual, atleta ou profissional.

Dependendo do nível selecionado, o sistema irá gerar um número de repetições, número de séries e um número específico de exercícios para aquele tipo de usuário. Além disso, quanto mais elevado o nível do atleta, maior a chance de gerar um exercício com um estímulo avançado.

O segundo campo na página inicial se refere aos grupos musculares que o usuário deseja treinar.

Depois de selecionar o nível de usuário e grupos, o treino será gerado.

No topo da lista de exercícios, há um código exclusivo para o exercício gerado, esse código pode ser copiado e compartilhado com outro usuário para que ele possa visualizá-lo.

Com o código de treino em mãos, você pode voltar a ele mais tarde, pesquisando na página inicial.

Todos os exercícios têm um contador de visualização, os recém-criados são apresentados como "Novos". A contagem de visualizações aumenta apenas quando usuários únicos visualizam o treinamento.

<h2 id="front-end-br">Front-end</h2>

O lado do cliente do **MWG** foi construído com HTML, CSS e JavaScript, sem usar nenhum framework em específico. Toda mudança de página é realizada por meio de requisições assíncronas, evitando que toda a página seja carregada do zero.

O lado do cliente do aplicativo pode ser resumido no seguinte layout:

<h3 id="layout-br">📐 Layout</h3>

#### Mobile
<div style="display: flex; gap: 1rem;">
	<img alt="Mobile 1" title="#1_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/1_m.PNG" height="280"/>
	<img alt="Mobile 2" title="#2_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/2_m.PNG" height="280"/>
	<img alt="Mobile 3" title="#3_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/3_m.PNG" height="280"/>
</div>

#### Desktop
<div style="display: flex; gap: 1rem;">
	<img alt="Desktop 1" title="#1_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/1_d.PNG" height="250"/>
	<img alt="Desktop 2" title="#2_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/2_d.PNG" height="250"/>
	<img alt="Desktop 3" title="#3_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/3_d.PNG" height="250"/>
</div>

<h3 id="technologies-front-br">🔨 Tecnologias</h3>

As seguintes tecnologias foram usadas para construir o front-end do MWG:

- **HTML:** bom e velho HTML
- **JavaScript (jQuery):** todas as validações e solicitações assíncronas foram realizadas com jQuery. (Estou totalmente ciente de que esta é uma tecnologia desatualizada, no entanto, escolhi esta biblioteca pois eu já estava acostumado com a sua sintaxe e porque ela ainda é eventualmente usada em meu local de trabalho em código legado).
- **CSS:** para algumas estilizações foi utilizado Bootstrap.

Plug-ins de terceiros:

- [Bootstrap Select](https://www.npmjs.com/package/bootstrap-select)

<h2 id="back-end-br">Back-end</h2>

O back-end foi desenvolvido com PHP, sendo que todas as classes foram construídas do zero. Veja alguns dos pontos-chave do back-end:

- Todas as inclusões de classes foram feitas com o autoloader do composer por meio de namespaces.
- Arquitetado com elegantemente por meio de Model, View e Controller.
- A nomenclatura de classes e pastas é estruturada no padrão psr-4, exigido pelo autoloader.
- Urls amigáveis foram criadas com a ajuda do .htaccess para evitar _querystrings_ feias.
- Um sistema de cookies foi desenvolvido para rastrear a contagem de visualizações dos treinos: a contagem de visualizações de um determinado treino só aumentará quando um usuário único visualizá-lo.

<h3 id="technologies-back-br">🔨 Tecnologias</h3>

As seguintes tecnologias foram usadas para construir o servidor MWG:
- **PHP:** Toda a comunicação com o banco de dados e a lógica de geração dos treinamentos foram realizadas com PHP.

<h2 id="database-br">Banco de Dados</h2>

O banco de dados escolhido para desenvolver MWG foi o [MySql](https://www.mysql.com). Veja a seguir uma breve descrição de suas tabelas:
- **tbexercise:** armazena uma vasta gama de exercícios;
- **tbgroup:** armazena as divisões musculares;
- **tblevel:** armazena os possíveis níveis atléticos do usuário;
- **tbstimulus:** armazena variantes avançadas para algum exercício;
- **tbworkout:** armazena informações básicas de um treinamento;
- **tbworkoutexercise:** armazena uma relação entre treinamento e exercício. É uma tabela muitos para muitos.

<h3 id="how-to-set-up-br">❓ Como configurar</h3>

Se você deseja fazer um _fork_ deste projeto, comece executando o [SQL fornecido](https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/mwg.sql) no diretório raiz em seu banco de dados MySql.

Além disso, você precisará configurar as seguintes variáveis de ambiente em seu código:

#### Server-side:
- **CLEARDB_DATABASE_URL** (Url do banco de dados MySql)

<h3 id="live-demo-br">🌐 Live demo</h3>

Veja este projeto rodando no [Heroku](https://matheus-workout-generator.herokuapp.com/)

<h3 id="autor-br">👩‍🦲 Author</h3>

Full stack desenvolvido por **Matheus do Livramento**.

[GitHub](https://github.com/livramatheus) | [LinkedIn](https://www.linkedin.com/in/livramatheus)
