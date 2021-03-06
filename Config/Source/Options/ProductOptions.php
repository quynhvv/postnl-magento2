<?php
/**
 *
 *          ..::..
 *     ..::::::::::::..
 *   ::'''''':''::'''''::
 *   ::..  ..:  :  ....::
 *   ::::  :::  :  :   ::
 *   ::::  :::  :  ''' ::
 *   ::::..:::..::.....::
 *     ''::::::::::::''
 *          ''::''
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@tig.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@tig.nl for more information.
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\PostNL\Config\Source\Options;

use TIG\PostNL\Config\Source\OptionsAbstract;
use Magento\Framework\Option\ArrayInterface;

/**
 * As this class holds all the product options, it is too long for Code Sniffer to check.
 */
// @codingStandardsIgnoreFile
class ProductOptions extends OptionsAbstract implements ArrayInterface
{
    /**
     * All product options.
     * @var array
     */
    protected $availableOptions = [
        // Standard Options
        '3085' => [
            'value'             => '3085',
            'label'             => 'Standard shipment',
            'isExtraCover'      => false,
            'isEvening'         => false,
            'isSunday'          => false,
            'countryLimitation' => 'NL',
            'group'             => 'standard_options',
        ],
        '3189' => [
            'value'             => '3189',
            'label'             => 'Signature on delivery',
            'isExtraCover'      => false,
            'isEvening'         => false,
            'isSunday'          => false,
            'countryLimitation' => 'NL',
            'group'             => 'standard_options',
        ],
        '3089' => [
            'value'             => '3089',
            'label'             => 'Signature on delivery + Delivery to stated address only',
            'isExtraCover'      => false,
            'isEvening'         => true,
            'isSunday'          => true,
            'isSameDay'         => true,
            'statedAddressOnly' => true,
            'isBelgiumOnly'     => false,
            'countryLimitation' => 'NL',
            'group'             => 'standard_options',
        ],
        '3389' => [
            'value'             => '3389',
            'label'             => 'Signature on delivery + Return when not home',
            'isExtraCover'      => false,
            'isEvening'         => false,
            'isSunday'          => false,
            'countryLimitation' => 'NL',
            'group'             => 'standard_options',
        ],
        '3096' => [
            'value'             => '3096',
            'label'             => 'Signature on delivery + Deliver to stated address only + Return when not home',
            'isExtraCover'      => false,
            'isEvening'         => true,
            'isSunday'          => true,
            'isSameDay'         => true,
            'statedAddressOnly' => true,
            'isBelgiumOnly'     => false,
            'countryLimitation' => 'NL',
            'group'             => 'standard_options',
        ],
        '3090' => [
            'value'             => '3090',
            'label'             => 'Delivery to neighbour + Return when not home',
            'isExtraCover'      => false,
            'isEvening'         => true,
            'isSunday'          => false,
            'countryLimitation' => 'NL',
            'group'             => 'standard_options',
        ],
        '3385' => [
            'value'             => '3385',
            'label'             => 'Deliver to stated address only',
            'isExtraCover'      => false,
            'isEvening'         => true,
            'isSunday'          => true,
            'isSameDay'         => true,
            'statedAddressOnly' => true,
            'countryLimitation' => 'NL',
            'group'             => 'standard_options',
        ],
        // Pakjegemak Options
        '3534' => [
            'value'             => '3534',
            'label'             => 'Post Office + Extra Cover',
            'isExtraCover'      => true,
            'isExtraEarly'      => false,
            'isSunday'          => false,
            'countryLimitation' => 'NL',
            'pge'               => false,
            'group'             => 'pakjegemak_options',
        ],
        '3544' => [
            'value'             => '3544',
            'label'             => 'Post Office + Extra Cover + Notification',
            'isExtraCover'      => true,
            'isExtraEarly'      => true,
            'isSunday'          => false,
            'countryLimitation' => 'NL',
            'pge'               => true,
            'group'             => 'pakjegemak_options',
        ],
        '3533' => [
            'value'             => '3533',
            'label'             => 'Post Office + Signature on Delivery',
            'isExtraCover'      => false,
            'isExtraEarly'      => false,
            'isSunday'          => false,
            'countryLimitation' => 'NL',
            'pge'               => false,
            'group'             => 'pakjegemak_options',
        ],
        '3543' => [
            'value'             => '3543',
            'label'             => 'Post Office + Signature on Delivery + Notification',
            'isExtraCover'      => false,
            'isSunday'          => false,
            'isExtraEarly'      => true,
            'countryLimitation' => 'NL',
            'pge'               => true,
            'group'             => 'pakjegemak_options',
        ],
        // EU Options
        '4950' => [
            'value'             => '4950',
            'label'             => 'EU Pack Special',
            'isExtraCover'      => false,
            'isSunday'          => false,
            'countryLimitation' => false,
            'group'             => 'eu_options',
        ],
        '4952' => [
            'value'             => '4952',
            'label'             => 'EU Pack Special Consumer (incl. signature)',
            'isExtraCover'      => false,
            'isSunday'          => false,
            'countryLimitation' => false,
            'group'             => 'eu_options',
        ],
        // Brievenbuspakje Options
        '2928' => [
            'value'             => '2928',
            'label'             => 'Letter Box Parcel Extra',
            'isExtraCover'      => false,
            'isSunday'          => false,
            'countryLimitation' => 'NL',
            'group'             => 'buspakje_options',
        ],
    ];

    protected $groups = [
        'standard_options'   => 'Domestic options',
        'pakjegemak_options' => 'Post Office options',
        'eu_options'         => 'EU options',
        'buspakje_options'   => 'Letter Box Parcel options',
    ];

    /**
     * Returns option array
     * @return array
     */
    public function toOptionArray()
    {
        $this->setGroupedOptions($this->availableOptions, $this->groups);

        return $this->getGroupedOptions();
    }

    /**
     * Returns options if sunday is true
     * @return array
     */
    public function getIsSundayOptions()
    {
        return $this->getProductoptions(['isSunday' => true]);
    }

    /**
     * Returns options if evening is true
     * @return array
     */
    public function getIsEveningOptions()
    {
        return $this->getProductoptions(['isEvening' => true]);
    }

    /**
     * Returns options if group equals pakjegemak_options
     * @return array
     */
    public function getPakjeGemakOptions()
    {
        return $this->getProductoptions(['group' => 'pakjegemak_options']);
    }

    /**
     * Returns options if pge equals true
     * @return array
     */
    public function getPakjeGemakEarlyDeliveryOptions()
    {
        return $this->getProductoptions(['pge' => true]);
    }

    /**
     * Returns options if group equals standard_options
     * @return array
     */
    public function getDefaultOptions()
    {
        return $this->getProductoptions(['group' => 'standard_options']);
    }

    /**
     * @return array
     */
    public function getExtraCoverProductOptions()
    {
        return $this->getProductoptions(['isExtraCover' => true]);
    }

    /**
     * @return array
     */
    public function getEpsProductOptions()
    {
        return $this->getProductoptions(['group' => 'eu_options']);
    }
}
