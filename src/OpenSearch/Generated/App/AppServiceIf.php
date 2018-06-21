<?php
namespace OpenSearch\Generated\App;


use OpenSearch\Generated\Common\Pageable;

interface AppServiceIf {
    /**
     * @param string $app
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     * @throws \OpenSearch\Generated\Common\OpenSearchException
     * @throws \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public function save($app);
    /**
     * @param string $identity
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     * @throws \OpenSearch\Generated\Common\OpenSearchException
     * @throws \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public function getById($identity);
    /**
     * @param \OpenSearch\Generated\Common\Pageable $pageable
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     * @throws \OpenSearch\Generated\Common\OpenSearchException
     * @throws \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public function listAll(Pageable $pageable);
    /**
     * @param string $identity
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     * @throws \OpenSearch\Generated\Common\OpenSearchException
     * @throws \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public function removeById($identity);
    /**
     * @param string $identity
     * @param string $app
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     * @throws \OpenSearch\Generated\Common\OpenSearchException
     * @throws \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public function updateById($identity, $app);
    /**
     * @param string $identity
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     * @throws \OpenSearch\Generated\Common\OpenSearchException
     * @throws \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public function reindexById($identity);
}
