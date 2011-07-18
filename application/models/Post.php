<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="posts")
 */

class Post
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
        /**
	 * @ManyToOne(targetEntity="User", inversedBy="posts")
	 * @JoinColumns({
		@JoinColumn(name="user", referencedColumnName="id")
	 * })
	 */
	private $user;
	 
	/**
	 * @Column(type="string", length=200, nullable=false)
	 */
	private $title;
        
        /**
	 * @Column(type="string", length=3000, nullable=false)
	 */
	private $content;
        
        /**
	 * @Column(type="string", length=200, nullable=true)
	 */
	private $flag;
        
         /**
        * @ManyToMany(targetEntity="Tag", inversedBy="post")
        * @JoinTable(name="posts_tags")
        */
        private $tags;
        
        /**
	* @OneToMany(targetEntity="Comment", mappedBy="post")
	*/
        private $comments;
        
        /**
	* @OneToMany(targetEntity="Like", mappedBy="post")
	*/
        private $likes;
	 
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
    public function setTitle($title) { $this->title = $title; }
    public function getTitle() {  return $this->title; }
    public function setContent($content) { $this->content = $content; }
    public function getContent() {  return $this->content; }
    public function setFlag($flag) { $this->flag = $flag; }
    public function getFlag() {  return $this->flag; }
    public function setTags($tags) { $this->tags = $tags; }
    public function getTags() {  return $this->tags; }
    public function setComments($comments) { $this->comments = $comments; }
    public function getComments() {  return $this->comments; }
    public function setLikes($likes) { $this->likes = $likes; }
    public function getLikes() {  return $this->likes; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
