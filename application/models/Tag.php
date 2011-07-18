<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="tags")
 */

class Tag
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
        /**
	 * @ManyToMany(targetEntity="Post", mappedBy="tags")
	 */
	private $posts;
	 
	/**
	 * @Column(type="string", length=200, nullable=false)
	 */
	private $name;
	 
	/**
	 * @Column(type="datetime", nullable=false)
	 */
	private $created_at;
	 
	/**
	 * @Column(type="datetime", nullable=true)
	 */
	private $updated_at;
	
	public function __construct()
	{
            $this->created_at = new \DateTime("now");
	}
        
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function setPosts($posts) { $this->posts = $posts; }
    public function getPosts() {  return $this->posts; }
    public function setName($name) { $this->name = $name; }
    public function getName() {  return $this->name; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
