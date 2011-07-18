<?php
 
namespace models;
 
/**
 * @Entity
 * @Table(name="family")
 */

class Family
{
	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
	 
	/**
	 * @ManyToOne(targetEntity="User", inversedBy="families")
	 * @JoinColumns({
		@JoinColumn(name="user_id", referencedColumnName="id")
	 * })
	 */
	private $user;
	
	/**
	 * @Column(type="integer", nullable=false)
	 */
	private $member;
	 
	/**
	 * @Column(type="string", length=64, nullable=false)
	 */
	private $relationship;
	
	/**
	 * @Column(type="boolean", nullable=false)
	 */
	private $confirmed;
	
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
    public function setMember($member) { $this->member = $member; }
    public function getMember() {  return $this->member; }
    public function setRelationship($relationship) { $this->relationship = $relationship; }
    public function getRelationship() {  return $this->relationship; }
    public function setConfirmed($confirmed) { $this->confirmed = $confirmed; }
    public function getConfirmed() {  return $this->confirmed; }
    
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
    public function getCreatedAt() {  return $this->created_at; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }
    public function getUpdatedAt() {  return $this->updated_at; }
}
