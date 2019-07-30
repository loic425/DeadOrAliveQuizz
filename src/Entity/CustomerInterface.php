<?php

/*
 * This file is part of DeadOrAliveQuizz.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use Sylius\Component\Customer\Model\CustomerInterface as BaseCustomerInterface;
use Sylius\Component\User\Model\UserAwareInterface;
use Sylius\Component\User\Model\UserInterface;

interface CustomerInterface extends BaseCustomerInterface, UserAwareInterface
{
    /**
     * @return AppUser|Userinterface|null
     */
    public function getUser(): ?UserInterface;

    /**
     * @param AppUser|UserInterface|null $user
     *
     * @return $this
     */
    public function setUser(?UserInterface $user);

    public function getScore(): ?int;

    public function setScore(?int $score): void;
}
