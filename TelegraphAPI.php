<?php
    /**
     * Created by Владимир Тютимов.
     * Date: 27.12.2016
     */

    namespace Matusa;

    use GuzzleHttp\Client;
    use Matusa\TelegraphAccount;

    class TelegraphAPI
    {
        private $host_api = "https://api.telegra.ph";

        function connect()
        {
            $client = new Client([
                'base_uri' => $this->getHostApi()
            ]);

            return $client;
        }

        /**
         * @return string
         */
        public function getHostApi()
        {
            return $this->host_api;
        }

        /**
         * @param string $host_api
         */
        public function setHostApi($host_api)
        {
            $this->host_api = $host_api;
        }

        function requestMethod($method_name, $params)
        {
            $client = $this->connect();
            $response = $client->request('GET', $method_name, ['query'=>$params]);
            $body = $response->getBody();

            return \GuzzleHttp\json_decode($body->getContents());

        }

        public function convertArrayToStroke($array)
        {
            return '["'.implode('","',$array).'"]';
        }


    }