<?php

namespace App\DTO;

class TicketDTO
{
    private int $sort;
    private string $text;
    private string $title;
    private string $person;

    public function __construct(int $sort, string $text, string $title, string $person)
    {
        $this->sort = $sort;
        $this->text = $text;
        $this->title = $title;
        $this->person = $person;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPerson(): string
    {
        return $this->person;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getSort(): int
    {
        return $this->sort;
    }
}