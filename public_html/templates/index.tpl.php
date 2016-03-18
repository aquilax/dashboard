<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta http-equiv="refresh" content="10">
    <style type="text/css">
        body {
            font-family: "Lucida Console", Monaco, monospace;
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
            margin: 0 0 35vh 0;
        }
        td div {
            font-size: 6vw;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <h1>Active products DE</h1>
                <div><?= $products; ?></div>
            </td>
            <td>
                <h1>Active SKUs DE</h1>
                <div><?= $articles; ?></div>
            </td>
        </tr>
    </table>
</body>
</html>
