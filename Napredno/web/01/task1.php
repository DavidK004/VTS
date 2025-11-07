<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>

<?php
function hello(): void
{
    echo "Hello from VTS!";
}

function goodbye(): void
{
    echo "Goodbye from VTS";
}

function info($name, $year): string
{
    return <<<INFO
    Name: $name
    Year: $year
    INFO;

}

$var = "hello";

$var();
echo "<br>";

$nowdoc = <<<'EOD'
$message = $happy != "very" ? yes() : no();

echo "$message";

$message = $happy != "very" ? $yes : $no;

if($happy!="very")
    $message = $yes;
else
    $message = $no;
EOD;

echo info("david", "3");

?>