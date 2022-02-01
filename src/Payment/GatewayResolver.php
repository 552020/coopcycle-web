<?php

namespace AppBundle\Payment;

class GatewayResolver
{
    private $country;
    private $mercadopagoCountries;
    private $forceStripe;

    public function __construct(string $country,
        $mercadopagoCountries = [],
        $forceStripe = false)
    {
        $this->country = $country;
        $this->mercadopagoCountries = $mercadopagoCountries;
        $this->forceStripe = $forceStripe;
    }

    public function resolveForCountry($country)
    {
        if ($this->forceStripe) {
            return 'stripe';
        }

        if (in_array($country, $this->mercadopagoCountries)) {
            return 'mercadopago';
        }

        return 'stripe';
    }

    public function resolve()
    {
        //FEAT: Add context to switch between Stripe or PayGreen depending on LocalBusiness payment configuration
        return 'paygreen';
        return $this->resolveForCountry($this->country);
    }
}
