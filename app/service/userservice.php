<?php
require __DIR__ . '/../repository/userrepository.php';

class UserService {

    protected $repo;

    function __construct()
    {
        $this->repo = new UserRepository();
    }
    
    public function getAll() {
        return $this->repo->getAll();
    }

    public function getByUsername($username) {
        return $this->repo->getByUsername($username);
    }

    public function insert($user) {
        return $this->repo->getAll();
    }

    
}