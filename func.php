<?php

class func
{
    public int $Days_left;

    public function __construct()
    {
        $timestamp = strtotime(date('Y-m-d'));
        $this->setDaysLeft((int)date('t', $timestamp) - (int)date('j', $timestamp) + 1);
    }

    public function is_it_today() : bool{
        $val = rand(1,$this->getDaysLeft());
        if($val == 1)
            return true;
        else
            return false;
    }

    /**
     * @return int
     */
    public function getDaysLeft(): int
    {
        return $this->Days_left;
    }

    /**
     * @param int $Days_left
     */
    private function setDaysLeft(int $Days_left): void
    {
        $this->Days_left = $Days_left;
    }
}