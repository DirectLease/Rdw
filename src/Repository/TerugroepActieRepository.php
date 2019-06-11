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
use Nettob\Component\Rdw\Model\Assen;
use Nettob\Component\Rdw\Model\TerugroepActie;

/**
 * TerugroepActie Repository.
 *
 * @author Lars Prakken <lars@directlease.nl>
 */
class TerugroepActieRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->apiUrl = 'https://opendata.rdw.nl/resource/j9yg-7rg9.json';
        parent::__construct();
    }

    /**
     * Search for recalls by the given url.
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
        $terugroepActies = array();
        $countResults = count($results);
        foreach ($results as $result) {
            $terugroepActie = new TerugroepActie($result);
            if ($countResults > 1) {
                $terugroepActies[] = $terugroepActie;
            } else {
                return $terugroepActie;
            }
        }

        return $terugroepActies;
    }
}
