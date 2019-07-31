<?php

/*
 * This file is part of DeadOrAliveQuizz.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;

final class AdminMenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function createMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');

        $this->addContentSubMenu($menu);
        $this->addCustomerSubMenu($menu);
        $this->addConfigurationSubMenu($menu);

        return $menu;
    }

    private function addContentSubMenu(ItemInterface $menu): ItemInterface
    {
        $customer = $menu
            ->addChild('content')
            ->setLabel('sylius.ui.content');

        $customer->addChild('backend_celebrity', ['route' => 'app_backend_celebrity_index'])
            ->setLabel('app.ui.celebrities')
            ->setLabelAttribute('icon', 'star');

        $customer->addChild('backend_theme', ['route' => 'app_backend_theme_index'])
            ->setLabel('app.ui.themes')
            ->setLabelAttribute('icon', 'tag');

        return $customer;
    }

    /**
     * @param ItemInterface $menu
     *
     * @return ItemInterface
     */
    private function addCustomerSubMenu(ItemInterface $menu)
    {
        $customer = $menu
            ->addChild('customer')
            ->setLabel('sylius.ui.customer')
        ;

        $customer->addChild('backend_customer', ['route' => 'sylius_backend_customer_index'])
            ->setLabel('sylius.ui.customers')
            ->setLabelAttribute('icon', 'users');

        return $customer;
    }

    /**
     * @param ItemInterface $menu
     *
     * @return ItemInterface
     */
    private function addConfigurationSubMenu(ItemInterface $menu)
    {
        $configuration = $menu
            ->addChild('configuration')
            ->setLabel('sylius.ui.configuration')
        ;

        $configuration->addChild('backend_admin_user', ['route' => 'sylius_backend_admin_user_index'])
            ->setLabel('sylius.ui.admin_users')
            ->setLabelAttribute('icon', 'lock');

        return $configuration;
    }
}
