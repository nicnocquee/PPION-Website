<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="rsvps")
 */

class Rsvp
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
        /**
	 * @ManyToOne(targetEntity="Event", inversedBy="rsvps")
	 */
	private $event;
	
	/**
	 * @ManyToOne(targetEntity="User")
	 */
	private $user;
	
	/**
	 * @Column(type="integer", nullable=false)
	 */
	private $answer;
	 
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
    public function setAnswer($answer) { $this->answer = $answer; }
    public function getAnswer() {  return $this->answer; }
    public function setEvent($event) { $this->event = $event; }
    public function getEvent() {  return $this->event; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
