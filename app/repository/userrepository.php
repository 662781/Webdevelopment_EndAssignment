<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../model/user.php';

class UserRepository extends Repository {
    
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT id, username, email, `password`, created_at FROM user");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();
            return $users;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function getByUsername($username){
        try {
            $stmt = $this->connection->prepare("SELECT id, username, email, `password`, created_at FROM user WHERE username = ?");
            $stmt->execute([$username]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function insert($user) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO user (username, email, `password`, created_at) VALUES (?,?,?, NOW())");            
            
            $stmt->execute([$user->getUsername(), $user->getEmail(), $user->getPassword()]);

        } catch (PDOException $e) {
            echo $e;
        }
    }
}