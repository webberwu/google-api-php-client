<?php
require __DIR__ . '/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/credential-json-file');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(Google_Service_Webmasters::WEBMASTERS_READONLY);

$service = new Google_Service_Webmasters($client);
$query = new Google_Service_Webmasters_SearchAnalyticsQueryRequest();
$query->setStartDate('2017-08-01');
$query->setEndDate('2017-08-02');
$query->setDimensions([
    'date',
    'query',
    'page',
    'device',
    'country'
]);
$query->setStartRow(0);
$query->setRowLimit(5000);
$ret = $service->searchanalytics->query('https://www.example.com/', $query);

$table = new Console_Table(CONSOLE_TABLE_ALIGN_LEFT, CONSOLE_TABLE_BORDER_ASCII);
$table->setHeaders([
    'date',
    'keyword',
    'clicks',
    'impressions',
    'ctr',
    'position',
    'page',
    'device',
    'country',
]);
foreach ($ret as $row) {
    list($date, $keyword, $page, $device, $country) = $row->getKeys();

    $table->addRow([
        $date,
        $keyword,
        $row->clicks,
        $row->impressions,
        round($row->ctr, 4),
        round($row->position, 4),
        mb_substr(urldecode($page), 0, 100),
        $device,
        $country,
    ]);
}

echo $table->getTable();
