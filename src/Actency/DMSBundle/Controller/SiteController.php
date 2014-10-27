<?php

namespace Actency\DMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Actency\DMSBundle\Entity\Site;
use Symfony\Component\HttpFoundation\Request;
use Actency\DMSBundle\Form\Type\SiteType;

class SiteController extends Controller
{
  public function addAction(Request $request)
  {
    $site = new Site();
    $form = $this->createForm('site', $site);
    $form->handleRequest($request);

    if ($form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($site);
      $em->flush();

      $flash = $this->get('braincrafted_bootstrap.flash');
      $flash->success('New site successfully added !');

      return $this->redirect($this->generateUrl('actency_dms_homepage'));
    }

    return $this->render('ActencyDMSBundle:Site:add.html.twig', array(
      'form' => $form->createView()
    ));
  }

  public function editAction(Request $request, Site $site)
  {
    $form = $this->createForm('site', $site);
    $form->handleRequest($request);

    if ($form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($site);
      $em->flush();

      $flash = $this->get('braincrafted_bootstrap.flash');
      $flash->success('Site successfully updated !');

      return $this->redirect($this->generateUrl('actency_dms_homepage'));
    }

    return $this->render('ActencyDMSBundle:Site:edit.html.twig', array(
      'form' => $form->createView(),
      'site' => $site
    ));
  }

  public function listAction()
  {
    $sites_list = $this->getDoctrine()
      ->getRepository('ActencyDMSBundle:Site')
      ->findAll();

    if (!$sites_list) {
      throw $this->createNotFoundException(
        'No site found...'
      );
    }

    return $this->render('ActencyDMSBundle:Site:list.html.twig', array(
      'sites_list' => $sites_list
    ));
  }
}
