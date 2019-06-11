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
 * @link https://opendata.rdw.nl/Terugroepacties/Open-Data-RDW-Terugroep_actie_status/t49b-isb7
 */
class TerugroepActieStatus
{

    /**
      *
      * Kenteken
      *
      * @var string
      */
    protected $kenteken;

    /**
      *
      * Referentiecode Referentiecode RDW
      *
      * @var string
      */
    protected $referentiecode_rdw;

    /**
      *
      * Omschrijving Code status
      *
      * @var string
      */
    protected $code_status;

    /**
      *
      * Categorie Status
      *
      * @var string
      */
    protected $status;


    public function __construct($result)
    {
        foreach ($result as $key => $value) {
            if (property_exists('\Nettob\Component\Rdw\Model\TerugroepActieStatus', $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return string
     */
    public function getKenteken()
    {
        return $this->kenteken;
    }

    /**
     * @param string $referentie_code
     * @return TerugroepActieStatus
     */
    public function setKenteken($kenteken)
    {
        $this->kenteken = $kenteken;
        return $this;
    }


    /**
     * @return string
     */
    public function getCodeStatus()
    {
        return $this->code_status;
    }


    /**
     * @param string $code_status
     * @return TerugroepActieStatus
     */
    public function setCodeStatus($code_status)
    {
        $this->code_status = $code_status;
        return $this;
    }



}
