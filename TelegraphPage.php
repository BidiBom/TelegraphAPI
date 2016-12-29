<?php
    /**
     * Created by Владимир Тютимов.
     * Date: 29.12.2016
     */

    namespace Matusa;

    use Matusa\TelegraphAPI;

    class TelegraphPage extends TelegraphAPI
    {
        private $path;
        private $url;
        private $title;
        private $description;
        private $author_name;
        private $author_url;
        private $image_url;
        private $content;
        private $views;
        private $can_edit;

        public function createPage($access_token, $return_content = false)
        {
            $method_name = 'createPage';
            $params = [
                'access_token' => $access_token,
                'title' => $this->getTitle(),
                'author_name' => $this->getAuthorName(),
                'author_url' => $this->getAuthorUrl(),
                'content' => $this->getContent(),
                'return_content' => $return_content
            ];

            $response = $this->requestMethod($method_name, $params);

            return $this->setPropertiesOfResponse($response);

        }

        /**
         * @return mixed
         */
        public function getPath()
        {
            return $this->path;
        }

        /**
         * @param mixed $path
         */
        public function setPath($path)
        {
            $this->path = $path;
        }

        /**
         * @return mixed
         */
        public function getUrl()
        {
            return $this->url;
        }

        /**
         * @param mixed $url
         */
        public function setUrl($url)
        {
            $this->url = $url;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
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
        public function getImageUrl()
        {
            return $this->image_url;
        }

        /**
         * @param mixed $image_url
         */
        public function setImageUrl($image_url)
        {
            $this->image_url = $image_url;
        }

        /**
         * @return mixed
         */
        public function getContent()
        {
            return $this->content;
        }

        /**
         * @param mixed $content
         */
        public function setContent($content)
        {
            $this->content = $content;
        }

        /**
         * @return mixed
         */
        public function getViews()
        {
            return $this->views;
        }

        /**
         * @param mixed $views
         */
        public function setViews($views)
        {
            $this->views = $views;
        }

        /**
         * @return mixed
         */
        public function getCanEdit()
        {
            return $this->can_edit;
        }

        /**
         * @param mixed $can_edit
         */
        public function setCanEdit($can_edit)
        {
            $this->can_edit = $can_edit;
        }


    }