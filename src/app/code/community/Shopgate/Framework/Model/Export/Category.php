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
class Shopgate_Framework_Model_Export_Category extends Shopgate_Model_Catalog_Category
{
    /**
     * @var null
     */
    protected $_parentId = null;

    /**
     * @param $parentId
     *
     * @return $this
     */
    public function setParentId($parentId)
    {
        $this->_parentId = $parentId;

        return $this;
    }

    /**
     * @param Mage_Catalog_Model_Category $category
     * @return mixed
     */
    public function getImageUrl($category)
    {
        $url = null;
        if ($image = $category->getThumbnail()) {
            $url = Mage::getBaseUrl('media') . 'catalog/category/' . $image;
        }
        if (!$url) {
            $url = $category->getImageUrl();
        }
        return $this->_getExportHelper()->parseUrl($url);
    }

    /**
     * @param Mage_Catalog_Model_Category $category
     * @return mixed
     */
    public function getDeepLinkUrl($category)
    {
        return $this->_getExportHelper()->parseUrl($category->getUrl());
    }

    /**
     * @return Shopgate_Framework_Helper_Export
     */
    protected function _getExportHelper()
    {
        return Mage::helper('shopgate/export');
    }

    /**
     * @return Shopgate_Framework_Model_Config
     */
    protected function _getConfig()
    {
        return $this->_getHelper()->getConfig();
    }

    /**
     * return customer helper
     *
     * @return Shopgate_Framework_Helper_Customer
     */
    protected function _getCustomerHelper()
    {
        return Mage::helper('shopgate/customer');
    }

    /**
     * return default data helper
     *
     * @return Shopgate_Framework_Helper_Data
     */
    protected function _getHelper()
    {
        return Mage::helper('shopgate');
    }

    /**
     * return config helper
     *
     * @return Shopgate_Framework_Helper_Config
     */
    protected function _getConfigHelper()
    {
        return Mage::helper('shopgate/config');
    }
}
