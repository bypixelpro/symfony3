<?php
namespace Pixelpro\MisCursosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="cursos")
 */

 class Cursos {

   /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   private $id;

   /**
    * @ORM\Column(type="string", length=65)
    * @Assert\NotBlank()
    * @Assert\Length(min = 3)
    */
   private $nombre;

   /**
    * @ORM\Column(type="string", length=255)
    * @Assert\NotBlank()
    * @Assert\Length(min = 30)
    */
   private $descripcion;

   /**
    * @ORM\Column(type="integer")
    * @Assert\NotBlank()
    * @Assert\Type(type="integer")
    * @Assert\GreaterThanOrEqual(8)
    */
   private $horas;




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cursos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Cursos
     */
    public function setdescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getdescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set horas
     *
     * @param integer $horas
     *
     * @return Cursos
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;

        return $this;
    }

    /**
     * Get horas
     *
     * @return integer
     */
    public function getHoras()
    {
        return $this->horas;
    }
}
