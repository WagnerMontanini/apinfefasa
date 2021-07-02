<?php

namespace WagnerMontanini\ApiNfeFasa;

/**
 * Class ApiNfeFasa
 * @package WagnerMontanini\ApiNfeFasa
 */
abstract class ApiNfeFasa
{
    /** @var string */
    private $apiUrl;

    /** @var array */
    private $headers;

    /** @var array */
    private $fields;

    /** @var string */
    private $endpoint;

    /** @var string */
    private $method;

    /** @var object */
    protected $response;

    /**
     * ApiNfeFasa constructor.
     * @param string $apiUrl
     */
    public function __construct(string $apiUrl,?string $token = null)
    {
        $this->apiUrl = $apiUrl;
        $headers = empty($token)?array("Content-Type"=>"application/json"):array("Content-Type"=>"application/json","Authorization"=>"Bearer {$token}");
        $this->headers($headers);

    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array|null $fields
     * @param array|null $headers
     */
    protected function request(string $method, string $endpoint, array $fields = null, array $headers = null): void
    {
        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->fields = $fields;
        $this->headers($headers);

        $this->dispatch();
    }

    /**
     * @return object|null
     */
    public function response()
    {
        return $this->response;
    }

    /**
     * @return object|null
     */
    public function error()
    {
        if (!empty($this->response->errors)) {
            return $this->response->errors;
        }

        return null;
    }

    /**
     * @param array|null $headers
     */
    private function headers(?array $headers): void
    {
        if (!$headers) {
            return;
        }

        foreach ($headers as $key => $header) {
            $this->headers[] = "{$key}: {$header}";
        }
    }

    /**
     *
     */
    private function dispatch(): void
    {
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->apiUrl}{$this->endpoint}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_POSTFIELDS => \json_encode($this->fields),
            CURLOPT_HTTPHEADER => $this->headers,
        ));
        
        $this->response = json_decode(curl_exec($curl));
        curl_close($curl);
    }
}