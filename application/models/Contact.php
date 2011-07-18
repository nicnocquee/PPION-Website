<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="contacts")
 */

class Contact
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
	 
	/**
	 * @ManyToOne(targetEntity="User", inversedBy="contacts")
	 * @JoinColumns({
		@JoinColumn(name="user_id", referencedColumnName="id")
	 * })
	 */
	private $user;
	
	/**
	 * @Column(type="string", length=200, nullable=false)
	 */
	private $address;
	 
	/**
	 * @Column(type="string", length=64, nullable=false)
	 */
	private $type;
        
        /**
	 * @Column(type="boolean", nullable=false)
	 */
	private $visibility;
	
	/**
	 * @Column(type="date", nullable=false)
	 */
	private $created_at;
	 
	/**
	 * @Column(type="date", nullable=true)
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
    public function setAddress($address) { $this->address = $address; }
    public function getAddress() {  return $this->address; }
    public function setType($type) { $this->type = $type; }
    public function getType() {  return $this->type; }
    public function setVisibility($visibility) { $this->visibility = $visibility; }
    public function getVisibility() {  return $this->visibility; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
