<?php declare(strict_types = 1);

namespace App\Controllers;

use Apitte\Core\Annotation\Controller\ControllerPath;
use Apitte\Core\Annotation\Controller\Method;
use Apitte\Core\Annotation\Controller\Negotiation;
use Apitte\Core\Annotation\Controller\Negotiations;
use Apitte\Core\Annotation\Controller\Path;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use Apitte\Negotiation\Http\ArrayEntity;
use Apitte\Core\Annotation\Controller\RequestParameter;
use Apitte\Core\Annotation\Controller\RequestParameters;

/**
 * @ControllerPath("/test")
 */
final class TestController extends BaseV1Controller
{

  /**
   * @Path("/")
   * @Method("GET")
   */
  public function index(ApiRequest $request, ApiResponse $response): ApiResponse
  {

    return $this->sendResponse($response, ['test' => 'bbbbbbbbbbbbbbbbbbbbbbb']);
  }

}
