<?php
namespace OpenSearch\Generated\OpenSearch;

use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class OpenSearchServiceProcessor
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

    protected function process_call($seqid, $input, $output)
    {
        $args = new \OpenSearch\Generated\OpenSearch\OpenSearchService_call_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new \OpenSearch\Generated\OpenSearch\OpenSearchService_call_result();
        try {
            $result->success = $this->handler_->call($args->path, $args->params, $args->method);
        } catch (\OpenSearch\Generated\Common\OpenSearchException $error) {
            $result->error = $error;
        } catch (\OpenSearch\Generated\Common\OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'call', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('call', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }
}

