<?php

namespace App\Controller\Website;

use App\Rss\RssReader;
use Sulu\Bundle\WebsiteBundle\Controller\WebsiteController;
use Sulu\Component\Content\Compat\StructureInterface;

class RssController extends WebsiteController
{
    public function renderAction(StructureInterface $structure, $preview = false, $partial = false)
    {
        $response = $this->renderStructure(
            $structure,
            [
                'data' => $this->get('rss_service')->getMyData(),
            ],
            $preview,
            $partial
        );

        return $response;
    }

    public static function getSubscribedServices()
    {
        $subscribedServices = parent::getSubscribedServices();
        $subscribedServices['rss_service'] = RssReader::class;

        return $subscribedServices;
    }
}