<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="favorites")
 */

class Favorite
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
	 
	/**
	 * @ManyToOne(targetEntity="User", inversedBy="favorites")
	 * @JoinColumns({
	 	@JoinColumn(name="user_id", referencedColumnName="id", onDelete="SET NULL")
	 * })
	 */
	private $user;
	
	/**
	 * @ManyToOne(targetEntity="Post", inversedBy="favorites")
	 * @JoinColumns({
		@JoinColumn(name="post_id", referencedColumnName="id", onDelete="SET NULL")
	 * })
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
    public function setUser($user) { $this->user = $user; }
    public function getUser() {  return $this->user; }
    public function setPost($post) { $this->post = $post; }
    public function getPost() {  return $this->post; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
