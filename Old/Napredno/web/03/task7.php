<?php
declare(strict_types=1);
/**
 * Returns a drop down menu that uses numbers from a start to end number and has a label
 * @param string $label
 * @param int $start
 * @param int $end
 * @param string $name
 * @param mixed $default
 * @return void
 */
function getDropDownMenu(string $label, int $start, int $end, string $name, ?int $default = null): void
{
    if ($start > $end) {
        [$start, $end] = [$end, $start];
    }

    echo "<label for='{$name}'>{$label}:</label>";
    echo "<select name='{$name}' id='{$name}'>";
    for ($i = $start; $i <= $end; $i++) {
        $selected = ($i === $default) ? " selected" : "";
        echo "<option value='{$i}'{$selected}>{$i}</option>";
    }
    echo "</select><br>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
getDropDownMenu("Day", 1, 31, "day");


getDropDownMenu("Month", 1, 12, "month");

getDropDownMenu("Year", 1945, 2021, "year");
?>

<body>

</body>

</html>