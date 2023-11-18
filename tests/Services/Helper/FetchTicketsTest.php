<?php

namespace App\Tests\Services\Helper;

use App\Repository\TicketsRepository;
use App\Services\Helper\FetchTickets;
use PHPUnit\Framework\TestCase;

class FetchTicketsTest extends TestCase
{
    private FetchTickets $fetchTickets;

    private TicketsRepository $ticketsRepository;

    public function setUp(): void
    {
        $this->ticketsRepository = $this->createMock(TicketsRepository::class);
        $this->fetchTickets = new FetchTickets($this->ticketsRepository);
    }

    public function dataProvider(): array
    {
        return [
            [
                'expected' => [],
                'willReturn' => []
            ],
            [
                'expected' => [
                    [
                        'id' => 1,
                        'sort' => '2',
                        'title' => 'Testung',
                        'text' => 'test der Applikation',
                    ]
                ],
                'willReturn' => [
                    [
                        'id' => 1,
                        'sort' => '2',
                        'title' => 'Testung',
                        'text' => 'test der Applikation',
                    ]
                ]
            ]
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetAll(array $expected, array $willReturn): void
    {
        $this->ticketsRepository
            ->expects(self::once())
            ->method('findAll')
            ->willReturn($willReturn);

        $this->assertSame($this->fetchTickets->getAll(), $expected);
    }
}
