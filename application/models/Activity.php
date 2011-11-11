<?php
 
namespace models;

/*
Note:
type:
1 -> created new article
2 -> commented on article
3 -> favorited an article
4 -> edited an article
5 -> created new event
6 -> commented on event
7 -> favorited an event
8 -> edited an event
9 -> will come to an event
10 -> will not come to an event
11 -> not sure to come to an event
12 -> new user
13 -> edited profile
*/
 
/**
 * @Entity
 * @Table(name="activities")
 */

class Activity
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
    /**
    * @ManyToOne(targetEntity="User")
    */
    private $user;
	 
	/**
	 * @Column(type="string", length=500, nullable=false)
	 */
	private $name;
	
	/**
	 * @Column(type="integer", nullable=false)
	 */
	private $type;
	
	/**
	 * @Column(type="string", length=500, nullable=false)
	 */
	private $target_type;
	
	/**
	 * @Column(type="string", length=500, nullable=true)
	 */
	private $target_arguments;
	
	/**
	 * @Column(type="integer", nullable=true)
	 */
	private $target_id;
	 
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
    public function setName($name) { $this->name = $name; }
    public function getName() {  return $this->name; }
    public function setUser($user) { $this->user = $user; }
    public function getUser() {  return $this->user; }
    public function setType($type) { $this->type = $type; }
    public function getType() {  return $this->type; }
    public function setTargetType($target_type) { $this->target_type = $target_type; }
    public function getTargetType() {  return $this->target_type; }
    public function setTargetId($target_id) { $this->target_id = $target_id; }
    public function getTargetId() {  return $this->target_id; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
