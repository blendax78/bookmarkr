<?php

namespace Airwatch\Controllers;

class BookmarksController extends Controller 
{
    private $bookmarksView = null;

    public function __construct()
    {
        // BookmarksController - Handles calls from HTTP router.
        // Declares service model and view
        parent::__construct();
        $this->bookmarksView = new \Airwatch\Views\BookmarksView();
        $this->bookmarks = new \Airwatch\Service\BookmarkServiceModel();
    }

    public function get($id = null)
    {
        // Handles GET requests.  If an ID is set, return 1 bookmark, otherwise, return all
        if (isset($id)) {
            $bookmarks = $this->bookmarks->find($id)->toArray();
        } else {
            $bookmarkObjects = $this->bookmarks->findAll();
            if (count($bookmarkObjects) > 0) {
                $bookmarks = array();
                foreach($bookmarkObjects as $bookmarkObject) {
                    $bookmarks[] = $bookmarkObject->toArray();
                }
            } else {
                $bookmarks = array();
            }
        }

        $this->bookmarksView->render(json_encode($bookmarks));
    }

    public function put()
    {
        // Handles PUT requests. (Updates to bookmarks)
        // Also handles DELETEs, because we do not actually delete bookmarks, we just change their setting to 'deleted'
        $this->bookmarks->update(json_decode($this->request));
    }

    public function post()
    {
        // Handles POST requests. (New bookmarks)
        $id = $this->bookmarks->insert(json_decode($this->request));
        $this->bookmarksView->render(json_encode( array('id' => $id) ));
    }
}
