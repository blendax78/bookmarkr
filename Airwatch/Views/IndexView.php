<?php

namespace Airwatch\Views;

class IndexView extends View
{
    public function __construct()
    {
        // Set render template to index page.
        $this->template = 'index.php';
    }

}
