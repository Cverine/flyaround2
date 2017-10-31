<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 25/10/17
 * Time: 15:27
 */

namespace WCS\CoavBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use WCS\CoavBundle\Entity\Flight;
use WCS\CoavBundle\Entity\PlaneModel;
use WCS\CoavBundle\Entity\Reservation;


/**
 * Class ListingController
 * @Route("listing")
 */
class ListingController extends Controller
{


    /**
     * List one reservation with one flight and one planemodel with id
     *
     * @Route("/{reservation_id}/flight/{flight_id}/planemodel/{planemodel_id}", name="listing_index", requirements={"reservation_id": "\d+"})
     * @Method("GET");
     * @ParamConverter("reservation", options={"mapping" : {"reservation_id": "id"}})
     * @ParamConverter("flight",   options={"mapping": {"flight_id": "id"}})
     * @ParamConverter("planemodel",   options={"mapping": {"planemodel_id": "id"}})
     */
    public function indexAction(Reservation $reservation, Flight $flight, PlaneModel $planemodel)
    {
        return $this->render('listing/index.html.twig', array(
            'reservation' => $reservation,
            'flight'      => $flight,
            'planemodel'  => $planemodel
        ));
    }
}