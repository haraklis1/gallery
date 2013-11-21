<?php

namespace Awesomeirko\GalleryUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AwesomeirkoGalleryUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
