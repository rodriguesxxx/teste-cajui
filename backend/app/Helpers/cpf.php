<?php

use Illuminate\Support\Str;

function validar_cpf(string $cpf): bool
{
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }

        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$t] != $d) {
            return false;
        }
    }

    return true;
}

function gerar_cpf(): string
{
    $n = [];

    for ($i = 0; $i < 9; $i++) {
        $n[$i] = random_int(0, 9);
    }

    $n[9] = calcular_digito($n, 10);

    $n[10] = calcular_digito($n, 11);

    return implode('', $n);
}

function calcular_digito(array $n, int $peso): int
{
    $soma = 0;
    for ($i = 0; $i < $peso - 1; $i++) {
        $soma += $n[$i] * ($peso - $i);
    }

    $resto = ($soma * 10) % 11;
    return ($resto == 10) ? 0 : $resto;
}
