<?php
namespace OpenSearch\Generated\Common;


use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;

class OpenSearchResult {
    static $_TSPEC;
    
    /**
     * @var string
     */
    public $result = null;
    /**
     * @var \OpenSearch\Generated\Common\TraceInfo
     */
    public $traceInfo = null;
    
    var $items=[];
    var $searchtime;
    var $total;
    var $num;
    var $viewtotal;
    
    public function __construct($vals=null) {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'result',
                    'type' => TType::STRING,
                ),
                3 => array(
                    'var' => 'traceInfo',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\Common\TraceInfo',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['result'])) {
                $this->result = $vals['result'];
            }
            if (isset($vals['traceInfo'])) {
                $this->traceInfo = $vals['traceInfo'];
            }
        }
    }
    
    public function getName() {
        return 'OpenSearchResult';
    }
    public function getItems(){
        $result = json_decode($this->result);
        if($result->status=="OK"){
            $this->items=$result->result->items;
            $this->searchtime=$result->result->searchtime;
            $this->total=$result->result->total;
            $this->num=$result->result->num;
            $this->viewtotal=$result->result->viewtotal;
        }
        return $this->items;
    }
    public function getIds(){
        $this->getItems();
        $ids=[];
        if(!empty($this->items)){
            foreach ($this->items as $item){
                $ids[]=$item->id;
            }
        }
        return $ids;
    }
    
    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true)
        {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid)
            {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->result);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRUCT) {
                        $this->traceInfo = new \OpenSearch\Generated\Common\TraceInfo();
                        $xfer += $this->traceInfo->read($input);
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
    
    public function write($output) {
        $xfer = 0;
        $xfer += $output->writeStructBegin('OpenSearchResult');
        if ($this->result !== null) {
            $xfer += $output->writeFieldBegin('result', TType::STRING, 1);
            $xfer += $output->writeString($this->result);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->traceInfo !== null) {
            if (!is_object($this->traceInfo)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('traceInfo', TType::STRUCT, 3);
            $xfer += $this->traceInfo->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
    
}
