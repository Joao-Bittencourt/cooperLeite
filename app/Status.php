<?php

namespace App;

use Symfony\Component\Translation\Exception\NotFoundResourceException;

class Status
{
    protected array $status = [
        '0' => 'Inativo',
        '1' => 'Ativo',
    ];

    public function getOption(string $option): string
    {

        if (empty($this->status[$option])) {
            throw new NotFoundResourceException("Not found status : {$option}");
        }

        return $this->status[$option];
    }

    public function getOptions(): array
    {
        return $this->status;
    }
}
