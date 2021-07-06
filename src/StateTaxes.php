<?php

namespace WagnerMontanini\ApiNfeFasa;


/**
 * Class StateTaxes
 * @package WagnerMontanini\ApiNfeFasa
 */
class StateTaxes extends ApiNfeFasa
{
    /** @var array */
    private $headers;

    /**
     * StateTaxes constructor.
     * @param string $apiUrl
     * @param string $token
     * @param string $company_id
     */
    public function __construct(string $apiUrl, string $token, string $company_id)
    {
        parent::__construct($apiUrl, $token);
        $this->company = $company_id;
    }

    /**
     * @param array|null $headers
     * @return StateTaxes
     */
    public function index(?array $headers): StateTaxes
    {
        $this->request(
            "GET",
            "/companies/{$this->company}/statetaxes",
            null,
            $headers
        );

        return $this;
    }

    /**
     * @param array $fields
     * @return StateTaxes
     */
    public function create(array $fields): StateTaxes
    {
        $this->request(
            "POST",
            "/companies/{$this->company}/statetaxes",
            $fields
        );

        return $this;
    }

    /**
     * @param string $statetax_id
     * @return StateTaxes
     */
    public function read(string $statetax_id): StateTaxes
    {
        $this->request(
            "GET",
            "/companies/{$this->company}/statetaxes/{$statetax_id}"
        );

        return $this;
    }

    /**
     * @param string $statetax_id
     * @param array $fields
     * @return StateTaxes
     */
     public function update(string $statetax_id, array $fields): StateTaxes
     {
         $this->request(
             "PUT",
             "/companies/{$this->company}/statetaxes/{$statetax_id}",
             $fields
         );
 
         return $this;
     }

    /**
     * @param string $statetax_id
     * @return StateTaxes
     */
    public function delete(string $statetax_id): StateTaxes
    {
        $this->request(
            "DELETE",
            "/companies/{$this->company}/statetaxes/{$statetax_id}"
        );

        return $this;
    }
}