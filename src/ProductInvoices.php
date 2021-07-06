<?php

namespace WagnerMontanini\ApiNfeFasa;

use WagnerMontanini\ApiNfeFasa\Companies;

/**
 * Class ProductInvoices
 * @package WagnerMontanini\ApiNfeFasa
 */
class ProductInvoices extends ApiNfeFasa
{
    /** @var array */
    private $headers;

    /**
     * ProductInvoices constructor
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
     * @param string $access_key
     * @return ProductInvoices
     */
    public function read(string $access_key): ProductInvoices
    {
        $this->request(
            "GET",
            "/companies/{$this->company}/productinvoices/{$access_key}",
        );

        return $this;
    }
}