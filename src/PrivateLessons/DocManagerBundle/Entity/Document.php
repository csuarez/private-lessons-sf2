<?php

namespace PrivateLessons\DocManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="document")
 */
class Document {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=140)
	 */
	protected $title;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $year;

    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="documents")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="documents", cascade={"all"})
     * @ORM\JoinTable(name="categories_documents",
     *      joinColumns={@ORM\JoinColumn(name="document_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     *  )
     */
    protected $categories;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set year
     *
     * @param integer $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set author
     *
     * @param PrivateLessons\DocManagerBundle\Entity\Author $author
     */
    public function setAuthor(\PrivateLessons\DocManagerBundle\Entity\Author $author)
    {
        $this->author = $author;
    }

    /**
     * Get author
     *
     * @return PrivateLessons\DocManagerBundle\Entity\Author 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add categories
     *
     * @param PrivateLessons\DocManagerBundle\Entity\Category $categories
     */
    public function addCategory(\PrivateLessons\DocManagerBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}

?>