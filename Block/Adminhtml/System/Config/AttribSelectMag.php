<?php

namespace Flagbit\Inxmail\Block\Adminhtml\System\Config;

use \Flagbit\Inxmail\Model\Request\RequestSubscriptionRecipients;

/**
 * Class AttribSelectMag
 *
 * @package Flagbit\Inxmail\Block\Adminhtml\System\Config
 */
class AttribSelectMag extends MapSelect
{
    /**
     * Parse to html
     *
     * @return string
     */
    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $attributes = RequestSubscriptionRecipients::getMapableAttributes();
            foreach ($attributes as $inxmail => $magento) {
                if ($magento === 'email') {
                    continue;
                }
                $this->addOption($magento, $magento);
            }
        }

        return parent::_toHtml();
    }
}