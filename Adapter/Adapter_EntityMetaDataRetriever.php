<?php
/**
 * 2007-2016 PrestaShop
 *
 * Thirty Bees is an extension to the PrestaShop e-commerce software developed by PrestaShop SA
 * Copyright (C) 2017 Thirty Bees
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@thirtybees.com so we can send you a copy immediately.
 *
 *  @author    Thirty Bees <modules@thirtybees.com>
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2017 Thirty Bees
 *  @copyright 2007-2016 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  PrestaShop is an internationally registered trademark & property of PrestaShop SA
 */

/**
 * Class Adapter_EntityMetaDataRetriever
 *
 * @since 1.0.0
 */
// @codingStandardsIgnoreStart
class Adapter_EntityMetaDataRetriever
{
    // @codingStandardsIgnoreEnd

    /**
     * @param string $className
     *
     * @return Core_Foundation_Database_EntityMetaData
     * @throws Adapter_Exception
     *
     * @since 1.0.0
     * @version 1.0.0 Initial version
     */
    public function getEntityMetaData($className)
    {
        $metaData = new Core_Foundation_Database_EntityMetaData();

        $metaData->setEntityClassName($className);

        if (property_exists($className, 'definition')) {
            // Legacy entity
            $classVars = get_class_vars($className);
            $metaData->setTableName($classVars['definition']['table']);
            $metaData->setPrimaryKeyFieldNames([$classVars['definition']['primary']]);
        } else {
            throw new Adapter_Exception(
                sprintf(
                    'Cannot get metadata for entity `%s`.',
                    $className
                )
            );
        }

        return $metaData;
    }
}
