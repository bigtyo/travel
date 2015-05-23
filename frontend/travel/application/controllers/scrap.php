<?php
class scrap extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        
        
    }
    
    function setfields($ch,$host,$submit){
        
        $userAgent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.4) Gecko/20060508 Firefox/1.5.0.4"; 

        

        

        if(!$ch) { 
            die(sprintf("Fehler[%d]: %s", 
                curl_errno($ch), curl_error($ch))); 
        }
        curl_setopt($ch, CURLOPT_URL, $host); 
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $submit);

        
        
        //return $ch;
    }
    
    public function sriwijayabooking(){
//        $generator = new Wsdl2PhpGenerator\Generator();
//        $generator->generate(
//            new Wsdl2PhpGenerator\Config(array(
//                'inputFile' => 'http://localhost/travel/airlines/sriwijayaapi.wsdl',
//                'outputDir' => 'tmp/SriwijayaApi',
//                    'soapClientOptions' => array(
//                        'authentication' => SOAP_AUTHENTICATION_BASIC,
//                        'login' => 'username',
//                        'password' => 'secret'
//                        'connection_timeout' => 60,
//                    )
//            ))
//        );
        $idticketing = $this->input->post('idticketing');
        require_once 'tmp/SriwijayaApi/autoload.php';
        
        $ws = new \SriwijayaApi\Webservice();
        
        $d = $ws->Webservice();
        
        
        $this->load->model('ticketingdetail_model');
        $listpass = $this->ticketingdetail_model->getlist($idticketing);
        
        $AdultNamesArray = array();
        $ChildNamesArray = array();
        $InfantNamesArray = array();
        
        foreach($listpass as $pass){
            $InputReqNameArray = new InputReqNameArray();
            $time = strtotime($pass->tanggallahir);
            $dob = date("Y-m-d", $time);
            
            $InputReqNameArray->setDob($dob);
            $InputReqNameArray->setFirstName($pass->firstname);
            $InputReqNameArray->setLastName($pass->lastname);
            $InputReqNameArray->setSuffix($pass->salutation);
            
            if($pass->jenispenumpang == 1){
                
                array_push($AdultNamesArray, $InputReqNameArray);
            }elseif($pass->jenispenumpang == 2){
                array_push($ChildNamesArray, $InputReqNameArray);
            }else{
                array_push($InfantNamesArray, $InputReqNameArray);
            }
        }
        
        $AdultNames = new AdultNamesArray($AdultNamesArray);
        $ChildNames = new ChildNamesArray($ChildNamesArray);
        $InfantNames = new InfantNamesArray($InfantNamesArray);
        
        $reqWsGeneratePNR = new reqWsGeneratePNR($AdultNames, $ChildNames, $InfantNames, null);
        $reqWsGeneratePNR->setUsername("SUBAG0169");
        $reqWsGeneratePNR->setPassword("1nt1citosby");
        $reqWsGeneratePNR->setEmail("mochammad.raditya@gmail.com");
        
        $respWsGeneratePNR = $d->WsGeneratePNR($reqWsGeneratePNR);
        
        if($respWsGeneratePNR instanceof respWsGeneratePNR){
            $bookingcode = $respWsGeneratePNR->getBookingCode();
            $itinary = $respWsGeneratePNR->getYourItineraryDetails();
            $paymentdetails = $itinary->getPaymentDetails();
            $reservationdetails = $itinary->getReservationDetails();
            $itinarydetails = $itinary->getItineraryDetails();
            $journey = $itinarydetails->getJourney();
            $arrayjourney = $journey->getJourneyArray();
            
        }
        
    
    }
    
    public function sriwijayasearch(){
        $idticketing = $this->input->post('idticketing');
        
//        $generator = new Wsdl2PhpGenerator\Generator();
//        $generator->generate(
//            new Wsdl2PhpGenerator\Config(array(
//                'inputFile' => 'https://wsx.sriwijayaair.co.id:11443/wsdl.eticketv110/index.php',
//                'outputDir' => 'tmp/SriwijayaApi',
//                'proxy' => 'tcp://127.0.0.1:1080'
//                )
//            )
//        );
        require_once 'tmp/SriwijayaApi/autoload.php';
        
        $d = new Webservice();
        
        
        
        
        $this->load->model('ticketingdetail_model');
        $listpass = $this->ticketingdetail_model->getlist($idticketing);
        
        $reqWsSearchFlight = new reqWsSearchFlight();
        $reqWsSearchFlight->setUsername("SUBAG0169");
        $reqWsSearchFlight->setPassword("1nt1citosby");
        $reqWsSearchFlight->setAdult("1");
        $reqWsSearchFlight->setChild("0");
        $reqWsSearchFlight->setInfant("0");
        $reqWsSearchFlight->setCityFrom("BPN");
        $reqWsSearchFlight->setCityTo("SUB");
        $reqWsSearchFlight->setReturnStatus("YES");
        $reqWsSearchFlight->setDepartDate("20-APR-2015");
        $reqWsSearchFlight->setReturnDate("05-MAY-2015");
        
        
        $data1 = $d->WsSearchFlight($reqWsSearchFlight);
        
        $data['json'] = json_encode($data1);
        
        $this->load->view('json_view',$data);
    }
    
    public function general(){
        $origin = $this->input->post('dari');
        $dest = $this->input->post('tujuan');
        $ispergi = $this->input->post('ispergi');
        $tanggal_a = $this->input->post('tgl_awal');

        $tanggal_b = $this->input->post('tgl_akhir');
        $isoneway = $this->input->post('isoneway');
        $dewasa = $this->input->post('dewasa');
        $child = $this->input->post('child');
        $infant = $this->input->post('infant');
        
        if($isoneway){
            $istwoway=0;
            
        }else{
            $istwoway=1;
        }
        
        $host = "http://localhost:85/beginscrap";
        $submit ="dari=".$origin."&"
                . "tujuan=".$dest."&"
                
                . "tgl_awal=$tanggal_a&"
                . "tgl_akhir=$tanggal_b&"
                . "istwoway=$istwoway&"
                . "dewasa=$dewasa&"
                . "child=$child&"
                . "infant=$infant&"
                . "isepergi=$ispergi";
                
        //echo $submit;
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_VERBOSE, 1); 
        //curl_setopt($ch, CURLOPT_HEADER, 1); 
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/general.txt");  
        //curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); 
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        //curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POST, 1);
        
        $this->setfields($ch,$host,$submit);
        
        $data = curl_exec($ch);
        curl_close($ch);
        echo rtrim($data,"1");
        
        
    }
    
    
    
    public function airasiabook2(){
        $this->load->model("ticketingdetail_model");
        
        $idticketing = $this->input->post('idticketing');
        $mode = $this->input->post('mode');
        
        exec("python.exe ".PYTHON_PATH."airasia-booking.py ".$idticketing. " ".$mode);
        $path =  RES_PATH."airasia_".$idticketing;
        
        //$file = file($path);
        
        $html = file_get_html($path);
        
        $ticketing_details = $this->ticketingdetail_model->getlist($idticketing);
        
        $jumlahregular = 0;
        $jumlahinfant = 0;
        foreach($ticketing_details as $ticket){
            if($ticket->jenispenumpang == 3){
                $jumlahinfant++;
            }else{
                $jumlahregular++;
            }
        }
        
        
        
        
        $kodebooking = $html->find("div",-1)->plaintext;
        $total = $html->find("table.priceDisplay tr",-1)->find("td",-1)->innertext;
//        $basefare = [$html->find("table.priceDisplay tr",1)->find("td.td2",0)->innertext];
//        $fees = [$html->find("table.priceDisplay tr",2)->find("td.td2",0)->innertext];
//        if($jumlahinfant > 0){
//            $infantfees = [$html->find("table.priceDisplay tr",4)->find("td.td2",0)->innertext];
//            $infantfare = [$html->find("table.priceDisplay tr",3)->find("td.td2",0)->innertext];
//        }
        
        if($mode == 1){
            $basefare = [$html->find("table.priceDisplay tr",1)->find("td.td2",0)->innertext,$html->find("table.priceDisplay tr",1)->find("td.td2",1)->innertext];
            $fees = [$html->find("table.priceDisplay tr",2)->find("td.td2",0)->innertext,$html->find("table.priceDisplay tr",2)->find("td.td2",1)->innertext];
            if($jumlahinfant > 0){
                $infantfees = [$html->find("table.priceDisplay tr",4)->find("td.td2",0)->innertext,$html->find("table.priceDisplay tr",4)->find("td.td2",1)->innertext];
                $infantfare = [$html->find("table.priceDisplay tr",3)->find("td.td2",0)->innertext,$html->find("table.priceDisplay tr",3)->find("td.td2",1)->innertext];
                //array_push($infantfees,$html->find("table.priceDisplay tr",4)->find("td.td2",1)->innertext);
                //array_push($infantfare,$html->find("table.priceDisplay tr",3)->find("td.td2",1)->innertext);
            }
        }else if($mode == 2){
            $basefare = [0,$html->find("table.priceDisplay tr",1)->find("td.td2",0)->innertext];
            $fees = [0,$html->find("table.priceDisplay tr",2)->find("td.td2",0)->innertext];
            if($jumlahinfant > 0){
                $infantfees = [0,$html->find("table.priceDisplay tr",4)->find("td.td2",0)->innertext];
                $infantfare = [0,$html->find("table.priceDisplay tr",3)->find("td.td2",0)->innertext];
            }
        }else{
            $basefare = [$html->find("table.priceDisplay tr",1)->find("td.td2",0)->innertext,0];
            $fees = [$html->find("table.priceDisplay tr",2)->find("td.td2",0)->innertext,0];
            if($jumlahinfant > 0){
                $infantfees = [$html->find("table.priceDisplay tr",4)->find("td.td2",0)->innertext,0];
                $infantfare = [$html->find("table.priceDisplay tr",3)->find("td.td2",0)->innertext,0];
            }
        }
        
        #$kodebooking = $html->find("#SpanRecordLocator")->plaintext;
        
        foreach($ticketing_details as $ticket){
            if($ticket->jenispenumpang == 1){
                
                $nta = 0.95 * (double) str_replace(",","",str_replace(" IDR","", $basefare[0])) / $jumlahregular;
                $nta_kembali = 0.95 * (double) str_replace(",","",str_replace(" IDR","", $basefare[1])) / $jumlahregular;
            }
            if($ticket->jenispenumpang == 2){
                $nta = 0.95 * (double) str_replace(",","",str_replace(" IDR","", $basefare[0])) / $jumlahregular;
                $nta_kembali = 0.95 * (double) str_replace(",","",str_replace(" IDR","", $basefare[1])) / $jumlahregular;
            }
            if($ticket->jenispenumpang == 3){
                $nta = 0.95 * (double) str_replace(",","",str_replace(" IDR","", $infantfare[0])) / $jumlahinfant;
                $nta_kembali = 0.95 * (double) str_replace(",","",str_replace(" IDR","", $infantfare[1])) / $jumlahinfant;
            }
            $idticketing_detail = $ticket->idticketing_detail;
            $data['nta'] = $nta;
            $data['nta_kembali'] = $nta_kembali;
            $this->ticketingdetail_model->edit($data,$idticketing_detail);
        }
        
        
        $json['total'] = $total;
        $json['fees'] = $fees;
        $json['basefare'] = $basefare;
        $json['kodebooking'] = $kodebooking;
        $json['html'] = $html->outertext;
        
        if($mode == 1){
            //$data['nta'] = 0.95 * $json['basefare'];
            $data['kodebooking'] = $json['kodebooking'];
            //$data['nta_kembali'] = 0.95 * $json['basefare2'];
            $data['kodebookingpulang'] = $json['kodebooking'];
        }else if($mode == 2){
            //$data['nta_kembali'] = 0.95 * $json['basefare'];
            $data['kodebookingpulang'] = $json['kodebooking'];
        }else{
            //$data['nta'] = 0.95 * $json['basefare'];
            $data['kodebooking'] = $json['kodebooking'];
        }
        
        $this->ticketingdetail_model->editbyticketing($data,$idticketing);
        //$json['html'] = $html->plaintext;
        
        $data['json'] = json_encode($json);
        
        $this->load->view('json_view',$data);
    }
    
    public function lionbooking(){
        $this->load->model("ticketing_model");
        
        $idticketing = $this->input->post('idticketing');
        
        try {
            $this->ticketing_model->deletecaptcha($idticketing);
            unlink(RES_PATH_PHYS.$idticketing.".jpg");
            unlink(RES_PATH_PHYS."sc_".$idticketing.".png");
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
        }

        
        
        $mode = $this->input->post('mode');
        
        exec("python.exe ".PYTHON_PATH."lionair_booking.py ".$idticketing. " ".$mode);
        $path =  RES_PATH."lionair_".$idticketing;
        $html = file_get_html($path);
        
        $kodebooking = trim($html->find("table",0)->find("tr",0)->find("td",1)->plaintext);
                
        $html->find("table",0)->find("tr",1)->outertext = "";
        $json['kodebooking'] = $kodebooking;
        $json['nta'] = (double) $html->find("div",-1)->plaintext;
        $html->find("div",-1)->outertext = "";
        $html->find("div div",0)->outertext = "";
        $html->find("div div",1)->outertext = "";
        $html->find("div div",2)->outertext = "";
        $html->find("div div",3)->outertext = "";
        $html->find("div div",4)->outertext = "";
        $html->find("div div",5)->outertext = "";
        $html->find("div div",6)->outertext = "";
        $json['html'] = $html->find('div',0)->outertext;
        $data['json'] = json_encode($json);
        
        $this->load->view('json_view',$data);
    }
    
    public function citilinkbook2(){
        $this->load->model("ticketingdetail_model");
        
        $idticketing = $this->input->post('idticketing');
        $mode = $this->input->post('mode');
        exec("python.exe ".PYTHON_PATH."citilink-booking.py ".$idticketing. " ".$mode);
        $path =  RES_PATH."citilink_".$idticketing;
        //"C:\\pythonproject\\citilink-booking.py 44 1";
        //$file = file($path);
        
        $html = file_get_html($path);
        //if($mode == 1){
            $tablepergi = $html->find("table",0);
            $tablepulang = $html->find("table",2);
            
            $detailspergi = array(
                'adult' => array(),
                'child' => array(),
                'infant' => array()
            );
            
            $detailspulang = array(
                'adult' => array(),
                'child' => array(),
                'infant' => array()
            );
            
            foreach($tablepergi->find("tr") as $tr){
                $temp = $tr->find("td",0)->plaintext;
                
                $tempfare = $tr->find("td",-1)->plaintext;
                $fare = (double) str_replace(",","",str_replace("Rp.","", $tempfare));
                if(strpos($temp,"Adult") !== false){
                    $array = explode(" ", $temp);
                    $jumlahadult = (int)$array[0];
                    $detailspergi['adult'] = array(
                        'jumlah' => $jumlahadult,
                        'basefare' => $fare
                    );
                }
                
                if(strpos($temp,"Child") !== false){
                    $array = explode(" ", $temp);
                    $jumlahchild = (int)$array[0];
                    $detailspergi['child'] = array(
                        'jumlah' => $jumlahchild,
                        'basefare' => $fare
                    );
                }
                
                if(strpos($temp,"&nbsp;Infant") !== false){
                    $array = explode("&nbsp;", $temp);
                    
                    $jumlahinfant = (int)$array[0][0];
                    $detailspergi['infant'] = array(
                        'jumlah' => $jumlahinfant,
                        'basefare' => $fare
                    );
                }
            }
            
            foreach($tablepulang->find("tr") as $tr){
                $temp = $tr->find("td",0)->plaintext;
                $tempfare = $tr->find("td",-1)->plaintext;
                $fare = (double) str_replace(",","",str_replace("Rp.","", $tempfare));
                if(strpos($temp,"Adult") !== false){
                    $array = explode(" ", $temp);
                    $jumlahadult = (int)$array[0];
                    $detailspulang['adult'] = array(
                        'jumlah' => $jumlahadult,
                        'basefare' => $fare
                    );
                }
                
                if(strpos($temp,"Child") !== false){
                    $array = explode(" ", $temp);
                    $jumlahchild = (int)$array[0];
                    $detailspulang['child'] = array(
                        'jumlah' => $jumlahchild,
                        'basefare' => $fare
                    );
                }
                
                if(strpos($temp,"&nbsp;Infant") !== false){
                    $array = explode("&nbsp;", $temp);
                    //echo json_encode($array);
                    $jumlahinfant = (int)$array[0][0];
                    
                    $detailspulang['infant'] = array(
                        'jumlah' => $jumlahinfant,
                        'basefare' => $fare
                    );
                    //echo json_encode($detailspulang['infant']);
                }
            }
            
            $ticketing_details = $this->ticketingdetail_model->getlist($idticketing);
            
            foreach($ticketing_details as $ticket){
                if($ticket->jenispenumpang == 1){
                    //if($mode != 2){
                    if($mode == 3){
                        $nta = 0.95 * $detailspergi['adult']['basefare'];
                        
                        $nta_kembali = 0;
                    }else if($mode == 2){
                        $nta = 0;
                        
                        $nta_kembali = 0.95 * $detailspergi['adult']['basefare'];
                    }else{
                        $nta = 0.95 * $detailspergi['adult']['basefare'];
                        
                        $nta_kembali = 0.95 * $detailspulang['adult']['basefare'];
                    }
                    
                }
                if($ticket->jenispenumpang == 2){
                    if($mode == 3){
                        $nta = 0.95 * $detailspergi['child']['basefare'];
                        
                        $nta_kembali = 0;
                    }else if($mode == 2){
                        $nta = 0;
                        
                        $nta_kembali = 0.95 * $detailspergi['child']['basefare'];
                    }else{
                        $nta = 0.95 * $detailspergi['child']['basefare'];
                        
                        $nta_kembali = 0.95 * $detailspulang['child']['basefare'];
                    }
                }
                if($ticket->jenispenumpang == 3){
                    if($mode == 3){
                        $nta = 0.95 * $detailspergi['infant']['basefare'];
                        
                        $nta_kembali = 0;
                    }else if($mode == 2){
                        $nta = 0;
                        
                        $nta_kembali = 0.95 * $detailspergi['infant']['basefare'];
                    }else{
                        $nta = 0.95 * $detailspergi['infant']['basefare'];
                        
                        $nta_kembali = 0.95 * $detailspulang['infant']['basefare'];
                    }
                }
                $idticketing_detail = $ticket->idticketing_detail;
                $data['nta'] = $nta;
                $data['nta_kembali'] = $nta_kembali;
                $this->ticketingdetail_model->edit($data,$idticketing_detail);
            }
            
        //}
        $kodebooking = $html->find("div",-1)->plaintext;
        $total = $html->find("table td.right",-1)->innertext;
        //$basefare = $html->find("table td.right div",0)->innertext;
        //$basefare2 = $html->find("table td.right div",1)->innertext;
        #$kodebooking = $html->find("#SpanRecordLocator")->plaintext;
        
        
        
        
        $json['total'] = (double) str_replace(",","",str_replace("Rp.","", $total));
        if($mode == 3){
            $json['details'] = array('pergi'=>$detailspergi,'pulang' => null);
        }
        else if($mode == 2){
            $json['details'] = array('pergi'=>null,'pulang' => $detailspulang);
        }else{
            $json['details'] = array('pergi'=>$detailspergi,'pulang' => $detailspulang);
        }
        
        //$json['basefare2'] = (double) str_replace(",","",str_replace("Rp.","", $basefare2));
        $json['kodebooking'] = $kodebooking;
        $data = array();
        if($mode == 1){
            //$data['nta'] = 0.95 * $json['basefare'];
            $data['kodebooking'] = $json['kodebooking'];
            //$data['nta_kembali'] = 0.95 * $json['basefare2'];
            $data['kodebookingpulang'] = $json['kodebooking'];
        }else if($mode == 2){
            //$data['nta_kembali'] = 0.95 * $json['basefare'];
            $data['kodebookingpulang'] = $json['kodebooking'];
        }else{
            //$data['nta'] = 0.95 * $json['basefare'];
            $data['kodebooking'] = $json['kodebooking'];
        }
        
        $this->ticketingdetail_model->editbyticketing($data,$idticketing);
        
        $json['html'] = $html->outertext;
        //$json['html'] = $html->plaintext;
        
        $data['json'] = json_encode($json);
        
        $this->load->view('json_view',$data);
        //$file
    }
    
    
    
    public function garudabooking2(){
        $this->load->model("ticketingdetail_model");
        
        $idticketing = $this->input->post('idticketing');
        $mode = $this->input->post('mode');
        
        exec("python.exe ".PYTHON_PATH."garuda-booking.py ".$idticketing. " ".$mode);
        $path =  RES_PATH."garuda_".$idticketing;
        
        //$file = file($path);
        //echo $mode;
        ///die;
        $html = file_get_html($path);
        
        $ticketing_details = $this->ticketingdetail_model->getlist($idticketing);
        
        $jumlahregular = 0;
        $jumlahinfant = 0;
        foreach($ticketing_details as $ticket){
            if($ticket->jenispenumpang == 3){
                $jumlahinfant++;
            }else{
                $jumlahregular++;
            }
        }
        
        $adultfare_temp = $html->find("tr",1)->find("td",1)->plaintext;
        $nta_temp = $html->find("tr",-1)->find("td",1)->plaintext;
        $kodebooking = $html->find("div",-1)->plaintext;
        $data = array();
        foreach($ticketing_details as $ticket){
            //$iscounted
            if($ticket->jenispenumpang == 1){
                $nta = (double) str_replace(",","",$nta_temp);
                $data['nta'] = $nta;
                
                //break;
               
            }
            if($mode == 1){
                $data['kodebooking'] = $kodebooking;
                $data['kodebookingpulang'] = $kodebooking;
            }else if($mode == 2){
                $data['kodebookingpulang'] = $kodebooking;
            }else{
                $data['kodebooking'] = $kodebooking;
            }
            
            $this->ticketingdetail_model->edit($data,$ticket->idticketing_detail);
        }
        $html->find('tr',-1)->outertext = '';
        $html->find('tr',-2)->outertext = '';
        $html->find('tr',-3)->outertext = '';
        $json['html'] = $html->outertext;
        $json['data'] = $data;
        
        $data['json'] = json_encode($json);
        //echo $data['json'];
        $this->load->view('json_view',$data);
    }
    
    public function citilinkissued(){
        $this->load->model("ticketingdetail_model");
        
        $kodebooking = $this->input->post('kodebooking');
        
        $output = exec("python.exe ".PYTHON_PATH."citilink_issued.py ".$kodebooking);
        
        $res =(int) trim($output);
        
        $json = array(
            'success' => 0
        );
        if($res == 1){
            $json['success'] = 1;
            //$json['html'] = $html->plaintext;
        
            $data['json'] = json_encode($json);
        }
        
        $this->load->view('json_view',$data);
    }
    
    public function airasiaissued(){
        $this->load->model("ticketingdetail_model");
        
        $kodebooking = $this->input->post('kodebooking');
        
        $output = exec("python.exe ".PYTHON_PATH."airasia_issued.py ".$kodebooking);
        
        $res =(int) trim($output);
        
        $json = array(
            'success' => 0
        );
        if($res == 1){
            $json['success'] = 1;
            //$json['html'] = $html->plaintext;
            $json['output'] = $res;
            $data['json'] = json_encode($json);
        }
        
        $this->load->view('json_view',$data);
    }
    
    public function booking(){
        $this->load->model('ticketing_model');
        $this->load->model('ticketingdetail_model');
        $this->load->model('masterpenerbangan_model');
        
        $idticketing = $this->input->post('idticketing');
        $pergi = json_decode($this->input->post('pergi'));
        $pulang = json_decode($this->input->post('pulang'));
        
        /*ambil data dari database dulu*/
        $ticketing_details = $this->ticketingdetail_model->getlist($idticketing);
        //$result['json_details'] = json_encode($ticketing_details);
        
        /* todo tulis coding tentang booking disini */
        $mode = 1;
        $scriptpergi = "";
        $scriptpulang = "";
        $idmaskapaipergi = 0;
        $idmaskapaipulang = 0;
        $data = array(
            'statuspergi' => 0,
            'statuspulang' => 0
            
        );
        
        foreach($ticketing_details as $obj){
            
            if($obj->idmaskapaipulang == null || $obj->idmaskapaipulang == ""){
                $mode = 3;
                $idmaskapaipergi = $obj->idmaskapaipergi;
            }else{
                if($obj->idmaskapaipergi == $obj->idmaskapaipulang){
                    $mode = 1;
                    
                    //$scriptpergi = $this->masterpenerbangan_model->getfilescrap($obj->idmaskapaipergi)."-booking.py";
                    //$scriptpergi = $scriptpergi." ".$idticketing." ".$mode;
                    $idmaskapaipergi = $obj->idmaskapaipergi;
                    $idmaskapaipulang = $obj->idmaskapaipergi;
                }else{
                    $mode = 2;
                    $idmaskapaipergi = $obj->idmaskapaipergi;
                    $idmaskapaipulang = $obj->idmaskapaipulang;
                }
            }
            
            
            
            
            
            
            
            continue;
        }
        
        $result['idmaskapaipergi'] = $idmaskapaipergi;
        $result['idmaskapaipulang'] = $idmaskapaipulang;
        $result['rpergi'] = $this->masterpenerbangan_model->getfilescrap($idmaskapaipergi);
        $result['rpulang'] = $this->masterpenerbangan_model->getfilescrap($idmaskapaipulang);
        $result['idticketing'] = $idticketing;
        
        
        if($mode == 1 ||$mode == 3){
            //$scriptpergi = $this->masterpenerbangan_model->getfilescrap($idmaskapaipergi)."-booking.py";
            //$scriptpergi = $scriptpergi." ".$idticketing." ".$mode;
            $result['r1mode'] = $mode;
        }else{
            //$scriptpergi = $this->masterpenerbangan_model->getfilescrap($idmaskapaipergi)."-booking.py";
            //$scriptpulang = $this->masterpenerbangan_model->getfilescrap($idmaskapaipulang)."-booking.py";

            $scriptpergi = $scriptpergi." ".$idticketing." 3";
            $scriptpulang = $scriptpulang." ".$idticketing." 2";
            $result['r1mode'] = 3;
            $result['r2mode'] = 2;
        }

        if($scriptpergi != ""){
            //$res = exec($scriptpergi);
            //echo $scriptpergi;
            $result['script1'] = $scriptpergi;
            
            //$filescrap = $this->masterpenerbangan_model->getfilescrap($idmaskapaipergi);
            //$file = file(RES_PATH.$filescrap."_".$idticketing);
            
            //if($res == "success"){
            //    $result['statuspergi'] = 1;
            //}
        }

        if($scriptpulang != ""){
            //echo $scriptpulang;
            //$res = exec($scriptpulang);
            $result['script2'] = $scriptpulang;
            //$filescrap = $this->masterpenerbangan_model->getfilescrap($idmaskapaipulang);
            //$file = file(RES_PATH.$filescrap."_".$idticketing);

            //if($res == "success"){
            //    $result['statuspulang'] = 1;
            //}
        }
        
        
        /*result*/
        //foreach($ticketing_details as $obj){
            //;
            //$data_update['kodebooking'] = "x6g54hs";
            //$data_update['kodebookingpulang'] = "b5xg54ds";
            //$data_update['tanggalpergi'] = "2014-12-27 09:10:00";
            //$data_update['tanggalpulang'] = "2015-01-03 15:15:00";
            //$data_update['kodeterbangpergi'] = "JT 332";
            //$data_update['kodeterbangpulang'] = "SJ 123";
            //$this->ticketingdetail_model->simpan($obj->idticketing_detail,$data_update,$idticketing);
        //}
        
//        $result['kodebooking'] = "x6g54hs";
//        $result['kodebookingpulang'] = "b5xg54ds";
//        $result['tanggalpergi'] = "2014-12-27 09:10:00";
//        $result['tanggalpulang'] = "2015-01-03 15:15:00";
//        $result['kodeterbangpergi'] = "JT 332";
//        $result['kodeterbangpulang'] = "SJ 123";
        
        //$details = array();
        //array_push($details, 600000);
        //array_push($details, 500000);
        //array_push($details, 300000);
        //$result['details'] = $details;
        $json['json'] = json_encode($result);
        $this->load->view('json_view',$json);
    }
    
    public function submitcaptcha(){
        $this->load->model("ticketing_model");
        
        $input = $this->input->post("input");
        $idticketing = $this->input->post("idticketing");
        
        $res = $this->ticketing_model->savecaptcha($input,$idticketing);
        
        if($res['status'] == 1){
            $json['success'] = 1;
        }else{
            $json['success'] = 0;
        }
        $data['json'] = json_encode($json);
        $this->load->view('json_view',$data);
    }
    
    public function checkcaptcha(){
        $input = $this->input->get('idticketing');
        $exists = file_exists(RES_PATH_PHYS.$input.".jpg");
        
        $json['status'] = 0;
        if($exists){
            $json['status'] = 1;
        }
        
        $data['json'] = json_encode($json);
        
        $this->load->view('json_view',$data);
    }
}
?>

