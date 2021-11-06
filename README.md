<h1 align="center">Matheus' Workout Generator</h1>

<ul>
	<li><a href="#english-documentation">English documentation</a></li>
	<li><a href="#documentação-em-português">Documentação em português</a></li>
</ul>

<hr>

<h1 id="english-documentation">English Documentation</h1>
<h2>📜 Table of content</h2>

<!--ts-->
<ul>
	<li><a href="#about-the-project">About the project</a></li>
	<li><a href="#live-demo">Live demo</a></li>
	<li><a href="#features">Features</a></li>
	<li><a href="#front-end">Front-end</a></li>
	<ul>
		<li><a href="#layout">Layout</a></li>
		<li><a href="#technologies-front">Technologies</a></li>
	</ul>
	<li><a href="#back-end">Back-end</a></li>
	<ul>
		<li><a href="#technologies-back">Technologies</a></li>
	</ul>
	<li><a href="#database">Database</a></li>
	<li><a href="#how-to-set-up">How to set up</a></li>
	<li><a href="#author">Author</a></li>
</ul>
<!--te-->

<h2 id="about-the-project">💻 About the project</h2>

<p><strong>Matheus' Workout Generator (MWG)</strong>, is a workout generator developed with PHP, JavaScript, CSS and MySql.</p>
<p>This project was developed with the intention of <strong>dealing with different technologies and launching a complete product</strong>: from planning, development to hosting. </p>
<p>By developing this application, I was able to learn new concepts and face various types of problems along the way. </p>
<p>As I'm very connected to the sport, I didn't hesitate when choosing the topic: workout generator.</p>

<h2 id="live-demo">🌐 Live demo</h2>

<p>Check out this project running on <a href="https://matheus-workout-generator.herokuapp.com/">Heroku</a></p>

<h2 id="features">🔎 Features</h2>

<p>The user is greeted by the home page, where he must inform which physical level he fits into: amateur, casual, athlete or professional.</p>
<p>Depending on the level selected, the system will generate a number of repetitions, number of sets and a specific number of exercises for that type of user. Also, the higher the athlete's level, the greater the chance of generating an exercise with an advanced stimulus.</p>
<p>The second field on the home page refers to the muscle groups the user wants to train.</p>
<p>After selecting the user level and groups, the workout will be generated.</p>
<p>At the top of the exercise list there is a unique code for the generated workout, this code can be copied and shared with another user so that they can view it.</p>
<p>With the workout code in hand, you can get back to it later by searching the home page.</p>
<p>All workouts have a view counter, the newly created ones are presented as &quot;Brand New&quot;. The view count only increases when unique users view the training.</p>

<h2 id="front-end">Front-end</h2>

<p>The client-side of <strong>MWG</strong> was built with HTML, CSS and JavaScript, using no particular framework.
Every page change is performed through requests, preventing the entire page from being loaded from scratch.</p>
<p>The app's client side is can be summarized in the following layout:</p>

<h3 id="layout">📐 Layout</h3>

<h4 id="mobile">Mobile</h4>

<div style="display: flex; gap: 1rem;">
    <img alt="Mobile 1" title="#1_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/1_m.PNG" height="280"/>
    <img alt="Mobile 2" title="#2_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/2_m.PNG" height="280"/>
    <img alt="Mobile 3" title="#3_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/3_m.PNG" height="280"/>
</div>

<h4 id="desktop">Desktop</h4>

<div style="display: flex; gap: 1rem;">
    <img alt="Desktop 1" title="#1_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/1_d.PNG" height="250"/>
    <img alt="Desktop 2" title="#2_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/2_d.PNG" height="250"/>
    <img alt="Desktop 3" title="#3_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/3_d.PNG" height="250"/>
</div>

<h3 id="technologies-front">🔨 Technologies</h3>

<p>The following techlogies were used to build MWG&#39;s front-end:</p>

<ul>
	<li><strong>HTML</strong>: Good and old HTML</li>
	<li><strong>JavaScript (jQuery)</strong>: All validations and async requests were performed with jQuery. (I am fully aware that this is an outdated technology, however, I chose this library because as I was already used to the syntax and it is still eventually used in my workplace in legacy code).</li>
	<li><strong>CSS</strong>: General CSS styling using Bootstrap.</li>
</ul>

<p>Third party plugins:</p>
<ul>
	<li><a href="https://www.npmjs.com/package/bootstrap-select">Bootstrap Select</a></li>
</ul>

<h2 id="back-end">Back-end</h2>

<p>The back-end was developed with PHP, where every class was built from the ground up.
Check some of the back-end key points:</p>

<ul>
	<li>All class inclusions were made with composer&#39;s autoloader through namespaces.</li>
	<li>Elegantly architectured via Model View Controller.</li>
	<li>Class and folder naming are structured in the psr-4 pattern, required by the autoloader.</li>
	<li>Friendly urls were created with the help of .htaccess to avoid ugly <em>querystrings</em>.</li>
	<li>A cookie system was developed to track workout view counts: the view count of a given workout will only increase when a unique user visualizes it.</li>
