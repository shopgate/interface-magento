<?php
/**
 * Copyright Shopgate Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    Shopgate Inc, 804 Congress Ave, Austin, Texas 78701 <interfaces@shopgate.com>
 * @copyright Shopgate Inc
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

/**
 * @author Konstantin Kiritsenko <konstantin@kiritsenko.com>
 */
class Shopgate_Framework_Model_Payment_Simple_Prepay_Phoenix
    extends Shopgate_Framework_Model_Payment_Simple_Prepay_Abstract
    implements Shopgate_Framework_Model_Payment_Interface
{
    const MODULE_CONFIG = 'Phoenix_BankPayment';
    const PAYMENT_MODEL = 'bankpayment/bankPayment';
    const XML_CONFIG_ENABLED = 'payment/bankpayment/active';

    /**
     * Rewrite to accommodate older version of BankPayment
     *
     * @return bool
     */
    public function isModuleActive()
    {
        return parent::isModuleActive() || $this->_isActive('Mage_BankPayment');
    }

    /**
     * Helps with readability
     *
     * @param $moduleName
     * @return bool
     */
    private function _isActive($moduleName)
    {
        return Mage::getConfig()->getModuleConfig($moduleName)->is('active', 'true');
    }
}