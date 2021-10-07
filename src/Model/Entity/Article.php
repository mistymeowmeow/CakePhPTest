<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
    //property which controls how properties can be modified by MASS ASSIGNMENT
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}

?>