</ul>

<h3 id="technologies-back">🔨 Technologies</h3>

<p>The following techlogies were used to build MWG's server:</p>

<ul>
	<li><strong>PHP</strong>: All communication with the database and the training generation logic were performed with PHP.</li>
</ul>

<h2 id="database">Database</h2>

<p>MWG's database of choice was <a href="https://www.mysql.com">MySql</a>. Check out a brief description of the tables:</p>

<ul>
	<li><strong>tbexercise:</strong> stores a wide set of available exercies;</li>
	<li><strong>tbgroup:</strong> stores muscle group divisions;</li>
	<li><strong>tblevel:</strong> stores possible user's level;</li>
	<li><strong>tbstimulus:</strong> stores advanced variations for a exercise;</li>
	<li><strong>tbworkout:</strong> stores generated workouts basic info;</li>
	<li><strong>tbworkoutexercise:</strong> sotres relations between a workout and exercise. Many-to-many table.</li>
</ul>

<h3 id="how-to-set-up">❓ How to set up</h3>

<p>If you wish to fork this project, start by running the <a href="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/mwg.sql">SQL provided</a> in the root directory into your MySql database.</p>
<p>Also, you'll need to set up the following environment variables in your code:</p>

<h4 id="server-side-">Server-side:</h4>

<ul>
	<li><strong>CLEARDB_DATABASE_URL</strong> (MySql database url)</li>
</ul>

<h3 id="author">👩‍🦲 Author</h3>

<p>Full stack developed by <strong>Matheus do Livramento</strong>.</p>
<p><a href="https://github.com/livramatheus">GitHub</a> | <a href="https://www.linkedin.com/in/livramatheus">LinkedIn</a> | <a href="https://www.livramento.dev/">Website</a></p>
<hr>

<h1 id="documentação-em-português">Documentação em português</h1>

<h2>📜 Tabela de conteúdo</h2>

<!--ts-->
<ul>
	<li><a href="#about-the-project-br">Sobre o projeto</a></li>
	<li><a href="#live-demo-br">Live demo</a></li>
	<li><a href="#features-br">Funcionalidades</a></li>
	<li><a href="#front-end-br">Front-end</a></li>
	<ul>
		<li><a href="#layout-br">Layout</a></li>
		<li><a href="#technologies-front-br">Tecnologias</a></li>
	</ul>
	<li><a href="#back-end-br">Back-end</a></li>
	<ul>
		<li><a href="#technologies-back-br">Tecnologias</a></li>
	</ul>
	<li><a href="#database-br">Banco de dados</a></li>
	<li><a href="#how-to-set-up-br">Como configurar</a></li>
	<li><a href="#autor-br">Autor</a></li>
</ul>
<!--te-->

<h2 id="about-the-project-br">💻 Sobre o projeto</h2>

<p><strong>Matheus' Workout Generator (MWG)</strong>, é um gerador de treinos desenvolvido em PHP, JavaScript, CSS e MySql.</p>
<p>Este projeto foi desenvolvido com a intenção de <strong>lidar com diferentes tecnologias e lançar um produto completo</strong>: do planejamento, desenvolvimento à hospedagem.</p>
<p>Ao desenvolver esta aplicação, fui capaz de aprender novos conceitos e enfrentar vários tipos de problemas ao longo do caminho.</p>
<p>Como sou muito ligado ao esporte, não hesitei na escolha do tema: gerador de treino.</p>

<h2 id="live-demo-br">🌐 Live demo</h2>

<p>Veja este projeto rodando no <a href="https://matheus-workout-generator.herokuapp.com/">Heroku</a></p>

<h2 id="features-br">🔎 Funcionalidades</h2>

<p>O usuário é saudado pela página inicial, onde deve informar em qual nível físico se enquadra: amador, casual, atleta ou profissional.</p>
<p>Dependendo do nível selecionado, o sistema irá gerar um número de repetições, número de séries e um número específico de exercícios para aquele tipo de usuário. Além disso, quanto mais elevado o nível do atleta, maior a chance de gerar um exercício com um estímulo avançado.</p>
<p>O segundo campo na página inicial se refere aos grupos musculares que o usuário deseja treinar.</p>
<p>Depois de selecionar o nível de usuário e grupos, o treino será gerado.</p>
<p>No topo da lista de exercícios, há um código exclusivo para o exercício gerado, esse código pode ser copiado e compartilhado com outro usuário para que ele possa visualizá-lo.</p>
<p>Com o código de treino em mãos, você pode voltar a ele mais tarde, pesquisando na página inicial.</p>
<p>Todos os exercícios têm um contador de visualização, os recém-criados são apresentados como &quot;Novos&quot;. A contagem de visualizações aumenta apenas quando usuários únicos visualizam o treinamento.</p>
<h2 id="front-end-br">Front-end</h2>

<p>O lado do cliente do <strong>MWG</strong> foi construído com HTML, CSS e JavaScript, sem usar nenhum framework em específico. Toda mudança de página é realizada por meio de requisições assíncronas, evitando que toda a página seja carregada do zero.</p>
<p>O lado do cliente do aplicativo pode ser resumido no seguinte layout:</p>

