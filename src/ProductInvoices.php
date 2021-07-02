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
     * @param string $email
     * @param string $password
     * @param Companies $company
     */
    public function __construct(string $apiUrl, string $email, string $password, string $company_id)
    {   
        $token = (new Me($apiUrl))->auth($email,$password)->response()->token;
        if( empty($token) ){
            throw new \Exception('Não é possível realizar login');
        }
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