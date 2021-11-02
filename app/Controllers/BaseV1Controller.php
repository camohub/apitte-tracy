<?php declare(strict_types = 1);

namespace App\Controllers;

use Apitte\Core\Annotation\Controller\Id;
use Apitte\Core\Annotation\Controller\Path;

/**
 * @Path("/v1")
 * @Id("v1")
 */
abstract class BaseV1Controller extends BaseController
{

}
