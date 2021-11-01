<?php declare(strict_types = 1);

namespace App\Controllers;

use Apitte\Core\Http\ApiResponse;
use Apitte\Core\UI\Controller\IController;
use Nette\Http\Session;
use Nette\Utils\Json;

/**
 * @GroupPath("/api")
 * @GroupId("api")
 */
abstract class BaseController implements IController
{

  /**
   * @inject
   * @var Session
   */
  public $session;


  public function sendResponse(ApiResponse $response, array $data, int $code = 200)
  {
    return $response->writeBody(Json::encode($data))
      ->withHeader("Content-Type", "aplication/json")
      ->withStatus($code);
  }
}