<h3 id="layout-br">📐 Layout</h3>

<h4 id="mobile">Mobile</h4>

<div style="display: flex; gap: 1rem;">
    <img alt="Mobile 1" title="#1_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/1_m.PNG" height="280"/>
    <img alt="Mobile 2" title="#2_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/2_m.PNG" height="280"/>
    <img alt="Mobile 3" title="#3_m" src="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/src/assets/3_m.PNG" height="280"/>
</div>

<h4 id="desktop">Desktop</h4>
<div style="display: flex; gap: 1rem;">
    <img alt="Desktop 1" title="#1_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/1_d.PNG" height="250"/>
    <img alt="Desktop 2" title="#2_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/2_d.PNG" height="250"/>
    <img alt="Desktop 3" title="#3_d" src="https://github.com/livramatheus/MatheusWorkoutGenerator/raw/main/src/assets/3_d.PNG" height="250"/>
</div>

<h3 id="technologies-front-br">🔨 Tecnologias</h3>

<p>As seguintes tecnologias foram usadas para construir o front-end do MWG:</p>

<ul>
	<li><strong>HTML:</strong> bom e velho HTML</li>
	<li><strong>JavaScript (jQuery):</strong> todas as validações e solicitações assíncronas foram realizadas com jQuery. (Estou totalmente ciente de que esta é uma tecnologia desatualizada, no entanto, escolhi esta biblioteca pois eu já estava acostumado com a sua sintaxe e porque ela ainda é eventualmente usada em meu local de trabalho em código legado).</li>
	<li><strong>CSS:</strong> para algumas estilizações foi utilizado Bootstrap.</li>
</ul>

<p>Plug-ins de terceiros:</p>
<ul>
<li><a href="https://www.npmjs.com/package/bootstrap-select">Bootstrap Select</a></li>
</ul>

<h2 id="back-end-br">Back-end</h2>

<p>O back-end foi desenvolvido com PHP, sendo que todas as classes foram construídas do zero. Veja alguns dos pontos-chave do back-end:</p>
<ul>
	<li>Todas as inclusões de classes foram feitas com o autoloader do composer por meio de namespaces.</li>
	<li>Arquitetado com elegantemente por meio de Model, View e Controller.</li>
	<li>A nomenclatura de classes e pastas é estruturada no padrão psr-4, exigido pelo autoloader.</li>
	<li>Urls amigáveis foram criadas com a ajuda do .htaccess para evitar <em>querystrings</em> feias.</li>
	<li>Um sistema de cookies foi desenvolvido para rastrear a contagem de visualizações dos treinos: a contagem de visualizações de um determinado treino só aumentará quando um usuário único visualizá-lo.</li>
</ul>

<h3 id="technologies-back-br">🔨 Tecnologias</h3>

<p>As seguintes tecnologias foram usadas para construir o servidor MWG:</p>

<ul>
	<li><strong>PHP:</strong> Toda a comunicação com o banco de dados e a lógica de geração dos treinamentos foram realizadas com PHP.</li>
</ul>
<h2 id="database-br">Banco de Dados</h2>

<p>O banco de dados escolhido para desenvolver MWG foi o <a href="https://www.mysql.com">MySql</a>. Veja a seguir uma breve descrição de suas tabelas:</p>

<ul>
	<li><strong>tbexercise:</strong> armazena uma vasta gama de exercícios;</li>
	<li><strong>tbgroup:</strong> armazena as divisões musculares;</li>
	<li><strong>tblevel:</strong> armazena os possíveis níveis atléticos do usuário;</li>
	<li><strong>tbstimulus:</strong> armazena variantes avançadas para algum exercício;</li>
	<li><strong>tbworkout:</strong> armazena informações básicas de um treinamento;</li>
	<li><strong>tbworkoutexercise:</strong> armazena uma relação entre treinamento e exercício. É uma tabela muitos para muitos.</li>
</ul>

<h3 id="how-to-set-up-br">❓ Como configurar</h3>

<p>Se você deseja fazer um <em>fork</em> deste projeto, comece executando o <a href="https://github.com/livramatheus/MatheusWorkoutGenerator/blob/main/mwg.sql">SQL fornecido</a> no diretório raiz em seu banco de dados MySql.</p>
<p>Além disso, você precisará configurar as seguintes variáveis de ambiente em seu código:</p>

<h4 id="server-side-">Server-side:</h4>

<ul>
	<li><strong>CLEARDB_DATABASE_URL</strong> (Url do banco de dados MySql)</li>
</ul>

<h3 id="autor-br">👩‍🦲 Author</h3>

<p>Full stack desenvolvido por <strong>Matheus do Livramento</strong>.</p>
<p><a href="https://github.com/livramatheus">GitHub</a> | <a href="https://www.linkedin.com/in/livramatheus">LinkedIn</a> | <a href="https://www.livramento.dev/">Website</a></p>
