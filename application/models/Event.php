<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="events")
 */

class Event
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
        
        /**
	 * @ManyToOne(targetEntity="User", inversedBy="events")
	 * @JoinColumns({
		@JoinColumn(name="user_id", referencedColumnName="id")
	 * })
	 */
	private $user;
	 
	/**
	 * @Column(type="string", length=200, nullable=false)
	 */
	private $name;
        
        /**
	 * @Column(type="string", length=1000, nullable=false)
	 */
	private $description;
        
        /**
	 * @Column(type="string", length=200, nullable=false)
	 */
	private $place;
        
        /**
	 * @Column(type="datetime", nullable=false)
	 */
	private $deadline;
        
        /**
	 * @Column(type="integer", nullable=true)
	 */
	private $cost;
        
        /**
	 * @Column(type="datetime", nullable=false)
	 */
	private $timeStart;
        
        /**
	 * @Column(type="datetime", nullable=false)
	 */
	private $timeEnd;
        
        /**
	 * @Column(type="string", length=1000, nullable=false)
	 */
	private $limitation;
	/**
        * @ManyToMany(targetEntity="EventTag", inversedBy="event")
        * @JoinTable(name="events_tags")
        */
        private $tags;
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
    public function setName($name) { $this->name = $name; }
    public function getName() {  return $this->name; }
    public function setDescription($description) { $this->description = $description; }
    public function getDescription() {  return $this->description; }
    public function setPlace($place) { $this->place = $place; }
    public function getPlace() {  return $this->place; }
    public function setDeadline($deadline) { $this->deadline = $deadline; }
    public function getDeadline() {  return $this->deadline; }
    public function setCost($cost) { $this->cost = $cost; }
    public function getCost() {  return $this->cost; }
    public function setTimestart($timeStart) { $this->timeStart = $timeStart; }
    public function getTimestart() {  return $this->timeStart; }
    public function setTimeend($timeEnd) { $this->timeEnd = $timeEnd; }
    public function getTimeend() {  return $this->timeEnd; }
    public function setLimitation($limitation) { $this->limitation = $limitation; }
    public function getLimitation() {  return $this->limitation; }
    public function setTags($tags) { $this->tags = $tags; }
    public function getTags() {  return $this->tags; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
