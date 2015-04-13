<?php

namespace Airwatch\Views;

class BookmarksView extends View
{
    public function __construct()
    {
        // Set render template to bookmarks page.
        // bookmarks.php requires a $view_data json objectß∑
        $this->template = 'bookmarks.php';
    }

}
