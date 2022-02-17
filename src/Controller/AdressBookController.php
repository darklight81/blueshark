<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Contact;
use App\Repository\ContactRepository;

class AdressBookController extends AbstractController
{
    /**
     * @Route("/", name="contacts")
     */
    public function listAll(ManagerRegistry $doctrine): Response
    {
        $contacts = $doctrine->getRepository(Contact::class)->findAll();
        return $this->render('adress_book/index.html.twig', [
            'contacts' => $contacts
        ]);
    }

    /**
     * @Route("/{name}+{surname}", name="contact_detail")
     */
    public function editContact(Request $request, ManagerRegistry $doctrine, string $name, string $surname): Response
    {
        $contact = $doctrine->getRepository(Contact::class)->findOneByName($name, $surname);
        if(!$contact){
            throw $this->createNotFoundException(
                'No contact named '.$name. $surname . ' found.'
            );
        }
        $form = $this->createForm(ContactType::class, $contact)->add('submit', SubmitType::class, ['attr' => [ 'class' => 'btn']]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('contacts');
        }

        return $this->render('adress_book/form.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/create", name="create_contact")
     */
    public function createContact(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact)->add('submit', SubmitType::class, ['attr' => [ 'class' => 'btn']]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('contacts');
        }

        return $this->render('adress_book/form.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/delete/{id}", name="delete_contact")
     */
    public function deleteContact(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $contact = $doctrine->getRepository(Contact::class)->find($id);

        if(!$contact){
            throw $this->createNotFoundException(
                'No contact found for id '.$id
            );
        }

        $entityManager->remove($contact);
        $entityManager->flush();

        return $this->redirectToRoute('contacts');
    }
}
