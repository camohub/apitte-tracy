<?php declare(strict_types = 1);

namespace App\Controllers;

use Apitte\Core\Annotation\Controller\GroupId;
use Apitte\Core\Annotation\Controller\GroupPath;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use Apitte\Core\UI\Controller\IController;
use App\Controllers\Entity\UserTask;
use Models\Campaigns;
use Models\CampaignsNewShare;
use Models\Company;
use Models\Devices;
use Models\Filters;
use Models\Locations;
use Models\Reports;
use Models\Sales;
use Models\Users;
use Models\Media;
use Models\Video;
use Models\Groups;
use Nette\Http\Session;
use Nette\Utils\Json;
use Models\Billing;

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
