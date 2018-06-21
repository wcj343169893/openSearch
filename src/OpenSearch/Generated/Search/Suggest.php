<?php
namespace OpenSearch\Generated\Search;


use Thrift\Type\TType;

class Suggest {
    static $_TSPEC;
    
    /**
     * @var string
     */
    public $suggestName = null;
    
    public function __construct($vals=null) {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'suggestName',
                    'type' => TType::STRING,
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['suggestName'])) {
                $this->suggestName = $vals['suggestName'];
            }
        }
    }
    
    public function getName() {
        return 'Suggest';
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
                        $xfer += $input->readString($this->suggestName);
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
        $xfer += $output->writeStructBegin('Suggest');
        if ($this->suggestName !== null) {
            $xfer += $output->writeFieldBegin('suggestName', TType::STRING, 1);
            $xfer += $output->writeString($this->suggestName);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
    
}
