<html>    
    <head>        
        <meta charset="UTF-8">        
        <title>Ambitions</title>        
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">        
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">        
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.red-indigo.min.css">        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">        
        <link href="../../css/style.css" rel="stylesheet">    
    </head>    
    <body>
        <style>
            body {
                background-color: white !important;
            }
        </style>
        <div class="page-block-help-contact">            
            <?php            
            session_start();            
            require '../../config.php';            
            ?>  
            
            <!-- if the user is NOT Brazilian -->            
            <?php if ($_SESSION['location'] != 'BR') { ?>                
              
            <h2 style="display: inline">Frequently Asked Questions</h2>                
            <hr>                
            <h4 class="faq-question">What is Ambitions?</h4>                
            <p>Ambitions is an administration tool for your goals and ambitions, and a social network. Register any kind of desire, add an image, steps and comments, and allow Ambitions to show you how exactly are you personal projects doing.</p>                <br>                <h4 class="faq-question">Is it free?</h4>                
            <p>Yes! The only thing we ask of you is to share. Share Ambitions with your friends, your family, everyone you know. Support our team by spreading the word. :)</p>                
            <br>
            <h4 class="faq-question">How does it work?</h4>
            <p>You start creating an Ambition (see "What is an Ambition?"), and it will appear on your home page. Then, click on it's title or on the magnifying glass icon, and the details panel will open. On it you can:
                <ul>
                  <li>Add an image that represents your wish;</li>
                  <li>See and edit the Ambition's basic information;</li>
                  <li>Add a description;</li>
                  <li>Delete the Ambition;</li>
                  <li>Add a limit date to achieve this Ambition;</li>
                  <li>Change the current Ambition's state (see "What is the Ambition's state?";</li>
                  <li>Verify the current Ambition's progress (see "What is the Ambition's progress?");</li>
                  <li>Verify or add Steps for Achievement (see "What are Steps for Achievement?");</li>
                  <li>Comment on the Ambition;</li>
                </ul>
                Remember that when opening another person's Ambition, your actions are limited.
            </p>
            <br>
            <h4 class="faq-question">What is an Ambition?</h4>                
            <p>Anything you want! In Ambitions, Ambitions are your desires, dreams, goals, you name it. Basically, anything you wish to achieve or have.</p>                
            <br>                
            <h4 class="faq-question">Why does it say "BETA"?</h4>                
            <p>Ambitions is not finished yet. We're adding more features all the time! If you face an error of any kind, please contact us at contact@samaritan.com.br</p>                
            <br>                
            <h4 class="faq-question">What are Steps for Achievement?</h4>                
            <p>When you have a plan, you might want to take is step by step. Remember: Ambitions is not only a social network, it's a management tool.</p>                
            <br>
            <h4 class="faq-question">What is the Ambition's state?</h4>                
            <p>An Ambition has three states:
                <ul>
                    <li style="color: #F23149">Waiting;</li>
                        When you create an Ambition, it is waiting. Ambitions on Waiting are those in which you are not yet working on. For example, you want to buy a new house, but you are not doing anything to achieve this yet.
                    <li style="color: #F23149">In progress;</li>
                        When you start completing Steps in an Ambition, it is In Progress. These are the Ambitions that you are currently working on to achieve. The progress is directly connected to the Steps.
                    <li style="color: #F23149">Achieved;</li>
                        When you mark an Ambition as Achieved, you reached your goal. Congratulations! An Ambition will also be marked as Achieved when you complete all Steps.
                </ul>                
            </p>                
            <br>
            <h4 class="faq-question">What is the Ambition's progress?</h4>                
            <p>The Ambition's progress is directly connected to the number of Steps you created on that Ambition. For example, if your Ambition has four Steps and you completed two, your Ambition is in 50%.</p>                
            <br>
            <h4 class="faq-question">How can I download the smartphone app?</h4>                
            <p>The Mobile apps are currently in early development. You can still access Ambitions on your smartphone through https://github.com/ThalesLudwig/ambitions.</p>                
            <br>                
            <h4 class="faq-question">When will the Mobile apps be ready?</h4>                
            <p>We'll keep you informed through are Facebook e Twitter pages!</p>                
            <br><br>
            <h2 style="display: inline">CONTACT</h2>
            <hr>
            <p>To report bugs, request improvements or other subject, get in contact with our team on contact@samaritan.com.br. </p>
            <br>
            
            <!-- if the user IS Brazilian -->            
            <?php
            } else { 
            ?>                
            
            <h2 style="display: inline">AJUDA</h2>                
            <hr>                
            <h4 class="faq-question">O que é o Ambitions?</h4>                
            <p>Ambitions é uma ferramenta para administrar seus objetivos e ambições, e uma rede social. Cadastre qualquer tipo de desejo, adicione uma foto, etapas e comentários, e permita que o Ambitions lhe mostre exatamente como está o andamento dos seus projetos pessoais.</p>                
            <br>
            <h4 class="faq-question">Como funciona?</h4>
            <p>Você começa criando sua Ambição (ver "O que é uma Ambição?"), e ela irá aparecer na sua página principal. Após, clique no título dela ou no ícone da lupa, e o painel de detalhes se abrirá. Nele você pode:
                <ul>
                  <li>Adicionar uma imagem que represente seu desejo;</li>
                  <li>Ver e editar os dados básicos da Ambição;</li>
                  <li>Adicionar uma descrição;</li>
                  <li>Deletar a Ambição;</li>
                  <li>Adicionar uma data limite para completar esta Ambição;</li>
                  <li>Modificar o estado (ver "O que é o estado da Ambição?") atual da Ambição;</li>
                  <li>Verificar o progresso (ver "O que é o progresso da Ambição?") da Ambição;</li>
                  <li>Verificar ou adicionar etapas (ver "O que são etapas?") na Ambição;</li>
                  <li>Realizar comentários na Ambição;</li>
                </ul>
                Lembre-se que, ao abrir a Ambição de outra pessoa, suas ações são limitadas.            
            </p>
            <br>
            <h4 class="faq-question">É de graça?</h4>                
            <p>Sim! A única coisa que nós pedimos de você é que compartilhe. Mostre o Ambitions para os seus amigos, sua família, todos que conhece. Ajude nossa equipe espalhando a palavra. :)</p>                
            <br>                
            <h4 class="faq-question">O que é uma Ambição?</h4>                
            <p>O que você quiser! No Ambitions, Ambições são seus desejos, sonhos, metas, o que você quiser. Basicamente, qualquer coisa que você deseja ter ou alcançar.</p>                
            <br>                
            <h4 class="faq-question">Por que está escrito "BETA"?</h4>                
            <p>Ambitions ainda não está pronto. Nós adicionamos novas funções o tempo todo! Se você encontrar um erro de qualquer tipo, por favor entre em contato através do e-mail contact@samaritan.com.br</p>                
            <br>                
            <h4 class="faq-question">O que são Etapas?</h4>                
            <p>Quando você tem um plano, você pode querer aborda-lo por partes. Lembre-se: Ambitions não é só uma rede social, é uma ferramenta de gerenciamento.</p>                
            <br>
            <h4 class="faq-question">O que é o estado da Ambição?</h4>                
            <p>Uma Ambição possui três estados:
                <ul>
                    <li style="color: #F23149">Aguardando;</li>
                        Quando você cria uma Ambição, ela está aguardando. Ambições em Aguardando são aquelas em que você ainda não está trabalhando. Por exemplo, você quer comprar uma casa nova, mas ainda não está fazendo nada para isso.
                    <li style="color: #F23149">Em progresso;</li>
                        Quando você começa a completar Etapas em uma Ambição, ela está Em Progresso. Estas são as Ambições em que você está atualmente trabalhando para alcançar. O progresso é diretamente ligado às Etapas.
                    <li style="color: #F23149">Alcançada;</li>
                        Quando você marca uma Ambição como Alcançada, você atingiu seu objetivo. Parabéns! Uma Ambição também será marcada como Alcançada ao completar todas as Etapas.
                </ul>                
            </p>                
            <br>
            <h4 class="faq-question">O que é o progresso da Ambição?</h4>                
            <p>O progresso de uma Ambição está diretamente ligado ao número de Etapas que você cadastrou na Ambição. Por exemplo, se sua Ambição tem quatro etapas e você completou duas, sua Ambição está em 50%.</p>                
            <br>
            <h4 class="faq-question">Como posso baixar o aplicativo para o meu smartphone?</h4>                
            <p>No momento os aplicativos Mobile ainda estão em fase inicial de desenvolvimento. Você ainda pode acessar o Ambitions pelo seu smartphone através do endereço https://github.com/ThalesLudwig/ambitions</p>                
            <br>                
            <h4 class="faq-question">Qual é a previsão de lançamento para os apps Mobile?</h4>                
            <p>Nós iremos lhe mantendo informado através da nossa página oficial no Facebook e Twitter!</p>                
            <br><br>
            <h2 style="display: inline">CONTATO</h2>
            <hr>
            <p>Para relatar erros, solicitar melhorias ou outros assuntos, entre em contato com a nossa equipe através do e-mail contact@samaritan.com.br. </p>
            <br>
            <?php            
            } 
            ?>        
        </div>        
        
        <!-- scripts -->                
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>        
        <script src="//malsup.github.io/jquery.form.js"></script>        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js"></script>        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>    
    </body>
</html>