<?php

class grammar {

    private static $grammar;
    private static $countryCode;

    public function __construct($countryCode) {
        self::$countryCode = $countryCode;
    }

    public function getGrammarIndex() {
        self::$grammar = array(1 => 'Register', 2 => 'Ambitions is always with you: on your computer, Tablet and Smartphone.', 3 => 'Your life doesn\'t stop. Neither do we.', 4 => 'Anywhere you want', 5 => 'Your Future, Online', 6 => 'Planning your life', 7 => 'Meet Ambitions', 8 => 'Login', 9 => 'Ambitions is  social network focused on goals and ambitions. Register whatever you wish and help your friends. ' . 'We at the Ambitions Team believe that everyone should dream and never say something is impossible. ' . 'It is the cooperative feeling that moves Ambitions.', 10 => 'Enter with Facebook', 11 => 'Travel to France', 12 => 'Buy a car', 13 => 'Be promoted', 14 => 'Ski on the montains', 15 => 'Create a budget', 16 => 'Learn to cook', 17 => 'Write a book', 18 => 'Relax more', 19 => 'Whatever you want', 20 => 'You make the future now', 21 => 'Help and Contact');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Registrar', 2 => 'O Ambitions está sempre com você: no seu computador, seu Tablet e no seu Smartphone.', 3 => 'Sua vida não para. Nem nós.', 4 => 'Onde você quiser', 5 => 'Seu Futuro, Online', 6 => 'Planejando sua vida', 7 => 'Conheça o Ambitions', 8 => 'Entrar', 9 => 'Ambitions é uma rede social de objetivos e ambições. Cadastre o que você deseja e ajude seus amigos. ' . 'Nós da equipe Ambitions acreditamos que todos devem sonhar e nunca dizer que algo é impossível. ' . 'É o espírito de cooperação que move o Ambitions.', 10 => 'Entrar com Facebook', 11 => 'Viajar para a França', 12 => 'Comprar um carro', 13 => 'Ser promovida', 14 => 'Esquiar nas montanhas', 15 => 'Criar um orçamento', 16 => 'Aprender a cozinhar', 17 => 'Escrever um livro', 18 => 'Relaxar mais', 19 => 'O que você quiser', 20 => 'O futuro você faz agora', 21 => 'Ajuda e Contato');
        } return self::$grammar;
    }

    public function getGrammarHome() {
        self::$grammar = array(1 => 'Your Ambition', 2 => 'I WANT IT', 3 => 'Loading...');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Sua Ambição', 2 => 'EU QUERO', 3 => 'Carregando...');
        } return self::$grammar;
    }

    public function getGrammarUser() {
        self::$grammar = array(1 => 'Follow', 2 => 'Unfollow', 3 => 'Follow this user to see his Ambitions', 4 => 'We have notified this user. Please wait.', 5 => 'Waiting for Approval');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Seguir', 2 => 'Parar de seguir', 3 => 'Siga este usuário para ver as Ambições', 4 => 'Nós notificamos este usuário. Por favor aguarde.', 5 => 'Esperando Aprovação');
        } return self::$grammar;
    }

    public function getGrammarLogin() {
        self::$grammar = array(1 => 'Home', 2 => 'Enter with Facebook', 3 => 'Register', 4 => 'Email Address', 5 => 'Password', 6 => 'Enter', 7 => 'Authentication failed', 8 => 'Help and Contact');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Início', 2 => 'Entrar com Facebook', 3 => 'Registrar', 4 => 'E-mail', 5 => 'Senha', 6 => 'Entrar', 7 => 'Credenciais não encontradas', 8 => 'Ajuda e Contato');
        } return self::$grammar;
    }

    public function getGrammarNavbar() {
        self::$grammar = array(1 => 'All Ambitions', 2 => 'In Progress', 3 => 'Achieved', 4 => 'Waiting', 5 => 'Options', 6 => 'Contact and Help', 7 => 'Sign Out', 8 => 'Edit Profile', 9 => 'Connections');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Todas Ambições', 2 => 'Em Progresso', 3 => 'Alcançadas', 4 => 'Aguardando', 5 => 'Opções', 6 => 'Contato e Ajuda', 7 => 'Sair', 8 => 'Editar Perfil', 9 => 'Conexões');
        } return self::$grammar;
    }

    public function getGrammarViewAmbition() {
        self::$grammar = array(1 => 'Title', 2 => 'About', 3 => 'Achieve until', 4 => 'Coming soon', 5 => 'Save Changes', 6 => 'Delete', 7 => 'Steps for Achievement', 8 => 'Comments', 9 => 'Achieved', 10 => 'Created in', 11 => 'Waiting', 12 => 'In progress', 13 => 'Change Image');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Título', 2 => 'Sobre', 3 => 'Alcançar até', 4 => 'Em breve', 5 => 'Salvar Alterações', 6 => 'Deletar', 7 => 'Etapas', 8 => 'Comentários', 9 => 'Alcançada', 10 => 'Criada em', 11 => 'Aguardando', 12 => 'Em progresso', 13 => 'Trocar Imagem');
        } return self::$grammar;
    }

    public function getGrammarStepsPanel() {
        self::$grammar = array(1 => 'New Step', 2 => 'There are no steps to show.');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Nova Etapa', 2 => 'Sem Etapas para mostrar.');
        } return self::$grammar;
    }

    public function getGrammarCommentsPanel() {
        self::$grammar = array(1 => 'New Comment', 2 => 'There are no comments to show.');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Novo Comentário', 2 => 'Sem Comentários para mostrar.');
        } return self::$grammar;
    }

    public function getGrammarBondCtr() {
        self::$grammar = array(1 => 'Following', 2 => 'people', 3 => 'There is nobody here.', 4 => 'Followers');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Seguindo', 2 => 'pessoas', 3 => 'Não há ninguém aqui.', 4 => 'Seguidores');
        } return self::$grammar;
    }

    public function getGrammarConnections() {
        self::$grammar = array(1 => 'Following', 2 => 'Followers');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Seguindo', 2 => 'Seguidores');
        } return self::$grammar;
    }

    public function getGrammarSignup() {
        self::$grammar = array(1 => 'SIGN UP', 2 => 'Name', 3 => 'Surname', 4 => 'Email', 5 => 'Valid email', 6 => 'Password', 7 => 'Profile Picture', 8 => 'Add now or later! (<1MB)', 9 => 'CANCEL', 10 => 'SUBMIT', 11 => 'Existing account! The email you informed is already taken.');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'REGISTRAR', 2 => 'Nome', 3 => 'Sobrenome', 4 => 'Email', 5 => 'Email válido', 6 => 'Senha', 7 => 'Foto de Perfil', 8 => 'Adicione agora ou depois! (<1MB)', 9 => 'CANCELAR', 10 => 'REGISTRAR', 11 => 'Conta existente! O email que você informou já está cadastrado.');
        } return self::$grammar;
    }

    public function getGrammarEditProfile() {
        self::$grammar = array(1 => 'Update successful', 2 => 'Change Name', 3 => 'Change Surname', 4 => 'Change cover', 5 => 'Select and press Update', 6 => 'Change profile picture', 7 => 'Images bellow 1 Megabyte', 8 => 'The image cannot be bigger than 1MB');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Update realizado com sucesso', 2 => 'Alterar Nome', 3 => 'Alterar Sobrenome', 4 => 'Alterar Capa', 5 => 'Selecione e pressione Update', 6 => 'Alterar foto de perfil', 7 => 'Imagens menores que 1 Megabyte', 8 => 'Imagem não pode ser maior que 1MB');
        } return self::$grammar;
    }

    public function getGrammarSettings() {
        self::$grammar = array(1 => 'Turn this profile Private', 2 => 'If your profile is private,', 3 => 'nobody will be able to see your ambitions', 4 => 'Change Password', 5 => 'CHANGE', 6 => 'Delete Profile', 7 => 'DELETE', 8 => 'Active:', 9 => 'Active password', 10 => 'New:', 11 => 'New password', 12 => 'Confirm:', 13 => 'Confirm new password', 14 => 'CHANGE', 15 => 'CANCEL', 16 => 'Delete Profile', 17 => 'Are you sure you want to delete your profile?', 18 => 'All your Ambitions will be deleted.', 19 => 'This action can\'t be undone.', 20 => 'DELETE', 21 => 'Changes applied', 22 => 'The new password and the confirmation do not match', 23 => 'The active password is wrong');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'Tornar perfil Privado', 2 => 'Se seu perfil for privado,', 3 => 'ninguém poderá ver suas ambições', 4 => 'Alterar Senha', 5 => 'ALTERAR', 6 => 'Deletar Perfil', 7 => 'DELETAR', 8 => 'Atual:', 9 => 'Senha atual', 10 => 'Nova:', 11 => 'Nova senha', 12 => 'Confirmar:', 13 => 'Confirme nova senha', 14 => 'ALTERAR', 15 => 'CANCELAR', 16 => 'Deletar Perfil', 17 => 'Tem certeza que deseja deletar seu perfil?', 18 => 'Todas as suas Ambições serão deletadas.', 19 => 'Esta ação não pode ser desfeita.', 20 => 'DELETAR', 21 => 'Changes applied', 22 => 'The new password and the confirmation do not match', 23 => 'The active password is wrong');
        } return self::$grammar;
    }

    public function getGrammarNotificationsPanel() {
        self::$grammar = array(1 => 'NOTIFICATIONS', 2 => 'No new notifications');
        if (self::$countryCode == 'BR') {
            self::$grammar = array(1 => 'NOTIFICAÇÕES', 2 => 'Sem novas notificações');
        } return self::$grammar;
    }

}
