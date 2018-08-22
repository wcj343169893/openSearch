<?php
namespace OpenSearch\Generated\Common;


use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;

class OpenSearchResult {
    static $_TSPEC;
    
    /**
     * @var array
     */
    public $result = [];
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
                $result = json_decode($vals['result'],true);
                //如果成功返回，直接格式化成数组
                if(!empty($result) && $result["status"]=="OK"){
                    $this->result =$result["result"];
                }
            }
            if (isset($vals['traceInfo'])) {
                $this->traceInfo = $vals['traceInfo'];
            }
        }
    }
    public function setResult($str){
        $result = json_decode($str,true);
        //如果成功返回，直接格式化成数组
        if(!empty($result)){
            if(!empty($result["status"]) && $result["status"]=="OK"){
                //关键词搜索结果
                $this->result =$result["result"];
            }elseif (!empty($result["suggestions"])){
                //下拉建议
                foreach ($result["suggestions"] as $re){
                    $this->result[]=$re["suggestion"];
                }
            }
        }
    }
    
    public function getName() {
        return 'OpenSearchResult';
    }
    /**
     * 格式化返回的数据为json对象
     * @return array
     */
    public function getItems(){
        if(!empty($this->result)){
            //移除index_name
            $items=[];
            foreach ($this->result["items"] as $item){
                if(isset($item["index_name"])){
                    unset($item["index_name"]);
                }
                $items[]=$item;
            }
            return $items;
        }
        return [];
    }
    /**
     * 获取搜索时间, 例如： 0.014233
     * @return number
     */
    public function getSearchTime(){
        if(!empty($this->result)){
            return floatval($this->result["searchtime"]);
        }
        return 0;
    }
    /**
     * 获取搜索总数 
     * @return string
     */
    public function getTotal(){
        if(!empty($this->result)){
            return intval($this->result["total"]);
        }
        return 0;
    }
    /**
     * 返回实际得到的数量
     * @return number
     */
    public function getNum(){
        if(!empty($this->result)){
            return intval($this->result["num"]);
        }
        return 0;
    }
    /**
     * 返回可返回的总数
     * @return number
     */
    public function getViewtotal(){
        if(!empty($this->result)){
            return intval($this->result["viewtotal"]);
        }
        return 0;
    }
    /**
     * 格式化result
     */
    public function getResult(){
        return $this->result;
    }
    /**
     * 只返回查询的id
     * @return array
     */
    public function getIds(){
        $ids=[];
        $items=$this->getItems();
        if(!empty($items)){
            foreach ($items as $item){
                $ids[]=$item["id"];
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
