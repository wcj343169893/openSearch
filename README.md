# openSearch php for aliyun 
基于官方opensearch-sdk-PHP 改版

## 安装
``` bash
$ composer install "mofing/opensearch":"~1.0"
```
或者修改composer.json
```
{
    "require": {
        "mofing/opensearch": "~1.0"
    }
}
```

## 用法
```php
//获取key和secret  
//<https://ak-console.aliyun.com/#/accesskey> 下的Access Key管理，可以适用阿里云的很多sdk，所以建议写成静态变量
$accessKey = "LTAICZ5bcHEHwg3d";//Access Key ID
$secret = "kFLCYaxTFedSNh9rJcjM3KHBkDoxlc";//Access Key Secret
$host = "http://opensearch-cn-hangzhou.aliyuncs.com";//公网API域名或者内网API域名
$options = [
    'debug' => true
];
//初始化授权
$openSearchClient = new OpenSearchClient($accessKey, $secret, $host, $options);
//初始化搜索客户端
$searchClient = new SearchClient($openSearchClient);
//设置搜索参数
$params = new SearchParamsBuilder();
//设置config子句的start值
$params->setStart(0);
//设置config子句的hit值
$params->setHits(20);
// 指定一个应用用于搜索
$params->setAppName('mofing_shops');
// 指定搜索关键词
$params->setQuery("title:'深圳'");
// 指定返回的搜索结果的格式为json
$params->setFormat("json");
//添加排序字段
//$params->addSort('id', SearchParamsBuilder::SORT_DECREASE);
// 执行搜索，获取搜索结果
$ret = $searchClient->execute($params->build());
// 将json类型字符串解码
$result = $ret->getItems();
//$result = json_decode($ret->result);
print_r($result);

```
--返回值

```
Array
(
    [0] => stdClass Object
        (
            [id] => 3217306
            [title] => 深圳
            [index_name] => name
        )

    [1] => stdClass Object
        (
            [id] => 2689102
            [title] => 深圳 i 摄摄影培训
            [index_name] => name
        )
)
```
