<?php
namespace OpenSearch\Generated\OpenSearch;

interface OpenSearchServiceIf {
    /**
     * @param string $path
     * @param array $params
     * @param string $method
     * @return string
     * @throws \OpenSearch\Generated\Common\OpenSearchException
     * @throws \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public function call($path, array $params, $method);
}
