<?php
namespace APP\Model;

class User {
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;
    /**
     * @var int
     */
    private $id;

    


    /**
     * Get the value of username
     */ 
    public function getUsername():? string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param  string  $username
     */ 
    public function setUsername(string $username):self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     
     */ 
    public function getPassword():? string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */ 
    public function setPassword(string $password):self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId():?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }
}
?>