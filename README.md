# google-api-php-client

Some practices with google PHP api client.

## Initial

```
composer install
```

## Fetch the search analytics data from Search Console

### Prerequisites

1. Create new project in [google developers console](https://console.developers.google.com)
2. API manager > Library > enable `Google Search Console API`
3. API manager > Credentials > create `Service Account key`, download the credential JSON file, then replace the **credential path** and **site url** in search-console.php
4. Create new user with service account ID to search console site
5. run `php search-console.php`

### Parameters
[Document](https://developers.google.com/webmaster-tools/search-console-api-original/v3/searchanalytics/query)


### Limit
[Document](https://developers.google.com/webmaster-tools/search-console-api-original/v3/limits)

* **per site:** 5 QPS or 200 QPM
* **per user:** 5 QPS or 200 QPM
* **per project:** 100,000,000 QPD

> 在 browser 上實驗時間最久可以拉到三個月前，但文件沒寫確切的時間
