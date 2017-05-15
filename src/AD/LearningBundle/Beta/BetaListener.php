<?php

// src/AD/LearningBundle/Beta/BetaListener.php 

namespace AD\LearningBundle\Beta;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 *
 * @author adubost
 */
class BetaListener {

    protected $betaHTML;
    protected $endDate;

    public function __construct(BetaHtml $betaHTML, $endDate) {
        $this->betaHTML = $betaHTML;
        $this->endDate = new \DateTime($endDate);
    }

    public function processBeta(FilterResponseEvent $event) {
        
        
        //check if the request is the master
        if(!$event->isMasterRequest()){
            return;
        }
        
        $remaingDays = $this->endDate->diff(new \DateTime())->format('%d');
        
        if ($remaingDays <= 0){
            return;
        }
        
        $response = $this->betaHTML->displayBeta($event->getResponse(), $remaingDays);
        
        $event->setResponse($response);
        
    }

}
