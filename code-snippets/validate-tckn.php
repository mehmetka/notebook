<?php

print_r(validateTCKN());

function validateTCKN()
    {
        $postableData = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
            <soap:Body>
                <TCKimlikNoDogrula xmlns="http://tckimlik.nvi.gov.tr/WS">
                    <TCKimlikNo>****</TCKimlikNo>
                    <Ad>****</Ad>
                    <Soyad>****</Soyad>
                    <DogumYili>****</DogumYili>
                </TCKimlikNoDogrula>
            </soap:Body>
        </soap:Envelope>';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postableData);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'POST /Service/KPSPublic.asmx HTTP/1.1',
            'Host: tckimlik.nvi.gov.tr',
            'Content-Type: text/xml; charset=utf-8',
            'SOAPAction: "http://tckimlik.nvi.gov.tr/WS/TCKimlikNoDogrula"',
            'Content-Length: ' . strlen($postableData)
        ));
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($curl);
        curl_close($curl);

        return strip_tags($result);
    }
