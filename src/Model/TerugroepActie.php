<?php
/*
 * This file is part of the nettob component rdw package.
 *
 * (c) Nico Borghuis <nico@nicoborghuis.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nettob\Component\Rdw\Model;

/**
 * Class As.
 *
 * @author Lars Prakken <lars@directlease.nl>
 *
 * @link https://opendata.rdw.nl/Terugroepacties/Open-Data-RDW-Terugroep_actie/j9yg-7rg9
 */
class TerugroepActie
{

    /**
      *
      * Referentiecode RDW
      *
      * @var string
      */
    protected $referentiecode_RDW;

    /**
      *
      * Publicatiedatum RDW
      *
      * @var integer
      */
    protected $publicatiedatum_RDW;

    /**
      *
      * Meldende producent/distributeur
      *
      * @var string
      */
    protected $meldende_distributeur;

    /**
      *
      * Referentiecode producent
      *
      * @var string
      */
    protected $referentiecode_producent;

    /**
      *
      * Omschrijving defect
      *
      * @var string
      */
    protected $omschrijving_defect;

    /**
      *
      * Categorie defect
      *
      * @var string
      */
    protected $categorie_defect;

    /**
      *
      * Materiele gevolgen
      *
      * @var string
      */
    protected $materiele_gevolgen;



    public function __construct($result)
    {
        foreach ($result as $key => $value) {
            if (property_exists('\Nettob\Component\Rdw\Model\TerugroepActie', $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return string
     */
    public function getReferentieCode()
    {
        return $this->referentiecode_RDW;
    }

    /**
     * @param string $referentie_code
     * @return TerugroepActie
     */
    public function setReferentieCode($referentie_code)
    {
        $this->referentiecode_RDW = $referentie_code;
        return $this;
    }

}
