<?php
namespace App\Utils;


class BankInformation
{
    //Removendo caracteres que não sejam digitos da agência
    public static function agencyDigits($value): string
    {
        return preg_replace("/\D/", "", $value);
    }

    //Removendo caracteres que não sejam digitos da conta corrente
    public static function accountDigits($value): string
    {
        return preg_replace("/\D/", "", $value);
    }

    //formatar valor para a base de dados
    public static function databaseDefaultValue($value): string
    {
        return str_replace(",","",$value);
    }

    //Formatando valor para exibição
    public static function ValueFormatted(string $value): string
    {
        return number_format($value,2);
    }

    //retornar numero de agencia formato 
    public static function agencyFormatted(string $value): string 
    {
        return preg_replace("/(\d{2})(\d{1})/i","$1-$2",$value);
    }

    //retornar numero de conta corrente formato 
    public static function accountFormatted(string $value): string
    {
        return preg_replace("/(\d{2})(\d{3})(\d{1})/i","$1.$2-$3",$value);
    }
}