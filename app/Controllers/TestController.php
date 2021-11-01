<?php declare(strict_types = 1);

namespace App\Controllers;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;

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

    return $this->xxxxxxSendResponse($response, ['test' => 'bbbbbbbbbbbbbbbbbbbbbbb']);
  }

}
