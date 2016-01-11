<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kevin
 * Date: 1/12/16
 * Time: 1:04 AM
 * To change this template use File | Settings | File Templates.
 */

class LeadDataFetcher
{
    public function getDataFromDialer($list_id)
    {
        $leadCollection = [];
        $curlURL = "http://dial.roadtoriches.co.uk/vicidial/getlist.php?";
        $httpParam = array(
            "ADD" => "2356",
            "listid" => $list_id,
        );
        $curlURL .= http_build_query($httpParam);
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        $curlResRaw = curl_exec($curlres);
        $arrResult = json_decode($curlResRaw, true);
        /*iterate and extract*/
        foreach ($arrResult[0]['data'] as $key => $value) {
            $val = $arrResult[0]['data'][$key];
            $status = $arrResult[1]['data'][$key];
            $newLead = new LeadData($status, $val);
            $leadCollection[] = $newLead;
        }
        return $leadCollection;
    }

    /**
     * @param $list_id
     * @return float
     */
    public function getTotalRevenue($list_id){
        $curlURL = "https://roadtoriches.co.uk/rr_list_total.php?";
        $httpParam = array(
            "ADD" => "2356",
            "listid" => $list_id,
        );
        $curlURL .= http_build_query($httpParam);
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlres, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlres, CURLOPT_SSL_VERIFYPEER, false);
        $curlResRaw = curl_exec($curlres);
        $resultArr = json_decode($curlResRaw, true);
        return $resultArr[0][0];
    }


}