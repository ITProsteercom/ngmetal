<?php

namespace App\Exceptions;
use Exception;

class CustomException extends Exception
{

    protected $id;
    protected $details;

    public function __construct($message)
    {
        $message = $this->create($message);

        parent::__construct($message);
    }

    protected function create(array $args)
    {
        $this->id = array_shift($args);
        $error = $this->errors($this->id);
        $this->details = vsprintf($error['context'], $args);

        return $this->details;
    }

    private function errors($id)
    {
        $data= [
            'bad_request' => [
                'context'  => 'The requested resource could not be loaded. Please, scan your QR-code again.',
            ],
            'went_wrong' => [
                'context'  => 'Something went wrong. Please, try again.',
            ]
        ];
        return $data[$id];
    }
}