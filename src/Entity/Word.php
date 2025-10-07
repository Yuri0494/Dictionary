<?php

namespace App\Entity;

use App\Repository\WordRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: WordRepository::class)]
class Word
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: Types::STRING)]
    private string $word;

    #[ORM\Column(type: Types::STRING)]
    private string $translate;

    #[ORM\Column(type: Types::STRING)]
    private string $languageCode;

    public function getId(): int
    {
        return $this->id;
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function setWord(string $word): self
    {
        $this->word = $word;
        return $this;
    }

    public function getTranslate(): string
    {
        return $this->translate;
    }

    public function setTranslate(string $translate): self
    {
        $this->translate = $translate;
        return $this;
    }

    public function getLanguageCode(): string
    {
        return $this->languageCode;
    }

    public function setLanguageCode(string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }
}
