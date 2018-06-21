<?php
namespace OpenSearch\Test;

use OpenSearch\Client\OpenSearchClient;
use OpenSearch\Util\SearchParamsBuilder;
use OpenSearch\Client\SearchClient;

/**
 * OpenSearchClient test case.
 * @property \OpenSearch\Client\OpenSearchClient $openSearchClient
 */
class OpenSearchClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     * @var OpenSearchClient
     */
    var $openSearchClient;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $accessKey = "LTAICZ5bcHEGwg3q";
        $secret = "kFLCYcxTFedSNh9rBcjM3KHBkDoxlc";
        $host = "http://opensearch-cn-hangzhou.aliyuncs.com";
        $options = [
            'debug' => true
        ];
        $this->openSearchClient = new OpenSearchClient($accessKey, $secret, $host, $options);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated OpenSearchClientTest::tearDown()
        $this->openSearchClient = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests OpenSearchClient->get()
     */
    public function testGet()
    {
        $searchClient = new SearchClient($this->openSearchClient);
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
        //$params->setFormat("fulljson");
        $params->setFormat("json");
        //添加排序字段
        //$params->addSort('id', SearchParamsBuilder::SORT_DECREASE);
        // 执行搜索，获取搜索结果
        $ret = $searchClient->execute($params->build());
        // 将json类型字符串解码
        $result = $ret->getItems();
        //$result = json_decode($ret->result);
        print_r($result);
    }
}

