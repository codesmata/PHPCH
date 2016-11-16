<?php namespace AddressBook;

class CURLClient
{
    /**
     * THis makes the call to the API using CURL
     * @param $host
     * @param $username
     * @param $password
     */
    public static function makeCall($url, $username, $password)
    {

        $url = trim($url);

        $process = curl_init($url);
        curl_setopt($process, CURLOPT_HEADER, 0);
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($process, CURLOPT_CONNECTTIMEOUT, 40);
        curl_setopt($process, CURLOPT_USERPWD, "$username:$password");
        $output = curl_exec($process);
        $httpCode = curl_getinfo($process, CURLINFO_HTTP_CODE);

        $errorNumber = curl_errno($process);

        //If fetch is unsuccessful
        if ($errorNumber !== 0 || $httpCode >= 400)
            return false;
        curl_close($process);
        return $output;
    }
}