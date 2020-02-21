<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\TiposUsuario;

/**
 * Class TiposUsuarioService
 * @package App\Service
 */
class TiposUsuarioService extends ServiceAbstract
{
    protected $entity = TiposUsuario::class;
}