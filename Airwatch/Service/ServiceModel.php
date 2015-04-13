<?php

namespace Airwatch\Service;

use \Doctrine\ORM\Tools\Setup;
use \Doctrine\ORM\EntityManager;

class ServiceModel
{
    // Basic Database Model Abstraction layer object

    protected $model = null;
    protected $entityManager = null;
    protected $repository = null;

    public function __construct()
    {
        // construct() declares basic Doctrine settings.
        $paths = array(MAIN_DIR . '/Airwatch/Models/');
        $isDevMode = false;

        // The connection configuration
        // Actual connection information is held outside HTML and Git structure.
        $db_config = parse_ini_file(DB_CONFIG, true);
        $dbParams = array(
                'driver'     => 'pdo_mysql',
                'host'         => $db_config['airwatch']['host'],
                'user'         => $db_config['airwatch']['user'],
                'password' => $db_config['airwatch']['pass'],
                'dbname'     => $db_config['airwatch']['db'],
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $this->entityManager = EntityManager::create($dbParams, $config);
    }

    public function find($id)
    {
        // Basic find-by-id function
        // Var: Object Id in database
        return $this->repository->find($id);
    }

    public function findAll()
    {
        // Find all database objects
        return $this->repository->findAll();
    }

    public function insert($object)
    {
        // Add new object to database.
        $this->setFields($object);

        $this->save();

        return $this->model->getId();
    }

    public function update($object)
    {
        // Update an existing object
        $this->model = $this->repository->find($object->id);
        $this->setFields($object);

        $this->save();
    }

    public function save()
    {
        // Persist an object to the database (used by inserts, updates, and deletes)
        $this->entityManager->persist($this->model);
        $this->entityManager->flush();
    }

    private function setFields($object)
    {
        // Converts a $_REQUEST object so its fields can be saved to a Doctrine Object
        foreach(get_object_vars($object) as $key => $property) {
            $this->model->$key = $property;
        }
    }
}
