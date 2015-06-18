<?php

namespace Maic\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/notes")
 */
class DefaultController extends Controller
{
    /**
     * Affiche toutes les notes.
     * @return type
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        // on récupère l'instance du client
        $client = $this->get('guzzle.client');
        // on forge la requête http
        $request = $client->get('http://sfrest.local/app_dev.php/notes.json');
        // on obtient la réponse http
        $response = $request->send();
        // on récupère le corps de la réponse
        $json = $response->getBody();
        //on récupère l'instance du service de sérialisation
//        $serializer = $this->get('jms_serializer');
//        $data = $serializer->deserialize($json, "stdClass", "json");
        $data = json_decode($json, true);
        
        return array('response' => $response, 'json' => $json, 'data' => $data);
    }
    
    /**
     * Affiche une note.
     * @return type
     * @Route("/{id}")
     * @Template("MaicClientBundle:Default:index.html.twig")
     */
    public function showAction($id)
    {
        // on récupère l'instance du client
        $client = $this->get('guzzle.client');
        // on forge la requête http
        // on utilise le verbe GET ici
        $request = $client->get('http://sfrest.local/app_dev.php/notes/'.$id.'.json');
        // on obtient la réponse http
        $response = $request->send();
        // on récupère le corps de la réponse
        $json = $response->getBody();
        //on récupère l'instance du service de sérialisation
//        $serializer = $this->get('jms_serializer');
//        $data = $serializer->deserialize($json, "stdClass", "json");
        $data = json_decode($json, true);
        
        return array('response' => $response, 'json' => $json, 'data' => $data);
    }
    
    /**
     * Supprime une note.
     * @return type
     * @Route("/{id}/del")
     * @Template("MaicClientBundle:Default:index.html.twig")
     */
    public function deleteAction($id)
    {
        // on récupère l'instance du client
        $client = $this->get('guzzle.client');
        // on forge la requête http
        // on utilise le verbe DELETE ici
        $request = $client->delete('http://sfrest.local/app_dev.php/notes/'.$id.'.json');
        // on obtient la réponse http
        $response = $request->send();
        // on récupère le corps de la réponse
        $json = $response->getBody();
        //on récupère l'instance du service de sérialisation
//        $serializer = $this->get('jms_serializer');
//        $data = $serializer->deserialize($json, "stdClass", "json");
        $data = json_decode($json, true);
        
        return array('response' => $response, 'json' => $json, 'data' => $data);
    }
}
