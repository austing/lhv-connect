<?php

namespace Mihkullorg\LhvConnect\Requests;

use DateInterval;
use DateTime;
use Mihkullorg\LhvConnect\Tag;
use SimpleXMLElement;

class AccountStatementRequest extends FullRequest {
    
    protected $url = "account-statement";
    protected $method = "POST";

    protected $xmlTag = Tag::DOCUMENT;
    protected $xmlFormat = "camt.053.001.02";

    protected $rules = [
        'FROM_DATE' => 'date',
        'TO_DATE' => 'date',
    ];

    protected $fields = [
        'MESSAGE_IDENTIFICATION' => "",
        'CREATION_DATETIME' => "",
        'IBAN' => "",
        'PARTY' => "",
        'FROM_DATE' => "",
        'TO_DATE' => "",
        'TYPE' => "",
        'REQUESTED_MESSAGE_NAME_IDENTIFICATION' => "",
    ];

    protected $attributes = [
        'DOCUMENT' => [
            'xmlns:xmlns:xsi' => "http://www.w3.org/2001/XMLSchema-instance",
            'xmlns' => 'urn:iso:std:iso:20022:tech:xsd:camt.060.001.03',
        ],
    ];

    protected $xml = [
        'ACCOUNT_STATEMENT_REQUEST' => [
            'GROUP_HEADER' => [
                'MESSAGE_IDENTIFICATION' => "",
                'CREATION_DATETIME' => "",
            ],
            'REPORTING_REQUEST' => [
                'REQUESTED_MESSAGE_NAME_IDENTIFICATION' => "",
                'ACCOUNT' => [
                    'ACCOUNT_IDENTIFICATION' => [
                        'IBAN' => "",
                    ],
                ],
                'ACCOUNT_OWNER' => [
                    'PARTY' => "",
                ],
                'REPORTING_PERIOD' => [
                    'FROM_TO_DATE' => [
                        'FROM_DATE' => "",
                        'TO_DATE' => "",
                    ],
                    'TYPE' => "",
                ],
            ],
        ],
    ];

    protected function prepareFields()
    {
        $this->fields['MESSAGE_IDENTIFICATION'] = $this->msgId;
        $this->fields['IBAN'] = $this->configuration['IBAN'];
        $this->fields['CREATION_DATETIME'] = (new DateTime())->format(DateTime::ISO8601);
        $this->fields['FROM_DATE'] = (new DateTime)->sub(new DateInterval('P1M'))->format('Y-m-d');  //Last month
        $this->fields['TO_DATE'] = (new DateTime())->format('Y-m-d');

        $this->fields['TYPE'] = "ALLL";
        $this->fields['REQUESTED_MESSAGE_NAME_IDENTIFICATION'] = $this->xmlFormat;
    }

    protected function prepareXmlArray()
    {
        // Nothing to do here
    }

    protected function array_to_xml(array $data, SimpleXMLElement &$xml_data)
    {
        foreach($this->attributes['DOCUMENT'] as $key=>$val){
            $xml_data->addAttribute($key, $val);
        }
        parent::array_to_xml($data, $xml_data);
    }
}