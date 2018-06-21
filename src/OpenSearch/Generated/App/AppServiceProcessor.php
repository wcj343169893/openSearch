<?php
namespace OpenSearch\Generated\App;

use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class AppServiceProcessor
{

    protected $handler_ = null;

    public function __construct($handler)
    {
        $this->handler_ = $handler;
    }

    public function process($input, $output)
    {
        $rseqid = 0;
        $fname = null;
        $mtype = 0;
        
        $input->readMessageBegin($fname, $mtype, $rseqid);
        $methodname = 'process_' . $fname;
        if (! method_exists($this, $methodname)) {
            $input->skip(TType::STRUCT);
            $input->readMessageEnd();
            $x = new TApplicationException('Function ' . $fname . ' not implemented.', TApplicationException::UNKNOWN_METHOD);
            $output->writeMessageBegin($fname, TMessageType::EXCEPTION, $rseqid);
            $x->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
            return;
        }
        $this->$methodname($rseqid, $input, $output);
        return true;
    }

    protected function process_save($seqid, $input, $output)
    {
        $args = new \OpenSearch\Generated\App\AppService_save_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new \OpenSearch\Generated\App\AppService_save_result();
        try {
            $result->success = $this->handler_->save($args->app);
        } catch (\OpenSearch\Generated\Common\OpenSearchException $error) {
            $result->error = $error;
        } catch (\OpenSearch\Generated\Common\OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'save', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('save', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }

    protected function process_getById($seqid, $input, $output)
    {
        $args = new \OpenSearch\Generated\App\AppService_getById_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new \OpenSearch\Generated\App\AppService_getById_result();
        try {
            $result->success = $this->handler_->getById($args->identity);
        } catch (\OpenSearch\Generated\Common\OpenSearchException $error) {
            $result->error = $error;
        } catch (\OpenSearch\Generated\Common\OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'getById', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('getById', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }

    protected function process_listAll($seqid, $input, $output)
    {
        $args = new \OpenSearch\Generated\App\AppService_listAll_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new \OpenSearch\Generated\App\AppService_listAll_result();
        try {
            $result->success = $this->handler_->listAll($args->pageable);
        } catch (\OpenSearch\Generated\Common\OpenSearchException $error) {
            $result->error = $error;
        } catch (\OpenSearch\Generated\Common\OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'listAll', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('listAll', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }

    protected function process_removeById($seqid, $input, $output)
    {
        $args = new \OpenSearch\Generated\App\AppService_removeById_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new \OpenSearch\Generated\App\AppService_removeById_result();
        try {
            $result->success = $this->handler_->removeById($args->identity);
        } catch (\OpenSearch\Generated\Common\OpenSearchException $error) {
            $result->error = $error;
        } catch (\OpenSearch\Generated\Common\OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'removeById', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('removeById', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }

    protected function process_updateById($seqid, $input, $output)
    {
        $args = new \OpenSearch\Generated\App\AppService_updateById_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new \OpenSearch\Generated\App\AppService_updateById_result();
        try {
            $result->success = $this->handler_->updateById($args->identity, $args->app);
        } catch (\OpenSearch\Generated\Common\OpenSearchException $error) {
            $result->error = $error;
        } catch (\OpenSearch\Generated\Common\OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'updateById', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('updateById', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }

    protected function process_reindexById($seqid, $input, $output)
    {
        $args = new \OpenSearch\Generated\App\AppService_reindexById_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new \OpenSearch\Generated\App\AppService_reindexById_result();
        try {
            $result->success = $this->handler_->reindexById($args->identity);
        } catch (\OpenSearch\Generated\Common\OpenSearchException $error) {
            $result->error = $error;
        } catch (\OpenSearch\Generated\Common\OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'reindexById', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('reindexById', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }
}

