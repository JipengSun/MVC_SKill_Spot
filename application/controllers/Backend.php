<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/23
 * Time: 18:43
 */

class Backend extends CI_Controller
{

    function __construct()
    {
        # code...
        parent::__construct();
    }

    public function list(){

        //$this->load->view('templates/header',$data);
        SESSION_START();
        if(!isset($_SESSION["username"])) {
            die("Please login first!!!!");
        }

        $this->load->view('backend/backend');
    }
    public function backend(){

        $message = array(
            ["from"=>"0sd01",  "subject"=>"help me finish assignments", "date"=>"2018-01-02 12:12:01", "content"=>"The Australian Broadcasting Corporation (ABC) is Australia's national broadcaster, funded by the Australian Federal Government but specifically independent of Government and politics in the Commonwealth. The ABC plays a leading role in journalistic independence and is fundamental in the history of broadcasting in Australia, its model based on – but not restricted to – the BBC in the United Kingdom. Originally financed in a similar method to the British model using consumer licence fees on broadcasting receivers, its funding evolved to a projected model approved by the Australian Parliament. In recent times, the Corporation provides television, radio, online and mobile services throughout metropolitan and regional Australia, as well as overseas through Australia Plus and Radio Australia."],
            ["from"=>"1sds01",  "subject"=>"help me", "date"=>"2018-01-02 12:12:01", "content"=>"the ABC was a Government licensed consortium of private entertainment and content providers, authorised under supervision to broadcast on the airwaves using a two-tiered system. The \"A\" system derived its funds primarily from the licence fees levied on the purchasers of the radio receivers, with an emphasis on building the radio wave infrastructure into regional and remote areas, whilst the \"B\" system relied on privateers and their capacity to establish viable enterprises using the new technology. "],
            ["from"=>"2fggf01", "subject"=>"plant tree", "date"=>"2017-01-02 12:12:01", "content"=>"Following the general downward economic trends of the era, as entrepreneurial ventures in National infrastructure struggled with viability, the \"Company\" was subsequently acquired to become a fully state-owned corporation on 1 July 1932 and renamed as Australian Broadcasting Commission, re-aligning more closely to the British, BBC model.The Australian Broadcasting Corporation Act 1983[1] changed the name of the organisation to"],
            ["from"=>"301", "subject"=>"tree", "date"=>"2018-01-12 12:12:01", "content"=>"he Australian Broadcasting Corporation, effective 1 July 1983.[1] Although funded and owned by the government, the ABC remains editorially independent as ensured through the Australian Broadcasting Corporation Act 1983"],
            ["from"=>"40dvw1", "subject"=>"clean room", "date"=>"2018-03-02 12:12:01", "content"=>"The first public radio station in Australia opened in Sydney on 23 November 1923 under the call sign 2SB with other stations in Melbourne, Brisbane, Adelaide, Perth and Hobart following.[6] A licensing scheme, administered by the Postmaster-General's Department, was soon established allowing certain stations government funding, albeit with restrictions placed on their advertising content.[7]"],
            ["from"=>"50kku1", "subject"=>"candy", "date"=>"2018-01-02 15:12:01", "content"=>"Following a 1927 royal commission inquiry into radio licensing issues, the government established the National Broadcasting Service which subsequently took over a number of the larger funded stations. It also nationalised the Australian Broadcasting Company which had been created by entertainment interests to supply programs to various radio stations.[7] On 1 July 1932, the Australian Broadcasting Commission was established, taking over the operations of the National Broadcasting Service and eventually establishing offices in each of Australia's capital cities.[7][8]"],
            ["from"=>"12d301", "subject"=>"drink delivery", "date"=>"2018-11-02 12:12:01", "content"=>"Over the next four years the stations were reformed into a cohesive broadcasting organisation through regular program relays, coordinated by a centralised bureaucracy.[9] The Australian broadcast radio spectrum was constituted of the ABC and the commercial sector.[9]"],
            ["from"=>"0mdfdfdjf", "subject"=>"cooking checken", "date"=>"2018-01-02 12:32:01", "content"=>"he ABC commenced television broadcasting in 1956, and followed the earlier radio practice of naming the station after the first letter of the base state. ABN-2 (New South Wales) Sydney was inaugurated by Prime Min"],
            ["from"=>"00dd2fjgj", "subject"=>"look after babies", "date"=>"2018-01-02 12:12:01", "content"=>"followed two weeks later, on 18 November 1956. Stations in other capital cities followed: ABQ-2 (Brisbane, Queensland) (1959), ABS-2 (Adelaide, South Australia) (1960), ABW-2 (Perth, Western Australia) (1960), and ABT-2 (Hobart, Tasmania) (1960). ABC-3 Canberra opened in 1961, and ABD-6 (Darwin, Northern Territories) started broadcasting in 1971, both named after the base city."],
            ["from"=>"00fhdfwee1", "subject"=>"assignments", "date"=>"2018-01-02 12:12:11", "content"=>"Although radio programs could be distributed nationally by landline, television relay facilities were not in place until the early 1960s.[14] This meant that news bulletins had to be sent to each capital city by teleprinter, to be prepared and presented separately in each city, with filmed materials copied manually and sent to each state."]
        );




        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

        echo '<response>';
        echo json_encode($message);
        echo '</response>';


    }
}