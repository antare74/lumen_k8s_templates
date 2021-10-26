<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Importir.org</title>
    <style>*{margin:0;padding:0}*{font-family:"Helvetica Neue",Helvetica,Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100%!important;height:100%}a{color:#2ba6cb}.btn{text-decoration:none;color:#fff;background-color:#666;padding:10px 16px;font-weight:700;margin-right:10px;text-align:center;cursor:pointer;display:inline-block}p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:700;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;font-size:12px;margin-bottom:10px;text-decoration:none;color:#fff;font-weight:700;display:block;text-align:center}a.fb{background-color:#3b5998!important}a.tw{background-color:#1daced!important}a.ig{background-color:#8e018e!important}a.gp{background-color:#db4a39!important}a.yt{background-color:#ed0000!important}a.a-none{text-decoration:none;color:#000}p{text-align:justify}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both!important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:700}h1,h2,h3,h4,h5,h6{font-family:HelveticaNeue-Light,"Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0!important}p,ul{margin-bottom:10px;font-weight:400;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0!important}.container{display:block!important;max-width:600px!important;margin:0 auto!important;clear:both!important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0!important;margin:0 auto;max-width:600px!important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}table.info td,th{border:1px solid #ccc;height:30px}table.info{color:#333;font-family:Helvetica,Arial,sans-serif;border-collapse:collapse;border-spacing:0}table.info th{background:#f3f3f3;font-weight:700}table.info td{background:#fafafa;text-align:center}table.info tr:nth-child(even) td{background:#f1f1f1}table.info tr:nth-child(odd) td{background:#fefefe}table.info tr td:hover{background:#666;color:#fff}@media only screen and (max-width:600px){a[class=btn]{display:block!important;margin-bottom:10px!important;background-image:none!important;margin-right:0!important}div[class=column]{width:auto!important;float:none!important}table.social div[class=column]{width:auto!important}}.title{font-size:22px}</style>
</head>

<body bgcolor="#FFFFFF">

    <table class="head-wrap" bgcolor="#fed700">
        <tr>
            <td></td>
            <td class="header container">
                <div class="content">
                    <table>
                        <tr>
                            <td class="title">
                                <a class="a-none" href="{{ $mailData['platform_name'] }}">
                                    {{ strtoupper($mailData['platform_name']) }}
                                </a>
                            </td>
                            <td align="right"><h6 class="collapse">{{ $mailData['title'] ? $mailData['title'] : 'INFORMATION' }}</h6></td>
                        </tr>
                    </table>
                </div>
            </td>
            <td></td>
        </tr>
    </table>

    <table class="body-wrap">
        <tr>
            <td></td>
            <td class="container" bgcolor="#FFFFFF">
                <div class="content">
                    @yield('main')
                </div>

                @if ($platformData)
                    <div class="content">
                        <table class="social" width="100%">
                            <tr>
                                <td>
                                    <table align="left" class="column">
                                        <tr>
                                            <td>
                                                <h5 class="">Contact Info:</h5>
                                                <p>
                                                    Phone: <strong>{{ $platformData['phone'] }}</strong>
                                                    <br/>
                                                    Email: <strong>{{ $platformData['email'] }}</strong>
                                                </p>
                                                <p>
                                                    {{ $platformData['address'] }}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <span class="clear"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endif
            </td>
            <td></td>
        </tr>
    </table>

</body>
</html>
