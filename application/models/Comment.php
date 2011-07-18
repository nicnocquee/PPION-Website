<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="comments")
 */

class Comment
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
        /**
	 * @ManyToOne(targetEntity="Post", inversedBy="comments")
	 * @JoinColumns({
		@JoinColumn(name="post_id", referencedColumnName="id")
	 * })
	 */
	private $post;
        
        /**
        * @ManyToOne(targetEntity="User")
        */
        private $user;
	 
	/**
	 * @Column(type="string", length=500, nullable=false)
	 */
	private $content;
	 
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
            $format = 'Y-m-d H:i:s';
            $this->created_at = new \DateTime();
	}
        
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function setPost($post) { $this->post = $post; }
    public function getPost() {  return $this->post; }
    public function setUser($user) { $this->user = $user; }
    public function getUser() {  return $this->user; }
    public function setContent($content) { $this->content = $content; }
    public function getContent() {  return $this->content; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
