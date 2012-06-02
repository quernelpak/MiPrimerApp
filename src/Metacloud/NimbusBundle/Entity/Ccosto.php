<?php

namespace Metacloud\NimbusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metacloud\NimbusBundle\Entity\Ccosto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ccosto
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var integer $presupuesto
     *
     * @ORM\Column(name="presupuesto", type="integer")
     */
    private $presupuesto;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;


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
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
     * Set presupuesto
     *
     * @param integer $presupuesto
     */
    public function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;
    }

    /**
     * Get presupuesto
     *
     * @return integer 
     */
    public function getPresupuesto()
    {
        return $this->presupuesto;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
       /**
     * @ORM\OneToMany(targetEntity="Movimiento", mappedBy="ccosto")
     */
    private $movimientos;
    public function __construct()
    {
        $this->movimientos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function addMovimientos(\Metacloud\NimbusBundle\Entity\Movimiento $movimientos)
    {
        $this->movimientos[] = $movimientos;
    }

    public function getMovimientos()
    {
        return $this->movimientos;
    }
}