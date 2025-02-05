<?php
/*
 * This file is part of the nettob component rdw package.
 *
 * (c) Nico Borghuis <nico@nicoborghuis.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nettob\Component\Rdw\Repository;

use GuzzleHttp\Exception\RequestException;
use Nettob\Component\Rdw\Model\TerugroepActieStatus;

/**
 * TerugroepActieStatus Repository.
 *
 * @author Lars Prakken <lars@directlease.nl>
 */
class TerugroepActieStatusRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->apiUrl = 'https://opendata.rdw.nl/resource/t49b-isb7.json';
        parent::__construct();
    }

    /**
     * Search for recallstatusses by the given url.
     *
     * @param string $url
     *
     * @return array|null
     *
     * @throws \Exception
     */
    public function find($query)
    {
        try {
            $request = $this->client->get('', array(
                'query' => $query,
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                )
            ));
        } catch (RequestException $e) {
            throw new \Exception($e->getMessage());
        }
        $response = $request->getBody();
        $results = json_decode($response);
        $terugroepActieStatussen = array();
        $countResults = count($results);
        foreach ($results as $result) {
            $terugroepActieStatus = new TerugroepActieStatus($result);
            if ($countResults > 1) {
                $terugroepActieStatussen[] = $terugroepActieStatus;
            } else {
                return $terugroepActieStatus;
            }
        }

        return $terugroepActieStatussen;
    }
}
