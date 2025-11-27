<?php
namespace Controller;

use Model\Connection;
use Model\User;

class UserController
{
    private $db;

    public function __construct()
    {
        $this->db = Connection::getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }

        $email = $_POST['email'] ?? '';
        $senha_digitada = $_POST['senha'] ?? '';

        if (empty($email) || empty($senha_digitada)) {
            header('Location: index.php?error=login_failed');
            exit;
        }

        $userModel = new User($this->db);
        $user = $userModel->getUserByEmail($email);

        if ($user && password_verify($senha_digitada, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome_usuario'];
            header('Location: index.php');
            exit;
        }

        header('Location: index.php?error=login_failed');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }

    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }

        $nome = $_POST['nome'] ?? '';
        $nome_usuario = $_POST['nome_usuario'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha_pura = $_POST['senha'] ?? '';

        if (empty($nome) || empty($nome_usuario) || empty($email) || empty($senha_pura)) {
            header('Location: index.php?error=Todos os campos são obrigatórios.');
            exit;
        }

        $userModel = new User($this->db);
        $result = $userModel->registerUser($nome, $nome_usuario, $email, $senha_pura);

        if (is_int($result)) {
            $user = $userModel->getUserById($result);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nome_usuario'];
            }
            header('Location: index.php?success=registered');
            exit;
        }

        if (is_string($result)) {
            header('Location: index.php?error=' . urlencode($result));
            exit;
        }

        header('Location: index.php?error=Ocorreu um erro ao criar sua conta. Tente novamente.');
        exit;
    }
}
