<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="likes")
 */

class Like
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
       /**
	 * @ManyToOne(targetEntity="User", inversedBy="likes")
	 * @JoinColumns({
		@JoinColumn(name="user", referencedColumnName="id")
	 * })
	 */
	private $user;
	 
	/**
        * @ManyToOne(targetEntity="Post", inversedBy="likes")
        * @JoinColumn(name="post", referencedColumnName="id")
        */
	private $post;
	 
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
    public function setPost($post) { $this->post = $post; }
    public function getPost() {  return $this->post; }
    public function setUser($user) { $this->user = $user; }
    public function getUser() {  return $this->user; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
