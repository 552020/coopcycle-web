<?php

namespace AppBundle\Serializer;

use AppBundle\Entity\LocalBusiness;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;

final class RestaurantCollectionNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    private $decorated;

    public function __construct(NormalizerInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    /**
     * {@inheritdoc}
     */
    public function setNormalizer(NormalizerInterface $normalizer)
    {
        if ($this->decorated instanceof NormalizerAwareInterface) {
            $this->decorated->setNormalizer($normalizer);
        }
    }

    public function supportsNormalization($data, $format = null)
    {
        return $this->decorated->supportsNormalization($data, $format);
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = $this->decorated->normalize($object, $format, $context);

        if (!isset($context['resource_class']) || isset($context['api_sub_level'])) {
            return $data;
        }

        if ($context['resource_class'] !== LocalBusiness::class) {
            return $data;
        }

        $data['facets'] = [];

        return $data;
    }
}
