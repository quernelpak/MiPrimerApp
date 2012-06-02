<?php

namespace Metacloud\NimbusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metacloud\NimbusBundle\Entity\Linea
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Metacloud\NimbusBundle\Entity\LineaRepository")
 */
class Linea
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
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    private $nombre;

    /**
     * @var integer $neto
     *
     * @ORM\Column(name="neto", type="integer")
     */
    private $neto;

    /**
     * @var integer $impuesto
     *
     * @ORM\Column(name="impuesto", type="integer")
     */
    private $impuesto;


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
     * Set neto
     *
     * @param integer $neto
     */
    public function setNeto($neto)
    {
        $this->neto = $neto;
    }

    /**
     * Get neto
     *
     * @return integer 
     */
    public function getNeto()
    {
        return $this->neto;
    }

    /**
     * Set impuesto
     *
     * @param integer $impuesto
     */
    public function setImpuesto($impuesto)
    {
        $this->impuesto = $impuesto;
    }

    /**
     * Get impuesto
     *
     * @return integer 
     */
    public function getImpuesto()
    {
        return $this->impuesto;
    }
    
    /**
     *@ORM\ManyToOne(targetEntity="Movimiento", inversedBy="movimientos")
    * @ORM\JoinColumn(name="movimiento_id", referencedColumnName="id") 
     */
    private $movimiento;
    public function setMovimiento(\Metacloud\NimbusBundle\Entity\Movimiento $movimiento)
    {
        $this->movimiento = $movimiento;
    }
    
    public function getMovimiento() 
    {
        return $this->movimiento;
        
    }
}