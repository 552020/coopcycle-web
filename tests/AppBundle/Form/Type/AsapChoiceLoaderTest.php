<?php

namespace Tests\AppBundle\Form\Type;

use AppBundle\Entity\ClosingRule;
use AppBundle\Entity\Restaurant;
use AppBundle\Form\Type\AsapChoiceLoader;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class AsapChoiceLoaderTest extends TestCase
{
    public function tearDown(): void
    {
        Carbon::setTestNow();
    }

    private function assertDays($expected, array $dates)
    {
        $days = array_reduce($dates, function ($days, $item) {
            $day = (new \DateTime($item))->format('Y-m-d');
            if (!in_array($day, $days)) {
                  $days[] = $day;
            }

            return $days;
        }, []);

        $this->assertEquals($expected, $days);
    }

    private function assertNumberOfDays($expected, array $dates)
    {
        $days = array_reduce($dates, function ($days, $item) {
            $day = (new \DateTime($item))->format('Y-m-d');
            if (!in_array($day, $days)) {
                  $days[] = $day;
            }

            return $days;
        }, []);

        $this->assertEquals($expected, count($days));
    }

    public function test247()
    {
        Carbon::setTestNow(Carbon::parse('2017-10-04T17:30:00+02:00'));

        $choiceLoader = new AsapChoiceLoader(["Mo-Su 00:00-23:59"]);
        $choiceList = $choiceLoader->loadChoiceList();

        $this->assertEquals([
            "2017-10-04T17:30:00+02:00",
            "2017-10-04T17:45:00+02:00",
            "2017-10-04T18:00:00+02:00",
            "2017-10-04T18:15:00+02:00",
            "2017-10-04T18:30:00+02:00",
            "2017-10-04T18:45:00+02:00",
            "2017-10-04T19:00:00+02:00",
            "2017-10-04T19:15:00+02:00",
            "2017-10-04T19:30:00+02:00",
            "2017-10-04T19:45:00+02:00",
            "2017-10-04T20:00:00+02:00",
            "2017-10-04T20:15:00+02:00",
            "2017-10-04T20:30:00+02:00",
            "2017-10-04T20:45:00+02:00",
            "2017-10-04T21:00:00+02:00",
            "2017-10-04T21:15:00+02:00",
            "2017-10-04T21:30:00+02:00",
            "2017-10-04T21:45:00+02:00",
            "2017-10-04T22:00:00+02:00",
            "2017-10-04T22:15:00+02:00",
            "2017-10-04T22:30:00+02:00",
            "2017-10-04T22:45:00+02:00",
            "2017-10-04T23:00:00+02:00",
            "2017-10-04T23:15:00+02:00",
            "2017-10-04T23:30:00+02:00",
            "2017-10-04T23:45:00+02:00",
            "2017-10-05T00:00:00+02:00",
            "2017-10-05T00:15:00+02:00",
            "2017-10-05T00:30:00+02:00",
            "2017-10-05T00:45:00+02:00",
            "2017-10-05T01:00:00+02:00",
            "2017-10-05T01:15:00+02:00",
            "2017-10-05T01:30:00+02:00",
            "2017-10-05T01:45:00+02:00",
            "2017-10-05T02:00:00+02:00",
            "2017-10-05T02:15:00+02:00",
            "2017-10-05T02:30:00+02:00",
            "2017-10-05T02:45:00+02:00",
            "2017-10-05T03:00:00+02:00",
            "2017-10-05T03:15:00+02:00",
            "2017-10-05T03:30:00+02:00",
            "2017-10-05T03:45:00+02:00",
            "2017-10-05T04:00:00+02:00",
            "2017-10-05T04:15:00+02:00",
            "2017-10-05T04:30:00+02:00",
            "2017-10-05T04:45:00+02:00",
            "2017-10-05T05:00:00+02:00",
            "2017-10-05T05:15:00+02:00",
            "2017-10-05T05:30:00+02:00",
            "2017-10-05T05:45:00+02:00",
            "2017-10-05T06:00:00+02:00",
            "2017-10-05T06:15:00+02:00",
            "2017-10-05T06:30:00+02:00",
            "2017-10-05T06:45:00+02:00",
            "2017-10-05T07:00:00+02:00",
            "2017-10-05T07:15:00+02:00",
            "2017-10-05T07:30:00+02:00",
            "2017-10-05T07:45:00+02:00",
            "2017-10-05T08:00:00+02:00",
            "2017-10-05T08:15:00+02:00",
            "2017-10-05T08:30:00+02:00",
            "2017-10-05T08:45:00+02:00",
            "2017-10-05T09:00:00+02:00",
            "2017-10-05T09:15:00+02:00",
            "2017-10-05T09:30:00+02:00",
            "2017-10-05T09:45:00+02:00",
            "2017-10-05T10:00:00+02:00",
            "2017-10-05T10:15:00+02:00",
            "2017-10-05T10:30:00+02:00",
            "2017-10-05T10:45:00+02:00",
            "2017-10-05T11:00:00+02:00",
            "2017-10-05T11:15:00+02:00",
            "2017-10-05T11:30:00+02:00",
            "2017-10-05T11:45:00+02:00",
            "2017-10-05T12:00:00+02:00",
            "2017-10-05T12:15:00+02:00",
            "2017-10-05T12:30:00+02:00",
            "2017-10-05T12:45:00+02:00",
            "2017-10-05T13:00:00+02:00",
            "2017-10-05T13:15:00+02:00",
            "2017-10-05T13:30:00+02:00",
            "2017-10-05T13:45:00+02:00",
            "2017-10-05T14:00:00+02:00",
            "2017-10-05T14:15:00+02:00",
            "2017-10-05T14:30:00+02:00",
            "2017-10-05T14:45:00+02:00",
            "2017-10-05T15:00:00+02:00",
            "2017-10-05T15:15:00+02:00",
            "2017-10-05T15:30:00+02:00",
            "2017-10-05T15:45:00+02:00",
            "2017-10-05T16:00:00+02:00",
            "2017-10-05T16:15:00+02:00",
            "2017-10-05T16:30:00+02:00",
            "2017-10-05T16:45:00+02:00",
            "2017-10-05T17:00:00+02:00",
            "2017-10-05T17:15:00+02:00",
            "2017-10-05T17:30:00+02:00",
            "2017-10-05T17:45:00+02:00",
            "2017-10-05T18:00:00+02:00",
            "2017-10-05T18:15:00+02:00",
            "2017-10-05T18:30:00+02:00",
            "2017-10-05T18:45:00+02:00",
            "2017-10-05T19:00:00+02:00",
            "2017-10-05T19:15:00+02:00",
            "2017-10-05T19:30:00+02:00",
            "2017-10-05T19:45:00+02:00",
            "2017-10-05T20:00:00+02:00",
            "2017-10-05T20:15:00+02:00",
            "2017-10-05T20:30:00+02:00",
            "2017-10-05T20:45:00+02:00",
            "2017-10-05T21:00:00+02:00",
            "2017-10-05T21:15:00+02:00",
            "2017-10-05T21:30:00+02:00",
            "2017-10-05T21:45:00+02:00",
            "2017-10-05T22:00:00+02:00",
            "2017-10-05T22:15:00+02:00",
            "2017-10-05T22:30:00+02:00",
            "2017-10-05T22:45:00+02:00",
            "2017-10-05T23:00:00+02:00",
            "2017-10-05T23:15:00+02:00",
            "2017-10-05T23:30:00+02:00",
            "2017-10-05T23:45:00+02:00",
            "2017-10-06T00:00:00+02:00",
            "2017-10-06T00:15:00+02:00",
            "2017-10-06T00:30:00+02:00",
            "2017-10-06T00:45:00+02:00",
            "2017-10-06T01:00:00+02:00",
            "2017-10-06T01:15:00+02:00",
            "2017-10-06T01:30:00+02:00",
            "2017-10-06T01:45:00+02:00",
            "2017-10-06T02:00:00+02:00",
            "2017-10-06T02:15:00+02:00",
            "2017-10-06T02:30:00+02:00",
            "2017-10-06T02:45:00+02:00",
            "2017-10-06T03:00:00+02:00",
            "2017-10-06T03:15:00+02:00",
            "2017-10-06T03:30:00+02:00",
            "2017-10-06T03:45:00+02:00",
            "2017-10-06T04:00:00+02:00",
            "2017-10-06T04:15:00+02:00",
            "2017-10-06T04:30:00+02:00",
            "2017-10-06T04:45:00+02:00",
            "2017-10-06T05:00:00+02:00",
            "2017-10-06T05:15:00+02:00",
            "2017-10-06T05:30:00+02:00",
            "2017-10-06T05:45:00+02:00",
            "2017-10-06T06:00:00+02:00",
            "2017-10-06T06:15:00+02:00",
            "2017-10-06T06:30:00+02:00",
            "2017-10-06T06:45:00+02:00",
            "2017-10-06T07:00:00+02:00",
            "2017-10-06T07:15:00+02:00",
            "2017-10-06T07:30:00+02:00",
            "2017-10-06T07:45:00+02:00",
            "2017-10-06T08:00:00+02:00",
            "2017-10-06T08:15:00+02:00",
            "2017-10-06T08:30:00+02:00",
            "2017-10-06T08:45:00+02:00",
            "2017-10-06T09:00:00+02:00",
            "2017-10-06T09:15:00+02:00",
            "2017-10-06T09:30:00+02:00",
            "2017-10-06T09:45:00+02:00",
            "2017-10-06T10:00:00+02:00",
            "2017-10-06T10:15:00+02:00",
            "2017-10-06T10:30:00+02:00",
            "2017-10-06T10:45:00+02:00",
            "2017-10-06T11:00:00+02:00",
            "2017-10-06T11:15:00+02:00",
            "2017-10-06T11:30:00+02:00",
            "2017-10-06T11:45:00+02:00",
            "2017-10-06T12:00:00+02:00",
            "2017-10-06T12:15:00+02:00",
            "2017-10-06T12:30:00+02:00",
            "2017-10-06T12:45:00+02:00",
            "2017-10-06T13:00:00+02:00",
            "2017-10-06T13:15:00+02:00",
            "2017-10-06T13:30:00+02:00",
            "2017-10-06T13:45:00+02:00",
            "2017-10-06T14:00:00+02:00",
            "2017-10-06T14:15:00+02:00",
            "2017-10-06T14:30:00+02:00",
            "2017-10-06T14:45:00+02:00",
            "2017-10-06T15:00:00+02:00",
            "2017-10-06T15:15:00+02:00",
            "2017-10-06T15:30:00+02:00",
            "2017-10-06T15:45:00+02:00",
            "2017-10-06T16:00:00+02:00",
            "2017-10-06T16:15:00+02:00",
            "2017-10-06T16:30:00+02:00",
            "2017-10-06T16:45:00+02:00",
            "2017-10-06T17:00:00+02:00",
            "2017-10-06T17:15:00+02:00"
        ], $choiceList->getValues());

        $choiceLoader->setShippingOptionsDays(3);
        $choiceList = $choiceLoader->loadChoiceList();

        $values = $choiceList->getValues();

        $this->assertNumberOfDays(4, $values);

        $this->assertDays([
            "2017-10-04",
            "2017-10-05",
            "2017-10-06",
            "2017-10-07"
        ], $values);
    }

    public function testSameDay()
    {
        Carbon::setTestNow(Carbon::parse('2017-10-04T17:30:00+02:00'));

        $choiceLoader = new AsapChoiceLoader(["Mo-Sa 10:00-19:00"]);
        $choiceList = $choiceLoader->loadChoiceList();

        $this->assertEquals([
            '2017-10-04T17:30:00+02:00',
            '2017-10-04T17:45:00+02:00',
            '2017-10-04T18:00:00+02:00',
            '2017-10-04T18:15:00+02:00',
            '2017-10-04T18:30:00+02:00',
            '2017-10-04T18:45:00+02:00',
            '2017-10-05T10:00:00+02:00',
            '2017-10-05T10:15:00+02:00',
            '2017-10-05T10:30:00+02:00',
            '2017-10-05T10:45:00+02:00',
            '2017-10-05T11:00:00+02:00',
            '2017-10-05T11:15:00+02:00',
            '2017-10-05T11:30:00+02:00',
            '2017-10-05T11:45:00+02:00',
            '2017-10-05T12:00:00+02:00',
            '2017-10-05T12:15:00+02:00',
            '2017-10-05T12:30:00+02:00',
            '2017-10-05T12:45:00+02:00',
            '2017-10-05T13:00:00+02:00',
            '2017-10-05T13:15:00+02:00',
            '2017-10-05T13:30:00+02:00',
            '2017-10-05T13:45:00+02:00',
            '2017-10-05T14:00:00+02:00',
            '2017-10-05T14:15:00+02:00',
            '2017-10-05T14:30:00+02:00',
            '2017-10-05T14:45:00+02:00',
            '2017-10-05T15:00:00+02:00',
            '2017-10-05T15:15:00+02:00',
            '2017-10-05T15:30:00+02:00',
            '2017-10-05T15:45:00+02:00',
            '2017-10-05T16:00:00+02:00',
            '2017-10-05T16:15:00+02:00',
            '2017-10-05T16:30:00+02:00',
            '2017-10-05T16:45:00+02:00',
            '2017-10-05T17:00:00+02:00',
            '2017-10-05T17:15:00+02:00',
            '2017-10-05T17:30:00+02:00',
            '2017-10-05T17:45:00+02:00',
            '2017-10-05T18:00:00+02:00',
            '2017-10-05T18:15:00+02:00',
            '2017-10-05T18:30:00+02:00',
            '2017-10-05T18:45:00+02:00',
        ], $choiceList->getValues());

        $choiceLoader->setShippingOptionsDays(3);
        $choiceList = $choiceLoader->loadChoiceList();

        $values = $choiceList->getValues();

        $this->assertNumberOfDays(3, $values);

        $this->assertDays([
            "2017-10-04",
            "2017-10-05",
            "2017-10-06",
        ], $values);
    }

    public function testSameDayWithOneShippingOption()
    {
        Carbon::setTestNow(Carbon::parse('2020-03-12T15:30:00+02:00'));

        $openingHours = [
            "Tu-Su 13:15-16:00",
            "Tu-Su 20:15-23:15"
        ];

        $choiceLoader = new AsapChoiceLoader($openingHours);
        $choiceLoader->setShippingOptionsDays(1);

        $choiceList = $choiceLoader->loadChoiceList();
        $values = $choiceList->getValues();

        $this->assertEquals([
            '2020-03-12T15:30:00+02:00',
            '2020-03-12T15:45:00+02:00',
            '2020-03-12T20:15:00+02:00',
            '2020-03-12T20:30:00+02:00',
            '2020-03-12T20:45:00+02:00',
            '2020-03-12T21:00:00+02:00',
            '2020-03-12T21:15:00+02:00',
            '2020-03-12T21:30:00+02:00',
            '2020-03-12T21:45:00+02:00',
            '2020-03-12T22:00:00+02:00',
            '2020-03-12T22:15:00+02:00',
            '2020-03-12T22:30:00+02:00',
            '2020-03-12T22:45:00+02:00',
            '2020-03-12T23:00:00+02:00',
        ], $values);

        $this->assertNumberOfDays(1, $values);

        $this->assertDays([
            "2020-03-12",
        ], $values);

        Carbon::setTestNow(Carbon::parse('2020-03-12T23:30:00+02:00'));

        $choiceList = $choiceLoader->loadChoiceList();
        $values = $choiceList->getValues();

        $this->assertEquals([
            '2020-03-13T13:15:00+02:00',
            '2020-03-13T13:30:00+02:00',
            '2020-03-13T13:45:00+02:00',
            '2020-03-13T14:00:00+02:00',
            '2020-03-13T14:15:00+02:00',
            '2020-03-13T14:30:00+02:00',
            '2020-03-13T14:45:00+02:00',
            '2020-03-13T15:00:00+02:00',
            '2020-03-13T15:15:00+02:00',
            '2020-03-13T15:30:00+02:00',
            '2020-03-13T15:45:00+02:00',
            '2020-03-13T20:15:00+02:00',
            '2020-03-13T20:30:00+02:00',
            '2020-03-13T20:45:00+02:00',
            '2020-03-13T21:00:00+02:00',
            '2020-03-13T21:15:00+02:00',
            '2020-03-13T21:30:00+02:00',
            '2020-03-13T21:45:00+02:00',
            '2020-03-13T22:00:00+02:00',
            '2020-03-13T22:15:00+02:00',
            '2020-03-13T22:30:00+02:00',
            '2020-03-13T22:45:00+02:00',
            '2020-03-13T23:00:00+02:00',
        ], $values);

        $this->assertNumberOfDays(1, $values);

        $this->assertDays([
            "2020-03-13",
        ], $values);
    }

    public function testOnAnotherDay()
    {
        Carbon::setTestNow(Carbon::parse('2019-08-04T12:30:00+02:00'));

        $choiceLoader = new AsapChoiceLoader(["Tu-Sa 10:00-19:00"]);
        $choiceList = $choiceLoader->loadChoiceList();

        $values = $choiceList->getValues();

        $this->assertEquals([
            '2019-08-06T10:00:00+02:00',
            '2019-08-06T10:15:00+02:00',
            '2019-08-06T10:30:00+02:00',
            '2019-08-06T10:45:00+02:00',
            '2019-08-06T11:00:00+02:00',
            '2019-08-06T11:15:00+02:00',
            '2019-08-06T11:30:00+02:00',
            '2019-08-06T11:45:00+02:00',
            '2019-08-06T12:00:00+02:00',
            '2019-08-06T12:15:00+02:00',
            '2019-08-06T12:30:00+02:00',
            '2019-08-06T12:45:00+02:00',
            '2019-08-06T13:00:00+02:00',
            '2019-08-06T13:15:00+02:00',
            '2019-08-06T13:30:00+02:00',
            '2019-08-06T13:45:00+02:00',
            '2019-08-06T14:00:00+02:00',
            '2019-08-06T14:15:00+02:00',
            '2019-08-06T14:30:00+02:00',
            '2019-08-06T14:45:00+02:00',
            '2019-08-06T15:00:00+02:00',
            '2019-08-06T15:15:00+02:00',
            '2019-08-06T15:30:00+02:00',
            '2019-08-06T15:45:00+02:00',
            '2019-08-06T16:00:00+02:00',
            '2019-08-06T16:15:00+02:00',
            '2019-08-06T16:30:00+02:00',
            '2019-08-06T16:45:00+02:00',
            '2019-08-06T17:00:00+02:00',
            '2019-08-06T17:15:00+02:00',
            '2019-08-06T17:30:00+02:00',
            '2019-08-06T17:45:00+02:00',
            '2019-08-06T18:00:00+02:00',
            '2019-08-06T18:15:00+02:00',
            '2019-08-06T18:30:00+02:00',
            '2019-08-06T18:45:00+02:00',
            '2019-08-07T10:00:00+02:00',
            '2019-08-07T10:15:00+02:00',
            '2019-08-07T10:30:00+02:00',
            '2019-08-07T10:45:00+02:00',
            '2019-08-07T11:00:00+02:00',
            '2019-08-07T11:15:00+02:00',
            '2019-08-07T11:30:00+02:00',
            '2019-08-07T11:45:00+02:00',
            '2019-08-07T12:00:00+02:00',
            '2019-08-07T12:15:00+02:00',
            '2019-08-07T12:30:00+02:00',
            '2019-08-07T12:45:00+02:00',
            '2019-08-07T13:00:00+02:00',
            '2019-08-07T13:15:00+02:00',
            '2019-08-07T13:30:00+02:00',
            '2019-08-07T13:45:00+02:00',
            '2019-08-07T14:00:00+02:00',
            '2019-08-07T14:15:00+02:00',
            '2019-08-07T14:30:00+02:00',
            '2019-08-07T14:45:00+02:00',
            '2019-08-07T15:00:00+02:00',
            '2019-08-07T15:15:00+02:00',
            '2019-08-07T15:30:00+02:00',
            '2019-08-07T15:45:00+02:00',
            '2019-08-07T16:00:00+02:00',
            '2019-08-07T16:15:00+02:00',
            '2019-08-07T16:30:00+02:00',
            '2019-08-07T16:45:00+02:00',
            '2019-08-07T17:00:00+02:00',
            '2019-08-07T17:15:00+02:00',
            '2019-08-07T17:30:00+02:00',
            '2019-08-07T17:45:00+02:00',
            '2019-08-07T18:00:00+02:00',
            '2019-08-07T18:15:00+02:00',
            '2019-08-07T18:30:00+02:00',
            '2019-08-07T18:45:00+02:00',
        ], $values);
    }

    public function testWithUnconsecutiveDays()
    {
        Carbon::setTestNow(Carbon::parse('2019-08-04T12:30:00+02:00'));

        $choiceLoader = new AsapChoiceLoader(["Tu 10:00-19:00", "Th-Sa 10:00-19:00"]);
        $choiceList = $choiceLoader->loadChoiceList();

        $this->assertEquals([
            '2019-08-06T10:00:00+02:00',
            '2019-08-06T10:15:00+02:00',
            '2019-08-06T10:30:00+02:00',
            '2019-08-06T10:45:00+02:00',
            '2019-08-06T11:00:00+02:00',
            '2019-08-06T11:15:00+02:00',
            '2019-08-06T11:30:00+02:00',
            '2019-08-06T11:45:00+02:00',
            '2019-08-06T12:00:00+02:00',
            '2019-08-06T12:15:00+02:00',
            '2019-08-06T12:30:00+02:00',
            '2019-08-06T12:45:00+02:00',
            '2019-08-06T13:00:00+02:00',
            '2019-08-06T13:15:00+02:00',
            '2019-08-06T13:30:00+02:00',
            '2019-08-06T13:45:00+02:00',
            '2019-08-06T14:00:00+02:00',
            '2019-08-06T14:15:00+02:00',
            '2019-08-06T14:30:00+02:00',
            '2019-08-06T14:45:00+02:00',
            '2019-08-06T15:00:00+02:00',
            '2019-08-06T15:15:00+02:00',
            '2019-08-06T15:30:00+02:00',
            '2019-08-06T15:45:00+02:00',
            '2019-08-06T16:00:00+02:00',
            '2019-08-06T16:15:00+02:00',
            '2019-08-06T16:30:00+02:00',
            '2019-08-06T16:45:00+02:00',
            '2019-08-06T17:00:00+02:00',
            '2019-08-06T17:15:00+02:00',
            '2019-08-06T17:30:00+02:00',
            '2019-08-06T17:45:00+02:00',
            '2019-08-06T18:00:00+02:00',
            '2019-08-06T18:15:00+02:00',
            '2019-08-06T18:30:00+02:00',
            '2019-08-06T18:45:00+02:00',
            '2019-08-08T10:00:00+02:00',
            '2019-08-08T10:15:00+02:00',
            '2019-08-08T10:30:00+02:00',
            '2019-08-08T10:45:00+02:00',
            '2019-08-08T11:00:00+02:00',
            '2019-08-08T11:15:00+02:00',
            '2019-08-08T11:30:00+02:00',
            '2019-08-08T11:45:00+02:00',
            '2019-08-08T12:00:00+02:00',
            '2019-08-08T12:15:00+02:00',
            '2019-08-08T12:30:00+02:00',
            '2019-08-08T12:45:00+02:00',
            '2019-08-08T13:00:00+02:00',
            '2019-08-08T13:15:00+02:00',
            '2019-08-08T13:30:00+02:00',
            '2019-08-08T13:45:00+02:00',
            '2019-08-08T14:00:00+02:00',
            '2019-08-08T14:15:00+02:00',
            '2019-08-08T14:30:00+02:00',
            '2019-08-08T14:45:00+02:00',
            '2019-08-08T15:00:00+02:00',
            '2019-08-08T15:15:00+02:00',
            '2019-08-08T15:30:00+02:00',
            '2019-08-08T15:45:00+02:00',
            '2019-08-08T16:00:00+02:00',
            '2019-08-08T16:15:00+02:00',
            '2019-08-08T16:30:00+02:00',
            '2019-08-08T16:45:00+02:00',
            '2019-08-08T17:00:00+02:00',
            '2019-08-08T17:15:00+02:00',
            '2019-08-08T17:30:00+02:00',
            '2019-08-08T17:45:00+02:00',
            '2019-08-08T18:00:00+02:00',
            '2019-08-08T18:15:00+02:00',
            '2019-08-08T18:30:00+02:00',
            '2019-08-08T18:45:00+02:00',
        ], $choiceList->getValues());

        $choiceLoader->setShippingOptionsDays(4);
        $choiceList = $choiceLoader->loadChoiceList();

        $values = $choiceList->getValues();

        $this->assertNumberOfDays(4, $values);

        $this->assertDays([
            "2019-08-06",
            "2019-08-08",
            "2019-08-09",
            "2019-08-10",
        ], $values);
    }

    public function testWithDelayedOrders()
    {
        Carbon::setTestNow(Carbon::parse('2017-10-04T17:30:00+02:00'));

        $delay = (2 * 24 * 60); // should order two days in advance
        $choiceLoader = new AsapChoiceLoader(["Mo-Sa 10:00-19:00"], null, 2, $delay);
        $choiceList = $choiceLoader->loadChoiceList();

        $this->assertEquals([
            '2017-10-06T17:30:00+02:00',
            '2017-10-06T17:45:00+02:00',
            '2017-10-06T18:00:00+02:00',
            '2017-10-06T18:15:00+02:00',
            '2017-10-06T18:30:00+02:00',
            '2017-10-06T18:45:00+02:00',
            '2017-10-07T10:00:00+02:00',
            '2017-10-07T10:15:00+02:00',
            '2017-10-07T10:30:00+02:00',
            '2017-10-07T10:45:00+02:00',
            '2017-10-07T11:00:00+02:00',
            '2017-10-07T11:15:00+02:00',
            '2017-10-07T11:30:00+02:00',
            '2017-10-07T11:45:00+02:00',
            '2017-10-07T12:00:00+02:00',
            '2017-10-07T12:15:00+02:00',
            '2017-10-07T12:30:00+02:00',
            '2017-10-07T12:45:00+02:00',
            '2017-10-07T13:00:00+02:00',
            '2017-10-07T13:15:00+02:00',
            '2017-10-07T13:30:00+02:00',
            '2017-10-07T13:45:00+02:00',
            '2017-10-07T14:00:00+02:00',
            '2017-10-07T14:15:00+02:00',
            '2017-10-07T14:30:00+02:00',
            '2017-10-07T14:45:00+02:00',
            '2017-10-07T15:00:00+02:00',
            '2017-10-07T15:15:00+02:00',
            '2017-10-07T15:30:00+02:00',
            '2017-10-07T15:45:00+02:00',
            '2017-10-07T16:00:00+02:00',
            '2017-10-07T16:15:00+02:00',
            '2017-10-07T16:30:00+02:00',
            '2017-10-07T16:45:00+02:00',
            '2017-10-07T17:00:00+02:00',
            '2017-10-07T17:15:00+02:00',
            '2017-10-07T17:30:00+02:00',
            '2017-10-07T17:45:00+02:00',
            '2017-10-07T18:00:00+02:00',
            '2017-10-07T18:15:00+02:00',
            '2017-10-07T18:30:00+02:00',
            '2017-10-07T18:45:00+02:00',
        ], $choiceList->getValues());
    }

    public function testWithSecondRoundings()
    {
        Carbon::setTestNow(Carbon::parse('2017-10-04T17:30:26+02:00'));

        $choiceLoader = new AsapChoiceLoader(["Mo-Sa 10:00-19:00"]);
        $choiceList = $choiceLoader->loadChoiceList();

        $this->assertEquals([
            '2017-10-04T17:45:00+02:00',
            '2017-10-04T18:00:00+02:00',
            '2017-10-04T18:15:00+02:00',
            '2017-10-04T18:30:00+02:00',
            '2017-10-04T18:45:00+02:00',
            '2017-10-05T10:00:00+02:00',
            '2017-10-05T10:15:00+02:00',
            '2017-10-05T10:30:00+02:00',
            '2017-10-05T10:45:00+02:00',
            '2017-10-05T11:00:00+02:00',
            '2017-10-05T11:15:00+02:00',
            '2017-10-05T11:30:00+02:00',
            '2017-10-05T11:45:00+02:00',
            '2017-10-05T12:00:00+02:00',
            '2017-10-05T12:15:00+02:00',
            '2017-10-05T12:30:00+02:00',
            '2017-10-05T12:45:00+02:00',
            '2017-10-05T13:00:00+02:00',
            '2017-10-05T13:15:00+02:00',
            '2017-10-05T13:30:00+02:00',
            '2017-10-05T13:45:00+02:00',
            '2017-10-05T14:00:00+02:00',
            '2017-10-05T14:15:00+02:00',
            '2017-10-05T14:30:00+02:00',
            '2017-10-05T14:45:00+02:00',
            '2017-10-05T15:00:00+02:00',
            '2017-10-05T15:15:00+02:00',
            '2017-10-05T15:30:00+02:00',
            '2017-10-05T15:45:00+02:00',
            '2017-10-05T16:00:00+02:00',
            '2017-10-05T16:15:00+02:00',
            '2017-10-05T16:30:00+02:00',
            '2017-10-05T16:45:00+02:00',
            '2017-10-05T17:00:00+02:00',
            '2017-10-05T17:15:00+02:00',
            '2017-10-05T17:30:00+02:00',
            '2017-10-05T17:45:00+02:00',
            '2017-10-05T18:00:00+02:00',
            '2017-10-05T18:15:00+02:00',
            '2017-10-05T18:30:00+02:00',
            '2017-10-05T18:45:00+02:00',
        ], $choiceList->getValues());
    }

    public function testWithNoOpenings()
    {
        Carbon::setTestNow(Carbon::parse('2017-10-04T17:30:26+02:00'));

        $choiceLoader = new AsapChoiceLoader([]);
        $choiceList = $choiceLoader->loadChoiceList();

        $this->assertEquals([], $choiceList->getValues());
    }

    public function testWithClosingRules()
    {
        Carbon::setTestNow(Carbon::parse('2017-10-04T17:30:26+02:00'));

        $closingRule = new ClosingRule();
        $closingRule->setStartDate(new \DateTime('2017-10-04T18:29:26+02:00'));
        $closingRule->setEndDate(new \DateTime('2017-10-05T17:35:26+02:00'));

        $closingRules = new ArrayCollection();
        $closingRules->add($closingRule);

        $choiceLoader = new AsapChoiceLoader(["Mo-Sa 10:00-19:00"], $closingRules);
        $choiceList = $choiceLoader->loadChoiceList();

        $this->assertEquals([
            '2017-10-04T17:45:00+02:00',
            '2017-10-04T18:00:00+02:00',
            '2017-10-04T18:15:00+02:00',
            '2017-10-05T17:45:00+02:00',
            '2017-10-05T18:00:00+02:00',
            '2017-10-05T18:15:00+02:00',
            '2017-10-05T18:30:00+02:00',
            '2017-10-05T18:45:00+02:00',
        ], $choiceList->getValues());
    }

    public function testUntilLastMinuteOfDay()
    {
        Carbon::setTestNow(Carbon::parse('2020-09-07T17:00:00+02:00'));

        $choiceLoader = new AsapChoiceLoader(["Mo-Su 18:00-23:59"]);
        $choiceList = $choiceLoader->loadChoiceList();

        $this->assertEquals([
            '2020-09-07T18:00:00+02:00',
            '2020-09-07T18:15:00+02:00',
            '2020-09-07T18:30:00+02:00',
            '2020-09-07T18:45:00+02:00',
            '2020-09-07T19:00:00+02:00',
            '2020-09-07T19:15:00+02:00',
            '2020-09-07T19:30:00+02:00',
            '2020-09-07T19:45:00+02:00',
            '2020-09-07T20:00:00+02:00',
            '2020-09-07T20:15:00+02:00',
            '2020-09-07T20:30:00+02:00',
            '2020-09-07T20:45:00+02:00',
            '2020-09-07T21:00:00+02:00',
            '2020-09-07T21:15:00+02:00',
            '2020-09-07T21:30:00+02:00',
            '2020-09-07T21:45:00+02:00',
            '2020-09-07T22:00:00+02:00',
            '2020-09-07T22:15:00+02:00',
            '2020-09-07T22:30:00+02:00',
            '2020-09-07T22:45:00+02:00',
            '2020-09-07T23:00:00+02:00',
            '2020-09-07T23:15:00+02:00',
            '2020-09-07T23:30:00+02:00',
            '2020-09-07T23:45:00+02:00',
            '2020-09-08T18:00:00+02:00',
            '2020-09-08T18:15:00+02:00',
            '2020-09-08T18:30:00+02:00',
            '2020-09-08T18:45:00+02:00',
            '2020-09-08T19:00:00+02:00',
            '2020-09-08T19:15:00+02:00',
            '2020-09-08T19:30:00+02:00',
            '2020-09-08T19:45:00+02:00',
            '2020-09-08T20:00:00+02:00',
            '2020-09-08T20:15:00+02:00',
            '2020-09-08T20:30:00+02:00',
            '2020-09-08T20:45:00+02:00',
            '2020-09-08T21:00:00+02:00',
            '2020-09-08T21:15:00+02:00',
            '2020-09-08T21:30:00+02:00',
            '2020-09-08T21:45:00+02:00',
            '2020-09-08T22:00:00+02:00',
            '2020-09-08T22:15:00+02:00',
            '2020-09-08T22:30:00+02:00',
            '2020-09-08T22:45:00+02:00',
            '2020-09-08T23:00:00+02:00',
            '2020-09-08T23:15:00+02:00',
            '2020-09-08T23:30:00+02:00',
            '2020-09-08T23:45:00+02:00',
        ], $choiceList->getValues());
    }
}
