<?php
     header('Content-Type: application/json'); 
    function getInfoAnalista(){
        
        $curl = curl_init(); 
        $all_data = array();
        
        
        $url = "http://www.wincomparator.com/es-es/pronostico/futbol.html";
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($curl);
        
        $game = array();
        
        //get dia/hora
        preg_match_all('/<td class="align_left w125"><span class="ubuntu_light">(.*?)<\/span><\/td>/',$result,$info);
        foreach ($info[1] as $key => $h) {
            $game[$key]['Hora'] = $h;
        }

        // get equipo1
        preg_match_all('/<td class="w150 align_right"><span class="ubuntu_medium">(.*?)<\/span><\/td>/',$result,$info);
        foreach ($info[1] as $key => $e) {
            $game[$key]['Equipo1'] = $e;
        }
        //get equipo2
        preg_match_all('/<td class="w150 align_left"><span class="ubuntu_medium">(.*?)<\/span><\/td>/',$result,$info);
        foreach ($info[1] as $key => $e) {
            $game[$key]['Equipo2'] = $e;
        }
        
        //Mensaje de apuesta y cuota

        echo json_encode($game, JSON_PRETTY_PRINT);
    }

    getInfoAnalista();
?>