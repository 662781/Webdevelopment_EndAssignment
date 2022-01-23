<?php
class User{

    //Fields
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $created_at;

    //Gets all the properties (fields)
    public function jsonSerialize():mixed
    {
        return get_object_vars($this);
    } 

    //Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    //Setters
    public function setUsername(string $username): self
    {
        $this->title = $username;

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    


}