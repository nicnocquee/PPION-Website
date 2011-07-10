<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="user")
 */

class User
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
	 
	/**
	 * @Column(type="string", length=32, unique=true, nullable=true)
	 */
	private $username;
	 
	/**
	 * @Column(type="string", length=64, nullable=true)
	 */
	private $password;
	 
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function setUsername($username) { $this->username = $username; }
    public function getUsername() { return $this->username; }
    public function setPassword($password) { $this->password = $password; }
    public function getPassword() {  return $this->password; }

}
