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
 * Class Adapter_Database
 *
 * @since 1.0.0
 */
// @codingStandardsIgnoreStart
class Adapter_Database implements Core_Foundation_Database_DatabaseInterface
{
    // @codingStandardsIgnoreEnd

    /**
     * Perform a SELECT sql statement
     *
     * @param string $sql
     *
     * @return array|false
     *
     * @throws PrestaShopDatabaseException
     *
     * @since 1.0.0
     * @version 1.0.0 Initial version
     */
    public function select($sql)
    {
        return Db::getInstance()->executeS($sql);
    }

    /**
     * Escape $unsafe to be used into a SQL statement
     *
     * @param mixed $unsafeData
     *
     * @return string
     *
     * @since 1.0.0
     * @version 1.0.0 Initial version
     */
    public function escape($unsafeData)
    {
        // Prepare required params
        $htmlOk = true;
        $bqSql = true;

        return Db::getInstance()->escape($unsafeData, $htmlOk, $bqSql);
    }
}
