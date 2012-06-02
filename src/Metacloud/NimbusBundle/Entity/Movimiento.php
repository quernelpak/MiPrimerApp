<?php

namespace Metacloud\NimbusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metacloud\NimbusBundle\Entity\Movimiento
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Movimiento
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
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var date $fecha
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var integer $n_documento
     *
     * @ORM\Column(name="n_documento", type="integer")
     */
    private $n_documento;

    /**
     * @var boolean $activo
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;


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
     * Set fecha
     *
     * @param date $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return date 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set n_documento
     *
     * @param integer $nDocumento
     */
    public function setNDocumento($nDocumento)
    {
        $this->n_documento = $nDocumento;
    }

    /**
     * Get n_documento
     *
     * @return integer 
     */
    public function getNDocumento()
    {
        return $this->n_documento;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }
    
    
    /**
     *@ORM\ManyToOne(targetEntity="Ccosto", inversedBy="movimientos")
    * @ORM\JoinColumn(name="ccosto_id", referencedColumnName="id") 
     */
      private $ccosto;
    public function setCcosto(\Metacloud\NimbusBundle\Entity\Ccosto $ccosto)
    {
        $this->ccosto = $ccosto;
    }

    public function getCcosto()
    {
        return $this->ccosto;
    }
    
}