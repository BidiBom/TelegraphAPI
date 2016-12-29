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

        public function __construct(array $properties = [])
        {
            if (!empty($properties)) {
                foreach ($properties as $key => $value) {
                    $this->setProperty($key, $value);
                }
            }

        }

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

        public function setProperty($key, $value)
        {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        public function getProperties()
        {
            $properties = [];
            foreach ($this as $propertyName => $propertyValue) {
                $properties[$propertyName] = $propertyValue;
            }
            return $properties;
        }

        protected function setPropertiesOfResponse($response)
        {
            if ($response->ok == true) {
                foreach ($response->result as $key => $value) {
                    $this->setProperty($key, $value);
                }

                return true;

            } else {
                throw new \Exception('Error request: '.$response->error);
            }
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