<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="google" content="notranslate">
    <meta name=apple-mobile-web-app-capable content=yes>
    <meta name=apple-mobile-web-app-status-bar-style content=#207CCA>
    <meta name="theme-color" content="#207CCA">
    <meta property="og:title" content="<?php echo $title;?>"/>
    <meta property="og:description" content="<?php echo $title;?>"/>
    <title><?php echo $title;?></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        @media all {
            table td{
                height:15px;
                vertical-align:middle;
                padding: 0 3px;
            }

            .borderBawah{border-bottom:solid 1px;}
            .borderKanan{border-right:solid 1px;}
            .borderAtas{border-top:solid 1px;}
            .borderKiri{border-left:solid 1px;}
            /*.TebalBorder{ border-bottom:solid 2px;}*/

            .posisiAtas{vertical-align:top;}
            .posisiTengah{vertical-align:middle;}
            .posisiBawah{vertical-align:bottom;}

            .headerFont{font-size:14px; font-weight:bold;}
            .fontBold{font-weight:bold;}
            .fontMiring{font-style:italic; }
            .fontCenter{text-align:center;}
            .fontJustify{text-align:justify;}
            .fontKanan{text-align:right;}
            .fontKiri{text-align:left;}
            .fontUnderline{text-decoration: underline;}

            .paddingBawah{padding-bottom:10px;}
            .paddingKiri{padding-left:5px;}
            /*.paddingfont{padding-bottom:3px;padding-left:5px;padding-top:3px;padding-right:3px;}*/


            .h9 {font-size: 9px; text-align: center;}
            .h9b {font-size: 9px; text-align: center; font-weight: bold; }
            .h10b {font-size: 10px; text-align: right; font-weight: bold; }
            .h11b{ font-size: 11px; text-align: center; font-weight: bold;}
            .h12{ font-size: 12px; text-align: center;}
            .h12b{ font-size: 12px; text-align: center;font-weight: bold;}
            .h14{ font-size: 14px; text-align: center;}
            .h14b{ font-size: 14px; font-weight: bold; text-align: center;}
            .h16b{ font-size: 16px; font-weight: bold; text-align: center; }
            .h18b{ font-size: 18px; font-weight: bold; text-align: center; }
            .h20b{ font-size: 20px; font-weight: bold; text-align: center; }
            .lebar{ width: 100%;}
            .divKodtak{width:20px;height:20px;border:solid 1px;text-align:center; vertical-align:middle; padding-bottom:3px; padding-left:3px;padding-right:3px; padding-top:0px; float:left;}
            .tinggiHeader{height:45px;}
            .border{border:solid 1px;}

            /*end laporan SPM*/

            /*laporan pajak*/

            .boxMin{width:25px;height:25px;text-align:center;vertical-align:middle;padding-bottom:3px;padding-left:3px;padding-right:3px;padding-top:3px;float:left;border-bottom:solid 1px; border-top:solid 1px; border-left:solid 1px;}
            .boxs{width:25px;height:25px;text-align:center;vertical-align:middle;padding-bottom:3px;padding-left:3px;padding-right:3px;padding-top:3px;float:left;border-bottom:solid 1px; border-top:solid 1px; border-left:solid 1px; border-right:solid 1px;}
            .divSpasi{width:16px;height:17px;border:none;float:left;}
            .borderRhM{border-right: hidden; vertical-align: middle;}
            .borderRh{border-right: hidden;}
            .borderBN{border-bottom: hidden;}
            .borderBn40{border-bottom: hidden; height: 40px;}
            .font9i{font-size:9px; font-style:italic}
            .boxspasi{ width:20px; height:20px; float:left; border:none; text-align:center;  }

            /*end laporan pajak*/


            /*================ format surat pernyataan ===============*/

            .header16{
                font-size: 16px;
                font-weight: bold;
                text-align: center;
                padding-bottom: 3px;
                padding-left: 5px;
                padding-top: 3px;
                padding-right: 3px;
            }
            .header18{
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                padding-bottom: 3px;
                padding-left: 5px;
                padding-top: 3px;
                padding-right: 3px;
            }
            .header16garis{
                font-size: 16px;
                font-weight: bold;
                text-align: center;
                padding-bottom: 3px;
                padding-left: 5px;
                padding-top: 3px;
                padding-right: 3px;
                border-bottom:solid 1px;
                border-bottom:solid 2px;
            }

            .header14garis{
                font-size: 14px;
                font-weight: bold;
                text-align: center;
                padding-bottom: 3px;
                padding-left: 5px;
                padding-top: 3px;
                padding-right: 3px;
                border-bottom:solid 1px;
                border-bottom:solid 2px;
            }
            .header11{
                font-size: 11px;
                font-weight: bold;
                text-align: center;

            }

            .header13{
                font-size: 13px;
                font-weight: bold;
                text-align: center;
            }

            /*-------------------- SPP Rincian ------------------*/
            .nonborder{ border: hidden;}
            .nonborderPinggir{ border-right: hidden; border-left: hidden;}
            /*-------------------- end SPP RIncian ----------------*/


            /*=======================================================
            laporan BKU
            =======================================================*/
            .kop_image{
                text-align: center;
                width: 39px;
                height: 50px;
            }

            .kop_pemkot{
                font-size:14px;
                font-weight: bold;
                text-align: center;
                padding:3px 0 0 0;
            }

            .kop_judul{
                font-size:16px;
                font-weight: bold;
                text-align: center;
                padding:3px 0 0 0;
            }
            .kop_subjudul{
                font-size:14px;
                font-weight: bold;
                text-align: center;
            }
            .kop_skpd{
                font-size:12px;
                font-weight: bold;
                text-align: center;
                padding:3px 0 0 0;
            }
            .kop_keterangan{
                font-size:11px;
                font-weight: bold;
                text-align: center;
                padding:3px 0 0 0;
            }

            .keterangan{
                font-size:10px;
                text-align: left;
                font-weight: normal;
                padding:5px 0 0 0;
            }
            .tb-header{
                font-size: 10px;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border-bottom: solid 2px;
            }
            .tb-header td{
                vertical-align: middle;
                padding-left: 2px;
                padding-right: 2px;
                border: solid 1px;
            }
            .tb-header th{
                vertical-align: middle;
                padding-left: 2px;
                padding-right: 2px;
                border: solid 1px;

            }
            .tb-body{
                font-size: 10px;
            }
            .tb-body td{
                border: solid 1px;
                padding: 0px 0px 0px 0px;
            }
            .tb-footer{
                font-size: 10px;
            }
            .tb-limit{
                border-bottom: solid 2px;
            }

            .tb-padding th{
                padding: 2px 5px 2px 5px;
            }

            .printtime{
                color: #888888;
                font-size: 8px;
                text-align: right;
            }
            .sejajar{
                float: left;
                width: 100px;
            }


        }

        @media screen {
            body {
                /*background-color: #ddd !important;*/
                overflow-x: auto!important;
            }

            .paper {
                min-height:200px;
                background:#FFF;
                /*padding: 25px 15px;*/
            }

            .potrait {
                width: 21.59cm;
                min-height : 27.0cm;
                margin: 20px auto!important;
            }

            .landscape {
                min-height: 21cm;
                width: 100%;
                /*margin: 10px auto;*/
                font-size: 11px;
            }

            /*.landscape {
                height: 21cm;
                min-width: 85%;
                margin: 0 auto!important;
                font-size: 11px;
            }*/

            .paper > table {
                width : 100%;
            }


            /*==================================================
             * Effect 1
             * ===============================================*/
            .effect1
            {
                box-shadow: 0 10px 6px -6px #777;
            }

            /*==================================================
             * Effect 2
             * ===============================================*/
            .effect2
            {
                position: relative;
            }
            .effect2:before, .effect2:after
            {
                z-index: -1;
                position: absolute;
                content: "";
                bottom: 15px;
                left: 10px;
                width: 50%;
                top: 80%;
                max-width:300px;
                background: #777;
                box-shadow: 0 15px 10px #777;
                transform: rotate(-3deg);
            }
            .effect2:after
            {
                transform: rotate(3deg);
                right: 10px;
                left: auto;
            }

            /*==================================================
             * Effect 3
             * ===============================================*/
            .effect3
            {
                position: relative;
            }
            .effect3:before
            {
                z-index: -1;
                position: absolute;
                content: "";
                bottom: 15px;
                left: 10px;
                width: 50%;
                top: 80%;
                max-width:300px;
                background: #777;
                box-shadow: 0 15px 10px #777;
                transform: rotate(-3deg);
            }

            /*==================================================
             * Effect 4
             * ===============================================*/
            .effect4
            {
                position: relative;
            }
            .effect4:after
            {
                z-index: -1;
                position: absolute;
                content: "";
                bottom: 15px;
                right: 10px;
                left: auto;
                width: 50%;
                top: 80%;
                max-width:300px;
                background: #777;
                box-shadow: 0 15px 10px #777;
                transform: rotate(3deg);
            }

            /*==================================================
             * Effect 5
             * ===============================================*/
            .effect5
            {
                position: relative;
            }
            .effect5:before, .effect5:after
            {
                z-index: -1;
                position: absolute;
                content: "";
                bottom: 25px;
                left: 10px;
                width: 50%;
                top: 80%;
                max-width:300px;
                background: #777;
                -webkit-box-shadow: 0 35px 20px #777;
                -moz-box-shadow: 0 35px 20px #777;
                box-shadow: 0 35px 20px #777;
                -webkit-transform: rotate(-8deg);
                -moz-transform: rotate(-8deg);
                -o-transform: rotate(-8deg);
                -ms-transform: rotate(-8deg);
                transform: rotate(-8deg);
            }
            .effect5:after
            {
                -webkit-transform: rotate(8deg);
                -moz-transform: rotate(8deg);
                -o-transform: rotate(8deg);
                -ms-transform: rotate(8deg);
                transform: rotate(8deg);
                right: 10px;
                left: auto;
            }

            /*==================================================
             * Effect 6
             * ===============================================*/
            .effect6
            {
                position:relative;
                -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            }
            .effect6:before, .effect6:after
            {
                content:"";
                position:absolute;
                z-index:-1;
                -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
                -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
                box-shadow:0 0 20px rgba(0,0,0,0.8);
                top:50%;
                bottom:0;
                left:10px;
                right:10px;
                -moz-border-radius:100px / 10px;
                border-radius:100px / 10px;
            }
            .effect6:after
            {
                right:10px;
                left:auto;
                transform:skew(8deg) rotate(3deg);
            }

            /*==================================================
             * Effect 7
             * ===============================================*/
            .effect7
            {
                position:relative;
                box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            }
            .effect7:before, .effect7:after
            {
                content:"";
                position:absolute;
                z-index:-1;
                box-shadow:0 0 20px rgba(0,0,0,0.8);
                top:0;
                bottom:0;
                left:10px;
                right:10px;
                border-radius:100px / 10px;
            }
            .effect7:after
            {
                right:10px;
                left:auto;
                transform:skew(8deg) rotate(3deg);
            }

            /*==================================================
             * Effect 8
             * ===============================================*/
            .effect8
            {
                position:relative;
                box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            }
            .effect8:before, .effect8:after
            {
                content:"";
                position:absolute;
                z-index:-1;
                box-shadow:0 0 20px rgba(0,0,0,0.8);
                top:10px;
                bottom:10px;
                left:0;
                right:0;
                border-radius:100px / 10px;
            }
            .effect8:after
            {
                right:10px;
                left:auto;
                transform:skew(8deg) rotate(3deg);
            }

        }

        @media print {
            .paper > table {
                width : 100%;
                /*display: none; !important;*/
                /*visibility: hidden; !important;*/
            }

            .bk{ border-left: solid 2px; }
        }

        /* Mobile Sizing Combinations */
        @media only screen and (min-width: 320px) and (max-width: 767px) {
            .mobile { display: block !important; }
            .desktop {display: none !important; }
        }

        /* Tablet + PC Sizing Combinations */
        @media only screen and (min-width: 768px) {
            .mobile {display: none !important; }
        }

        @media print {
            a.print.label { display: none !important;}
            .noprint { display: none !important; visibility: hidden !important; }
        }
        body * { color: #000 !important; }
        @page {
            size: landscape;
            /*padding: 4px 4px 4px 4px*/
        }

        table.full.page {
            border-collapse: collapse;
        }

        table.full.page > thead > tr > th, table.full.page > tbody > tr > td {
            padding: 2px 4px 2px 4px ;
            border: thin solid;
            line-height: 1.75em;
            vertical-align: middle;
        }

        table.full.page tbody tr {
            line-height: 2em;
        }


        .kop_pemkot{
            font-size:15px;
            font-weight: bold;
            text-align: center;
            padding:3px 0 0 0;
        }

        .kop_subjudul{
            font-size:20px;
            font-weight: bold;
            text-align: center;
            line-height: 1.4em;
        }

        .kop_keterangan{
            font-size:15px;
            font-weight: bold;
            text-align: center;
            padding:3px 0 0 0;
        }

        .uppercase { text-transform: uppercase!important; }
        .bold { font-weight: 900!important; }
        .underline { text-decoration: underline!important; }
        .italic { font-style: italic!important; }
        .size-20 { font-size: 20pt; }
        .size-14 { font-size:  14pt; }
        .size-13 { font-size:  13pt; }
        .size-12 { font-size:  12pt; }
        .size-11 { font-size:  11pt; }
        .size-10 { font-size:  10pt; }
        .size-9 { font-size:  9pt; }
        .size-8 { font-size:  8pt; }
        .size-7 { font-size:  7pt; }
        hr { border-style: solid!important; }

        .boxed {
            border-collapse: collapse;
            border: 1px solid!important;
            padding: 0 6px;
            margin-left: -1px;
        }
        .border-dobel{
            border-bottom: solid 2px !important;
        }
        .border-dobel-top{
            border-top: solid 2px !important;
            padding: 0.5rem !important;
        }

        .border-dobel-right{
            border-right: solid 2px !important;
            padding: 0.5rem !important;
        }

        .border-dobel-left{
            border-left: solid 2px !important;
            padding: 0.5rem !important;
        }

        .unboxed {
            border: none!important;
            /*padding: 0 6px;*/
            /*margin-left: -1px;*/
        }

        .collapsing {
            width: 1px;
            white-space: nowrap;
        }

        /*table thead {display: table-header-group;}*/
        /*table tfoot { display: table-footer-group;}*/
        /*table tbody { display: table-row-group;}*/

        /** Fix for Chrome issue #273306 **/
        @media print {
            .no-print, .no-print * {
                display: none !important;
            }
        }
        .size-header { font-size:  10pt; }
        .size-body { font-size:  9pt; }

        ._tr{ page-break-inside:avoid; page-break-after:auto }
        ._head { display:table-header-group }
        ._foot { display:table-footer-group }

        td{
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }

        .text_right{
            text-align: right !important;
        }
    </style>
</head>
<body>

    <?php
        if (isset($page)){
            $this->load->view($page);
        }
    ?>

</body>
</html>