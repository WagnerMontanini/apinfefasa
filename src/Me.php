<?php

namespace WagnerMontanini\ApiNfeFasa;

/**
 * Class Me
 * @package WagnerMontanini\ApiNfeFasa
 */
class Me extends ApiNfeFasa
{
    private $headers;
    public $token;

    /**
     * Me constructor
     * @param string $apiUrl
     */
    public function __construct(string $apiUrl)
    {
        parent::__construct($apiUrl);
        $this->token = null;
    }

    /**
     * @return Me
     */
     public function register(array $fields): Me
     {
         $this->request(
             "POST",
             "/auth/register",
             $fields
         );
 
         return $this;
     }

    /**
     * @return Me
     */
    public function me(): Me
    {
        $this->request(
            "GET",
            "/auth/me",
            null,
            $this->headers
        );

        return $this;
    }

    /**
     * @return Me
     */
     public function auth(string $email, string $password): Me
     {
         $this->request(
             "POST",
             "/auth/token",
             array("email" => $email, "password" => $password)
         );
         
        $this->token();

        return $this;
     }

    /**
     * @return Me
     */
    public function logout(): Me
    {
        $this->request(
            "POST",
            "/auth/logout",
            null,
            $this->headers
        );

        return $this;
    }

    /**
     * @return Me
     */
    public function token(): Me
    {
        if( !empty($this->response()->token) ){
            $this->token = $this->response()->token;
            $this->headers = array("Authorization"=>"Bearer {$this->response()->token}");
        }
        return $this;
    }

}