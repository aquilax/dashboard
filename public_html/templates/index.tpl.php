<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta http-equiv="refresh" content="10">
    <style type="text/css">
        html, body {
            height:99%;
        }
        body {
            font-family: "Lucida Console", Monaco, monospace;
            background: #2e3033 url('logo.svg') no-repeat center 95%;
            color: #b5b7ba;
            background-size:  15%;
        }
        table {
            width: 100%;
        }
        td {
            text-align: center;
            width: 50%;
        }
        td h1 {
            font-size: 2vw;
            margin: 10vh 0 30vh 0;
        }
        td div {
            font-size: 7vw;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <h1>Active products [DE]</h1>
                <div><?= number_format($products); ?></div>
            </td>
            <td>
                <h1>Active SKUs [DE]</h1>
                <div><?= number_format($articles); ?></div>
            </td>
        </tr>
    </table>
</body>
</html>
