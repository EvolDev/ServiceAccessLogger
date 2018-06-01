# ServiceAccessLogger

### Required
php 7.0 or higher

### Setup
Just set path for access.log in AccessLogger class.
```
$this->setLogFileName("C:\\laragon\\bin\\nginx\\nginx-1.12.0\\logs\\access.log");
```

### Examples:

To initialize and get a instance use it.
```
$accessLogger = new AccessLogger(new AccessLoggerConfig());
```

Get the number of all lines in the file.
```
$accessLogger->getViews();
```

Get the number of unique ip adresses .
```
$accessLogger->getUniqueIpAddressCount->();
```

Get crawlers and their numbers.
```
$accessLogger->getCrawlersCountValues->();
```

Get status codes and their numbers.
```
$accessLogger->GetStatusCodeCountValues->();
```

Get all methods results. A JSON return by default,but you can add a false param for disable, if you want.
```
$accessLogger->getOutput();
```


### More
Also you can add new crawlers and status codes, just add new value in constant within Parser class.
```
const CRAWLERS = [
        "Googlebot",
        "Bingbot",
        "Slurp",
        "DuckDuckBot",
        "Baiduspider",
        "YandexBot",
        "Sogou",
        "Konqueror",
        "Exabot",
        "facebot",
        "ia_archiver",
    ];
```
```
  const STATUS_CODES = [
        "200",
        "204",
        "301",
    ];
```
