<?php

require_once('nest.class.php');

// Your Nest username and password.
$username = 'email@email.com';
$password = 'password';

// See http://php.net/manual/en/timezones.php for the possible values.
date_default_timezone_set('America/Chicago');

$nest = new Nest($username, $password);
$weather = $nest->getWeather( 50023 );

echo "outside temp = ";
echo $weather->outside_temperature;
echo "Set Humidity:\n";
if( $weather->outside_temperature >= 40 )
{
    $humidity = 45;
}
// elseif( $weather->outside_temperature >= 30 )
// {
//     $humidity = 40;
// }
elseif( $weather->outside_temperature >= 20 )
{
    $humidity = 40;
}
elseif( $weather->outside_temperature >= 10 )
{
    $humidity = 35;
}
elseif( $weather->outside_temperature >= 0 )
{
    $humidity = 30;
}
elseif( $weather->outside_temperature >= -10 )
{
    $humidity = 25;
}
elseif( $weather->outside_temperature >= -20 )
{
    $humidity = 20;
}
else
{
    $humidity = 15;
}

$nest->setHumidity( $humidity );
echo $humidity;
echo "%----------\n\n";

/* Helper functions */

function json_format($json) {
    $tab = "  ";
    $new_json = "";
    $indent_level = 0;
    $in_string = false;

    $json_obj = json_decode($json);

    if($json_obj === false)
        return false;

    $json = json_encode($json_obj);
    $len = strlen($json);

    for($c = 0; $c < $len; $c++)
    {
        $char = $json[$c];
        switch($char)
        {
            case '{':
            case '[':
                if(!$in_string)
                {
                    $new_json .= $char . "\n" . str_repeat($tab, $indent_level+1);
                    $indent_level++;
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case '}':
            case ']':
                if(!$in_string)
                {
                    $indent_level--;
                    $new_json .= "\n" . str_repeat($tab, $indent_level) . $char;
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case ',':
                if(!$in_string)
                {
                    $new_json .= ",\n" . str_repeat($tab, $indent_level);
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case ':':
                if(!$in_string)
                {
                    $new_json .= ": ";
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case '"':
                if($c > 0 && $json[$c-1] != '\\')
                {
                    $in_string = !$in_string;
                }
            default:
                $new_json .= $char;
                break;
        }
    }

    return $new_json;
}

function jlog($json) {
    if (!is_string($json)) {
        $json = json_encode($json);
    }
    echo json_format($json) . "\n";
}
?>
