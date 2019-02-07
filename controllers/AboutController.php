<?php

class AboutController
{
    public function ActionIndex()
    {
        require_once (ROOT . '/views/about/index.php');

        return true;
    }
}