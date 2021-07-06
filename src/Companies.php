<?php

namespace WagnerMontanini\ApiNfeFasa;


/**
 * Class Companies
 * @package WagnerMontanini\ApiNfeFasa
 */
class Companies extends ApiNfeFasa
{
    /** @var array */
    private $headers;

    /**
     * Companies constructor.
     * @param string $apiUrl
     * @param string $token
     */
    public function __construct(string $apiUrl, string $token)
    {
        parent::__construct($apiUrl, $token);
    }

    /**
     * @param array|null $headers
     * @return Companies
     */
    public function index(?array $headers): Companies
    {
        $this->request(
            "GET",
            "/companies",
            null,
            $headers
        );

        return $this;
    }

    /**
     * @param array $fields
     * @return Companies
     */
    public function create(array $fields): Companies
    {
        $this->request(
            "POST",
            "/companies",
            $fields
        );

        return $this;
    }

    /**
     * @param string $company_id
     * @return Companies
     */
    public function read(string $company_id): Companies
    {
        $this->request(
            "GET",
            "/companies/{$company_id}"
        );

        return $this;
    }

    /**
     * @param string $company_id
     * @param array $fields
     * @return Companies
     */
    public function update(string $company_id, array $fields): Companies
    {
        $this->request(
            "PUT",
            "/companies/{$company_id}",
            $fields
        );

        return $this;
    }

    /**
     * @param string $company_id
     * @return Companies
     */
    public function delete(string $company_id): Companies
    {
        $this->request(
            "DELETE",
            "/companies/{$company_id}"
        );

        return $this;
    }
}