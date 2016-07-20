<?php

namespace Pixelpro\MisCursosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Pixelpro\MisCursosBundle\Form\CursosType;
use Pixelpro\MisCursosBundle\Entity\Cursos;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;




class DefaultController extends Controller
{
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();
      $cursos = $em->getRepository('PixelproMisCursosBundle:Cursos')->findAll();

        return $this->render('PixelproMisCursosBundle:Default:index.html.twig', array('cursos'=>$cursos));
    }

    public function mostrarAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $curso = $em->getRepository('PixelproMisCursosBundle:Cursos')->find($id);

        return $this->render('PixelproMisCursosBundle:Default:mostrar.html.twig', array('curso'=>$curso));
    }
    public function crearAction(Request $request)
    {
      $curso = new Cursos();
      $form = $this->createForm(CursosType::class, $curso, array('action'=>$this->generateUrl('pixelpro_mis_cursos_crear'), 'method'=>'POST'));

      $form->handlerequest($request);
      if($form->isValid()){
        $em = $this->getDoctrine()->getmanager();
        $em->persist($curso);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notif', '¡Curso creado correctamente!');
        return $this->redirect($this->generateUrl('pixelpro_mis_cursos_mostrar', array('id'=>$curso->getId())));
      }
        $this->get('session')->getFlashBag()->add('notif', '¡El curso no se ha creado correctamente!');
        return $this->render('PixelproMisCursosBundle:Default:nuevo.html.twig', array('form'=>$form->createView()));

    }
    public function nuevoAction()
    {
        $curso = new Cursos();
        $form = $this->createForm(CursosType::class, $curso, array('action'=>$this->generateUrl('pixelpro_mis_cursos_crear'), 'method'=>'POST'));

        return $this->render('PixelproMisCursosBundle:Default:nuevo.html.twig', array('form'=>$form->createView()));

    }
    public function editarAction($id)
    {
      $em = $this->getDoctrine()->getManager();
      $curso = $em->getRepository('PixelproMisCursosBundle:Cursos')->find($id);

      $form = $this->createForm(CursosType::class, $curso,
      array('action'=>$this->generateUrl('pixelpro_mis_cursos_actualizar', array('id'=>$curso->getId())), 'method'=>'PUT'));
      $form->add('save', SubmitType::class, array('label'=>'Actualizar Curso'));

      return $this->render('PixelproMisCursosBundle:Default:editar.html.twig', array('form'=>$form->createView()));
    }
    public function actualizarAction(Request $request, $id)
    {
      $em = $this->getDoctrine()->getManager();
      $curso = $em->getRepository('PixelproMisCursosBundle:Cursos')->find($id);

      $form = $this->createForm(CursosType::class, $curso,
      array('action'=>$this->generateUrl('pixelpro_mis_cursos_actualizar', array('id'=>$curso->getId())), 'method'=>'PUT'));
      $form->add('save', SubmitType::class, array('label'=>'Actualizar Curso'));

      $form->handlerequest($request);
      if($form->isValid()){
        $em->flush();

        $this->get('session')->getFlashBag()->add('notif', '¡Curso actualizado correctamente!');
        return $this->redirect($this->generateUrl('pixelpro_mis_cursos_mostrar', array('id'=>$curso->getId())));

    }
    $this->get('session')->getFlashBag()->add('notif', '¡Curso NO actualizado correctamente!');
    return $this->render('PixelproMisCursosBundle:Default:editar.html.twig', array('form'=>$form->createView()));

  }
    public function eliminarAction(Request $request, $id)
    {

    }
}
