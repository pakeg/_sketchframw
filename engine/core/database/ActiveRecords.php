<?php

namespace engine\core\database;

use \ReflectionClass;
use \ReflectionProperty;
use engine\core\helper\QueryBuilder;

trait ActiveRecords
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var QueryBuilder
     */
    protected $queryBuilder;

    /**
     * ActiveRecord constructor.
     * @param int $id
     */
    public function __construct($id = 0)
    {
        global $di;

        $this->db           = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if ($id) {
            $this->setId($id);
        }
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     *  Save User
     */
    public function save() {
        $properties = $this->getIssetProperties();
        
        try {
            if (isset($this->id)) {
                $this->db->execute(
                    $this->queryBuilder->update($this->getTable())
                        ->set($properties)
                        ->where('id', $this->id)
                        ->sql(),
                    $this->queryBuilder->values
                );
            } else {
                $this->db->execute(
                    $this->queryBuilder->insert($this->getTable())
                        ->set($properties)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return array
     */
    private function getIssetProperties()
    {
        $properties = [];

        foreach ($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;
    }

    /**
     * @return ReflectionProperty[]
     */
    private function getProperties()
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        return $properties;
    }
}