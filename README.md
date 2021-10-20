(ENG) This README was written in english and portuguese.
(BRA) Esse README foi escrito em inglês e português.


(ENG) Matheus' Workout Generator - Documentation
====================================================================

** Matheus 'Workout Generator (MWG), é um gerador de treinos desenvolvido utilizando PHP, JavaScript, CSS e MySql **

Motivation
-----------------------------

This project was developed with the intention of dealing with different technologies and launching a complete product: from planning, development to hosting. We program daily in our workplaces, and we rarely take the time to create something of our own and complete.

This project helped me to learn new concepts and face various types of problems along the way.

As I'm very connected to the sport, I didn't hesitate when choosing the topic: workout generator.

How it works?
-----------------------------

The user is greeted by the home page, where he must inform which physical level he fits into: amateur, casual, athlete or professional.

Depending on the level selected, the system will generate a number of repetitions, number of sets and a specific number of exercises for that type of user. Also, the higher the athlete's level, the greater the chance of generating an exercise with an advanced stimulus.

The second field on the home page refers to the muscle groups the user wants to train.

After selecting the user level and groups, the workout will be generated.

At the top of the exercise list there is a unique code for the generated workout, this code can be copied and shared with another user so that they can view it.

With the workout code in hand, you can get back to it later by searching the home page.

All workouts have a view counter, the newly created ones are presented as "Brand New". The view count only increases when unique users view the training.

Technologies
-----------------------------

* PHP - All communication with the database and the training generation logic were performed with PHP.
* JavaScript (jQuery) - All screen validations were performed in jQuery. (I am fully aware that this is an outdated technology, however, I needed to train it a little as it is still used in my workplace).
* CSS - General CSS styling using Bootstrap.
* MySql - Used to store the generated training, the amount of views and the users who visit the application.

Techniques
-----------------------------

* The back end (PHP) was structured in MVC architecture with a specific layer for database.
* All class requests were made with composer's autoloader through namespaces.
* Class and folder naming are structured in the psr-4 pattern, required by the autoloader.
* Friendly urls were created with the help of .htaccess.
* The application's page change is performed through requests, preventing the entire page from being loaded from scratch.

Footnote
---------------

* [My website](https://livramento.dev)
* [Live version](https://livramento.dev/projects/mwg)

====================================================================

(BRA) Matheus' Workout Generator - Documentação
====================================================================

**Matheus' Workout Generator (MWG), é um gerador de treinos desenvolvido utilizando PHP, JavaScript, CSS e MySql**

Motivação
-----------------------------

Este projeto foi desenvolvido com a intenção de lidar com diferentes tecnologias e lançar um produto completo: desde o planejamento, desenvolvimento até a hospedagem. Programamos diaramente em nossos locais de trabalho, e, raramente tiramos um tempo para criar algo próprio e completo.

Este projeto contribuiu para que eu aprendesse novos conceitos e enfrentasse vários tipos de problemas ao longo do caminho.

Como sou muito ligado ao esporte, não exitei quanto a escolha do tema: gerador de treinos.

Funcionamento
-----------------------------

O usuário é recebido pela página inicial, na qual o mesmo deve informar em qual nível físico o mesmo se encaixa: amador, casual, atleta ou profissional.

Dependendo do nível selecionado, o sistema irá gerar um número de repetições, número de séries e um número específico de exercícios para aquele tipo de usuário. Também, quão maior for o nível do atleta, maior a chance de gerar um exercício com um estímulo avançado.

O segundo campo da página inicial refere-se aos grupos musculares que o usuário deseja treinar.

Selecionado o nível de usuário e os grupos, o treinamento será gerado.

Na parte superior da lista de exercícios encontra-se um código único para o treinamento gerado, este código pode ser copiado e compartilhado com outro usuário de modo que o mesmo visualize este treino.

Com o código do treinamento em mãos, é possível encontrá-lo posteriormente fazendo a pesquisa através da página inicial.

Todos os treinamentos possuem um contador de visualizações, treinamentos recém criados são apresentados como "Brand New". A contagem de visualização só aumenta quando usuários únicos visualizam o treinamento.

Tecnologias
-----------------------------

* PHP - Toda parte de comunicação com o banco de dados e a lógica de geração dos treinamentos foram realizadas com esta linguagem.
* JavaScript (jQuery) - Todas validações em tela foram realizadas em jQuery. (Eu tenho total ciência que se trata de uma tecnologia defasada, porém, eu precisava treiná-la um pouco pois ela ainda é utilizada no meu local de trabalho).
* CSS - Estilizações gerais em CSS com o auxílio de Bootstrap.
* MySql - Utilizado para armazenar os treinamentos gerados, as quantidades de visualizações e os usuários que visitam a aplicação.

Técnicas
-----------------------------

* O back end (PHP) foi estruturado na arquitetura MVC com uma camada específica para banco de dados.
* Todas requisições de classes foram realizadas com o autoloader do composer através de namespaces.
* As nomenclaturas de classes e pastas são estruturadas no padrão psr-4, exigido pelo autoloader.
* Foram criadas url amigáveis com o auxílio do .htaccess.
* A troca de página da aplicação é realizada através de requisições, evitando que toda página seja carregada do zero.

Nota de rodapé
---------------

* [Meu site](https://livramento.dev)
* [Versão Live](https://github.com/EnlighterJS/EnlighterJS/blob/master/examples/)