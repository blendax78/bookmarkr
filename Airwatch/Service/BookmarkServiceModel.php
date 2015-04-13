<?php

namespace Airwatch\Service;

class BookmarkServiceModel extends ServiceModel
{
    public function __construct()
    {
        // Uses ServiceModel object, and sets relevent fields to Bookmark Object
        parent::__construct();
        $this->model = new \Airwatch\Models\Bookmark();
        $this->repository = $this->entityManager->getRepository('\Airwatch\Models\Bookmark');
    }

    public function findAll()
    {
        // For Bookmarks, we don't actually delete them. Instead, we set their status from 0 to 1.
        // Instead of returning all of the available database rows, we just return the ones with a status of 0.
        return $this->repository->findBy(array('status' => 0));
    }

}
