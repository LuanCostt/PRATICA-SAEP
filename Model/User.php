<?php
namespace Model;

use PDO;
use PDOException;

class User
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getUserByEmail(string $email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById(int $id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registerUser(string $nome, string $nome_usuario, string $email, string $senha)
    {
        if ($this->getUserByEmail($email)) {
            return "Email já cadastrado";
        }

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $imagemPadrao = 'default.png';

        try {
            $sql = "INSERT INTO usuarios (nome, nome_usuario, email, senha, imagem, createdAt, updatedAt)
                    VALUES (:nome, :nome_usuario, :email, :senha, :imagem, NOW(), NOW())";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':nome_usuario', $nome_usuario, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
            $stmt->bindParam(':imagem', $imagemPadrao, PDO::PARAM_STR);

            $ok = $stmt->execute();
            if ($ok) {
                return (int) $this->db->lastInsertId();
            }
            return false;
        } catch (PDOException $e) {
            error_log("Erro ao cadastrar usuário: " . $e->getMessage());
            return false;
        }
    }
}
