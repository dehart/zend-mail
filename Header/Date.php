<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Mail
 */

namespace Zend\Mail\Header;

/**
 * @todo       Add accessors for setting date from DateTime, Zend\Date, or a string
 * @category   Zend
 * @package    Zend_Mail
 * @subpackage Header
 */
class Date implements HeaderInterface
{
    /**
     * @var string
     */
    protected $value;

    public static function fromString($headerLine)
    {
        list($name, $value) = explode(': ', $headerLine, 2);

        // check to ensure proper header type for this factory
        if (strtolower($name) !== 'date') {
            throw new Exception\InvalidArgumentException('Invalid header line for Date string');
        }

        $header = new static();
        $header->value= $value;

        return $header;
    }

    public function getFieldName()
    {
        return 'Date';
    }

    public function getFieldValue($format = HeaderInterface::FORMAT_RAW)
    {
        return $this->value;
    }

    public function setEncoding($encoding)
    {
        // This header must be always in US-ASCII
        return $this;
    }

    public function getEncoding()
    {
        return 'ASCII';
    }

    public function toString()
    {
        return 'Date: ' . $this->getFieldValue();
    }
}
