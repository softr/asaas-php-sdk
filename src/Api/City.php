<?php
namespace Softr\Asaas\Api;

// Entities
use Softr\Asaas\Entity\City as CityEntity;

/**
 * City API Endpoint
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class City extends \Softr\Asaas\Api\AbstractApi
{
    /**
     * Get all cities
     *
     * @param   array  $filters  (optional) Filters Array
     * @return  array  Cities Array
     */
    public function getAll(array $filters = [])
    {
        $cities = $this->adapter->get(sprintf('%s/cities?%s', $this->endpoint, http_build_query($filters)));

        $cities = json_decode($cities);

        $this->extractMeta($cities);

        return array_map(function($city)
        {
            return new CityEntity($city->city);
        }, $cities->data);
    }

    /**
     * Get City By Id
     *
     * @param   int  $id  City Id
     * @return  CityEntity
     */
    public function getById($id)
    {
        $city = $this->adapter->get(sprintf('%s/cities/%s', $this->endpoint, $id));

        $city = json_decode($city);

        return new CityEntity($city);
    }
}