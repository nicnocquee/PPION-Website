<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="eventmembers")
 */

class EventMember
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
        /**
	 * @ManyToOne(targetEntity="Event", inversedBy="members")
	 */
	private $event;
	
	/**
	 * @ManyToOne(targetEntity="User")
	 */
	private $user;
	
	/**
	 * @Column(type="string", length=200, nullable=false)
	 */
	private $position;
	/**
	 * @Column(type="string", length=200, nullable=false)
	 */
	private $responsibility;
	 
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
    public function setPosition($position) { $this->position = $position; }
    public function getPosition() {  return $this->position; }
    public function setResponsibility($responsibility) { $this->responsibility = $responsibility; }
    public function getResponsibility() {  return $this->responsibility; }
    public function setEvent($event) { $this->event = $event; }
    public function getEvent() {  return $this->event; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
