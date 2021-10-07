<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\Validation\Validator;

use Cake\ORM\Table;

// the Text class
use Cake\Utility\Text;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }
    
    // Add the following method.
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('title', 'Title cannot be empty', false)
            ->minLength('title', 10)
            ->maxLength('title', 255);

        $validator
            ->allowEmptyString('body', 'Body cannot be empty', false)
            ->minLength('body', 10);

        return $validator;
    }
    
    
}


?>
