<?php

namespace Proces\UsuariosBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UsuariosBundle extends Bundle
{
    public function getParent()
    {
        return 'TPUserBundle';
    }
}
