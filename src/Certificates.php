<?php

namespace WagnerMontanini\ApiNfeFasa;


/**
 * Class Certificates
 * @package WagnerMontanini\ApiNfeFasa
 */
class Certificates extends ApiNfeFasa
{
    /** @var array */
    private $headers;

    /**
     * Certificates constructor.
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
     * @return Certificates
     */
    public function index(?array $headers): Certificates
    {
        $this->request(
            "GET",
            "/companies/{$this->company}/certificates",
            null,
            $headers
        );

        return $this;
    }

    /**
     * @param array $files
     * @return Certificates
     */
    public function create(array $files): Certificates
    {
        $this->request(
            "POST",
            "/companies/{$this->company}/certificates",
            array(
                "files" => true,
                "certificate" => curl_file_create($files["certificate"],"application/x-pkcs12"),
                "password" => $files["password"]
            )
        );

        return $this;
    }

    /**
     * @param string $certificate_id
     * @return Certificates
     */
    public function read(string $certificate_id): Certificates
    {
        $this->request(
            "GET",
            "/companies/{$this->company}/certificates/{$certificate_id}"
        );

        return $this;
    }

    /**
     * @param string $certificate_id
     * @return Certificates
     */
    public function delete(string $certificate_id): Certificates
    {
        $this->request(
            "DELETE",
            "/companies/{$this->company}/certificates/{$certificate_id}"
        );

        return $this;
    }
}