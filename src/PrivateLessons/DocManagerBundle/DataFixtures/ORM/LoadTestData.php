<?php

namespace PrivateLessions\DocManagerBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use PrivateLessons\DocManagerBundle\Entity\Document;
use PrivateLessons\DocManagerBundle\Entity\Author;
use PrivateLessons\DocManagerBundle\Entity\Category;


class LoadTestData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	$authors = array();

    	for ($i = 0; $i < 5; $i++) { 
    		$author = new Author();
    		$author->setName('author_' . $i);
    		$manager->persist($author);
    		$authors[] = $author;
    	}

    	$categories = array();

    	for ($i = 0; $i < 5; $i++) { 
    		$category = new Category();
    		$category->setName('category_' . $i);
    		$manager->persist($category);
    		$categories[] = $category;
    	}

    	for ($i=0; $i < 10; $i++) { 
    		$document = new Document();
    		$document->setTitle('document_' . $i);
    		$document->setYear(2010 + $i);
    		$document->setAuthor($authors[$i % 5]);
    		$document->addCategory($categories[$i % 5]);
    		$document->addCategory($categories[(($i + 1) % 5)]);
    		$manager->persist($document);

    	}


        $manager->flush();
    }
}

?>