<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="photos")
 */

class Photo
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
        /**
	 * @ManyToOne(targetEntity="User", inversedBy="photos")
	 * @JoinColumns({
		@JoinColumn(name="user_id", referencedColumnName="id")
	 * })
	 */
	private $user;
	 
	/**
	 * @Column(type="string", length=200, nullable=false)
	 */
	private $url;
        
        /**
	 * @Column(type="string", length=20, nullable=false)
	 */
	private $direction;
        
        /**
	 * @Column(type="boolean", nullable=true)
	 */
	private $profile;
	 
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
    public function setUrl($url) { $this->url = $url; }
    public function getUrl() {  return $this->url; }
    public function setProfile($profile) { $this->profile = $profile; }
    public function getProfile() {  return $this->profile; }
    public function setDirection($direction) { $this->direction = $direction; }
    public function getDirection() {  return $this->direction; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
