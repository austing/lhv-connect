<?php

namespace Mihkullorg\LhvConnect;

class Tag {

    const
        ACCOUNT = "Acct",
        ACCOUNT_IDENTIFICATION = "Id",
        ACCOUNT_OWNER = "AcctOwnr",
        CREATION_DATETIME = "CrdDtTm",
        DOCUMENT = "Document",
        FROM_DATE = "FrDt",
        FROM_TO_DATE = "FrToDt",
        FROM_TO_TIME = "FrToTm",
        GROUP_HEADER = "GrpHdr",
        IBAN = "IBAN",
        IDENTIFICATION = "Id",
        MESSAGE_IDENTIFICATION = "MsgId",
        PARTY = "Pty",
        PERIOD_START = "PeriodStart",
        PERIOD_END = "PeriodEnd",
        REPORTING_PERIOD = "RptgPrd",
        REPORTING_REQUEST = "RptgReq",
        REQUESTED_MESSAGE_NAME_IDENTIFICATION = "ReqdMsgNmId",
        TO_DATE = "ToDt",
        TO_TIME = "ToTm",
        MERCHANT_PAYMENT_TYPE = "Type",
        TYPE = "Tp",

        /**
         * Request name tags
         */

        ACCOUNT_STATEMENT_REQUEST = "AcctRptgReq",
        MERCHANT_REPORT_REQUEST = "MerchantReportRequest",
        
        ACCOUNT_STATEMENT_RESPONSE = "BkToCstmrStmt",
        MERCHANT_REPORT_RESPONSE = "BkToCstmrDbtCdtNtfctn"
    ;

}