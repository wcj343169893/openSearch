<?php
namespace OpenSearch\Generated\Search;

use OpenSearch\Generated\GeneralSearcher\GeneralSearcherServiceIf;

interface OpenSearchSearcherServiceIf extends GeneralSearcherServiceIf {
    /**
     * @param \OpenSearch\Generated\Search\SearchParams $searchParams
     * @return \OpenSearch\Generated\GeneralSearcher\SearchResult
     * @throws \OpenSearch\Generated\Common\OpenSearchException
     * @throws \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public function execute(SearchParams $searchParams);
}

