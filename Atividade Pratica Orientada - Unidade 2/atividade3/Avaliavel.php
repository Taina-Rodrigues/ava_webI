<?php
declare(strict_types=1);

/**
 * Atividade 3 - Interfaces e Polimorfismo
 *
 * Interface que define um contrato comum: qualquer classe "Avaliavel"
 * precisa saber calcular a própria situação/avaliação.
 */
interface Avaliavel
{
    public function calcularSituacao(): string;
}
