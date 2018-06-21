<?php
namespace OpenSearch\Generated\Search;

/**
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 * @generated
 */
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;
use OpenSearch\Generated\Common\OpenSearchException;
use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\GeneralSearcher\GeneralSearcherServiceClient;

class OpenSearchSearcherServiceClient extends GeneralSearcherServiceClient implements OpenSearchSearcherServiceIf
{

    public function __construct($input, $output = null)
    {
        parent::__construct($input, $output);
    }

    public function execute(\OpenSearch\Generated\Search\SearchParams $searchParams)
    {
        $this->send_execute($searchParams);
        return $this->recv_execute();
    }

    public function send_execute(\OpenSearch\Generated\Search\SearchParams $searchParams)
    {
        $args = new \OpenSearch\Generated\Search\OpenSearchSearcherService_execute_args();
        $args->searchParams = $searchParams;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'execute', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('execute', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_execute()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel)
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\Search\OpenSearchSearcherService_execute_result', $this->input_->isStrictRead());
        else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;
            
            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new \OpenSearch\Generated\Search\OpenSearchSearcherService_execute_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        if ($result->success !== null) {
            return $result->success;
        }
        if ($result->error !== null) {
            throw $result->error;
        }
        if ($result->e !== null) {
            throw $result->e;
        }
        throw new \Exception("execute failed: unknown result");
    }
}

// HELPER FUNCTIONS AND STRUCTURES
class OpenSearchSearcherService_execute_args
{

    static $_TSPEC;

    /**
     *
     * @var \OpenSearch\Generated\Search\SearchParams
     */
    public $searchParams = null;

    public function __construct($vals = null)
    {
        if (! isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'searchParams',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\Search\SearchParams'
                )
            );
        }
        if (is_array($vals)) {
            if (isset($vals['searchParams'])) {
                $this->searchParams = $vals['searchParams'];
            }
        }
    }

    public function getName()
    {
        return 'OpenSearchSearcherService_execute_args';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->searchParams = new \OpenSearch\Generated\Search\SearchParams();
                        $xfer += $this->searchParams->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('OpenSearchSearcherService_execute_args');
        if ($this->searchParams !== null) {
            if (! is_object($this->searchParams)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('searchParams', TType::STRUCT, 1);
            $xfer += $this->searchParams->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}

class OpenSearchSearcherService_execute_result
{

    static $_TSPEC;

    /**
     *
     * @var \OpenSearch\Generated\GeneralSearcher\SearchResult
     */
    public $success = null;

    /**
     *
     * @var \OpenSearch\Generated\Common\OpenSearchException
     */
    public $error = null;

    /**
     *
     * @var \OpenSearch\Generated\Common\OpenSearchClientException
     */
    public $e = null;

    public function __construct($vals = null)
    {
        if (! isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                0 => array(
                    'var' => 'success',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\GeneralSearcher\SearchResult'
                ),
                1 => array(
                    'var' => 'error',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\Common\OpenSearchException'
                ),
                2 => array(
                    'var' => 'e',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\Common\OpenSearchClientException'
                )
            );
        }
        if (is_array($vals)) {
            if (isset($vals['success'])) {
                $this->success = $vals['success'];
            }
            if (isset($vals['error'])) {
                $this->error = $vals['error'];
            }
            if (isset($vals['e'])) {
                $this->e = $vals['e'];
            }
        }
    }

    public function getName()
    {
        return 'OpenSearchSearcherService_execute_result';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 0:
                    if ($ftype == TType::STRUCT) {
                        $this->success = new \OpenSearch\Generated\GeneralSearcher\SearchResult();
                        $xfer += $this->success->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->error = new \OpenSearch\Generated\Common\OpenSearchException();
                        $xfer += $this->error->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->e = new \OpenSearch\Generated\Common\OpenSearchClientException();
                        $xfer += $this->e->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('OpenSearchSearcherService_execute_result');
        if ($this->success !== null) {
            if (! is_object($this->success)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
            $xfer += $this->success->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->error !== null) {
            $xfer += $output->writeFieldBegin('error', TType::STRUCT, 1);
            $xfer += $this->error->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->e !== null) {
            $xfer += $output->writeFieldBegin('e', TType::STRUCT, 2);
            $xfer += $this->e->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}

class OpenSearchSearcherServiceProcessor extends \OpenSearch\Generated\GeneralSearcher\GeneralSearcherServiceProcessor
{

    public function __construct($handler)
    {
        parent::__construct($handler);
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

    protected function process_execute($seqid, $input, $output)
    {
        $args = new OpenSearchSearcherService_execute_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new OpenSearchSearcherService_execute_result();
        try {
            $result->success = $this->handler_->execute($args->searchParams);
        } catch (OpenSearchException $error) {
            $result->error = $error;
        } catch (OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'execute', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('execute', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }
}

