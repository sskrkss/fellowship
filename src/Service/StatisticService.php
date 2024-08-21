<?php

namespace App\Service;

use Doctrine\DBAL\Connection;

readonly class StatisticService
{
    public function __construct(
        private Connection $connection
    ) {
    }

    public function getStatistic(string $sqlPath): array
    {
        $sql = file_get_contents($sqlPath);
        $queries = array_filter(array_map('trim', explode(';', $sql)));

        $results = [];
        foreach ($queries as $query) {
            if (!empty($query)) {
                $result = $this->connection->fetchAllAssociative($query);
                if (!empty($result)) {
                    $results = array_merge($results, array_pop($result));
                }
            }
        }
        return $results;
    }
}
