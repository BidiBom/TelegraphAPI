<?php
    /**
     * Created by Владимир Тютимов.
     * Date: 27.12.2016
     */

    namespace Matusa;

    use Matusa\TelegraphAPI;


    class TelegraphAccount extends TelegraphAPI
    {
        private $short_name;
        private $author_name;
        private $author_url;
        private $access_token;
        private $auth_url;
        private $page_count;

        public function createAccount($short_name, $author_name = '', $author_url = '')
        {
            $method_name = 'createAccount';
            $params = [
                "short_name"    => $short_name,
                "author_name"   => $author_name,
                "author_url"    => $author_url
            ];

            $response = $this->requestMethod($method_name, $params);

            return $this->setPropertiesOfResponse($response);

        }

        public function editAccountInfo($short_name = '', $author_name = '', $author_url = '')
        {
            $method_name = 'editAccountInfo';
            $params = [
                "access_token"  => $this->getAccessToken(),
                "short_name"    => $short_name,
                "author_name"   => $author_name,
                "author_url"    => $author_url
            ];

            $response = $this->requestMethod($method_name, $params);

            return $this->setPropertiesOfResponse($response);
        }

        public function getAccountInfo($fields)
        {
            $method_name = "getAccountInfo";

            $strArrayFields = $this->convertArrayToStroke($fields);

            $params = [
                "access_token"  => $this->getAccessToken(),
                "fields" => $strArrayFields
            ];

            $response = $this->requestMethod($method_name, $params);

            return $this->setPropertiesOfResponse($response);
        }

        public function revokeAccessToken()
        {
            $method_name = "revokeAccessToken";

            $params = [
                "access_token" => $this->getAccessToken()
            ];

            $response = $this->requestMethod($method_name, $params);

            return $this->setPropertiesOfResponse($response);
        }

        /**
         * @return mixed
         */
        public function getShortName()
        {
            return $this->short_name;
        }

        /**
         * @param mixed $short_name
         */
        public function setShortName($short_name)
        {
            $this->short_name = $short_name;
        }

        /**
         * @return mixed
         */
        public function getAuthorName()
        {
            return $this->author_name;
        }

        /**
         * @param mixed $author_name
         */
        public function setAuthorName($author_name)
        {
            $this->author_name = $author_name;
        }

        /**
         * @return mixed
         */
        public function getAuthorUrl()
        {
            return $this->author_url;
        }

        /**
         * @param mixed $author_url
         */
        public function setAuthorUrl($author_url)
        {
            $this->author_url = $author_url;
        }

        /**
         * @return mixed
         */
        public function getAccessToken()
        {
            return $this->access_token;
        }

        /**
         * @param mixed $access_token
         */
        public function setAccessToken($access_token)
        {
            $this->access_token = $access_token;
        }

        /**
         * @return mixed
         */
        public function getAuthUrl()
        {
            return $this->auth_url;
        }

        /**
         * @param mixed $auth_url
         */
        public function setAuthUrl($auth_url)
        {
            $this->auth_url = $auth_url;
        }

        /**
         * @return mixed
         */
        public function getPageCount()
        {
            return $this->page_count;
        }

        /**
         * @param mixed $page_count
         */
        public function setPageCount($page_count)
        {
            $this->page_count = $page_count;
        }
    }