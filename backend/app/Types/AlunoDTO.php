<?php

namespace App\Types;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AlunoDTO
{
    public function __construct(protected ?string $name, protected ?string $email, protected ?UploadedFile $foto)
    {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->input('nome'),
            email: $request->input('email'),
            foto: $request->file('foto'),
        );
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function email(): ?string
    {
        return $this->email;
    }

    public function foto(): ?UploadedFile
    {
        return $this->foto;
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'email' => $this->email,
        ], fn($value) => !is_null($value));
    }
}