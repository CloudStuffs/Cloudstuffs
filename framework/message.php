<?php

namespace Framework {

    use Framework\Base as Base;
    use Framework\Message as Message;
    use Framework\Events as Events;
    use Framework\Registry as Registry;
    use Framework\Message\Exception as Exception;

    /**
     * Factory Class which accepts initialization options, and also selects the type of returned object, based on the internal $_type property.
     * It raises Message\Exception\Argument exceptions for invalid/unsupported types, and only supports one type of message driver, Message\Driver\SMTPClient.
     */
    class Message extends Base {

        /**
         * @readwrite
         */
        protected $_type;

        /**
         * @readwrite
         */
        protected $_options;

        protected function _getExceptionForImplementation($method) {
            return new Exception\Implementation("{$method} method not implemented");
        }

        public function initialize() {
            Events::fire("framework.message.initialize.before", array($this->type, $this->options));

            if (!$this->type) {
                $configuration = Registry::get("configuration");

                if ($configuration) {
                    $configuration = $configuration->initialize();
                    $parsed = $configuration->parse("configuration/message");

                    if (!empty($parsed->message->default) && !empty($parsed->message->default->type)) {
                        $this->type = $parsed->message->default->type;
                        unset($parsed->message->default->type);
                        $this->options = (array) $parsed->message->default;
                    }
                }
            }

            if (!$this->type) {
                throw new Exception\Argument("Invalid type");
            }

            Events::fire("framework.message.initialize.after", array($this->type, $this->options));

            switch ($this->type) {
                case "smtp": {
                        return new Cache\Driver\SMTPClient($this->options);
                        break;
                    }
                case "sms": {
                        return new Cache\Driver\SMS($this->options);
                        break;
                    }
                default: {
                        throw new Exception\Argument("Invalid type");
                        break;
                    }
            }
        }

    }

}