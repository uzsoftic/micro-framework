<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/vendor/error/app.css">
    <title>Document</title>
</head>
<body>

<div id="page-wrapper">
    <h1>Error Exception</h1>


    <ul>
        <li><b>Error: </b><?= $e->getMessage() ?></li>
        <li><b>File: </b><?= $e->getFile() ?></li>
        <li><b>Line: </b><?= $e->getLine() ?> - line</li>
        <li><b>Code: </b><?= $e->getCode() ?> - error code</li>
        <li><b>Trace: </b>
            <ul>
                <? foreach ($e->getTrace() as $key => $trace) { ?>
                    <li>
                        <? print(++$key) ?>. <? print_r($trace['file']) ?>: <? print_r($trace['line']) ?>-line<br>
                        <b>Class:</b> <? empty($trace['class']) ?: print_r($trace['class']) ?>

                        <b>Function:</b> <? empty($trace['function']) ?: print_r($trace['function']) ?>

                        <b>Type:</b> <? empty($trace['type']) ?: print_r($trace['type']) ?>

                        <? if (!empty($trace['args'])){ ?>
                            <br><b>Args:</b> <? print_r($trace['args']);
                        } ?>

                    </li>
                <? } ?>
            </ul>
        </li>
    </ul>

    <ul id="messages"></ul>

    <div>
        <a href="/" class="btn btn-secondary" type="button" id="close">Home Page</a>
        <a href="#" class="btn btn-success" type="button">Refresh Page</a>
    </div>
</div>

</body>
</html>