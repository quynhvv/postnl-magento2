<?php
/**
 *                  ___________       __            __
 *                  \__    ___/____ _/  |_ _____   |  |
 *                    |    |  /  _ \\   __\\__  \  |  |
 *                    |    | |  |_| ||  |   / __ \_|  |__
 *                    |____|  \____/ |__|  (____  /|____/
 *                                              \/
 *          ___          __                                   __
 *         |   |  ____ _/  |_   ____ _______   ____    ____ _/  |_
 *         |   | /    \\   __\_/ __ \\_  __ \ /    \ _/ __ \\   __\
 *         |   ||   |  \|  |  \  ___/ |  | \/|   |  \\  ___/ |  |
 *         |___||___|  /|__|   \_____>|__|   |___|  / \_____>|__|
 *                  \/                           \/
 *                  ________
 *                 /  _____/_______   ____   __ __ ______
 *                /   \  ___\_  __ \ /  _ \ |  |  \\____ \
 *                \    \_\  \|  | \/|  |_| ||  |  /|  |_| |
 *                 \______  /|__|    \____/ |____/ |   __/
 *                        \/                       |__|
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@totalinternetgroup.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@totalinternetgroup.nl for more information.
 *
 * @copyright   Copyright (c) 2017 Total Internet Group B.V. (http://www.totalinternetgroup.nl)
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\PostNL\Helper\Labelling;

use TIG\PostNL\Helper\Data;
use TIG\PostNL\Model\ResourceModel\Shipment\CollectionFactory as ShipmentCollectionFactory;
use TIG\PostNL\Model\ResourceModel\ShipmentLabel\CollectionFactory as ShipmentLabelCollectionFactory;
use TIG\PostNL\Model\ShipmentLabel;
use TIG\PostNL\Model\ShipmentLabelFactory;

class SaveLabels
{
    /**
     * @var Data
     */
    private $postNLhelper;

    /**
     * @var ShipmentCollectionFactory
     */
    private $shipmentCollectionFactory;

    /**
     * @var ShipmentLabelCollectionFactory
     */
    private $shipmentLabelCollectionFactory;

    /**
     * @var ShipmentLabelFactory
     */
    private $shipmentLabelFactory;

    /**
     * @param Data                           $postNLhelper
     * @param ShipmentCollectionFactory      $shipmentCollectionFactory
     * @param ShipmentLabelCollectionFactory $shipmentLabelCollectionFactory
     * @param ShipmentLabelFactory           $shipmentLabelFactory
     */
    public function __construct(
        Data $postNLhelper,
        ShipmentCollectionFactory $shipmentCollectionFactory,
        ShipmentLabelCollectionFactory $shipmentLabelCollectionFactory,
        ShipmentLabelFactory $shipmentLabelFactory
    ) {
        $this->postNLhelper = $postNLhelper;
        $this->shipmentCollectionFactory = $shipmentCollectionFactory;
        $this->shipmentLabelCollectionFactory = $shipmentLabelCollectionFactory;
        $this->shipmentLabelFactory = $shipmentLabelFactory;
    }

    /**
     * @param $labels
     */
    public function save($labels)
    {
        $shipmentIds = array_keys($labels);

        $this->updateStatus($shipmentIds);
        $this->saveShipmentLabels($labels);
    }

    /**
     * @param $shipmentIds
     */
    private function updateStatus($shipmentIds)
    {
        $deliveryDate = $this->postNLhelper->getDateYmd();

        /** @var \TIG\PostNL\Model\ResourceModel\Shipment\Collection $collection */
        $collection = $this->shipmentCollectionFactory->create();
        $collection->addFieldToFilter('entity_id', ['in' => $shipmentIds]);
        $collection->setDataToAll('confirmed_at', $deliveryDate);
        $collection->save();
    }

    /**
     * @param $labels
     *
     * @throws \Exception
     */
    private function saveShipmentLabels($labels)
    {
        /** @var \TIG\PostNL\Model\ResourceModel\ShipmentLabel\Collection $labelModelCollection */
        $labelModelCollection = $this->shipmentLabelCollectionFactory->create();
        $labelModelCollection->load();

        foreach ($labels as $shipmentId => $label) {
            /** @var ShipmentLabel $labelModel */
            $labelModel = $this->shipmentLabelFactory->create();
            $labelModel->setParentId($shipmentId);
            $labelModel->setLabel(base64_encode($label));
            $labelModel->setType(ShipmentLabel::BARCODE_TYPE_LABEL);

            $labelModelCollection->addItem($labelModel);
        }

        $labelModelCollection->save();
    }
}